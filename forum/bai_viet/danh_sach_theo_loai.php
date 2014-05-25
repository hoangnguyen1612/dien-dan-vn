<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_bai_viet.php';
	include '../classes/xl_nguoi_dung.php';
	
	kiem_tra_quyen();
	
	if(!isset($_GET['loai'])){
		header('Location:'.$_SERVER['HTTP_REFERER']);
		exit;
	}
	if($_GET['loai']!=0&&$_GET['loai']!=1){
		
		header('Location:'.$_SERVER['HTTP_REFERER']);
		exit;
	}
	$dt_xl_bai_viet = new xl_bai_viet;
	# khởi tạo đối tượng phân trang
	if($_GET['loai'] == 0){
	$ds_bai_viet_theo_loai = $dt_xl_bai_viet->danh_sach(0,10,'','ngay_tao DESC',"bai_viet.*,(Select ho_ten from nguoi_dung where bai_viet.ma_nguoi_dang = nguoi_dung.ma) ho_ten,(Select count(ma) from binh_luan_bai_viet where bai_viet.ma = binh_luan_bai_viet.ma_bai_viet) so_luong_binh_luan",PDO::FETCH_ASSOC,'',false);
	}
	if($_GET['loai'] == 1){
		$ds_bai_viet_theo_loai = $dt_xl_bai_viet->danh_sach(0,10,'','feedback DESC',"bai_viet.*,(Select ho_ten from nguoi_dung where bai_viet.ma_nguoi_dang = nguoi_dung.ma) ho_ten,(Select count(ma) from binh_luan_bai_viet where bai_viet.ma = binh_luan_bai_viet.ma_bai_viet) so_luong_binh_luan",PDO::FETCH_ASSOC,' where feedback!=0',false);
		
	}

	
	$dt_smarty->assign('ds_bai_viet_theo_loai', $ds_bai_viet_theo_loai);

		
	$contentForLayout = $dt_smarty->fetch('bai_viet/danh_sach_theo_loai.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
}catch(Exception $e){
	header('Location:'.$_SERVER['HTTP_REFERER']);
}