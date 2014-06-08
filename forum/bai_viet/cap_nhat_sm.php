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
	$bai_viet = $dt_xl_bai_viet->doc(array('ma_dien_dan'=>$ma_dien_dan,'ma'=>$data['ma']));
	if(!$bai_viet){
		echo 'Bài viết không tồn tại';
		exit;
	}
	$data['ma_loai_chuyen_muc'] = $bai_viet['ma_loai_chuyen_muc'];
	$data['ngay_tao'] = $bai_viet['ngay_tao'];
	$data['ma_nguoi_dang'] = $ma_nguoi_dung;
	$data['ma_dien_dan'] = $ma_dien_dan;
	$data['luot_xem'] = $bai_viet['luot_xem'];
	$data['thich'] = $bai_viet['thich'];
	$data['trang_thai'] = $bai_viet['trang_thai'];
	$ma = $data['ma'];
	$result = $dt_xl_bai_viet->cap_nhat($data);
	if($result === false){
		echo 'Lỗi cập nhật bài viết , vui lòng thử lại sao';
		exit;
	}
	header("Location:/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/bai_viet/chi_tiet?ma=$ma");
	exit;
	

}catch(Exception $e){
	$_SESSION['message']['type'] = 'error';
	$_SESSION['message']['content'] =  $e->getMessage();
	header("Location: /$ma_dien_dan");
}