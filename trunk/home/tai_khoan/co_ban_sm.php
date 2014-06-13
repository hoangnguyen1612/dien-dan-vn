<?php
try{
	require '../ini.php';
	require '../classes/xl_nguoi_dung.php';
	
	if(empty($_POST['ho_ten']))
	{
		throw new Exception('Lỗi! Họ tên không được để trống');
	}
	
	if ($_POST['gioi_tinh']!=0 && $_POST['gioi_tinh']!=1){
		throw new Exception('Lỗi! Giới tính chỉ có hai giá trị nam và nữ');
	}
	if (empty($_POST['ngay_sinh'])){
		throw new Exception('Lỗi! Ngày sinh không được để trống');
	}
	$ngay_sinh = date('Y-m-d', strtotime($_POST['ngay_sinh']));
	if($ngay_sinh=='1970-01-01')
	{
		throw new Exception('Lỗi! Ngày sinh bạn đã nhập không đúng định dạng');
	}

	
	$ho_ten = $_POST['ho_ten'];
	$gioi_tinh = $_POST['gioi_tinh'];
	
	$xl_nguoi_dung = new xl_nguoi_dung;
	$nguoi_dung = $xl_nguoi_dung->cap_nhat(array('ma'=>$_SESSION['login']['ma'], 'ho_ten'=>$ho_ten, 'gioi_tinh'=>$gioi_tinh, 'ngay_sinh'=>$ngay_sinh));
	
	$_SESSION['login']['ho_ten'] = $ho_ten;
	$_SESSION['login']['gioi_tinh'] = $gioi_tinh;
	$_SESSION['login']['ngay_sinh'] = $ngay_sinh;
	
	$return['error'] = false;
	$return['message'] = 'Đã cập nhật thông tin thành công';
	echo json_encode($return);
	exit;
	
}catch(Exception $e)
{
	$return['error'] = true;
	$return['message'] = $e->getMessage();
	echo json_encode($return);
}