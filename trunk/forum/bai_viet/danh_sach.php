<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_bai_viet.php';
	include '../classes/xl_chuyen_muc.php';
	include '../classes/phan_trang_1.php';
	if(isset($_GET['loai'])){
		$loai = $_GET['loai'];
	}
	
	$dt_xl_bai_viet = new xl_bai_viet;
	$dt_xl_chuyen_muc = new xl_chuyen_muc;
	$limit = 4;
	# khởi tạo đối tượng phân trang
	$pt = new phan_trang('page',$limit);	
	$pt->so_pt_tren_mot_trang = $limit;
	$start = $pt->tim_vi_tri_bat_dau();
	
	$chuyen_muc = $dt_xl_chuyen_muc->doc(array('ma'=>$loai));
	$ds_bai_viet_theo_loai = $dt_xl_bai_viet->danh_sach($start,$limit,array('ma_loai_chuyen_muc'=>$loai,'ma_dien_dan'=>$ma_dien_dan),'ngay_tao DESC',"bai_viet.*,(Select ho_ten from nguoi_dung where bai_viet.ma_nguoi_dang = nguoi_dung.ma) ho_ten,(Select count(ma) from binh_luan_bai_viet where bai_viet.ma = binh_luan_bai_viet.ma_bai_viet) so_luong_binh_luan",PDO::FETCH_ASSOC,'',true);
	$pt->tong_record = $ds_bai_viet_theo_loai[1];
	$tong_so_trang = $pt->ceil_tong_so_trang();
	$trang_hien_tai = $pt->tim_trang_hien_tai();
	#############Chuẩn bị bộ nút #####################
	$dt_smarty->assign('bo_nut',$pt->in_bo_nut());
	$dt_smarty->assign('tong_so_trang',$tong_so_trang);
	
	
	$dt_smarty->assign('trang_hien_tai',$trang_hien_tai);
	$dt_smarty->assign('chuyen_muc', $chuyen_muc);
	$dt_smarty->assign('ds_bai_viet_theo_loai', $ds_bai_viet_theo_loai[0]);
	$dt_smarty->assign('tong_so_bai_viet' , $ds_bai_viet_theo_loai[1]);
		
	$contentForLayout = $dt_smarty->fetch('bai_viet/danh_sach.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
}catch(Exception $e){
	echo $e->getMessage();
}