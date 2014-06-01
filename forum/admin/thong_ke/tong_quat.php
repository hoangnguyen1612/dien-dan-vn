<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	
	quan_tri('thong_ke_tong_quat');
	
	$contentForLayout = $dt_smarty->fetch('thong_ke/tong_quat.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->assign('titleForLayout', 'Tổng quát');
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e)
{
	throwMessage($e);
}

?>