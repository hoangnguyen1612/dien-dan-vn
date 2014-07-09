<?php
try{
	require '../ini.php';
	require '../../classes/xl_bao_cao_bai_viet.php';
	$dt_xl_bao_cao_bai_viet = new xl_bao_cao_bai_viet;
	quan_tri('bao_cao_xoa');
	# Kiểm tra mã sữa
	if(empty($_GET['ma'])){
		throw new Exception('Vui lòng nhập mã báo cáo');	
	}			
	
	$ma = $_GET['ma'];
	
	$bao_cao = $dt_xl_bao_cao_bai_viet->doc(array('ma_dien_dan'=>$ma_dien_dan,'ma'=>$ma));
	if ($bao_cao == NULL) {
		throw new Exception('Mã báo cáo không tồn tại');	
	}

	$dt_xl_bao_cao_bai_viet->xoa(array('ma_dien_dan'=>$ma_dien_dan,'ma'=>$ma));

	$dbh=NULL;
	throw new Exception('Xóa thành công dữ liệu',30);	
}catch (PDOException $e){
	echo $e->getMessage();
	exit;
		
}
catch (Exception $e){
	throwMessage($e);
}