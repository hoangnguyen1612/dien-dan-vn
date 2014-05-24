<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_chuyen_muc.php';
	if($login == ''){
		header('Location: diendan.vn');
		exit;
	}
	if($thanh_vien['loai_thanh_vien'] == 3){
		echo 'Tài khoản của bạn chưa được kích hoạt trong diễn đàn này';
		exit;
	}

	if(empty($_GET['loai'])){
		echo 'Vui lòng nhập loại chuyên mục';
		exit;
	}
	$dt_xl_chuyen_muc = new xl_chuyen_muc;
	$chuyen_muc = $dt_xl_chuyen_muc->doc(array('ma'=>$_GET['loai'],'ma_dien_dan'=>$ma_dien_dan));
	$dt_smarty->assign('chuyen_muc', $chuyen_muc);	
	$contentForLayout = $dt_smarty->fetch('bai_viet/them.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
}catch(Exception $e){
	echo $e->getMessage();
}