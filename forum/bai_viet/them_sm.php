<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_bai_viet.php';
	if($login == ''){
		header('Location:/');
		exit;
	}

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
	$data['ma_nguoi_dang'] = $login['ma'];
	$data['ma_dien_dan'] = $ma_dien_dan;
	$ma_chuyen_muc = $data['ma_loai_chuyen_muc'];

	$result = $dt_xl_bai_viet->them($data);
	if($result === false){
		echo 'Lỗi khi đăng bài , vui lòng thử lại sao';
		exit;
	}
	header("Location:/$ma_dien_dan/bai_viet/index?loai=$ma_chuyen_muc");
	exit;
	

}catch(Exception $e){
	echo $e->getMessage();
	exit; 
}