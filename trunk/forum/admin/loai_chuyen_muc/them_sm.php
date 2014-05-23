<?php
try{
	include '../ini.php';
	# gan mang? data cho bien $data
	$data = $_POST['data'];

	include "../../classes/xl_chuyen_muc.php";

	$dt_xl_chuyen_muc = new xl_chuyen_muc;

	
	#Kiểm tra dữ liệu thô
		#Kiểm tra dữ liệu bắt buộc phải có

	if(empty($data['ten'])){
		throw new Exception('Vui lòng nhập tên chuyên mục');
	}
	if(!is_numeric($data['ma_loai_cha'])){
		throw new Exception('Vui lòng nhập mã loại cha ');
	}
	if(empty($data['thu_tu_hien_thi'])){
		throw new Exception('Vui lòng nhập thứ tự hiển thị');
	}

	#######Kiểm tra logic########


	##############################
	$ten = $data['ten']; 
	if($data['ma_loai_cha'] != 0){	
		$chuyen_muc = $dt_xl_chuyen_muc->doc(array('ma'=>$data['ma_loai_cha'],'ma_dien_dan'=>$_SESSION['dien_dan']['ma']),'*',PDO::FETCH_ASSOC,'');
		if($chuyen_muc == NULL){
			throw new Exception('Mã loại cha không tồn tại, vui lòng kiểm tra lại');
		}
	}
	
	$data['ma_dien_dan'] = $_SESSION['dien_dan']['ma'];
	$result = $dt_xl_chuyen_muc->them($data);
	if($result === false){
		throw new Exception('Lỗi trong quá trình lưu dữ liệu , vui lòng thử lại');
	}
	
	# Đóng kết nối
	$dbh = NULL;
	$_SESSION['msg']= 'Thêm thành công chuyên mục mới';
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