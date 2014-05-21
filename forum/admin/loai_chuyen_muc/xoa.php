<?php
try{
	include("../ini.php");
	include("../../classes/xl_loai_bai_viet.php");
	$dt_xl_loai_bai_viet = new xl_loai_bai_viet;
	
	# Kiểm tra mã sữa
	if(empty($_GET['ma'])){
		throw new Exception('Vui lòng nhập mã bài viết');	
	}			
	
	$ma = $_GET['ma'];
	
	# Kiểm tra logic
	# Kiểm tra mã sữa có tồn tại ko 
	$row = $dt_xl_loai_bai_viet->doc($ma);
	if ($row == NULL) {
		throw new Exception('Mã loại bài viết không tồn tại');	
	}
	//////
	$dt_xl_loai_bai_viet->xoa($ma);
	// Xóa file hình
	$dbh=NULL;
	$_SESSION['msg']= 'Xóa thành công bài viết';
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