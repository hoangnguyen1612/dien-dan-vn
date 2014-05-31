<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_nguoi_dung.php';
	require '../classes/xl_thanh_vien_dien_dan.php';
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	$xl_nguoi_dung = new xl_nguoi_dung;
	
	kiem_tra_quyen();
	
	$danh_sach = $xl_thanh_vien_dien_dan->danh_sach(0, 0, '', 'loai_thanh_vien ASC', '*', PDO::FETCH_ASSOC, ' where loai_thanh_vien != 3', false);
	
	$dt_smarty->assign('danh_sach', $danh_sach);
	
	$contentForLayout = $dt_smarty->fetch('thanh_vien/danh_sach.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e){
	$_SESSION['message']['type'] = 'error';
	$_SESSION['message']['content'] =  $e->getMessage();
	header("Location: {$_SERVER['HTTP_REFERER']}");
}