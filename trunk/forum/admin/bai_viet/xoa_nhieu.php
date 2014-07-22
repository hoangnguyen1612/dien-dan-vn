<?php
try{
	include '../ini.php';
	include("../../classes/xl_bai_viet.php");
	$dt_bai_viet = new xl_bai_viet;
	
	# Kiểm tra mã bài viết
	if(empty($_POST['data'])){
		throw new Exception('Vui lòng chọn bài viết cần xóa');	
	}			
	
	
	foreach($_POST['data'] as $ma){

		$ma = post_decode($ma); 

		$row = $dt_bai_viet->doc(array('ma'=>$ma,'ma_dien_dan'=>$ma_dien_dan));
		if ($row == NULL) {
			throw new Exception('Mã bài viết không tồn tại');	
		}
		$dt_bai_viet->xoa(array('ma'=>$ma,'ma_dien_dan'=>$ma_dien_dan));

		if($row['file'] != NULL){
			unlink('../../upload/file_upload/'.$row['file']);
		}
	}
	$dbh=NULL;
	throw new Exception('',30);	
	exit;
}catch(PDOException $e){
	echo $e->getMessage();
	exit;
		
}
catch(Exception $e){
	$dbh = NULL;
	throwMessage($e);	
}

	
	
	
