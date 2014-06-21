<?php
try{
	include ('../ini.php');	
	include ('../../classes/xl_bo_dem.php');
	include ('../../classes/xl_dien_dan.php');
	
	$title = '';
	$so_luong_truy_cap = '';
	$xl_bo_dem = new xl_bo_dem;
	$xl_dien_dan = new xl_dien_dan;

	
	$ds_dien_dan = $xl_bo_dem->dien_dan_truy_cap_nhieu_nhat();
	
	$n = 10;
	if(count($ds_dien_dan)<10)
	{
		$n = count($ds_dien_dan);
	}
	
	for($i=0; $i<$n; $i++)
	{
		$ten = $xl_dien_dan->doc(array('ma'=>$ds_dien_dan[$i], 'ten'));
		$title.= "'".$ten['ten']."',";
		$so_luong_truy_cap.=$xl_bo_dem->dem(array('ma_dien_dan'=>$ds_dien_dan[$i])).',';
	}

	$dt_smarty->assign('title', $title);
	$dt_smarty->assign('n', $n);
	$dt_smarty->assign('so_luong_truy_cap', $so_luong_truy_cap);
	$contentForLayout = $dt_smarty->fetch('thong_ke/top.tpl');

	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
	
}catch(Exception $e)
{
	throwMessage($e);
}
?>