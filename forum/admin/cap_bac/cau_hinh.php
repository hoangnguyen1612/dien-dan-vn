<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	require '../../classes/xl_cap_bac.php';
	require '../../classes/xl_cau_hinh.php';

	quan_tri('cap_bac_cau_hinh');

	$xl_cau_hinh = new xl_cau_hinh;
	$cau_hinh = $xl_cau_hinh->danh_sach(0, 0, array('ma_dien_dan'), 'tu_khoa ASC', 'tu_khoa, noi_dung', PDO::FETCH_KEY_PAIR, 
	' and tu_khoa = "SO_LUONG_CAP_BAC" or tu_khoa = "BIEU_TUONG_CAP_BAC"', false);
	
	$so_luong = $cau_hinh['SO_LUONG_CAP_BAC'];
	$icon = $cau_hinh['BIEU_TUONG_CAP_BAC'];
	
	$xl_cap_bac = new xl_cap_bac;
	$ds_cap_bac = $xl_cap_bac->danh_sach(0, 0, array('ma_dien_dan'=>$ma_dien_dan), 'ma ASC', '*', PDO::FETCH_ASSOC, '', false);
	$dt_smarty->assign('ds_cap_bac', $ds_cap_bac);
	
	$dt_smarty->assign('icon', $icon);
	$dt_smarty->assign('so_luong', $so_luong);
	
	$contentForLayout = $dt_smarty->fetch('cap_bac/cau_hinh.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->assign('titleForLayout', 'Cấp Bậc - cấu hình');
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e)
{
	throwMessage($e);
}

?>