<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	require '../classes/xl_thong_bao.php';
	
	$xl_thong_bao = new xl_thong_bao;
	$danh_sach = '';
	$danh_sach = $xl_thong_bao->danh_sach(0, 0, array('gui_den'=>$login['ma'], 'ma_dien_dan'=>$ma_dien_dan), 'ngay_tao DESC', '*', PDO::FETCH_ASSOC, '', false);

	$dt_smarty->assign('danh_sach', $danh_sach);
	$contentForLayout = $dt_smarty->fetch('thong_bao/danh_sach.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e){
	echo $e->getMessage();
}