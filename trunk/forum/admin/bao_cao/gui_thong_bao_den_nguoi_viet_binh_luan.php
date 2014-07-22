<?php
try{
	require '../ini.php';
	require '../ini_interface.php';
	require '../../classes/xl_binh_luan.php';
	quan_tri('bao_cao_gui_thong_bao_den_nguoi_viet_binh_luan');
	if(empty($_GET['ma_nguoi_viet'])){
		throw new Exception('Vui lòng nhập mã người viết bài sai phạm');
	}
	if(empty($_GET['ma_binh_luan'])){
		throw new Exception('Vui lòng nhập bài viết bị báo cáo sai phạm');
	}
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	$dt_xl_binh_luan = new xl_binh_luan;
	
	$binh_luan = $dt_xl_binh_luan->doc(array('ma'=>$_GET['ma_binh_luan'],'ma_dien_dan'=>$ma_dien_dan),'binh_luan_bai_viet.*,(Select ho from nguoi_dung where binh_luan_bai_viet.ma_nguoi_dung = nguoi_dung.ma) ho_nguoi_dang,(Select ten from nguoi_dung where binh_luan_bai_viet.ma_nguoi_dung = nguoi_dung.ma) ten_nguoi_dang');
	if($binh_luan == NULL){
		throw new Exception('Bình luận không tồn tại trong diễn đàn');
	}
	$thanh_vien = $xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$_GET['ma_nguoi_viet'],'ma_dien_dan'=>$ma_dien_dan));
	if($thanh_vien == NULL){
		throw new Exception('Thành viên không tồn tại trong diễn đàn');
	}
	// loai_thong_bao : 2 Gửi thông báo đã xử lý báo cáo sai phạm
	$dt_smarty->assign('binh_luan',$binh_luan);
	$dt_smarty->assign('thanh_vien',$thanh_vien);
	$contentForLayout = $dt_smarty->fetch('bao_cao/chi_tiet_gui_thong_bao_binh_luan.tpl');
	$dt_smarty->assign('contentForLayout',$contentForLayout);
	$dt_smarty->display('layouts/default.tpl'); 
	
}catch(Exception $e){
	throwMessage($e);
}
