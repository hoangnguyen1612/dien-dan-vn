<?php
try{
	include("../ini.php");
	include("../../classes/xl_san_pham.php");
	$dt_xl_san_pham = new xl_san_pham;
	
	# Kiểm tra mã sữa
	if(empty($_GET['ma'])){
		throw new Exception('Vui lòng nhập mã sản phẩm');	
	}			
	
	$ma = $_GET['ma'];
	
	# Kiểm tra logic
	# Kiểm tra mã sữa có tồn tại ko 
	$row = $dt_xl_san_pham->doc($ma);
	if ($row == NULL) {
		throw new Exception('Mã sản phẩm không tồn tại');	
	}
	//////
	$dt_xl_san_pham->xoa($ma);
	// Xóa file hình
	$dbh=NULL;
	$_SESSION['msg']= 'Xóa thành công sản phẩm';
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