<?php
try{
	require '../ini.php';
	require '../ini_interface.php';
	require '../../classes/xl_bao_cao_bai_viet.php';
	require '../../classes/xl_nguoi_dung.php';
	require '../../classes/phan_trang_1.php';
	require '../../classes/xl_bai_viet.php';
	require '../../classes/xl_chuyen_muc.php';

	$xl_chuyen_muc = new xl_chuyen_muc;
	$xl_bao_cao_bai_viet = new xl_bao_cao_bai_viet;
	$xl_nguoi_dung = new xl_nguoi_dung;
	
	$limit = 15;
	$pt = new phan_trang('page',$limit);	
	$pt->so_pt_tren_mot_trang = $limit;
	$start = $pt->tim_vi_tri_bat_dau();
	
	if(empty($_GET['tu_khoa']))
	{
		$ds_bao_cao_bai_viet = $xl_bao_cao_bai_viet->danh_sach($start, $limit, array('ma_dien_dan'=>$ma_dien_dan),'ngay_tao DESC','bao_cao_bai_viet.*,(Select tieu_de from bai_viet where bai_viet.ma = bao_cao_bai_viet.ma_bai_viet) tieu_de,(Select ma_nguoi_dang from bai_viet where bai_viet.ma = bao_cao_bai_viet.ma_bai_viet) ma_nguoi_dang, (Select ma_loai_chuyen_muc from bai_viet where bai_viet.ma = bao_cao_bai_viet.ma_bai_viet) ma_loai_chuyen_muc',PDO::FETCH_ASSOC,'',true);	
	}
	else
	{
		$ds_bao_cao_bai_viet = $xl_bao_cao_bai_viet->danh_sach($start, $limit, array('ma_dien_dan'=>$ma_dien_dan),'ngay_tao DESC','bao_cao_bai_viet.*,(Select tieu_de from bai_viet where bai_viet.ma = bao_cao_bai_viet.ma_bai_viet) tieu_de,(Select ma_nguoi_dang from bai_viet where bai_viet.ma = bao_cao_bai_viet.ma_bai_viet) ma_nguoi_dang, (Select ma_loai_chuyen_muc from bai_viet where bai_viet.ma = bao_cao_bai_viet.ma_bai_viet) ma_loai_chuyen_muc',PDO::FETCH_ASSOC,' and noi_dung like "%'.$_GET['tu_khoa'].'%"',true);
	}
	
	$pt->tong_record = $ds_bao_cao_bai_viet[1];
	
	$quyen_chuyen_muc = quyen_chuyen_muc();
	$ten_qcm = $quyen_chuyen_muc['ten'];
	$ma_qcm = $quyen_chuyen_muc['ma'];
	
	$dt_smarty->assign('quyen_chuyen_muc', $ten_qcm);
	$dt_smarty->assign('qcm', $ma_qcm);
	
	$dt_smarty->assign('ds_bao_cao_bai_viet', $ds_bao_cao_bai_viet[0]);
	$dt_smarty->assign('bo_nut',$pt->in_bo_nut());

	$contentForLayout = $dt_smarty->fetch('bao_cao/danh_sach.tpl');	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->assign('titleForLayout', 'Báo cáo sai phạm - danh sách');
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e){
	throwMessage($e);
}
