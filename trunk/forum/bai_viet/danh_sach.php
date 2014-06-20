<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_bai_viet.php';
	include '../classes/xl_chuyen_muc.php';
	include '../classes/phan_trang_1.php';
	include '../classes/xl_nguoi_dung.php';

	$title = 'Bài viết';
	
	
	if(!isset($_GET['loai'])){
		throw new Exception('Vui lòng loại chuyên mục');
	}
	$loai = $_GET['loai'];
	$dt_xl_bai_viet = new xl_bai_viet;
	$dt_xl_chuyen_muc = new xl_chuyen_muc;
	$limit = 4;
	# khởi tạo đối tượng phân trang
	$pt = new phan_trang('page',$limit);	
	$pt->so_pt_tren_mot_trang = $limit;
	$start = $pt->tim_vi_tri_bat_dau();
	if(isset($_GET['bo_loc'])){
		if($_GET['bo_loc']!=0 && $_GET['bo_loc'] !=1){
			throw new Exception('Bộ lọc không đúng dữ liệu');
		}
		if($_GET['bo_loc'] == 0){
			$ds_bai_viet_moi_nhat = $dt_xl_bai_viet->danh_sach(0,10,array('ma_loai_chuyen_muc'=>$loai,'ma_dien_dan'=>$ma_dien_dan),'ngay_tao DESC',"bai_viet.*,(Select ten from nguoi_dung where bai_viet.ma_nguoi_dang = nguoi_dung.ma) ho_ten,(Select count(ma) from binh_luan_bai_viet where bai_viet.ma = binh_luan_bai_viet.ma_bai_viet) so_luong_binh_luan",PDO::FETCH_ASSOC,'',false);
			$dt_smarty->assign('ds_bai_viet_moi_nhat',$ds_bai_viet_moi_nhat);
		}
		if($_GET['bo_loc'] == 1){
			$ds_bai_viet_yeu_thich_nhat = $dt_xl_bai_viet->danh_sach(0,10,array('ma_loai_chuyen_muc'=>$loai,'ma_dien_dan'=>$ma_dien_dan),'thich DESC',"bai_viet.*,(Select ten from nguoi_dung where bai_viet.ma_nguoi_dang = nguoi_dung.ma) ho_ten,(Select count(ma) from binh_luan_bai_viet where bai_viet.ma = binh_luan_bai_viet.ma_bai_viet) so_luong_binh_luan",PDO::FETCH_ASSOC,'and thich != 0',false);
			$dt_smarty->assign('ds_bai_viet_yeu_thich_nhat',$ds_bai_viet_yeu_thich_nhat);
		}
	}
	
	
	
	
	$chuyen_muc = $dt_xl_chuyen_muc->doc(array('ma'=>$loai,'ma_dien_dan'=>$ma_dien_dan));
	if($chuyen_muc['ma_loai_cha'] != 0){
		$chuyen_muc_cha = $dt_xl_chuyen_muc->doc(array('ma'=>$chuyen_muc['ma_loai_cha'],'ma_dien_dan'=>$ma_dien_dan));
		$dt_smarty->assign('chuyen_muc_cha',$chuyen_muc_cha);
		if($chuyen_muc_cha['ma_loai_cha'] !=0){
			$chuyen_muc_ong_noi = $dt_xl_chuyen_muc->doc(array('ma'=>$chuyen_muc_cha['ma_loai_cha'],'ma_dien_dan'=>$ma_dien_dan));
			$dt_smarty->assign('chuyen_muc_ong_noi',$chuyen_muc_ong_noi);
		}
	}
	if(isset($_GET['tu_khoa'])){
		$tu_khoa = $_GET['tu_khoa'];
		$ds_bai_viet_theo_loai = $dt_xl_bai_viet->danh_sach($start,$limit,array('ma_loai_chuyen_muc'=>$loai,'ma_dien_dan'=>$ma_dien_dan),'ngay_tao DESC',"bai_viet.*,(Select ten from nguoi_dung where bai_viet.ma_nguoi_dang = nguoi_dung.ma) ho_ten,(Select count(ma) from binh_luan_bai_viet where bai_viet.ma = binh_luan_bai_viet.ma_bai_viet) so_luong_binh_luan",PDO::FETCH_ASSOC,"and tieu_de like '%$tu_khoa%'",true);
	}else{
	$ds_bai_viet_theo_loai = $dt_xl_bai_viet->danh_sach($start,$limit,array('ma_loai_chuyen_muc'=>$loai,'ma_dien_dan'=>$ma_dien_dan),'ngay_tao DESC',"bai_viet.*,(Select ten from nguoi_dung where bai_viet.ma_nguoi_dang = nguoi_dung.ma) ho_ten,(Select count(ma) from binh_luan_bai_viet where bai_viet.ma = binh_luan_bai_viet.ma_bai_viet) so_luong_binh_luan",PDO::FETCH_ASSOC,'',true);
	}
	$pt->tong_record = $ds_bai_viet_theo_loai[1];
	$tong_so_trang = $pt->ceil_tong_so_trang();
	$trang_hien_tai = $pt->tim_trang_hien_tai();

	############Lấy ra danh sách các chuyên mục con ############
	$ds_chuyen_muc_con = $dt_xl_chuyen_muc->danh_sach(0,0,array('ma_loai_cha'=>$loai,'ma_dien_dan'=>$ma_dien_dan),'thu_tu_hien_thi ASC','*',PDO::FETCH_ASSOC,'',false);
	$ds_chuyen_muc = $dt_xl_chuyen_muc->danh_sach(0,0,array('ma_dien_dan'=>$ma_dien_dan),'ma ASC','*',PDO::FETCH_ASSOC,'',false);
	
	$dt_smarty->assign('ds_chuyen_muc',$ds_chuyen_muc);

	$dt_smarty->assign('title',$title);
	$dt_smarty->assign('ds_chuyen_muc_con',$ds_chuyen_muc_con);
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
	
	include '../end.php';
}catch(Exception $e){
	$_SESSION['message']['type'] = 'error';
	$_SESSION['message']['content'] =  $e->getMessage();
	echo $e->getMessage();exit;
	#header("Location: /$ma_dien_dan");
}