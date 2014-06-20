<?php
try{
	require '../ini.php';
	require '../ini_interface.php';
	require '../classes/xl_bai_viet.php';
	require '../classes/phan_trang_1.php';
	require '../classes/xl_nguoi_dung.php';
	include '../classes/xl_chuyen_muc.php';
	$title = 'Tìm kiếm';
	if(!isset($_GET['tu_khoa'])){
		throw new Exception('Vui lòng nhập từ khóa tìm kiếm');
	}
	$tu_khoa = $_GET['tu_khoa'];
	$dt_xl_bai_viet = new xl_bai_viet;
	
	$dt_xl_chuyen_muc = new xl_chuyen_muc;
	$limit = 4;
	# khởi tạo đối tượng phân trang
	$pt = new phan_trang('page',$limit);	
	$pt->so_pt_tren_mot_trang = $limit;
	$start = $pt->tim_vi_tri_bat_dau();
	
	
	$ds_bai_viet = $dt_xl_bai_viet->danh_sach($start,$limit,array('ma_dien_dan'=>$ma_dien_dan),'ngay_tao DESC',"bai_viet.*,(Select ten from nguoi_dung where bai_viet.ma_nguoi_dang = nguoi_dung.ma) ho_ten,(Select count(ma) from binh_luan_bai_viet where bai_viet.ma = binh_luan_bai_viet.ma_bai_viet) so_luong_binh_luan",PDO::FETCH_ASSOC,"and tieu_de like '%$tu_khoa%'",true);
	
	$ds_chuyen_muc = $dt_xl_chuyen_muc->danh_sach(0,0,array('ma_dien_dan'=>$ma_dien_dan),'ma ASC','*',PDO::FETCH_ASSOC,'',false);
	
	$dt_smarty->assign('ds_chuyen_muc',$ds_chuyen_muc);
	$pt->tong_record = $ds_bai_viet[1];
	$tong_so_trang = $pt->ceil_tong_so_trang();
	$trang_hien_tai = $pt->tim_trang_hien_tai();
	
	$dt_smarty->assign('title',$title);
	
	$dt_smarty->assign('bo_nut',$pt->in_bo_nut());
	$dt_smarty->assign('tong_so_trang',$tong_so_trang);
	
	
	$dt_smarty->assign('trang_hien_tai',$trang_hien_tai);
	$dt_smarty->assign('ds_bai_viet', $ds_bai_viet[0]);
	$dt_smarty->assign('tong_so_bai_viet' , $ds_bai_viet[1]);
		
	$contentForLayout = $dt_smarty->fetch('bai_viet/tim_kiem.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';

	
}catch(Exception $e){
	echo $e->getMessage();
	exit;	
}