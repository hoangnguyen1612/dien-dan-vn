<?php
try{
	
	require '../ini.php';
	require '../../classes/xl_binh_luan.php';

	quan_tri('bao_cao_cap_nhat_trang_thai_binh_luan');

	$dt_xl_binh_luan = new xl_binh_luan;

	
	#Kiểm tra dữ liệu thô
		#Kiểm tra dữ liệu bắt buộc phải có
	if(empty($_GET['ma'])){
		throw new Exception('Vui lòng nhập mã bình luận');
		
	}	
	#######Kiểm tra logic########
	$binh_luan = $dt_xl_binh_luan->doc(array('ma'=>$_GET['ma'],'ma_dien_dan'=>$dien_dan['ma']));
	if($binh_luan == NULL){
		throw new Exception('bình luận không tồn tại');
		
	}
	
	$ma_dien_dan = $dien_dan['ma'];
	
	$result = $dt_xl_binh_luan->cap_nhat_trang_thai_1('trang_thai',"ma = '{$_GET['ma']}'and ma_dien_dan = '$ma_dien_dan'");
	if($result === false){
		throw new Exception('Lỗi trong quá trình lưu dữ liệu , vui lòng thử lại');
	}
	#Them thanh cong san pham
	# Đóng kết nối
	$dbh = NULL;
	throw new Exception('Cập nhật thành công',30);	
}catch (PDOException $e){

	echo $e->getMessage();
		
}catch (Exception $e){
	# Đóng kết nối
	$dbh = NULL;
	#Lay cau du lieu 
	throwMessage($e);	
}