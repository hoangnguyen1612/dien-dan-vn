<?php
try{
	require '../ini.php';
	require '../../classes/xl_chuyen_muc.php';

	quan_tri('loai_chuyen_muc_cap_nhat');

	$dt_xl_chuyen_muc = new xl_chuyen_muc;


	if(empty($_GET['ma'])){
		throw new Exception('Vui lòng nhập mã');
	}	

	$chuyen_muc = $dt_xl_chuyen_muc->doc(array('ma'=>$_GET['ma'],'ma_dien_dan'=>$_SESSION['dien_dan']['ma']));
	if($chuyen_muc == NULL){
		throw new Exception('Chuyên mục không tồn tại');
	}
	
	$ma_dien_dan = $_SESSION['dien_dan']['ma'];
	$result = $dt_xl_chuyen_muc->cap_nhat_trang_thai($_GET['ma'],'rieng_tu',"and ma_dien_dan = '$ma_dien_dan'");
	if($result === false){
		throw new Exception('Lỗi trong quá trình lưu dữ liệu , vui lòng thử lại');
	}
	
	throw new Exception('', 30);	
}catch (PDOException $e){

	echo $e->getMessage();
		
}catch (Exception $e){
	throwMessage($e);	
}