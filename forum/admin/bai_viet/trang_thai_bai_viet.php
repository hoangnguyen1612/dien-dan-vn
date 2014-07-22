<?php
try{
	
	require '../ini.php';
	require '../../classes/xl_bai_viet.php';

	$dt_xl_bai_viet = new xl_bai_viet;

	if(empty($_GET['ma'])){
		throw new Exception('Vui lòng nhập mã bài viết');
		
	}	
	$ma = url_decode($_GET['ma']);

	$bai_viet = $dt_xl_bai_viet->doc(array('ma'=>$ma,'ma_dien_dan'=>$dien_dan['ma']), 'ma_loai_chuyen_muc');

	if($bai_viet == NULL){
		throw new Exception('Bài viết không tồn tại');
	}
	quan_tri_chuyen_muc($bai_viet['ma_loai_chuyen_muc']);
	
	$ma_dien_dan = $dien_dan['ma'];
	
	$result = $dt_xl_bai_viet->cap_nhat_trang_thai_1('trang_thai',"ma = '{$ma}'and ma_dien_dan = '$ma_dien_dan'");
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