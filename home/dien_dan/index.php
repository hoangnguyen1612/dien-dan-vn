<?php
try{
	include '../ini.php';

	$contentForLayout = $dt_smarty->fetch('dien_dan/index.tpl');
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
	
	unset($_SESSION['data']);
	unset($_SESSION['message']);
	
}catch(Exception $e)
{
	
}
?>