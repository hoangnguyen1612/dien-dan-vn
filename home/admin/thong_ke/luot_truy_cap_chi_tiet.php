<?php
try{
	include ('../ini.php');	
	include ('../../classes/xl_bo_dem.php');

	$xl_bo_dem = new xl_bo_dem;

	
	$ds = $xl_bo_dem->truy_cap_chi_tiet(0, 4);
	
	$dt_smarty->assign('ds', $ds);
	$contentForLayout = $dt_smarty->fetch('thong_ke/luot_truy_cap_chi_tiet.tpl');

	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
	
}catch(Exception $e)
{
	throwMessage($e);
}
?>