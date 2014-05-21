<?php
try{
	include '../ini_interface.php';
	
	$contentForLayout = $dt_smarty->fetch('lien_he/danh_sach.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}
?>