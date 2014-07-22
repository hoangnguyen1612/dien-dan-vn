<?php
try{

	include '../ini.php';
	
	quan_tri('thanh_vien_cap_nhat');
	
	# gan mang? data cho bien $data
	$data = $_POST['data'];
	
	#Kiểm tra dữ liệu thô
		#Kiểm tra dữ liệu bắt buộc phải có

	if(empty($data['ma_nguoi_dung'])){
		throw new Exception('Vui lòng nhập mã người dùng');
	}
	if(!is_numeric($data['loai_thanh_vien'])){
		throw new Exception('Vui lòng nhập loại thành viên ');
	}
	if($data['trang_thai'] != 0 && $data['trang_thai'] != 1){
		throw new Exception('Vui lòng nhập trạng thái');
	}
	#############Kiểm tra mã thành viên có tồn tại ko ###############
	$thanh_vien = $xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$data['ma_nguoi_dung'],'ma_dien_dan'=>$_SESSION['dien_dan']['ma']),'thanh_vien_dien_dan.*,(Select ho_ten from nguoi_dung l2 where l2.ma = thanh_vien_dien_dan.ma_nguoi_dung) ten_thanh_vien',PDO::FETCH_ASSOC,'');
	if($thanh_vien == NULL){
		$_SESSION['msg']='Mã loại thành viên không tồn tại';
		$_SESSION['style_msg'] = 'notification error png_bg';
		header('Location: cap_nhat.php');	
		exit;	
	}
	########################################################################
	$data['ma_dien_dan'] = $_SESSION['dien_dan']['ma'];
	$ma_dien_dan = $_SESSION['dien_dan']['ma'];
	$ma_nguoi_dung = $data['ma_nguoi_dung'];

	$thanh_vien = $xl_thanh_vien_dien_dan->cap_nhat_truy_van($data,"ma_nguoi_dung = '$ma_nguoi_dung' and ma_dien_dan = '$ma_dien_dan' ");

	if($thanh_vien === false){
		throw new Exception('Lỗi trong quá trình lưu dữ liệu , vui lòng thử lại');
	}
	# Đóng kết nối
	$dbh = NULL;
	$_SESSION['msg']= 'Cập nhật thành công dữ liệu';
	$_SESSION['style_msg'] = 'notification success png_bg';
	header('Location: danh_sach.php');	
	exit;	
}catch (PDOException $e){

	echo $e->getMessage();
		
}catch (Exception $e){
	# Đóng kết nối
	$dbh = NULL;
	#Lay cau du lieu 
	$_SESSION['msg'] = $e->getMessage();
	$_SESSION['style_msg'] = 'notification error png_bg';
	header('Location:'.$_SERVER['HTTP_REFERER']);
}