<?php
try{
	include "../ini.php";
	include "../../../home/classes/xl_thanh_vien_dien_dan.php";
	$dt_xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	#debug($_POST);
	if(empty($_POST['data'])){
		throw new Exception('Vui lòng chọn thành viên cần cập nhật');	
	}
	if(!is_numeric($_POST['loai_thanh_vien'])){
		throw new Exception('Vui lòng nhập loại thành viên để cập nhật');
	}
	if(($_POST['loai_thanh_vien']!=1) && ($_POST['loai_thanh_vien']!=2) && ($_POST['loai_thanh_vien']!=3)){
		throw new Exception('Vui lòng nhập đúng loại thành viên');
	}
	
	$str = ''; // Tạo 1 biến lưu các mã thành viên ko xóa đc
	# Tạo vòng lặp , cập nhật từng loại
	$ma_dien_dan = $_SESSION['dien_dan']['ma'];
	foreach($_POST['data'] as $ma_nguoi_dung){
		# Kiểm tra logic
		# Kiểm tra tồn tại mã thành viên
		$thanh_vien = $dt_xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$ma_nguoi_dung,'ma_dien_dan'=> $_SESSION['dien_dan']['ma']));
		if($thanh_vien['loai_thanh_vien'] == 0){
			$str .= "$ma_nguoi_dung,";
			continue;
		}
		if ($thanh_vien == NULL) {
			$str .= "$ma_nguoi_dung,";
			continue;	
		}
		
		$result = $dt_xl_thanh_vien_dien_dan->cap_nhat_truy_van(array('loai_thanh_vien'=>$_POST['loai_thanh_vien']),"ma_dien_dan = '$ma_dien_dan' and ma_nguoi_dung= '$ma_nguoi_dung'");
	
		if($result===false){
			$str .= "$ma_nguoi_dung,";
			continue;
		}
	}
	if($str == ''){
		$_SESSION['msg']= 'Cập nhật thành công loại thành viên';
		$_SESSION['style_msg'] = 'notification success png_bg';
	}else{
		$_SESSION['msg']= $str .' không cập nhật được';
		$_SESSION['style_msg'] = 'notification success png_bg';
	}
	$dbh=NULL;
	header('Location: danh_sach.php');	
	exit;
}catch(Exception $e){
	$dbh = NULL;
	$_SESSION['msg'] = $e->getMessage();
	$_SESSION['style_msg'] = 'notification error png_bg';
	header('Location: danh_sach.php');		
}

	
	
	
