<?php
try{
	include '../ini.php';

	$contentForLayout = $dt_smarty->fetch('lien_he/index.tpl');
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
}catch(Exception $e)
{
	
}
?>