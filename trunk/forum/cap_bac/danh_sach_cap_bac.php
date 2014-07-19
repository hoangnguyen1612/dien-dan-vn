<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_cap_bac.php';
	$title = 'Cấp bậc thành viên';	
	$xl_cap_bac = new xl_cap_bac;
	$ds_cap_bac = $xl_cap_bac->danh_sach(0,0,NULL,'ma ASC','*',PDO::FETCH_ASSOC,'',false);
	
	$dt_smarty->assign('ds_cap_bac',$ds_cap_bac);
	$contentForLayout = $dt_smarty->fetch('cap_bac/danh_sach.tpl');
	$dt_smarty->assign('title',$title);
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e){
	throwMessage($e,"/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}");
}