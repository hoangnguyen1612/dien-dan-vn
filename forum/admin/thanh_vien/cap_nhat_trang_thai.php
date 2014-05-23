<?php
try{
//	print_r($_POST);exit;
	require '../ini.php';
	require '../../../home/classes/xl_thanh_vien_dien_dan.php';



	$dt_xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;

	
	#Kiểm tra dữ liệu thô
		#Kiểm tra dữ liệu bắt buộc phải có
	if(empty($_GET['ma'])){
		throw new Exception('Vui lòng nhập mã thành viên');
	}	
	#######Kiểm tra logic########
	$thanh_vien = $dt_xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$_GET['ma'],'ma_dien_dan'=>$_SESSION['dien_dan']['ma']));
	if($thanh_vien == NULL){
		throw new Exception('Thành viên không tồn tại');
	}
	
	$ma_dien_dan = $_SESSION['dien_dan']['ma'];
	$ma_nguoi_dung = $_GET['ma'];

	$result = $dt_xl_thanh_vien_dien_dan->cap_nhat_trang_thai_1('trang_thai',"ma_nguoi_dung = '$ma_nguoi_dung' and ma_dien_dan = '$ma_dien_dan'");
	if($result === false){
		throw new Exception('Lỗi trong quá trình lưu dữ liệu , vui lòng thử lại');
	}
	
	# Đóng kết nối
	$dbh = NULL;
	$_SESSION['msg']= 'Cập nhật thành công trạng thái';
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
	header('Location: danh_sach.php');	
}