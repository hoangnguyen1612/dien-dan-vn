<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_binh_luan.php';
	include '../classes/xl_bai_viet.php';

	kiem_tra_quyen();

	$dt_xl_binh_luan = new xl_binh_luan;
	$dt_xl_bai_viet = new xl_bai_viet;
	$data = $_POST['data'];
	if(empty($data['tieu_de'])){
		throw new Exception ('Vui lòng nhập tên cho bình luận');
	}
	if(empty($data['noi_dung'])){
		throw new Exception ( 'Vui lòng nhập nội dung cho bình luận');
		
	}
	if(empty($data['ma_bai_viet'])){
		throw new Exception ('Vui lòng nhập mã bài viết');
		
	}
	$row = $dt_xl_bai_viet->doc(array('ma'=>$data['ma_bai_viet'],'ma_dien_dan'=>$ma_dien_dan));
	if($row=NULL){
		throw new Exception ( 'Bài viết không tồn tại');
		
	}
	
	$data['ngay_tao'] = date('Y-m-d h:i:s');
	$data['ma_nguoi_dung'] = $login['ma'];
	$data['ma_dien_dan'] = $ma_dien_dan;

	$result = $dt_xl_binh_luan->them($data);
	if($result === false){
		throw new Exception('Lỗi khi đăng bài , vui lòng thử lại sau');
		
	}
	$ma_bai_viet = $data['ma_bai_viet'];
	header("Location:/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/bai_viet/chi_tiet?ma=$ma_bai_viet");
	exit;
	

}catch(Exception $e){
	$_SESSION['message']['type'] = 'error';
	$_SESSION['message']['content'] =  $e->getMessage();
	header("Location: {$_SERVER['HTTP_REFERER']}"); 
}