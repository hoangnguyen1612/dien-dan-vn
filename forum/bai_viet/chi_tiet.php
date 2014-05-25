<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_bai_viet.php';
	include '../classes/xl_binh_luan.php';
	include '../classes/phan_trang_1.php';
	include '../classes/xl_feedback_binh_luan.php';
	
	if(empty($_GET['ma'])){
		echo 'Vui lòng nhập mã bài viết';
		exit;
	}
	$limit = 4; // Số lượng bài viết trên 1 trang
	$pt = new phan_trang('page',$limit);
	
	$quyen = array(0=>'Chủ diễn đàn', 1=>'Quản trị', 2=>'Thành viên');
	$dt_smarty->assign('quyen', $quyen);
	
	$pt->so_pt_tren_mot_trang = $limit;
	$start = $pt->tim_vi_tri_bat_dau();
	
	$dt_xl_bai_viet = new xl_bai_viet;
	$dt_xl_binh_luan = new xl_binh_luan;
	$ma = $_GET['ma'];

	$bai_viet = $dt_xl_bai_viet->doc(array('ma'=>$ma,'ma_dien_dan'=>$ma_dien_dan),'bai_viet.*,(Select ho_ten from nguoi_dung where nguoi_dung.ma = bai_viet.ma_nguoi_dang) ten_nguoi_dang, (Select thumbnail from nguoi_dung where nguoi_dung.ma = bai_viet.ma_nguoi_dang) thumbnail, (Select gioi_tinh from nguoi_dung where nguoi_dung.ma = bai_viet.ma_nguoi_dang) gioi_tinh, (Select ngay_gia_nhap from thanh_vien_dien_dan where thanh_vien_dien_dan.ma_nguoi_dung = bai_viet.ma_nguoi_dang) ngay_gia_nhap, (Select loai_thanh_vien from thanh_vien_dien_dan where thanh_vien_dien_dan.ma_nguoi_dung = bai_viet.ma_nguoi_dang) ma_loai_thanh_vien');

	$ds_binh_luan_cha = $dt_xl_binh_luan->danh_sach($start,$limit,array('ma_bai_viet'=>$ma,'ma_dien_dan'=>$ma_dien_dan,'ma_loai_cha'=>0),'ngay_tao ASC','binh_luan_bai_viet.*,(Select ho_ten from nguoi_dung where nguoi_dung.ma = binh_luan_bai_viet.ma_nguoi_dung) ten_nguoi_dung,(Select thumbnail from nguoi_dung where nguoi_dung.ma = binh_luan_bai_viet.ma_nguoi_dung) thumbnail, (Select ngay_gia_nhap from thanh_vien_dien_dan where thanh_vien_dien_dan.ma_nguoi_dung = binh_luan_bai_viet.ma_nguoi_dung) ngay_gia_nhap, (Select gioi_tinh from nguoi_dung where nguoi_dung.ma = binh_luan_bai_viet.ma_nguoi_dung) gioi_tinh', PDO::FETCH_ASSOC,'',true);
	
	$ds_binh_luan_con = $dt_xl_binh_luan->danh_sach(0,0,array('ma_bai_viet'=>$ma,'ma_dien_dan'=>$ma_dien_dan),'ngay_tao ASC','binh_luan_bai_viet.*,(Select ho_ten from nguoi_dung where nguoi_dung.ma = binh_luan_bai_viet.ma_nguoi_dung) ten_nguoi_dung,(Select thumbnail from nguoi_dung where nguoi_dung.ma = binh_luan_bai_viet.ma_nguoi_dung) thumbnail, (Select ngay_gia_nhap from thanh_vien_dien_dan where thanh_vien_dien_dan.ma_nguoi_dung = binh_luan_bai_viet.ma_nguoi_dung) ngay_gia_nhap, (Select gioi_tinh from nguoi_dung where nguoi_dung.ma = binh_luan_bai_viet.ma_nguoi_dung) gioi_tinh',PDO::FETCH_ASSOC,'and ma_loai_cha !=0',false);
	
	$pt->tong_record = $ds_binh_luan_cha[1];
	$tong_so_trang = $pt->ceil_tong_so_trang();
	$trang_hien_tai = $pt->tim_trang_hien_tai();
	#########In bo nut va tong so tran ##########
	$dt_smarty->assign('bo_nut',$pt->in_bo_nut());
	$dt_smarty->assign('tong_so_trang',$tong_so_trang);
	$dt_smarty->assign('trang_hien_tai',$trang_hien_tai);
	$dem = 0;
	$dt_smarty->assign('dem',$dem);
	$dt_smarty->assign('ds_binh_luan_cha',$ds_binh_luan_cha[0]);
	$dt_smarty->assign('ds_binh_luan_con',$ds_binh_luan_con);
	$dt_smarty->assign('tong_so_bai_viet' , $ds_binh_luan_cha[1]);
	
	$dt_smarty->assign('bai_viet',$bai_viet);	
	$contentForLayout = $dt_smarty->fetch('bai_viet/chi_tiet.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
}catch(Exception $e){
	echo $e->getMessage();
}