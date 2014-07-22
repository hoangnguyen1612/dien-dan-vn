<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	
	quan_tri('thanh_vien_cap_nhat');
	
	if(empty($_GET['ma'])){
		$_SESSION['msg']='Vui lòng nhập mã thành viên ';
		$_SESSION['style_msg'] = 'notification error png_bg';
		header('Location: danh_sach.php');	
		exit;	
	}
	#### Kiểm tra tồn tại thành viên trong diễn đàn ##########
	$thanh_vien = $xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$_GET['ma'],'ma_dien_dan'=>$_SESSION['dien_dan']['ma']),'thanh_vien_dien_dan.*,(Select ho_ten from nguoi_dung l2 where l2.ma = thanh_vien_dien_dan.ma_nguoi_dung) ten_thanh_vien',PDO::FETCH_ASSOC,'');
	if($thanh_vien == NULL){
		$_SESSION['msg']='Mã loại thành viên không tồn tại';
		$_SESSION['style_msg'] = 'notification error png_bg';
		header('Location: danh_sach.php');	
		exit;	
	}
	
	
	############## Chuẩn bị câu thông báo ##############
	if(isset($_SESSION['msg'])){
		$thong_bao = $dt_smarty->fetch('elements/message.tpl');
	# Xóa session
		unset($_SESSION['msg']);
		unset($_SESSION['style_msg']);
	}else{
		$thong_bao = '';
	}


  
	###########################################################
	$dt_smarty->assign('trang_thai',array(1=>'Đang hoạt động',0=>'Khóa'));
	$dt_smarty->assign('loai_thanh_vien',array(0=>'Chủ website',1=>'Admin diễn đàn',2=>'Thành viên',3=>'Mới'));
	$dt_smarty->assign('thanh_vien',$thanh_vien);	
	$dt_smarty->assign('thong_bao',$thong_bao);
	
	$contentForLayout = $dt_smarty->fetch('thanh_vien/cap_nhat.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}
?>