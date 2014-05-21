<?php
try{
/*
	#print_r($_POST);exit;
	include '../../config.php';
	session_start();		
	$dbh = new PDO('mysql:host=localhost;dbname='.DB_NAME,DB_USERNAME,DB_PASSWORD);
	$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$dbh->exec('set names utf8');

	//print_r($_POST);exit;
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
	#######Kiểm tra logic########
	

	##############################
	$ten_dang_nhap = $data['ten_dang_nhap'];
	$mat_khau = $data['ten_dang_nhap'].$data['mat_khau'];
	$quan_tri = $dt_xl_quan_tri->kiem_tra_dang_nhap($ten_dang_nhap,$mat_khau);
	/*$result = $sth->execute(array(':Ma_sua'=>$Ma_sua,':Ten_sua'=>$Ten_sua,':Ma_hang_sua'=>$Ma_hang_sua,':Ma_loai_sua'=>$Ma_loai_sua,':Trong_luong'=>$Trong_luong,':Don_gia'=>$Don_gia,':TP_Dinh_Duong'=>$TP_Dinh_Duong,':Loi_ich'=>$Loi_ich,':Hinh'=> $Hinh));*/
	# Lỗi trong quá trình lưu dữ liệu
	//print_r($quan_tri);exit;
/*
	if($quan_tri == NULL){
		throw new Exception('Lỗi đăng nhập , vui lòng thử lại');
	}
	#############Đăng nhập thành công
	$_SESSION[SALT.'login'] = 1 ;
	$_SESSION['user'] = $quan_tri ;
	$dt_xl_quan_tri->cap_nhat_lan_dang_nhap_cuoi($quan_tri['ma'],date('Y-m-d h:i:s'));
	######################################
	if(isset($_POST['remember'])){
		setcookie('ten_dang_nhap',$data['ten_dang_nhap'],time()+ 7*24*60*60,'/');
		setcookie('mat_khau',base64_encode($data['mat_khau']),time()+ 7*24*60*60,'/');
	} 
	# Đóng kết nối
	$dbh = NULL; */
	header('Location: ../thong_ke/tong_quat.php');	
	exit;	
}catch (PDOException $e){

	echo $e->getMessage();
		
}catch (Exception $e){
	# Đóng kết nối
	$dbh = NULL;
	#Lay cau du lieu 
	$_SESSION['msg_login'] = $e->getMessage();
	$_SESSION['style_msg_login'] = 'notification information png_bg';
	header('Location: dang_nhap.php');	
}