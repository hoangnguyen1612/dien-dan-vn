<?php
try{
	require '../ini.php';
	require '../../classes/xl_bao_cao_bai_viet.php';

	$xl_bao_cao_bai_viet = new xl_bao_cao_bai_viet;
	
	if(empty($_GET['ma'])){
		throw new Exception('Vui lòng nhập mã báo cáo');	
	}			
	
	$ma = url_decode($_GET['ma']);
	
	$bao_cao = $xl_bao_cao_bai_viet->doc(array('ma_dien_dan'=>$ma_dien_dan, 'ma'=>$ma), 'trang_thai, (select ma_loai_chuyen_muc from bai_viet where ma_bai_viet = ma) as ma_loai_chuyen_muc');
	if(!$bao_cao)
	{
		throw new Exception('Mã báo cáo bài viết không hợp lệ');
	}
	
	if($bao_cao['trang_thai']==0)
	{
		throw new Exception('Báo cáo này chưa được xử lý, bạn cần phải xử lý trước khi xóa');
	}
	
	quan_tri_chuyen_muc($bao_cao['ma_loai_chuyen_muc']);

	if(!$xl_bao_cao_bai_viet->xoa(array('ma_dien_dan'=>$ma_dien_dan,'ma'=>$ma)))
	{
		throw new Exception('Đã lỗi trong quá trình xóa báo cáo bình luận bài viết');
	}

	throw new Exception('', 30);
		
}catch (PDOException $e){
	echo $e->getMessage();
	exit;
		
}
catch (Exception $e){
	throwMessage($e);
}