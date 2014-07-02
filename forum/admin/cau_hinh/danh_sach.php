<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	require '../../classes/xl_cau_hinh.php';
	
	$xl_cau_hinh = new xl_cau_hinh;
	
	$mau_sac = $xl_cau_hinh->doc(array('tu_khoa'=>'MAU_MENU','ma_dien_dan'=>$ma_dien_dan));
	$mang_mau_sac = explode(',',$mau_sac['noi_dung']);
	
	$dt_smarty->assign('mang_mau_sac',$mang_mau_sac);
	$contentForLayout = $dt_smarty->fetch('cau_hinh/danh_sach.tpl');	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->assign('titleForLayout', 'Bài viết - danh sách');
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e){
	throwMessage($e);
}
