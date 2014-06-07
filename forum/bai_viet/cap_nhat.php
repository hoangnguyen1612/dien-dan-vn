<?php
try{
	require '../ini.php';
	require '../ini_interface.php';
	require '../classes/xl_bai_viet.php';
	include '../classes/xl_chuyen_muc.php';
	
	if(empty($_GET['ma'])){
		throw new Exception('Vui lòng nhập mã bài viết');
		exit;
	}
	$ma = $_GET['ma'];
	$title = "Cập nhật bài viết";
	$dt_xl_chuyen_muc = new xl_chuyen_muc;
	$dt_xl_bai_viet = new xl_bai_viet;
	
	$bai_viet = $dt_xl_bai_viet->doc(array('ma_dien_dan'=>$ma_dien_dan,'ma'=>$ma));
	$chuyen_muc = $dt_xl_chuyen_muc->doc(array('ma'=>$bai_viet['ma_loai_chuyen_muc'],'ma_dien_dan'=>$ma_dien_dan));
	if(!$bai_viet){
		throw new Exception('Bài viết không tồn tại trong diễn đàn');
		exit;
	}
	$dt_smarty->assign('title',$title);
	$dt_smarty->assign('bai_viet',$bai_viet);
	$dt_smarty->assign('chuyen_muc',$chuyen_muc);
	$contentForLayout = $dt_smarty->fetch('bai_viet/cap_nhat.tpl');
	$dt_smarty->assign('contentForLayout',$contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}