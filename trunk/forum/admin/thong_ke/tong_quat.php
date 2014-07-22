<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	require '../../classes/xl_bai_viet.php';
	require '../../classes/xl_bo_dem.php';
	
	quan_tri('thong_ke_tong_quat');
	
	$title = '';
	$so_luong_truy_cap = '';
	$so_luong_bai_viet = '';
	
	$dt_xl_bai_viet = new xl_bai_viet;
	$dt_xl_bo_dem = new xl_bo_dem;
	
	for($i=6; $i>0; $i--)
	{
		$title.= "'".date("d/m", strtotime("-$i days"))."',";
		$so_luong_truy_cap.= so_luong_theo_ngay(date("Y/m/d", strtotime("-$i days")),$ma_dien_dan).',';
		$so_luong_bai_viet.= so_luong_bai_viet_theo_ngay(date("Y/m/d", strtotime("-$i days")),$ma_dien_dan).',';
	}
	$title.="'".date("d/m")."'";
	$so_luong_truy_cap.= so_luong_theo_ngay(date("Y/m/d"),$ma_dien_dan);
	$so_luong_bai_viet.= so_luong_bai_viet_theo_ngay(date("Y/m/d"),$ma_dien_dan);

	$dt_smarty->assign('so_luong_truy_cap', $so_luong_truy_cap);
	$dt_smarty->assign('so_luong_bai_viet', $so_luong_bai_viet);
	$dt_smarty->assign('title', $title);
	
	$ngay = date('d/m', strtotime('- 6days')).' - '. date('d/m');
	$dt_smarty->assign('ngay', $ngay);
	
	$contentForLayout = $dt_smarty->fetch('thong_ke/tong_quat.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->assign('titleForLayout', 'Tổng quát');
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e)
{
	throwMessage($e);
}

?>