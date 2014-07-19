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
	if(empty($data['ma'])){
		throw new Exception ('Vui lòng nhập mã bình luận');
		
	}
	$binh_luan = $dt_xl_binh_luan->doc(array('ma'=>$data['ma'],'ma_dien_dan'=>$ma_dien_dan));
	
	
	if($binh_luan==NULL){
		throw new Exception ( 'Bình luận không tồn tại');
		
	}
	$data['ma_bai_viet'] = $binh_luan['ma_bai_viet'];
	$data['ngay_tao'] = $binh_luan['ngay_tao'];
	$data['ma_nguoi_dung'] = $ma_nguoi_dung;
	$data['ma_dien_dan'] = $ma_dien_dan;
	$data['thich'] = $binh_luan['thich'];
	$data['dung'] = $binh_luan['dung'];
	$data['giup_ich'] = $binh_luan['giup_ich'];
	$data['ma_loai_cha'] = $binh_luan['ma_loai_cha'];
	
	

	$result = $dt_xl_binh_luan->cap_nhat($data);
	if($result === false){
		throw new Exception('Lỗi cập nhật bình luận , vui lòng thử lại sau');
		
	}
	$ma_bai_viet = $data['ma_bai_viet'];
	header("Location:/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/bai_viet/chi_tiet?ma=$ma_bai_viet#{$binh_luan['ma']}{$binh_luan['ma_bai_viet']}");
	exit;
	

}catch(Exception $e){
	throwMessage($e,"/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}");
}