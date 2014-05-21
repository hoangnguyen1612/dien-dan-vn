<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_chuyen_muc.php';
	if(empty($_GET['loai'])){
		echo 'Vui lòng nhập loại chuyên mục';
		exit;
	}
	$dt_xl_chuyen_muc = new xl_chuyen_muc;
	$chuyen_muc = $dt_xl_chuyen_muc->doc(array('ma'=>$_GET['loai'],'ma_dien_dan'=>'abcd1234'));
	$dt_smarty->assign('chuyen_muc', $chuyen_muc);	
	$contentForLayout = $dt_smarty->fetch('bai_viet/them.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
}catch(Exception $e){
	echo $e->getMessage();
}