<?php
try{
//	print_r($_POST);exit;
	require '../ini.php';
	require '../classes/xl_binh_luan.php';



	$dt_xl_binh_luan = new xl_binh_luan;

	
	#Kiểm tra dữ liệu thô
		#Kiểm tra dữ liệu bắt buộc phải có
	if(empty($_GET['ma'])){
		throw new Exception('Vui lòng nhập mã');
	}	
	#######Kiểm tra logic########
	$binh_luan = $dt_xl_binh_luan->doc(array('ma'=>$_GET['ma'],'ma_dien_dan'=>$ma_dien_dan));
	if($binh_luan == NULL){
		throw new Exception('Bình luận không tồn tại');
	}
	
	
	$result = $dt_xl_binh_luan->cap_nhat_trang_thai($_GET['ma'],'giup_ich',"and ma_dien_dan = '$ma_dien_dan'");
	if($result === false){
		throw new Exception('Lỗi trong quá trình lưu dữ liệu , vui lòng thử lại');
	}
	#Them thanh cong san pham
	# Đóng kết nối
	$dbh = NULL;
	header('Location:'.$_SERVER['HTTP_REFERER']);
	exit;	
}catch (PDOException $e){

	echo $e->getMessage();
		
}catch (Exception $e){
	$_SESSION['message']['type'] = 'error';
	$_SESSION['message']['content'] =  $e->getMessage();
	header("Location: {$_SERVER['HTTP_REFERER']}");
}