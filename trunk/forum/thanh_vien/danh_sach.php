<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_nguoi_dung.php';
	require '../classes/xl_thanh_vien_dien_dan.php';
	require '../classes/xl_chuyen_muc.php';
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	$xl_nguoi_dung = new xl_nguoi_dung;
	$xl_chuyen_muc = new xl_chuyen_muc;
	$title = 'Thành viên';
	kiem_tra_quyen();
	$danh_sach_thanh_vien = $xl_thanh_vien_dien_dan->danh_sach(0,0,array('ma_dien_dan'=>$ma_dien_dan,'loai_thanh_vien'=>2), 'loai_thanh_vien ASC',"thanh_vien_dien_dan.*,(Select ho from nguoi_dung where nguoi_dung.ma=thanh_vien_dien_dan.ma_nguoi_dung) ho_nguoi_dung,(Select ten from nguoi_dung where nguoi_dung.ma= thanh_vien_dien_dan.ma_nguoi_dung) ten_nguoi_dung,(Select hinh_dai_dien from nguoi_dung where nguoi_dung.ma = thanh_vien_dien_dan.ma_nguoi_dung) hinh_dai_dien,(Select gioi_tinh from nguoi_dung where nguoi_dung.ma = thanh_vien_dien_dan.ma_nguoi_dung) gioi_tinh", PDO::FETCH_ASSOC, ' and loai_thanh_vien != 3', false);
	
	$danh_sach_quan_tri = $xl_thanh_vien_dien_dan->danh_sach(0,0,array('ma_dien_dan'=>$ma_dien_dan,'loai_thanh_vien'=>1), 'loai_thanh_vien ASC',"thanh_vien_dien_dan.*,(Select ho from nguoi_dung where nguoi_dung.ma=thanh_vien_dien_dan.ma_nguoi_dung) ho_nguoi_dung,(Select ten from nguoi_dung where nguoi_dung.ma= thanh_vien_dien_dan.ma_nguoi_dung) ten_nguoi_dung,(Select hinh_dai_dien from nguoi_dung where nguoi_dung.ma = thanh_vien_dien_dan.ma_nguoi_dung) hinh_dai_dien,(Select gioi_tinh from nguoi_dung where nguoi_dung.ma = thanh_vien_dien_dan.ma_nguoi_dung) gioi_tinh", PDO::FETCH_ASSOC, ' and loai_thanh_vien != 3', false);
	
	$chu_dien_dan = $xl_thanh_vien_dien_dan->doc(array('ma_dien_dan'=>$ma_dien_dan,'loai_thanh_vien'=>0),"thanh_vien_dien_dan.*,(Select ho from nguoi_dung where nguoi_dung.ma=thanh_vien_dien_dan.ma_nguoi_dung) ho_nguoi_dung,(Select ten from nguoi_dung where nguoi_dung.ma= thanh_vien_dien_dan.ma_nguoi_dung) ten_nguoi_dung,(Select hinh_dai_dien from nguoi_dung where nguoi_dung.ma = thanh_vien_dien_dan.ma_nguoi_dung) hinh_dai_dien,(Select gioi_tinh from nguoi_dung where nguoi_dung.ma = thanh_vien_dien_dan.ma_nguoi_dung) gioi_tinh");
	$ds_chuyen_muc = $xl_chuyen_muc->danh_sach(0,0,array('ma_dien_dan'=>$ma_dien_dan),'ma ASC','*',PDO::FETCH_ASSOC,'',false);
	
	$dt_smarty->assign('ds_chuyen_muc',$ds_chuyen_muc);
	$dt_smarty->assign('danh_sach_thanh_vien', $danh_sach_thanh_vien);
	$dt_smarty->assign('danh_sach_quan_tri', $danh_sach_quan_tri);
	$dt_smarty->assign('chu_dien_dan', $chu_dien_dan);
	
	$contentForLayout = $dt_smarty->fetch('thanh_vien/danh_sach.tpl');
	$dt_smarty->assign('title',$title);
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e){
	$_SESSION['message']['type'] = 'error';
	$_SESSION['message']['content'] =  $e->getMessage();
	header("Location: {$_SERVER['HTTP_REFERER']}");
}