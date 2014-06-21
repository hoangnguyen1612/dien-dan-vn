<?php
try{
	include '../ini.php';
	include '../classes/xl_lien_he.php';
	$xl_lien_he = new xl_lien_he;
	
	if(empty($_POST['data']))
	{
		throw new Exception('Lỗi! Dữ liệu không hợp lệ');
	}
	$data = $_POST['data'];
	$_SESSION['data'] = $data;
	
	if(empty($data['ho_ten']))
	{
		throw new Exception('Vui lòng nhập họ tên');
	}
	if(empty($data['email']))
	{
		throw new Exception('Vui lòng nhập địa chỉ email');
	}
	if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
	{
		throw new Exception('Địa chỉ email không hợp lệ');
	}
	if(empty($data['tieu_de']))
	{
		throw new Exception('Vui lòng nhập tiêu đề');
	}
	if(empty($data['noi_dung']))
	{
		throw new Exception('Vui lòng nhập nội dung');
	}
	if(empty($_POST['captcha']))
	{
		throw new Exception('Vui lòng nhập mã bảo vệ');
	}
	if(strcmp($_SESSION['captcha'], $_POST['captcha'])!=0)
	{
		throw new Exception('Mã bảo vệ không hợp lệ');
	}
	$data['trang_thai'] = 0;
	$data['ngay_tao'] = date('Y-m-d H:i:s');
	if(!$xl_lien_he->them($data))
	{
		throw new Exception('Đã có lỗi trong quá trình gửi liên hệ, vui lòng liên hệ ban quản trị để được giải quyết');
	}
	
	include '../end.php';
	throw new Exception('Cảm ơn bạn đã gửi liên hệ về DienDanVN, chúng tôi sẽ tiếp nhận và phản hồi lại bạn trong thời gian sớm nhất', 30);
	
}catch(Exception $e)
{
	throwMessage($e);
}