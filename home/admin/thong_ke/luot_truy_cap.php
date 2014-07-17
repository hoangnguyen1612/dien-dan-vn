<?php
try{
	include ('../ini.php');	
	include ('../../classes/xl_bo_dem.php');
	include ('../../classes/xl_dien_dan.php');
	
	$title = '';
	$so_luong_truy_cap = '';
	$xl_bo_dem = new xl_bo_dem;
	$xl_dien_dan = new xl_dien_dan;

	
	$ds_dien_dan = $xl_bo_dem->dien_dan_truy_cap();
	
	$from = date('Y-m-d 0:0:0',  strtotime('-6 days'));
	$to =  date('Y-m-d 23:59:59');
	$ngay = 'Từ ngày '. date('d-m-Y', strtotime('-6 days')).'đến ngày '.date('d-m-Y');
	
	shuffle($ds_dien_dan);

	$n = count($ds_dien_dan);
	if($n>7) $n = 7;

	for($i=0; $i<$n; $i++)
	{
		$ten = $xl_dien_dan->doc(array('ma'=>$ds_dien_dan["$i"]), 'ten');
		$title.= "'".$ten['ten']."',";
		$so_luong_truy_cap.=$xl_bo_dem->dem(array('ma_dien_dan'=>$ds_dien_dan[$i]), 'ma', PDO::FETCH_ASSOC, " and '$from' <= thoi_gian AND thoi_gian <= '$to'").',';
	}
	
	$dt_smarty->assign('so_luong_truy_cap', $so_luong_truy_cap);
	$dt_smarty->assign('title', $title);
	$dt_smarty->assign('ngay', $ngay);
	$contentForLayout = $dt_smarty->fetch('thong_ke/luot_truy_cap.tpl');

	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
	
}catch(Exception $e)
{
	throwMessage($e);
}
?>