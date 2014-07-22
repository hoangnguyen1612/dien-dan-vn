<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	require '../../classes/xl_dien_dan.php';
	require '../../classes/xl_linh_vuc.php';
	quan_tri('cau_hinh_cap_nhat_thong_so');
	$xl_dien_dan = new xl_dien_dan;
	$xl_linh_vuc = new xl_linh_vuc;
	
	$dien_dan = $xl_dien_dan->doc(array('ma'=>$ma_dien_dan));
	$ds_linh_vuc = $xl_linh_vuc->danh_sach(0,0,NULL,'ma ASC','*',PDO::FETCH_ASSOC,'',false);
	
	$dt_smarty->assign('ds_linh_vuc',$ds_linh_vuc);
	$dt_smarty->assign('dien_dan',$dien_dan);
	$contentForLayout = $dt_smarty->fetch('cau_hinh/danh_sach_thong_so.tpl');	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->assign('titleForLayout', 'Bài viết - danh sách');
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e){
	throwMessage($e);
}
