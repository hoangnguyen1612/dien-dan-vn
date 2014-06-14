<?php
try{
	require '../ini.php';
	require '../../classes/xl_bao_cao_bai_viet.php';
	$dt_bao_cao_bai_viet = new xl_bao_cao_bai_viet;
	
	# Kiểm tra mã báo cáo
	if(empty($_POST['data'])){
		throw new Exception('Vui lòng chọn báo cáo cần xóa');	
	}			
	
	
	# Tạo vòng lặp , xóa từng báo cáo
	foreach($_POST['data'] as $ma){
		# Kiểm tra logic
		# Kiểm tra mã sữa có tồn tại ko 
		$bao_cao = $dt_bao_cao_bai_viet->doc(array('ma_dien_dan'=>$ma_dien_dan,'ma'=>$ma));
		if ($bao_cao == NULL) {
			throw new Exception('Báo cáo không tồn tại');	
		}
		$dt_bao_cao_bai_viet->xoa(array('ma_dien_dan'=>$ma_dien_dan,'ma'=>$ma));

	}
	$dbh=NULL;
	throw new Exception('Xóa thành công',30);
}catch(PDOException $e){
	echo $e->getMessage();
	exit;
		
}
catch(Exception $e){
	throwMessage($e);	
}

	
	
	
