<?php
try{
	
	require '../ini.php';
	require '../../classes/xl_thanh_vien_dien_dan.php';

	#quan_tri('thanh_vien_cap_nhat');

	$dt_xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;

	
	#Kiểm tra dữ liệu thô
		#Kiểm tra dữ liệu bắt buộc phải có
	if(empty($_GET['ma'])){
		throw new Exception('Vui lòng nhập mã người dùng');
		
	}	
	#######Kiểm tra logic########
	$thanh_vien_dien_dan = $dt_xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$_GET['ma'],'ma_dien_dan'=>$dien_dan['ma']));
	if($thanh_vien_dien_dan == NULL){
		throw new Exception('Thành viên không tồn tại');
		
	}
	
	$ma_dien_dan = $dien_dan['ma'];
	
	$result = $dt_xl_thanh_vien_dien_dan->cap_nhat_trang_thai_1('trang_thai',"ma_nguoi_dung = '{$_GET['ma']}'and ma_dien_dan = '$ma_dien_dan'");
	if($result === false){
		throw new Exception('Lỗi trong quá trình lưu dữ liệu , vui lòng thử lại');
	}
	#Them thanh cong san pham
	# Đóng kết nối
	$dbh = NULL;
	throw new Exception('Cập nhật thành công',30);	
}catch (PDOException $e){

	echo $e->getMessage();
		
}catch (Exception $e){
	# Đóng kết nối
	$dbh = NULL;
	#Lay cau du lieu 
	throwMessage($e);	
}