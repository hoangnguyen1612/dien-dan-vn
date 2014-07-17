<?php
try{
	include '../../../config.php';
	include '../../../libraries/functions.php';
	include '../../classes/xl_admin.php';

	$dbh = connection();
	
	# lưu session thông tin đăng nhập
	$_SESSION['ten_dang_nhap'] = $_POST['ten_dang_nhap'];
	$_SESSION['mat_khau'] = $_POST['mat_khau'];
		
	#Kiem tra du lieu dau vao
	if(empty($_POST['ten_dang_nhap']))
	{
		throw new Exception('Vui lòng nhập tên đăng nhập!');
	}
	if(empty($_POST['mat_khau']))
	{
		throw new Exception('Vui lòng nhập mật khẩu!');
	}

	# lấy dữ liệu
	$ten_dang_nhap = $_POST['ten_dang_nhap'];
	$mat_khau = $_POST['mat_khau'];
	
	$xl_admin = new xl_admin;

	if(!$admin = $xl_admin->doc(array('username'=>$ten_dang_nhap)))
	{
		throw new Exception('Sai thông tin đăng nhập');
	}

	if(strcmp(md5($ten_dang_nhap.$mat_khau), $admin['password']))
	{
		throw new Exception('Sai thông tin đăng nhập');
	}
	
	########################## luu cookie
	
	if (isset($_POST['remember'])) {
		setcookie('username', $_POST['ten_dang_nhap'], time() + 2*24*60*60);
		setcookie('password', base64_encode($_POST['mat_khau']), time() + 2*24*60*60);		
	}

	#Cap nhat lan dang nhap cuoi chinh la gio hien tai cho user nay
	$xl_admin->cap_nhat_dieu_kien(array('lan_dang_nhap_cuoi'=>date('Y-m-d H:i:s')), array('ma'=>$admin['ma']));
	
	
	$_SESSION['LOGIN']='OK';
	
	#lấy thông tin người dùng
	$_SESSION['admin']=$admin;
	
	if(isset($_SESSION['URL']))
	{
		header('Location: '.$_SESSION['URL']);
		unset($_SESSION['URL']);
		exit;
	}

	header('Location: ../thong_ke/luot_truy_cap.php');
	
}catch(Exception $e)
{
	throwMessage($e);
}
?>