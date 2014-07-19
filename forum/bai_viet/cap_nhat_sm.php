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
		$url = "/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/bai_viet/cap_nhat?ma={$data['ma']}";
		throw new Exception('Vui lòng nhập tiêu đề');
	}
	if(empty($data['noi_dung'])){
		$url = "/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/bai_viet/cap_nhat?ma={$data['ma']}";
		throw new Exception('Vui lòng nhập nội dung cho bài viết');
	}
	if(strlen($data['noi_dung']) < 22){
		$url = "/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/bai_viet/cap_nhat?ma={$data['ma']}";
		throw new Exception('Nội dung vui lòng nhiều hơn 10 kí tự');
	}
	$bai_viet = $dt_xl_bai_viet->doc(array('ma_dien_dan'=>$ma_dien_dan,'ma'=>$data['ma']));
	if(!$bai_viet){
		$url = "/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/";
		throw new Exception('Bài viết không tồn tại trong diễn đàn');
	}
	$data['ma_loai_chuyen_muc'] = $bai_viet['ma_loai_chuyen_muc'];
	$data['ngay_tao'] = $bai_viet['ngay_tao'];
	$data['ma_nguoi_dang'] = $ma_nguoi_dung;
	$data['ma_dien_dan'] = $ma_dien_dan;
	$data['luot_xem'] = $bai_viet['luot_xem'];
	$data['thich'] = $bai_viet['thich'];
	$data['trang_thai'] = $bai_viet['trang_thai'];
	
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
	$ma = $data['ma'];
	$result = $dt_xl_bai_viet->cap_nhat($data);
	if($result === false){
		$url = "/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/bai_viet/chi_tiet?ma=$ma";
		throw new Exception('Lỗi vui lòng cập nhật lại sau');
	}
	header("Location:/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/bai_viet/chi_tiet?ma=$ma");
	exit;
	

}catch(Exception $e){
	throwMessage($e,$url);
}