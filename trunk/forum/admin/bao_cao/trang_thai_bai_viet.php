<?php
try{
	
	require '../ini.php';
	require '../../classes/xl_bai_viet.php';

	#quan_tri('thanh_vien_cap_nhat');

	$dt_xl_bai_viet = new xl_bai_viet;

	
	#Kiểm tra dữ liệu thô
		#Kiểm tra dữ liệu bắt buộc phải có
	if(empty($_GET['ma'])){
		throw new Exception('Vui lòng nhập mã bài viết');
		
	}	
	#######Kiểm tra logic########
	$bai_viet = $dt_xl_bai_viet->doc(array('ma'=>$_GET['ma'],'ma_dien_dan'=>$dien_dan['ma']));
	if($bai_viet == NULL){
		throw new Exception('Bài viết không tồn tại');
		
	}
	
	$ma_dien_dan = $dien_dan['ma'];
	
	$result = $dt_xl_bai_viet->cap_nhat_trang_thai_1('trang_thai',"ma = '{$_GET['ma']}'and ma_dien_dan = '$ma_dien_dan'");
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