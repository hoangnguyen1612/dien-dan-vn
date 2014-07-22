<?php
try{
	require '../ini.php';
	require '../ini_interface.php';
	require '../../classes/xl_bao_cao_binh_luan.php';
	require '../../classes/phan_trang_1.php';
	require '../../classes/xl_thanh_vien_dien_dan.php';
	require '../../classes/xl_binh_luan.php';


	quan_tri('bao_cao_danh_sach_binh_luan');

	$dt_xl_bao_cao_binh_luan = new xl_bao_cao_binh_luan;
	
	$limit = 5;
	$pt = new phan_trang('page',$limit);	
	$pt->so_pt_tren_mot_trang = $limit;
	$start = $pt->tim_vi_tri_bat_dau();
		$ds_bao_cao_binh_luan = $dt_xl_bao_cao_binh_luan->danh_sach($start,$limit,array('ma_dien_dan'=>$ma_dien_dan),'ngay_tao DESC','bao_cao_binh_luan.*,(Select tieu_de from binh_luan_bai_viet where binh_luan_bai_viet.ma = bao_cao_binh_luan.ma_binh_luan) tieu_de,(Select ten from nguoi_dung where bao_cao_binh_luan.ma_nguoi_bao_cao = nguoi_dung.ma) ten_nguoi_bao_cao,(Select ma_nguoi_dung from binh_luan_bai_viet where binh_luan_bai_viet.ma = bao_cao_binh_luan.ma_binh_luan) ma_nguoi_dang,(Select ma_bai_viet from binh_luan_bai_viet where binh_luan_bai_viet.ma = bao_cao_binh_luan.ma_binh_luan) ma_bai_viet',PDO::FETCH_ASSOC,'',true);	
	
	$pt->tong_record = $ds_bao_cao_binh_luan[1];
	
	$dt_smarty->assign('ds_bao_cao_binh_luan', $ds_bao_cao_binh_luan[0]);
	$dt_smarty->assign('bo_nut',$pt->in_bo_nut());

	$contentForLayout = $dt_smarty->fetch('bao_cao/danh_sach_binh_luan.tpl');	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->assign('titleForLayout', 'Báo cáo sai phạm - danh sách');
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e){
	throwMessage($e);
}
