<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_chuyen_muc.php';
	
	kiem_tra_quyen();
	$title = 'Tạo bài viết mới';
	if(empty($_GET['loai'])){
		throw new Exception('Vui lòng nhập loại chuyên mục');
	}
	
	$dt_xl_chuyen_muc = new xl_chuyen_muc;
	$chuyen_muc = $dt_xl_chuyen_muc->doc(array('ma'=>$_GET['loai'],'ma_dien_dan'=>$ma_dien_dan));
	$dt_smarty->assign('chuyen_muc', $chuyen_muc);	
	$dt_smarty->assign('title',$title);
	$contentForLayout = $dt_smarty->fetch('bai_viet/them.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e){
	throwMessage($e);
}