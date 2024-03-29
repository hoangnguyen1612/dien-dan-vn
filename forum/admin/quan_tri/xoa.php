<?php
try{
	include("../ini.php");
	include("../../classes/xl_quan_tri.php");
	$dt_xl_quan_tri = new xl_quan_tri;
	
	# Kiểm tra mã quản trị
	if(empty($_GET['ma'])){
		throw new Exception('Vui lòng nhập mã quản trị');	
	}			
	
	$ma = $_GET['ma'];
	
	# Kiểm tra logic
	# Kiểm tra mã sữa có tồn tại ko 
	$row = $dt_xl_quan_tri->doc($ma);
	if ($row == NULL) {
		throw new Exception('Mã quản trị không tồn tại');	
	}
	//////
	$dt_xl_quan_tri->xoa($ma);
	// Xóa file hình
	$dbh=NULL;
	$_SESSION['msg']= 'Xóa thành công quản trị';
	$_SESSION['style_msg'] = 'notification success png_bg';
	header('Location: danh_sach.php');	
	exit;	
}catch (PDOException $e){
	echo $e->getMessage();
	exit;
		
}
catch (Exception $e){
	# Đóng kết nối
	$dbh = NULL;
	#Lay cau du lieu 
	$_SESSION['msg'] = $e->getMessage();
	$_SESSION['style_msg'] = 'notification error png_bg';
	header('Location: danh_sach.php');	
}