<?php
try{
	/*echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	exit;*/
	include '../ini.php';
	include("../../classes/xl_quan_tri.php");
	
	# gan mang? data cho bien $data
	$data = $_POST['data'];
	// chon kieu utf8 cho database 
	
	// include file xl_sua


	#Tạo đối tượng xử lý sữa
	$dt_xl_quan_tri = new xl_quan_tri;

	
	#Kiểm tra dữ liệu thô
		#Kiểm tra dữ liệu bắt buộc phải có
	if(empty($data['ten_dang_nhap'])){
		throw new Exception('Vui lòng nhập tên đăng nhập');
	}
	if(empty($data['mat_khau'])){
		throw new Exception('Vui lòng nhập khẩu ');
	}
	if(empty($data['ho_ten'])){
		throw new Exception('Vui lòng nhập họ tên');
	}
	if(empty($data['email'])){
		throw new Exception('Vui lòng nhập email');
	}
	if(($data['trang_thai'])!=0 && ($data['trang_thai'])!=1){
		throw new Exception('Vui lòng nhập email');
	}
	#######Kiểm tra logic########


	##############################
	# Thêm biến hình cho mảng data 
	$result = $dt_xl_quan_tri->cap_nhat($data);
	/*$result = $sth->execute(array(':Ma_sua'=>$Ma_sua,':Ten_sua'=>$Ten_sua,':Ma_hang_sua'=>$Ma_hang_sua,':Ma_loai_sua'=>$Ma_loai_sua,':Trong_luong'=>$Trong_luong,':Don_gia'=>$Don_gia,':TP_Dinh_Duong'=>$TP_Dinh_Duong,':Loi_ich'=>$Loi_ich,':Hinh'=> $Hinh));*/
	# Lỗi trong quá trình lưu dữ liệu
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
	throwMessage($e);
}