<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_bai_viet.php';
	include '../classes/xl_thanh_vien_dien_dan.php';
	kiem_tra_quyen();

	$dt_xl_bai_viet = new xl_bai_viet;
	
	$data = $_POST['data'];
	if(empty($data['tieu_de'])){
		$url = "/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/bai_viet/cap_nhat?ma={$data['ma']}";
		throw new Exception('Vui lòng nhập tiêu đề');
	}
	if(empty($data['noi_dung'])){
		$url = "/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/bai_viet/cap_nhat?ma={$data['ma']}";
		throw new Exception('Vui lòng nhập nội dung cho bài viết');
	}
	$bai_viet = $dt_xl_bai_viet->doc(array('ma_dien_dan'=>$ma_dien_dan,'ma'=>$data['ma']));
	if(!$bai_viet){
		$url = "/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/";
		throw new Exception('Bài viết không tồn tại trong diễn đàn');
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
		$url = "/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/bai_viet/chi_tiet?ma=$ma";
		throw new Exception('Lỗi vui lòng cập nhật lại sau');
	}
	header("Location:/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/bai_viet/chi_tiet?ma=$ma");
	exit;
	

}catch(Exception $e){
	throwMessage($e,$url);
}