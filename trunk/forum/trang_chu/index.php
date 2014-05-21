<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_chuyen_muc.php';
	include '../classes/xl_bai_viet.php';
	include '../classes/xl_binh_luan.php';
	
	
	$dt_xl_chuyen_muc = new xl_chuyen_muc;
	$dt_xl_bai_viet = new xl_bai_viet;
	$dt_xl_binh_luan = new xl_binh_luan;
	$ds_chuyen_muc = $dt_xl_chuyen_muc->danh_sach(0,0,array('ma_dien_dan'=>'abcd1234'),'thu_tu_hien_thi ASC','loai_chuyen_muc.*,(Select count(ma) as so_luong from bai_viet where loai_chuyen_muc.ma = bai_viet.ma_loai_chuyen_muc) so_luong_bai_viet',PDO::FETCH_ASSOC,'',false);

	$dt_smarty->assign('ds_chuyen_muc', $ds_chuyen_muc);
	
		
	$contentForLayout = $dt_smarty->fetch('trang_chu/index.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
}catch(Exception $e){
	echo $e->getMessage();
}