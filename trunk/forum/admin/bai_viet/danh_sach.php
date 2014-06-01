<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	require '../../classes/xl_bai_viet.php';



	$contentForLayout = $dt_smarty->fetch('bai_viet/danh_sach.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->assign('titleForLayout', 'Bài viết - danh sách');
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e){
	throwMessage($e);
}
