<?php
try{
	require '../ini.php';
	require '../classes/xl_dien_dan.php';
	require '../classes/xl_linh_vuc.php';
	
	if(empty($_GET['ma_linh_vuc']))
	{
		throw new Exception('Vui lòng chọn lĩnh vực của diễn đàn');
	}
	$ma = $_GET['ma_linh_vuc'];
	$xl_dien_dan = new xl_dien_dan;
	$xl_linh_vuc = new xl_linh_vuc;
	
	$danh_sach = $xl_dien_dan->danh_sach(0, 0, array('ma_linh_vuc'=>$ma), 'ma DESC', 'dien_dan.*, (select count(*) from bo_dem where bo_dem.ma_dien_dan = dien_dan.ma) as luot_xem', PDO::FETCH_ASSOC, '', false);
	$dt_smarty->assign('danh_sach', $danh_sach);
	
	$ten = $xl_linh_vuc->doc(array('ma'=>$ma), 'ten');
	$dt_smarty->assign('ten', $ten['ten']);
	
	$contentForLayout = $dt_smarty->fetch('linh_vuc/danh_sach.tpl');
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e)
{
	throwMessage($e, $url);
}