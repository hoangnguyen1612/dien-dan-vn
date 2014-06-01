<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	require '../../classes/xl_tinh_diem.php';
	
	$xl_tinh_diem = new xl_tinh_diem;
	
	$tinh_diem = $xl_tinh_diem->doc(array('ma_dien_dan'=>$ma_dien_dan), 'bai_viet, binh_luan_dung, binh_luan');
	
	$dt_smarty->assign('tinh_diem', $tinh_diem);
	
	$contentForLayout = $dt_smarty->fetch('tinh_diem/cau_hinh.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->assign('titleForLayout', 'Tính Điểm - cấu hình');
	
	$dt_smarty->display('layouts/default.tpl');
}catch(Exception $e)
{
	throwMessage($e);
}

?>