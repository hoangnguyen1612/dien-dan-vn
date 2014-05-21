<?php
try{
	include '../ini.php';

	$contentForLayout = $dt_smarty->fetch('gioi_thieu/index.tpl');
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
}catch(Exception $e)
{
	
}
?>