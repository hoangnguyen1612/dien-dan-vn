<?php
try{
	include '../ini.php';
	include '../../classes/xl_cau_hinh.php';
	include '../../classes/xl_dien_dan.php';
	include '../../classes/xl_linh_vuc.php';
	
	quan_tri('cau_hinh_cap_nhat_thong_so');


	$xl_dien_dan = new xl_dien_dan;
	$data = $_POST['data'];

	#Kiểm tra dữ liệu thô
		#Kiểm tra dữ liệu bắt buộc phải có
	
	/*if(empty($data['ten'])){
		throw new Exception('Vui lòng nhập tên diễn đàn');
	} */

	if(empty($data['slogan']) || strlen($data['slogan'])  < 10){
		throw new Exception('Vui lòng nhập tên Slogan và độ dài ít nhất 10 kí tự ');
	}
	if(empty($data['mo_ta']) || strlen($data['mo_ta']) < 10){
		throw new Exception('Vui lòng nhập mô tả và độ dài ít nhất 10 kí tự ');
	}
	/*if(!is_numeric($data['ma_linh_vuc'])){
		throw new Exception('Vui lòng nhập lĩnh vực');
	}*/

	
	/*$xl_linh_vuc = new xl_linh_vuc;
	
	$linh_vuc = $xl_linh_vuc->doc(array('ma'=>$data['ma_linh_vuc']));
	if($linh_vuc == NULL){
		throw new Exception('Lĩnh vực không tồn tại');
	}*/
	$hinh = (isset($_FILES['hinh_dai_dien']['name']))? $_FILES['hinh_dai_dien']['name'] : ""; 
	

	if($hinh!=''){ 
		#Kiểm tra file upload lên có đầy đủ ko
		if($_FILES['hinh_dai_dien']['error']!=0){
			throw new Exception('Lỗi trong quá trình upload hình ảnh , vui lòng kiểm tra lại');
		}
		# Kiểm tra file lớn hơn 200KB thì báo lỗi
		if($_FILES['hinh_dai_dien']['size']>200000){
			throw new Exception('Dung lượng ảnh quá lớn , vui lòng thử lại');
		}
		# Kiểm tra định dạng của file 
		# Sử dụng hàm getimagesize của thư viện gd2 
		if(getimagesize($_FILES['hinh_dai_dien']['tmp_name']) == NULL){
			throw new Exception('Ảnh không đúng định dạng , vui lòng kiểm tra lại');
		}
		$hinh = time().'_'.$hinh;
		move_uploaded_file($_FILES['hinh_dai_dien']['tmp_name'],"../../../home/upload/dien_dan/$hinh");
		unlink("../../../home/upload/dien_dan/".$dien_dan['hinh_dai_dien']);
	}
	
	if($hinh == ''){
		$hinh = $dien_dan['hinh_dai_dien'];
	}
	$data['hinh_dai_dien'] = $hinh;
	/*$data['domain'] = convert_to_slug(trim($data['ten']));*/
	$xl_dien_dan->cap_nhat_dieu_kien($data,array('ma'=>$ma_dien_dan));
	########################################################################
	
	$dbh = NULL;
	throw new Exception("Cập nhật thành công thông số mới , vui lòng bấm trang chủ để xem chi tiết", 30);
	
}catch (PDOException $e){

	echo $e->getMessage();
		
}catch (Exception $e){
	# Đóng kết nối
	$dbh = NULL;
	$url = "/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/admin/cau_hinh/danh_sach_thong_so.php";
	throwMessage($e, $url);
}