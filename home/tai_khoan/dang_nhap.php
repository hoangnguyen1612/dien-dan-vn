<?php 
try{
	include '../ini.php';
	
	$url = '/';
	if($login!='')
	{
		throw new Exception('');
	}
	
	$contentForLayout = $dt_smarty->fetch('nguoi_dung/dang_nhap.tpl');
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
	
}catch(Exception $e)
{
	throwMessage($e, $url);
}
?>