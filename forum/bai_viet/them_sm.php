<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_bai_viet.php';
	include '../classes/xl_thanh_vien_dien_dan.php';
	kiem_tra_quyen();

	$dt_xl_bai_viet = new xl_bai_viet;
	
	$data = $_POST['data'];

	if(empty($data['tieu_de'])){
		throw new Exception('Vui lòng nhập tiêu đề');
	}
	if(empty($data['noi_dung'])){
		throw new Exception('Vui lòng nhập nội dung cho bài viết');
	}
	

	if(strlen($data['noi_dung']) < 22){
		throw new Exception('Nội dung vui lòng nhiều hơn 10 kí tự');
	}
	
	$data['ngay_tao'] = date('Y-m-d H:i:s');
	$data['ma_nguoi_dang'] = $login['ma'];
	$data['ma_dien_dan'] = $ma_dien_dan;
	$ma_chuyen_muc = $data['ma_loai_chuyen_muc'];
	
	$file = (isset($_FILES['file']['name']))? $_FILES['file']['name'] : "";
	
	if($file != ""){
		#Kiểm tra file upload lên có đầy đủ ko
		if($_FILES['file']['error']!=0){
			
			throw new Exception('Lỗi trong quá trình upload hình ảnh , vui lòng kiểm tra lại');
		}
		# Kiểm tra file lớn hơn 200KB thì báo lỗi
		if($_FILES['file']['size']>500000){
			
			throw new Exception('Dung lượng file lớn , vui lòng thử lại');
		}
		
		$file = time().'_'.$file;
		move_uploaded_file($_FILES['file']['tmp_name'],"../upload/file_upload/$file");
		
	}
	$data['file'] = $file;
	
	$result = $dt_xl_bai_viet->them($data);
	if($result === false){
		
		throw new Exception('Lỗi khi đăng bài , vui lòng thử lại sao');
	}
	cong_diem_thanh_vien($login['ma'],$ma_dien_dan,$diem_bai_viet);
	header("Location:/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/bai_viet/danh_sach?loai=$ma_chuyen_muc");
	exit;
	

}catch(Exception $e){
	throwMessage($e);
}