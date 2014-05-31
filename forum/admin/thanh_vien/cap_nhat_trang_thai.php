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
	$ma_nguoi_dung = url_decode($_GET['ma']); 
	$thanh_vien = $dt_xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$ma_nguoi_dung,'ma_dien_dan'=>$ma_dien_dan));
	if($thanh_vien == NULL){
		throw new Exception('Thành viên không tồn tại');
	}
	
	$result = $dt_xl_thanh_vien_dien_dan->cap_nhat_trang_thai_1('trang_thai',"ma_nguoi_dung = '$ma_nguoi_dung' and ma_dien_dan = '$ma_dien_dan'");
	if($result === false){
		throw new Exception('Đã có lỗi trong quá trình lưu dữ liệu , vui lòng thử lại');
	}
	
	# Đóng kết nối
	$dbh = NULL;
	throw new Exception('Cập nhật trạng thái thành công', 30);
}catch (PDOException $e){

	echo $e->getMessage();
		
}catch (Exception $e){
	throwMessage($e);
}