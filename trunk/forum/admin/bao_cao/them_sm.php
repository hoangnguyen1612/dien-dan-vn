<?php
try{
	require '../ini.php';
	require '../../classes/xl_thong_bao.php';
	require '../../classes/xl_bai_viet.php';
	require '../../classes/xl_thanh_vien_dien_dan.php';
	$data = $_POST['data'];
	if(empty($data['ma_bai_viet'])){
		throw new Exception('Vui lòng nhập mã bài viết');
	}
	if(empty($data['ma_nguoi_dang'])){
		throw new Exception('Vui lòng nhập mã người viết bài');
	}
	if(empty($data['noi_dung'])){
		throw new Exception('Vui lòng nhập nội dung');
	}
	$dt_xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	$dt_xl_bai_viet = new xl_bai_viet;
	$dt_xl_thong_bao = new xl_thong_bao;
	
	$bai_viet = $dt_xl_bai_viet->doc(array('ma'=>$data['ma_bai_viet'],'ma_dien_dan'=>$ma_dien_dan));
	if($bai_viet == NULL){
		throw new Exception('Bài viết không tồn tại trong diễn đàn');
	}
	$thanh_vien = $dt_xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$data['ma_nguoi_dang'],'ma_dien_dan'=>$ma_dien_dan));
	if($thanh_vien == NULL){
		throw new Exception('Thành viên không tồn tại trong diễn đàn');
	}
	// loại 3 : gửi thông báo cảnh cáo đến thành viên diễn đàn
	$result = $dt_xl_thong_bao->them(array('loai_thong_bao'=>3,'gui_tu'=>$ma_nguoi_dung,'gui_den'=>$data['ma_nguoi_dang'],'ma_dien_dan'=>$ma_dien_dan,'trang_thai'=>0,'noi_dung'=>"Bài viết : '{$bai_viet['tieu_de']}' của bạn đã vi phạm nội quy của diễn đàn . Lí do : {$data['noi_dung']}",'ngay_tao'=>date('Y-m-d h:i:s'),'duong_dan'=>""));
	if($result === false){
		throw new Exception('Đã có lỗi trong quá trình lưu');
	}
	throw new Exception('Thông báo đã được gửi đến thành viên của diễn đàn',30);
	
	
	
	
}catch(Exception $e){
	throwMessage($e);
}