<?php
try{
	include '../ini.php';

	require '../classes/xl_dien_dan.php';

	$xl_dien_dan = new xl_dien_dan;
	
	#diễn đàn mới
	$ds = $xl_dien_dan->danh_sach(0, 10, '', 'ngay_tao DESC', '*', PDO::FETCH_ASSOC, '', false);
	$dt_smarty->assign('ds', $ds);

	$contentForLayout = $dt_smarty->fetch('trang_chu/index.tpl'); 
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	include('../end.php');
	
}catch(Exception $e)
{
	throwMessage($e);
}
?>