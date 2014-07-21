<?php
try{
	include '../ini.php';
	include '../../classes/xl_cau_hinh.php';
	
	quan_tri('cau_hinh_cap_nhat_mau_sac');
	
	# gan mang? data cho bien $data

	$xl_cau_hinh = new xl_cau_hinh;
	$_POST['noi_quy'] = 'blue';
	
	#Kiểm tra dữ liệu thô
		#Kiểm tra dữ liệu bắt buộc phải có

	if(empty($_POST['trang_chu'])){
		throw new Exception('Vui lòng nhập màu sắc trang chủ');
	}
	if(empty($_POST['thanh_vien'])){
		throw new Exception('Vui lòng nhập màu sắc thành viên');
	}
	if(empty($_POST['phan_hoi'])){
		throw new Exception('Vui lòng nhập màu sắc phản hồi');
	}
	if(empty($_POST['cap_bac'])){
		throw new Exception('Vui lòng nhập màu sắc cấp bậc');
	}
	
	#############Kiểm tra xem chuyên mục đó có con hay không ###############
	
	########################################################################
	$data_mau_sac['noi_dung'] = $_POST['trang_chu'].','.$_POST['thanh_vien'].','.$_POST['phan_hoi'].','.$_POST['cap_bac'];
	$xl_cau_hinh->cap_nhat_dieu_kien($data_mau_sac,array('tu_khoa'=>'MAU_MENU','ma_dien_dan'=>$ma_dien_dan));
	$dbh = NULL;
	throw new Exception("Cập nhật thành công màu sắc mới, bấm vào trang chủ để xem chi tiết", 30);
	
}catch (PDOException $e){

	echo $e->getMessage();
		
}catch (Exception $e){
	# Đóng kết nối
	$dbh = NULL;
	throwMessage($e, $url);
}