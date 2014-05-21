<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../../classes/xl_chuyen_muc.php';
	
	$dt_xl_chuyen_muc = new xl_chuyen_muc;
	if(empty($_GET['ma'])){
		$_SESSION['msg']='Vui lòng nhập mã loại chuyên mục ';
		$_SESSION['style_msg'] = 'notification error png_bg';
		header('Location: danh_sach.php');	
		exit;	
	}
	#### Kiểm tra tồn tại loại chuyên mục trong diễn đàn ##########
	$loai_chuyen_muc = $dt_xl_chuyen_muc->doc(array('ma'=>$_GET['ma'],'ma_dien_dan'=>'abcd1234'),'loai_chuyen_muc.*,(Select ten from loai_chuyen_muc l2 where l2.ma = loai_chuyen_muc.ma_loai_cha) ten_loai_cha',PDO::FETCH_ASSOC,'');
	if($loai_chuyen_muc == NULL){
		$_SESSION['msg']='Mã loại chuyên mục không tồn tại';
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
	$ds_chuyen_muc = $dt_xl_chuyen_muc->danh_sach(0,0,array('ma_dien_dan'=>'abcd1234'),'thu_tu_hien_thi ASC', '*', PDO::FETCH_ASSOC, '', false);
// danh sách các chuyên mục
    $dt_smarty->assign('ds_chuyen_muc',$ds_chuyen_muc);
	###########################################################
	$dt_smarty->assign('loai_chuyen_muc',$loai_chuyen_muc);	
	$dt_smarty->assign('thong_bao',$thong_bao);
	
	$contentForLayout = $dt_smarty->fetch('loai_chuyen_muc/cap_nhat.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}
?>