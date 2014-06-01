<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	require '../../classes/xl_bai_viet.php';
	include '../../classes/phan_trang.php';

	quan_tri('bai_viet_danh_sach');

	$dt_phan_trang = new phan_trang;
	$vi_tri_bat_dau = $dt_phan_trang->tim_trang_hien_tai();
	$xl_bai_viet = new xl_bai_viet;
	
	$start = $dt_phan_trang->tim_vi_tri_query($vi_tri_bat_dau,4);
	
	if(isset($_GET['tu_khoa'])){
		$tu_khoa = $_GET['tu_khoa'];
		$_SESSION['data']['tu_khoa'] = $tu_khoa;	
		$ds_bai_viet = $xl_bai_viet->danh_sach($start,4,array('ma_dien_dan'=>$ma_dien_dan),'ma ASC','*',PDO::FETCH_ASSOC,"and tieu_de like '%$tu_khoa%'",true);
	}else
	{
		$ds_bai_viet = $xl_bai_viet->danh_sach($start,4,array('ma_dien_dan'=>$ma_dien_dan),'ma ASC','*',PDO::FETCH_ASSOC,'',true);
	}

	$bo_nut = $dt_phan_trang->bo_nut_phan_trang($ds_bai_viet[1],$vi_tri_bat_dau,4);
	$dt_smarty->assign('bo_nut', $bo_nut);
	
	$dt_smarty->assign('ds_bai_viet', $ds_bai_viet[0]);

	$contentForLayout = $dt_smarty->fetch('bai_viet/danh_sach.tpl');	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->assign('titleForLayout', 'Bài viết - danh sách');
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e){
	throwMessage($e);
}
