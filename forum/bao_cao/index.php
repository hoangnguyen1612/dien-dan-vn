<?php
try{
	include '../ini_interface.php';
	
	
		
	$contentForLayout = $dt_smarty->fetch('bao_cao/index.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
}catch(Exception $e){
	throwMessage($e);
}