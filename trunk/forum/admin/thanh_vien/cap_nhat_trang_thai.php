<?php
try{
	require '../ini.php';
	require '../../classes/xl_thong_bao.php';
	quan_tri('thanh_vien_cap_nhat');
	
	
	$xl_thong_bao = new xl_thong_bao;
	#Kiểm tra dữ liệu thô
		#Kiểm tra dữ liệu bắt buộc phải có
	if(empty($_GET['ma'])){
		throw new Exception('Vui lòng nhập mã thành viên');
	}	
	#######Kiểm tra logic########
	$ma_thanh_vien_dien_dan = url_decode($_GET['ma']); 
	$thanh_vien = $xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$ma_thanh_vien_dien_dan,'ma_dien_dan'=>$ma_dien_dan));
	if($thanh_vien == NULL){
		throw new Exception('Thành viên không tồn tại');
	}
	
	$result = $xl_thanh_vien_dien_dan->cap_nhat_trang_thai_1('trang_thai',"ma_nguoi_dung = '$ma_thanh_vien_dien_dan' and ma_dien_dan = '$ma_dien_dan'");
	if($result === false){
		throw new Exception('Đã có lỗi trong quá trình lưu dữ liệu , vui lòng thử lại');
	}
	$thanh_vien_sau_update = $xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$ma_thanh_vien_dien_dan,'ma_dien_dan'=>$ma_dien_dan));
	if($thanh_vien_sau_update['trang_thai'] == 0){
		if(!$result = $xl_thong_bao->them(array('loai_thong_bao'=>3, 'gui_tu'=>$ma_nguoi_dung, 'gui_den'=>$ma_thanh_vien_dien_dan, 'ma_dien_dan'=>$ma_dien_dan,'trang_thai'=>0, 'noi_dung'=>"Tài khoản của bạn đã bị khóa. Vui lòng liên hệ tới quản trị diễn đàn để biết thêm chi tiết", 'ngay_tao'=>date('Y-m-d h:i:s'), 'duong_dan'=>"/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/")))
		{
			throw new Exception('Lỗi nội dung gửi thông báo khóa tài khoản thành viên');
		}
	}
	if($thanh_vien_sau_update['trang_thai'] == 1){
		if(!$result = $xl_thong_bao->them(array('loai_thong_bao'=>3, 'gui_tu'=>$ma_nguoi_dung, 'gui_den'=>$ma_thanh_vien_dien_dan, 'ma_dien_dan'=>$ma_dien_dan,'trang_thai'=>0, 'noi_dung'=>"Tài khoản của bạn đã được kích hoạt lại", 'ngay_tao'=>date('Y-m-d h:i:s'), 'duong_dan'=>"/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/")))
		{
			throw new Exception('Lỗi nội dung gửi thông báo khóa tài khoản thành viên');
		}
	}
	# Đóng kết nối
	$dbh = NULL;
	throw new Exception('Cập nhật trạng thái thành công', 30);
}catch (PDOException $e){

	echo $e->getMessage();
		
}catch (Exception $e){
	throwMessage($e);
}