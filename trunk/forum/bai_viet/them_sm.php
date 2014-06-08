<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_bai_viet.php';
	include '../classes/xl_thanh_vien_dien_dan.php';
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
	
	$data['ngay_tao'] = date('Y-m-d H:i:s');
	$data['ma_nguoi_dang'] = $login['ma'];
	$data['ma_dien_dan'] = $ma_dien_dan;
	$ma_chuyen_muc = $data['ma_loai_chuyen_muc'];
	
	$result = $dt_xl_bai_viet->them($data);
	if($result === false){
		echo 'Lỗi khi đăng bài , vui lòng thử lại sao';
		exit;
	}
	cong_diem_thanh_vien($login['ma'],$ma_dien_dan,$diem_bai_viet);
	header("Location:/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/bai_viet/danh_sach?loai=$ma_chuyen_muc");
	exit;
	

}catch(Exception $e){
	$_SESSION['message']['type'] = 'error';
	$_SESSION['message']['content'] =  $e->getMessage();
	header("Location: /$ma_dien_dan");
}