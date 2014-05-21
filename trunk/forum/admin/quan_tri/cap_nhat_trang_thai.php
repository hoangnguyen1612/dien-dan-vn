<?php
try{
//	print_r($_POST);exit;
	include '../ini.php';
	

	include("../../classes/xl_quan_tri.php");

	$dt_xl_quan_tri = new xl_quan_tri;

	
	#Kiểm tra dữ liệu thô
		#Kiểm tra dữ liệu bắt buộc phải có
	if(empty($_GET['ma'])){
		throw new Exception('Vui lòng nhập mã');
	}	
	#######Kiểm tra logic########


	##############################
	# Thêm biến hình cho mảng data 
	$result = $dt_xl_quan_tri->cap_nhat_trang_thai($_GET['ma']);
	/*$result = $sth->execute(array(':Ma_sua'=>$Ma_sua,':Ten_sua'=>$Ten_sua,':Ma_hang_sua'=>$Ma_hang_sua,':Ma_loai_sua'=>$Ma_loai_sua,':Trong_luong'=>$Trong_luong,':Don_gia'=>$Don_gia,':TP_Dinh_Duong'=>$TP_Dinh_Duong,':Loi_ich'=>$Loi_ich,':Hinh'=> $Hinh));*/
	# Lỗi trong quá trình lưu dữ liệu
	if($result === false){
		throw new Exception('Lỗi trong quá trình lưu dữ liệu , vui lòng thử lại');
	}
	#Them thanh cong san pham
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