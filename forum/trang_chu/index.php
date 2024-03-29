<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_chuyen_muc.php';
	include '../classes/xl_bai_viet.php';
	include '../classes/xl_binh_luan.php';
	include '../classes/xl_thanh_vien_dien_dan.php';
	
	
	$title = 'Trang chủ';
	
	$dt_xl_chuyen_muc = new xl_chuyen_muc;
	$dt_xl_bai_viet = new xl_bai_viet;
	$dt_xl_binh_luan = new xl_binh_luan;
	$dt_xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	
	$ds_chuyen_muc = $dt_xl_chuyen_muc->danh_sach(0,0,array('ma_dien_dan'=>$ma_dien_dan),'thu_tu_hien_thi ASC','loai_chuyen_muc.*,(Select count(ma) as so_luong from bai_viet where loai_chuyen_muc.ma = bai_viet.ma_loai_chuyen_muc) so_luong_bai_viet',PDO::FETCH_ASSOC,'',false);
	
	$ds_bai_viet_moi_nhat = $dt_xl_bai_viet->danh_sach(0,10,array('ma_dien_dan'=>$ma_dien_dan),'ngay_tao DESC','bai_viet.*,(Select ten from nguoi_dung where nguoi_dung.ma = bai_viet.ma_nguoi_dang) ten_nguoi_dang',PDO::FETCH_ASSOC,'',false);

	$ds_top_diem_thanh_vien = $dt_xl_thanh_vien_dien_dan->danh_sach(0,10,array('ma_dien_dan'=>$ma_dien_dan),'diem_so DESC','thanh_vien_dien_dan.*,(Select ten from nguoi_dung where nguoi_dung.ma = thanh_vien_dien_dan.ma_nguoi_dung) ten_nguoi_dung',PDO::FETCH_ASSOC,'and loai_thanh_vien !=3',false);
	
	$dt_smarty->assign('ds_top_diem_thanh_vien',$ds_top_diem_thanh_vien); 
	
	$dt_smarty->assign('ds_bai_viet_moi_nhat',$ds_bai_viet_moi_nhat);
	$dt_smarty->assign('title',$title);
	$dt_smarty->assign('ds_chuyen_muc', $ds_chuyen_muc);
		
	$contentForLayout = $dt_smarty->fetch('trang_chu/index.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e){
	throwMessage($e,"/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}");
}