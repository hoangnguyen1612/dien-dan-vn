<?php
try{
	require '../ini.php';
	require '../../classes/xl_thong_bao.php';
	require '../../classes/xl_thanh_vien_dien_dan.php';
	require '../../classes/xl_binh_luan.php';

	if(empty($_GET['ma_nguoi_bao_cao'])){
		throw new Exception('Vui lòng nhập mã người báo cáo sai phạm');
	}
	if(empty($_GET['ma_binh_luan'])){
		throw new Exception('Vui lòng nhập bình luận bị báo cáo sai phạm');
	}
	$dt_xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	$dt_xl_thong_bao = new xl_thong_bao;
	$dt_xl_binh_luan = new xl_binh_luan;
	
	$binh_luan = $dt_xl_binh_luan->doc(array('ma'=>$_GET['ma_binh_luan'],'ma_dien_dan'=>$ma_dien_dan));
	if($binh_luan == NULL){
		throw new Exception('Bài viết không tồn tại trong diễn đàn');
	}
	$thanh_vien = $dt_xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$_GET['ma_nguoi_bao_cao'],'ma_dien_dan'=>$ma_dien_dan));
	if($thanh_vien == NULL){
		throw new Exception('Thành viên không tồn tại trong diễn đàn');
	}
	// loai_thong_bao : 2 Gửi thông báo đã xử lý báo cáo sai phạm
	$result = $dt_xl_thong_bao->them(array('loai_thong_bao'=>2,'gui_tu'=>$ma_nguoi_dung,'gui_den'=>$_GET['ma_nguoi_bao_cao'],'ma_dien_dan'=>$ma_dien_dan,'trang_thai'=>0,'noi_dung'=>"Báo cáo sai phạm của bạn ở bài viết :{$binh_luan['tieu_de']} đã được xử lý",'ngay_tao'=>date('Y-m-d h:i:s'),'duong_dan'=>"/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/bai_viet/chi_tiet?ma={$binh_luan['ma_bai_viet']}#{$binh_luan['ma']}{$binh_luan['ma_bai_viet']}"));
	if($result === false){
		throw new Exception('Lỗi trong quá trình cập nhật');
	}
	throw new Exception('Đã gửi thông báo xử lý vi phạm đến người báo cáo',30);
}catch(Exception $e){
	throwMessage($e);
}
