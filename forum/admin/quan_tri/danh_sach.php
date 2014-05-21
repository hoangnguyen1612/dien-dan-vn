<?php
try{
	include '../ini.php';
	include("../../classes/xl_quan_tri.php");
	include("../../classes/phan_trang.php");
	
	$dt_xl_quan_tri = new xl_quan_tri;
	$dt_phan_trang = new phan_trang;
	$page = $dt_phan_trang->tim_trang_hien_tai();
	
######################################
	if(isset($_GET['tu_khoa'])){
		$tu_khoa = $_GET['tu_khoa'];	
	}else{
		$tu_khoa = '';
	}
############ Lấy ra danh sách bài viết ###########
	$start = $dt_phan_trang->tim_vi_tri_query($page,4); //tìm vị trí bắt đầu query
	$ds_quan_tri = $dt_xl_quan_tri->danh_sach($start , $tu_khoa);

############## Chuẩn bị câu thông báo ##############
	if(isset($_SESSION['msg'])){
		$thong_bao = $dt_smarty->fetch('elements/message.tpl');
		# Xóa session
		unset($_SESSION['msg']);
		unset($_SESSION['style_msg']);
	}else{
		$thong_bao = '';
	}
########### Tạo bộ nút phân trang ###########
	$so_luong = $dt_xl_quan_tri->so_luong($tu_khoa);// Tìm ra được tổng sản phẩm
	$bo_nut = $dt_phan_trang->bo_nut_phan_trang($so_luong,$page,4);
##############Gửi thông tin qua cho smarty#############
	$dt_smarty->assign('ds_quan_tri',$ds_quan_tri);
	$dt_smarty->assign('bo_nut',$bo_nut);
	$dt_smarty->assign('thong_bao',$thong_bao);	
	$dt_smarty->assign('tu_khoa',$tu_khoa);
##########Nhờ smarty hiển thị giao diện#############
	
$contentForLayout = $dt_smarty->fetch('quan_tri/danh_sach.tpl');

$dt_smarty->assign('contentForLayout', $contentForLayout);

$dt_smarty->display('layouts/default.tpl');

$dbh = NULL;
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}
