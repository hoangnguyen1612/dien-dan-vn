<?php
try{
	include '../ini.php';

	$contentForLayout = $dt_smarty->fetch('lien_he/bieu_mau.tpl');
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
	
}catch(Exception $e)
{
	throwMessage($e);
}
?>