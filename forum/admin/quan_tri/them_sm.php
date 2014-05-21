<?php
try{
//	print_r($_POST);exit;
	include '../ini.php';
	
	# gan mang? data cho bien $data
	$data = $_POST['data'];
	// chon kieu utf8 cho database 
	
	// include file xl_sua
	include("../../classes/xl_quan_tri.php");

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
		throw new Exception('Vui lòng nhập trạng thái');
	}
	#######Kiểm tra logic########
	### Kiểm tra trùng tên đăng nhập
	$ten_dang_nhap = $dt_xl_quan_tri->kiem_tra_ten_dang_nhap($data['ten_dang_nhap']);
	if($ten_dang_nhap != NULL){
		throw new Exception('Tên đăng nhập đã tồn tại , vui lòng nhập tên khác');
	}

	##############################
	
	$data['mat_khau'] = md5($data['ten_dang_nhap'].$data['mat_khau']);

	# Thêm biến hình cho mảng data 
	$result = $dt_xl_quan_tri->them($data);
	/*$result = $sth->execute(array(':Ma_sua'=>$Ma_sua,':Ten_sua'=>$Ten_sua,':Ma_hang_sua'=>$Ma_hang_sua,':Ma_loai_sua'=>$Ma_loai_sua,':Trong_luong'=>$Trong_luong,':Don_gia'=>$Don_gia,':TP_Dinh_Duong'=>$TP_Dinh_Duong,':Loi_ich'=>$Loi_ich,':Hinh'=> $Hinh));*/
	# Lỗi trong quá trình lưu dữ liệu
	if($result === false){
		throw new Exception('Lỗi trong quá trình lưu dữ liệu , vui lòng thử lại');
	}
	#Them thanh cong san pham
	# Đóng kết nối
	$dbh = NULL;
	$_SESSION['msg']= 'Thêm thành công quản trị mới';
	$_SESSION['style_msg'] = 'notification success png_bg';
	if(isset($_POST['save-and-continue'])){
		header('Location: them.php');	
	}else{
		header('Location: danh_sach.php');
	}
	exit;	
}catch (PDOException $e){

	echo $e->getMessage();
		
}catch (Exception $e){
	# Đóng kết nối
	$dbh = NULL;
	#Lay cau du lieu 
	$_SESSION['msg'] = $e->getMessage();
	$_SESSION['style_msg'] = 'notification error png_bg';
	header('Location: them.php');	
}