<?php
try{
	require '../ini.php';
	require '../ini_interface.php';
	require '../../classes/xl_thanh_vien_dien_dan.php';
	require '../../classes/xl_bai_viet.php';
	
	if(empty($_GET['ma_nguoi_viet'])){
		throw new Exception('Vui lòng nhập mã người viết bài sai phạm');
	}
	if(empty($_GET['ma_bai_viet'])){
		throw new Exception('Vui lòng nhập bài viết bị báo cáo sai phạm');
	}
	$dt_xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	$dt_xl_bai_viet = new xl_bai_viet;
	
	$bai_viet = $dt_xl_bai_viet->doc(array('ma'=>$_GET['ma_bai_viet'],'ma_dien_dan'=>$ma_dien_dan),'bai_viet.*,(Select ho from nguoi_dung where bai_viet.ma_nguoi_dang = nguoi_dung.ma) ho_nguoi_dang,(Select ten from nguoi_dung where bai_viet.ma_nguoi_dang = nguoi_dung.ma) ten_nguoi_dang');
	if($bai_viet == NULL){
		throw new Exception('Bài viết không tồn tại trong diễn đàn');
	}
	$thanh_vien = $dt_xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$_GET['ma_nguoi_viet'],'ma_dien_dan'=>$ma_dien_dan));
	if($thanh_vien == NULL){
		throw new Exception('Thành viên không tồn tại trong diễn đàn');
	}
	// loai_thong_bao : 2 Gửi thông báo đã xử lý báo cáo sai phạm
	$dt_smarty->assign('bai_viet',$bai_viet);
	$dt_smarty->assign('thanh_vien',$thanh_vien);
	$contentForLayout = $dt_smarty->fetch('bao_cao/chi_tiet_gui_thong_bao.tpl');
	$dt_smarty->assign('contentForLayout',$contentForLayout);
	$dt_smarty->display('layouts/default.tpl'); 
	
}catch(Exception $e){
	throwMessage($e);
}
