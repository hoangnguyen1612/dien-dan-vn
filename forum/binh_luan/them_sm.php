<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_binh_luan.php';
	include '../classes/xl_bai_viet.php';


	$dt_xl_binh_luan = new xl_binh_luan;
	$dt_xl_bai_viet = new xl_bai_viet;
	$data = $_POST['data'];
	if(empty($data['tieu_de'])){
		echo 'Vui lòng nhập tên cho bình luận';
		exit;
	}
	if(empty($data['noi_dung'])){
		echo 'Vui lòng nhập nội dung cho bình luận';
		exit;
	}
	if(empty($data['ma_bai_viet'])){
		echo 'Vui lòng nhập mã bài viết';
		exit;
	}
	$row = $dt_xl_bai_viet->doc(array('ma'=>$data['ma_bai_viet'],'ma_dien_dan'=>$ma_dien_dan));
	if($row=NULL){
		echo 'Bài viết không tồn tại';
		exit;
	}
	
	$data['ngay_tao'] = date('Y-m-d h:i:s');
	$data['ma_nguoi_dung'] = $login['ma'];
	$data['ma_dien_dan'] = $ma_dien_dan;
	
	$result = $dt_xl_binh_luan->them($data);
	if($result === false){
		echo 'Lỗi khi đăng bài , vui lòng thử lại sao';
		exit;
	}
	$ma_bai_viet = $data['ma_bai_viet'];
	header("Location:/$ma_dien_dan/bai_viet/chi_tiet?ma=$ma_bai_viet");
	exit;
	

}catch(Exception $e){
	echo $e->getMessage();
	exit; 
}