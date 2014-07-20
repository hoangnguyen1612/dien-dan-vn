<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_chuyen_muc.php';
	include '../classes/xl_bai_viet.php';
	include '../classes/xl_binh_luan.php';
	
	$danh_sach = '';
	$ma_thong_bao = '';
	
	require '../classes/xl_thanh_vien_dien_dan.php';
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	
	$danh_sach = $xl_thanh_vien_dien_dan->danh_sach(0, 0, array('ma_dien_dan'=>$ma_dien_dan, 'loai_thanh_vien'=>3), 'ngay_gia_nhap DESC', 'ma_nguoi_dung, (select concat(ho,concat(" ", ten)) from nguoi_dung where ma = ma_nguoi_dung) as ho_ten, (select hinh_dai_dien from nguoi_dung where ma = ma_nguoi_dung) as hinh_dai_dien, (select gioi_tinh from nguoi_dung where ma = ma_nguoi_dung) as gioi_tinh', PDO::FETCH_ASSOC, '', false);

	$dt_smarty->assign('danh_sach', $danh_sach);
		
	$contentForLayout = $dt_smarty->fetch('thanh_vien/yeu_cau_tham_gia.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e){
	throwMessage($e);
}