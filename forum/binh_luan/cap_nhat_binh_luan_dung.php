<?php
try{
//	print_r($_POST);exit;
	require '../ini.php';
	require '../classes/xl_binh_luan.php';
	require '../classes/xl_thanh_vien_dien_dan.php';



	$dt_xl_binh_luan = new xl_binh_luan;

	
	#Kiểm tra dữ liệu thô
		#Kiểm tra dữ liệu bắt buộc phải có
	if(empty($_GET['ma'])){
		throw new Exception('Vui lòng nhập mã');
	}	
	#######Kiểm tra logic########
	$binh_luan = $dt_xl_binh_luan->doc(array('ma'=>$_GET['ma'],'ma_dien_dan'=>$ma_dien_dan), 'ma, da_tb_bl_dung, dung, ma_nguoi_dung, ma_bai_viet');
	
	if($binh_luan == NULL){
		throw new Exception('Bình luận không tồn tại');
	}
	if($binh_luan['dung'] == 1){ 
		tru_diem_thanh_vien($binh_luan['ma_nguoi_dung'],$ma_dien_dan,$diem_bai_viet_dung);
	}
	if($binh_luan['dung']== 0){
		
		cong_diem_thanh_vien($binh_luan['ma_nguoi_dung'],$ma_dien_dan,$diem_bai_viet_dung);	
	}
	
	
	$result = $dt_xl_binh_luan->cap_nhat_trang_thai($_GET['ma'],'dung',"and ma_dien_dan = '$ma_dien_dan'");
	if($result === false){
		throw new Exception('Lỗi trong quá trình lưu dữ liệu , vui lòng thử lại');
	}	
	
	if($binh_luan['da_tb_bl_dung']==0)
	{
		require '../classes/xl_bai_viet.php';
		$xl_bai_viet = new xl_bai_viet;
		$bai_viet = $xl_bai_viet->doc(array('ma'=>$binh_luan['ma_bai_viet']), 'ma_nguoi_dang, 
		(select concat(ho,concat(" ",ten)) from nguoi_dung where ma = ma_nguoi_dang) as ho_ten, tieu_de');

		require '../classes/xl_thong_bao.php';
		$xl_thong_bao = new xl_thong_bao;
		
		// loại thông báo 1: thông báo bình luận đúng
		$xl_thong_bao->them(array('loai_thong_bao'=>1, 'gui_tu'=>$bai_viet['ma_nguoi_dang'], 'gui_den'=>$binh_luan['ma_nguoi_dung'], 'ma_dien_dan'=>$ma_dien_dan, 'trang_thai'=>0, 'noi_dung'=>"{$bai_viet['ho_ten']} đã bình chọn đúng cho bình luận của bạn tại bài viết `{$bai_viet['tieu_de']}` trong diễn đàn {$dien_dan['ten']}", 'ngay_tao'=>date('Y-m-d H:i:s'), 
		'duong_dan'=>"/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/bai_viet/chi_tiet?ma={$binh_luan['ma_bai_viet']}"));
		
		$dt_xl_binh_luan->cap_nhat_dieu_kien(array('da_tb_bl_dung'=>1), array('ma_dien_dan'=>$ma_dien_dan, 'ma'=>$_GET['ma']));
	}
	
	#Them thanh cong san pham
	# Đóng kết nối
	$dbh = NULL;
	header('Location:'.$_SERVER['HTTP_REFERER']);
	exit;	
}catch (PDOException $e){

	echo $e->getMessage();
		
}catch (Exception $e){
	$_SESSION['message']['type'] = 'error';
	$_SESSION['message']['content'] =  $e->getMessage();
	header("Location: {$_SERVER['HTTP_REFERER']}");
}