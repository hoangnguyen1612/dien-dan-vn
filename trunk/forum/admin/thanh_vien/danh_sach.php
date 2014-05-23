<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../../../home/classes/xl_nguoi_dung.php';
	include '../../../home/classes/xl_thanh_vien_dien_dan.php';
	include '../../classes/phan_trang.php';
	
	$dt_phan_trang = new phan_trang;
	$dt_xl_nguoi_dung = new xl_nguoi_dung;
	$dt_xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	$vi_tri_bat_dau = $dt_phan_trang->tim_trang_hien_tai();

	$start = $dt_phan_trang->tim_vi_tri_query($vi_tri_bat_dau,4);
	if(isset($_GET['tu_khoa'])){
		
		$tu_khoa = $_GET['tu_khoa'];		
			$ds_thanh_vien = $dt_xl_thanh_vien_dien_dan->danh_sach($start,4,array('ma_dien_dan'=>$_SESSION['dien_dan']['ma']),'ma_dien_dan ASC','thanh_vien_dien_dan.*,(Select ho_ten from nguoi_dung l2 where l2.ma = thanh_vien_dien_dan.ma_nguoi_dung) ten_thanh_vien',PDO::FETCH_ASSOC,"and ten_thanh_vien like '%$tu_khoa%'",true);
	}else{
		
		$ds_thanh_vien = $dt_xl_thanh_vien_dien_dan->danh_sach($start,4,array('ma_dien_dan'=>$_SESSION['dien_dan']['ma']),'ma_dien_dan ASC','thanh_vien_dien_dan.*,(Select ho_ten from nguoi_dung l2 where l2.ma = thanh_vien_dien_dan.ma_nguoi_dung) ten_thanh_vien',PDO::FETCH_ASSOC,'',true);
		
	}
	$sl_thanh_vien = $dt_xl_thanh_vien_dien_dan->dem(array('ma_dien_dan'=>$_SESSION['dien_dan']['ma']),'ma_nguoi_dung',PDO::FETCH_ASSOC,'');
	
	$dt_smarty->assign('loai_thanh_vien', array(0=>'Chủ trang web',1=>'Admin diễn đàn',2=>'Thành viên',3=>'Mới'));
	$dt_smarty->assign('cap_nhat_thanh_vien', array(1=>'Admin diễn đàn',2=>'Thành viên',3=>'Mới'));
	$dt_smarty->assign('trang_thai', array(0=>'Khóa',1=>'Đang hoạt động'));
	$dt_smarty->assign('ds_thanh_vien', $ds_thanh_vien[0]);	
	
	#############Chuẩn bị bộ nút #####################
	$bo_nut = $dt_phan_trang->bo_nut_phan_trang($sl_thanh_vien,$vi_tri_bat_dau,4);
	$dt_smarty->assign('bo_nut', $bo_nut);
	############## Chuẩn bị câu thông báo ##############
	if(isset($_SESSION['msg'])){
		$thong_bao = $dt_smarty->fetch('elements/message.tpl');
		# Xóa session
		unset($_SESSION['msg']);
		unset($_SESSION['style_msg']);
	}else{
		$thong_bao = '';
	}
	##########Nhờ smarty hiển thị giao diện#############
	$dt_smarty->assign('thong_bao', $thong_bao);
	
	$contentForLayout = $dt_smarty->fetch('thanh_vien/danh_sach.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
	$dbh = NULL;
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}

?>