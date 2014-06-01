<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	require '../../classes/xl_cap_bac.php';
	require '../../classes/xl_cau_hinh.php';
	
	$xl_cau_hinh = new xl_cau_hinh;
	$cau_hinh = $xl_cau_hinh->danh_sach(0, 0, array('ma_dien_dan'), 'tu_khoa ASC', 'tu_khoa, noi_dung', PDO::FETCH_KEY_PAIR, 
	' and tu_khoa = "SO_LUONG_CAP_BAC" or tu_khoa = "BIEU_TUONG_CAP_BAC"', false);
	$dt_smarty->assign('cau_hinh', $cau_hinh);
	
	$contentForLayout = $dt_smarty->fetch('cap_bac/tong_quat.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->assign('titleForLayout', 'Cấp Bậc - biểu tượng và cấp bậc');
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e)
{
	throwMessage($e);
}

?>