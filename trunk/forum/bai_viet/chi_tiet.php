<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_bai_viet.php';
	include '../classes/xl_binh_luan.php';
	include '../classes/phan_trang_1.php';
	include '../classes/xl_feedback_binh_luan.php';
	include '../classes/xl_feedback_bai_viet.php';
	include '../classes/xl_bao_cao_binh_luan.php';
	include '../classes/xl_bao_cao_bai_viet.php';
	include '../classes/xl_chuyen_muc.php';
	include '../classes/xl_thanh_vien_dien_dan.php';
	
	$title = 'Chi tiết bài viết';	
	if(empty($_GET['ma'])){
		throw new Exception( 'Vui lòng nhập mã bài viết');
	}
	$dt_xl_bai_viet = new xl_bai_viet;
	$dt_xl_binh_luan = new xl_binh_luan;
	$dt_xl_feedback_bai_viet = new xl_feedback_bai_viet;
	$dt_xl_feedback_binh_luan = new xl_feedback_binh_luan;
	$dt_xl_chuyen_muc = new xl_chuyen_muc;
	
	$limit = 4; // Số lượng bài viết trên 1 trang
	$pt = new phan_trang('page',$limit);

	$dt_smarty->assign('quyen', $quyen);
	
	$pt->so_pt_tren_mot_trang = $limit;
	$start = $pt->tim_vi_tri_bat_dau();
	
	$ma = $_GET['ma'];

	$bai_viet = $dt_xl_bai_viet->doc(array('ma'=>$ma,'ma_dien_dan'=>$ma_dien_dan),"bai_viet.*,(Select ten from nguoi_dung where nguoi_dung.ma = bai_viet.ma_nguoi_dang) ten_nguoi_dang, (Select thumbnail from nguoi_dung where nguoi_dung.ma = bai_viet.ma_nguoi_dang) thumbnail, (Select gioi_tinh from nguoi_dung where nguoi_dung.ma = bai_viet.ma_nguoi_dang) gioi_tinh, (Select ngay_gia_nhap from thanh_vien_dien_dan where thanh_vien_dien_dan.ma_nguoi_dung = bai_viet.ma_nguoi_dang and thanh_vien_dien_dan.ma_dien_dan = $ma_dien_dan) ngay_gia_nhap, (Select loai_thanh_vien from thanh_vien_dien_dan where thanh_vien_dien_dan.ma_nguoi_dung = bai_viet.ma_nguoi_dang and thanh_vien_dien_dan.ma_dien_dan = $ma_dien_dan) ma_loai_thanh_vien, (Select diem_so from thanh_vien_dien_dan where thanh_vien_dien_dan.ma_nguoi_dung = bai_viet.ma_nguoi_dang and thanh_vien_dien_dan.ma_dien_dan = $ma_dien_dan) diem_so");
	if(!$bai_viet)
	{
		throw new Exception('Bài viết không tồn tại trog diễn đàn');
	}
	$chuyen_muc = $dt_xl_chuyen_muc->doc(array('ma'=>$bai_viet['ma_loai_chuyen_muc'],'ma_dien_dan'=>$ma_dien_dan));
	$dt_smarty->assign('chuyen_muc',$chuyen_muc);
	if($chuyen_muc['ma_loai_cha'] != 0){
		$chuyen_muc_cha = $dt_xl_chuyen_muc->doc(array('ma'=>$chuyen_muc['ma_loai_cha'],'ma_dien_dan'=>$ma_dien_dan));
		$dt_smarty->assign('chuyen_muc_cha',$chuyen_muc_cha);
		if($chuyen_muc_cha['ma_loai_cha'] !=0){
			$chuyen_muc_ong_noi = $dt_xl_chuyen_muc->doc(array('ma'=>$chuyen_muc_cha['ma_loai_cha'],'ma_dien_dan'=>$ma_dien_dan));
			$dt_smarty->assign('chuyen_muc_ong_noi',$chuyen_muc_ong_noi);
		}
	}

	$dt_xl_bai_viet->cap_nhat_dieu_kien(array('luot_xem'=>($bai_viet['luot_xem']+1)), array('ma'=>$bai_viet['ma'],'ma_dien_dan'=>$ma_dien_dan));

	$ds_binh_luan_cha = $dt_xl_binh_luan->danh_sach($start,$limit,array('ma_bai_viet'=>$ma,'ma_dien_dan'=>$ma_dien_dan,'ma_loai_cha'=>0),'ngay_tao ASC',"binh_luan_bai_viet.*,(Select ten from nguoi_dung where nguoi_dung.ma = binh_luan_bai_viet.ma_nguoi_dung) ten_nguoi_dung,(Select thumbnail from nguoi_dung where nguoi_dung.ma = binh_luan_bai_viet.ma_nguoi_dung) thumbnail, (Select ngay_gia_nhap from thanh_vien_dien_dan where thanh_vien_dien_dan.ma_nguoi_dung = binh_luan_bai_viet.ma_nguoi_dung and thanh_vien_dien_dan.ma_dien_dan = $ma_dien_dan) ngay_gia_nhap,(Select loai_thanh_vien from thanh_vien_dien_dan where thanh_vien_dien_dan.ma_nguoi_dung = binh_luan_bai_viet.ma_nguoi_dung and thanh_vien_dien_dan.ma_dien_dan = $ma_dien_dan) ma_loai_thanh_vien, (Select gioi_tinh from nguoi_dung where nguoi_dung.ma = binh_luan_bai_viet.ma_nguoi_dung) gioi_tinh,(Select diem_so from thanh_vien_dien_dan where thanh_vien_dien_dan.ma_nguoi_dung = binh_luan_bai_viet.ma_nguoi_dung and thanh_vien_dien_dan.ma_dien_dan = $ma_dien_dan) diem_so", PDO::FETCH_ASSOC,'',true);
	
	$ds_binh_luan_con = $dt_xl_binh_luan->danh_sach(0,0,array('ma_bai_viet'=>$ma,'ma_dien_dan'=>$ma_dien_dan),'ngay_tao ASC',"binh_luan_bai_viet.*,(Select ten from nguoi_dung where nguoi_dung.ma = binh_luan_bai_viet.ma_nguoi_dung) ten_nguoi_dung,(Select thumbnail from nguoi_dung where nguoi_dung.ma = binh_luan_bai_viet.ma_nguoi_dung) thumbnail, (Select ngay_gia_nhap from thanh_vien_dien_dan where thanh_vien_dien_dan.ma_nguoi_dung=binh_luan_bai_viet.ma_nguoi_dung and thanh_vien_dien_dan.ma_dien_dan = $ma_dien_dan) ngay_gia_nhap, (Select gioi_tinh from nguoi_dung where nguoi_dung.ma = binh_luan_bai_viet.ma_nguoi_dung) gioi_tinh,(Select loai_thanh_vien from thanh_vien_dien_dan where thanh_vien_dien_dan.ma_nguoi_dung = binh_luan_bai_viet.ma_nguoi_dung and thanh_vien_dien_dan.ma_dien_dan = $ma_dien_dan) ma_loai_thanh_vien,(Select diem_so from thanh_vien_dien_dan where thanh_vien_dien_dan.ma_nguoi_dung = binh_luan_bai_viet.ma_nguoi_dung and thanh_vien_dien_dan.ma_dien_dan = $ma_dien_dan) diem_so",PDO::FETCH_ASSOC,'and ma_loai_cha !=0',false);
	
	$ds_chuyen_muc = $dt_xl_chuyen_muc->danh_sach(0,0,array('ma_dien_dan'=>$ma_dien_dan),'ma ASC','*',PDO::FETCH_ASSOC,'',false);
	
	
	# Lấy ra danh sách các bài viết và bình luận mà người đó có like trong trang chi tiết này
	$thich_bai_viet = $dt_xl_feedback_bai_viet->doc(array('ma_bai_viet'=>$ma,'ma_nguoi_dung'=>$ma_nguoi_dung));
	
	#debug($thich_bai_viet);
	$dt_smarty->assign('thich_bai_viet',$thich_bai_viet);


	$dt_smarty->assign('title',$title);
	$dt_smarty->assign('ds_chuyen_muc',$ds_chuyen_muc);
	
	$pt->tong_record = $ds_binh_luan_cha[1];
	$tong_so_trang = $pt->ceil_tong_so_trang();
	if($tong_so_trang == 0){
		$tong_so_trang = 1; 
	}
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
	
	include '../end.php';
}catch(Exception $e){
	throwMessage($e,"/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}");
}