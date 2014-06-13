<?php
try{
	include '../ini.php';
	
	$contentForLayout = $dt_smarty->fetch('nguoi_dung/hinh_dai_dien.tpl');
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
}catch(Exception $e)
{
	
}
?>