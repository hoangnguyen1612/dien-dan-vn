<?php
try{
	require '../ini.php';
	require '../classes/xl_nguoi_dung.php';
	
	if(empty($_POST['email']))
	{
		throw new Exception('Địa chỉ email không được để trống');
	}
	
	if(empty($_POST['mat_khau']))
	{
		throw new Exception('Mật khẩu không được để trống');
	}
	
	$email = $_POST['email'];
	$mat_khau = $_POST['mat_khau'];
	
	$xl_nguoi_dung = new xl_nguoi_dung;
	$nguoi_dung = $xl_nguoi_dung->doc(array('email'=>$email));
	
	if(!$nguoi_dung)
	{
		throw new Exception('Tài khoản không tồn tại, vui lòng kiểm tra lại');
	}
	if($nguoi_dung['ma_kich_hoat']!=NULL)
	{
		throw new Exception('Tài khoản của bạn chưa được kích hoạt, vui lòng kiểm tra hộp thư mail để kích hoạt tài khoản');
	}
	if(strcmp(md5($email.$mat_khau), $nguoi_dung['mat_khau']))
	{
		throw new Exception('Mật khẩu không đúng, vui lòng kiểm tra lại');
	}
	
	#lưu session
	$_SESSION['login'] = $nguoi_dung;
	
	$return['error'] = false;
	
	echo json_encode($return);
	exit;
	
}catch(Exception $e)
{
	$return['error'] = true;
	$return['message'] = $e->getMessage();
	
	echo json_encode($return);
}