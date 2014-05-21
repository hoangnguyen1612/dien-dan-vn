<?php
/*echo '<pre>';
print_r($_POST);
echo '</pre>';
exit;*/
try{
	include("../ini.php");
	include("../../classes/xl_san_pham.php");
	include("../../classes/xl_loai_san_pham.php");
	

	#Tạo đối tượng xử lý sản phẩm
	$dt_xl_san_pham = new xl_san_pham;
	$dt_xl_loai_san_pham = new xl_loai_san_pham;
	$data = $_POST['data'];
	#Kiểm tra dữ liệu thô
		#Kiểm tra dữ liệu bắt buộc phải có
	if(empty($data['ten'])){
		throw new Exception('Vui lòng nhập tên sản phẩm');
	}
	if(empty($data['ma_loai_san_pham'])){
		throw new Exception('Vui lòng nhập mã loại sản phẩm');
	}
	if(empty($data['don_gia'])){
		throw new Exception('Vui lòng nhập đơn giá sản phẩm');
	}
	if(empty($data['ngay_tao'])){
		throw new Exception('Vui lòng nhập ngày tạo sản phẩm');
	}
	if($data['san_pham_moi']!=0 && $data['san_pham_moi']!=1){
		throw new Exception('Vui lòng nhập trạng thái sản phẩm mới');
	}
	if($data['trang_thai']!=0 && $data['trang_thai'] !=1){
		throw new Exception('Vui lòng nhập trạng thái');
	}
	$ma = $data['ma']; 
	$ten = $data['ten']; 
	$ma_loai_san_pham = $data['ma_loai_san_pham']; 
	$don_gia = $data['don_gia']; 
	$ngay_tao = $data['ngay_tao']; 
	$san_pham_moi = $data['san_pham_moi']; 
	$trang_thai = $data['trang_thai']; 

	
	#Kiểm tra dữ liệu không nhất thiết và có thể gán giá trị là 0 or ""
	$mo_ta_tom_tat = (isset($data['mo_ta_tom_tat'])) ? $data['mo_ta_tom_tat'] : "";
	$mo_ta_chi_tiet = (isset($data['mo_ta_chi_tiet'])) ? $data['mo_ta_chi_tiet'] : "";
	$so_lan_xem = (isset($data['so_lan_xem'])) ? $data['so_lan_xem'] : 0;
	$hinh = (isset($_FILES['hinh']['name']))? $_FILES['hinh']['name'] : ""; 
	# Di chuyển file từ folder tạm sang folder upload của host
	# Kiểm tra nếu có file mới tiến hành move upload
	if($hinh!=''){ 
		#Kiểm tra file upload lên có đầy đủ ko
		if($_FILES['hinh']['error']!=0){
			throw new Exception('Lỗi trong quá trình upload hình ảnh , vui lòng kiểm tra lại');
		}
		# Kiểm tra file lớn hơn 200KB thì báo lỗi
		if($_FILES['hinh']['size']>200000){
			throw new Exception('Dung lượng ảnh quá lớn , vui lòng thử lại');
		}
		# Kiểm tra định dạng của file 
		# Sử dụng hàm getimagesize của thư viện gd2 
		if(getimagesize($_FILES['hinh']['tmp_name']) == NULL){
			throw new Exception('Ảnh không đúng định dạng , vui lòng kiểm tra lại');
		}
		$hinh = time().'_'.$hinh;
		move_uploaded_file($_FILES['hinh']['tmp_name'],"../../upload/san_pham/$hinh");
	}
	#######Kiểm tra logic#########
	
	# Kiểm tra trùng mã sản phẩm
	$san_pham = $dt_xl_san_pham->doc($ma);
	if($san_pham == NULL){
		throw new Exception('Mã sản phẩm không tồn tại , vui lòng kiểm tra lại'); 
	}
	
	
	# Kiểm tra mã loại sản phẩm có tồn tại không
	$row = $dt_xl_loai_san_pham->doc($ma_loai_san_pham);
	if($row == NULL){
		throw new Exception('Mã loại sản phẩm không đúng , vui lòng kiểm tra lại'); 	
	}
	####### Kiểm tra file Hình có rỗng ko ?
	if($hinh == ''){
		$hinh = $san_pham['hinh'];		
	}
	##############################
	# Thêm biến hình cho mảng data 
	$data['hinh'] = $hinh;
	$result = $dt_xl_san_pham->cap_nhat($data);
	/*$result = $sth->execute(array(':Ma_sua'=>$Ma_sua,':Ten_sua'=>$Ten_sua,':Ma_hang_sua'=>$Ma_hang_sua,':Ma_loai_sua'=>$Ma_loai_sua,':Trong_luong'=>$Trong_luong,':Don_gia'=>$Don_gia,':TP_Dinh_Duong'=>$TP_Dinh_Duong,':Loi_ich'=>$Loi_ich,':Hinh'=> $Hinh));*/
	# Lỗi trong quá trình lưu dữ liệu
	if($result === false){
		throw new Exception('Lỗi trong quá trình lưu dữ liệu , vui lòng thử lại');
	}
	#Them thanh cong san pham
	# Đóng kết nối
	$dbh = NULL;
	$_SESSION['msg']= 'Cập nhật thành công sản phẩm mới';
	$_SESSION['style_msg'] = 'notification success png_bg';
	header('Location: danh_sach.php');	
	exit;
}catch (Exception $e){
	# Đóng kết nối
	$dbh = NULL;
	#Lay cau du lieu 
	$_SESSION['msg'] = $e->getMessage();
	$_SESSION['style_msg'] = 'notification error png_bg';
	header('Location:'.$_SERVER['HTTP_REFERER']);	
}