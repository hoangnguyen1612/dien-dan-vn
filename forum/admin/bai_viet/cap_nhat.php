<?php
try{
	include '../ini.php';
	include '../../classes/xl_san_pham.php';
	include '../../classes/xl_loai_san_pham.php';
	quan_tri('bai_viet_cap_nhat');
	if(empty($_GET['ma'])){
		$_SESSION['msg']='Vui lòng nhập mã sản phẩm ';
		$_SESSION['style_msg'] = 'notification error png_bg';
		header('Location: danh_sach.php');	
		exit;	
	}
	$dt_xl_san_pham = new xl_san_pham;
	$dt_xl_loai_san_pham = new xl_loai_san_pham;
	$ds_loai_san_pham = $dt_xl_loai_san_pham->danh_sach_thuong();
	$san_pham = $dt_xl_san_pham->doc($_GET['ma']);
	if($san_pham == NULL){
		$_SESSION['msg']='Mã sản phẩm không tồn tại ';
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
$dt_smarty->assign('trang_thai',array(1=>"Hiển Thị",0=>"Không Hiển Thị"));// tạo mảng options
$dt_smarty->assign("san_pham_moi",array(1=>"Có", 0=>"Không")); // tạo mảng options
$dt_smarty->assign('thong_bao',$thong_bao);
$dt_smarty->assign('ds_loai_san_pham',$ds_loai_san_pham);
$dt_smarty->assign('san_pham',$san_pham);

$contentForLayout = $dt_smarty->fetch('san_pham/cap_nhat.tpl');

$dt_smarty->assign('contentForLayout', $contentForLayout);

$dt_smarty->display('layouts/default.tpl');
$dbh = NULL;
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}

?>