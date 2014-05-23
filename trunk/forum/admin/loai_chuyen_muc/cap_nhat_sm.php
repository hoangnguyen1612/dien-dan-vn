<?php
try{

	include '../ini.php';
	include '../../classes/xl_chuyen_muc.php';
	
	# gan mang? data cho bien $data
	$data = $_POST['data'];

	$dt_xl_chuyen_muc = new xl_chuyen_muc;

	
	#Kiểm tra dữ liệu thô
		#Kiểm tra dữ liệu bắt buộc phải có

	if(empty($data['ten'])){
		throw new Exception('Vui lòng nhập tên chuyên mục');
	}
	if(!is_numeric($data['ma_loai_cha'])){
		throw new Exception('Vui lòng nhập mã loại cha ');
	}
	if(empty($data['thu_tu_hien_thi'])){
		throw new Exception('Vui lòng nhập thứ tự hiển thị');
	}
	#############Kiểm tra xem chuyên mục đó có con hay không ###############
	$chuyen_muc_con = $dt_xl_chuyen_muc->doc(array('ma_loai_cha'=>$data['ma'],'ma_dien_dan'=>'abcd1234'),'*',PDO::FETCH_ASSOC,'');
	if($chuyen_muc_con != NULL){
		$data['ma_loai_cha'] = NULL;
	} 
	########################################################################
	$data['ma_dien_dan'] = $_SESSION['dien_dan']['ma'];

	$chuyen_muc = $dt_xl_chuyen_muc->cap_nhat($data);

	if($chuyen_muc === false){
		throw new Exception('Lỗi trong quá trình lưu dữ liệu , vui lòng thử lại');
	}
	# Đóng kết nối
	$dbh = NULL;
	$_SESSION['msg']= 'Cập nhật thành công chuyên mục';
	$_SESSION['style_msg'] = 'notification success png_bg';
	header('Location: danh_sach.php');	
	exit;	
}catch (PDOException $e){

	echo $e->getMessage();
		
}catch (Exception $e){
	# Đóng kết nối
	$dbh = NULL;
	#Lay cau du lieu 
	$_SESSION['msg'] = $e->getMessage();
	$_SESSION['style_msg'] = 'notification error png_bg';
	header('Location:'.$_SERVER['HTTP_REFERER']);
}