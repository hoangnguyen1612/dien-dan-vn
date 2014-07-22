<?php
try{
	require '../ini.php';
	require '../../classes/xl_bao_cao_binh_luan.php';
	require '../../classes/xl_chuyen_muc.php';
	$dt_bao_cao_binh_luan = new xl_bao_cao_binh_luan;
	$xl_chuyen_muc  = new xl_chuyen_muc;
	# Kiểm tra mã báo cáo
	if(empty($_POST['data'])){
		throw new Exception('Vui lòng chọn báo cáo cần xóa');	
	}			
	
	
	# Tạo vòng lặp , xóa từng báo cáo
	$str_ko_xoa_dc = '';
	foreach($_POST['data'] as $ma){
		$ma = post_decode($ma);
		$quyen_chuyen_muc = quyen_chuyen_muc();
		$bao_cao = $dt_bao_cao_binh_luan->doc(array('ma_dien_dan'=>$ma_dien_dan,'ma'=>$ma),'(Select ma_bai_viet from binh_luan_bai_viet where binh_luan_bai_viet.ma = bao_cao_binh_luan.ma_binh_luan) ma_bai_viet,(select ma_loai_chuyen_muc from bai_viet where ma_bai_viet = bai_viet.ma) as ma_loai_chuyen_muc');
		if ($bao_cao == NULL) {
			throw new Exception('Báo cáo không tồn tại');	
		}
		if($thanh_vien['loai_thanh_vien'] == 1){
			if(strpos($quyen_chuyen_muc['ma'],$bao_cao['ma_loai_chuyen_muc'])===false){
				$str_ko_xoa_dc .= "$ma,";
				continue;
			}				
		}
		if(!$dt_bao_cao_binh_luan->xoa(array('ma_dien_dan'=>$ma_dien_dan,'ma'=>$ma))){
				$str_ko_xoa_dc .= "$ma,";
		}
	}
	if($str_ko_xoa_dc != ''){
		$str_ko_xoa_dc = rtrim($str_ko_xoa_dc,',');
		throw new Exception("Các mã sau không xóa được :".$str_ko_xoa_dc);
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

	
	
	
