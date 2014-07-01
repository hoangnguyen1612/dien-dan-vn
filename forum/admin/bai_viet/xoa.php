<?php
try{
	include("../ini.php");
	require "../../classes/xl_bai_viet.php";
	require '../../classes/xl_binh_luan.php';
	$dt_xl_binh_luan = new xl_binh_luan;
	$dt_xl_bai_viet = new xl_bai_viet;
	
	# Kiểm tra mã sữa
	if(empty($_GET['ma'])){
		throw new Exception('Vui lòng nhập mã bài viết');	
	}			
	
	$ma = $_GET['ma'];

	$bai_viet = $dt_xl_bai_viet->doc(array('ma'=>$ma,'ma_dien_dan'=>$ma_dien_dan));
	if ($bai_viet == NULL) {
		throw new Exception('Mã bài viết không tồn tại');	
	}
	//////
	$dt_xl_binh_luan->xoa(array('ma_bai_viet'=>$ma,'ma_dien_dan'=>$ma_dien_dan));
	$dt_xl_bai_viet->xoa(array('ma'=>$ma,'ma_dien_dan'=>$ma_dien_dan));
	if($bai_viet['file']!=NULL){
		unlink('../../upload/file_upload/'.$bai_viet['file']);
	}
	
	// Xóa file hình
	$dbh=NULL;
	throw new Exception('Cập nhật thành công',30);
}catch (PDOException $e){
	echo $e->getMessage();
	exit;
		
}
catch (Exception $e){
	throwMessage($e);	
}