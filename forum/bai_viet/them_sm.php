<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_bai_viet.php';


	$dt_xl_bai_viet = new xl_bai_viet;
	
	$data = $_POST['data'];
	if(empty($data['tieu_de'])){
		echo 'Vui lòng nhập tên cho bài viết';
		exit;
	}
	if(empty($data['noi_dung'])){
		echo 'Vui lòng nhập nội dung cho bài viết';
		exit;
	}
	$data['ngay_tao'] = date('Y-m-d h:i:s');
	$data['ma_nguoi_dang'] = 'zNumJozHPOILtMf';
	$data['ma_dien_dan'] = 'abcd1234';
	$ma_chuyen_muc = $data['ma_loai_chuyen_muc'];
	$result = $dt_xl_bai_viet->them($data);
	if($result === false){
		echo 'Lỗi khi đăng bài , vui lòng thử lại sao';
		exit;
	}
	header("Location: ../bai_viet/index.php?loai=$ma_chuyen_muc");
	exit;
	

}catch(Exception $e){
	echo $e->getMessage();
	exit; 
}