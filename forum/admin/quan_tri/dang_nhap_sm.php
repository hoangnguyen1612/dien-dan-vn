<?php
try{
	require '../../../libraries/functions.php';
	require '../../../config.php';

	$dbh = connection();
	$dien_dan = get_subdomain();
	$ma_dien_dan = $dien_dan['ma'];
	
	$url = $_SERVER['HTTP_REFERER'];
	
	require '../../classes/xl_nguoi_dung.php';
	require '../../classes/xl_thanh_vien_dien_dan.php';
	$xl_nguoi_dung = new xl_nguoi_dung;
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	
	if(empty($_POST['data']['email']))
	{
		throw new Exception('Địa chỉ email không được để trống');
	}
	
	if(empty($_POST['data']['mat_khau']))
	{
		throw new Exception('Mật khẩu không được để trống');
	}
	
	$email = $_POST['data']['email'];
	$mat_khau = $_POST['data']['mat_khau'];
	
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
	if($nguoi_dung['trang_thai']==0)
	{
		throw new Exception('Tài khoản của bạn đang tạm khóa, vui lòng gửi liên hệ về ban quản trị Diendan.vn để biết thêm thông tin chi tiết');
	}
	
	$thanh_vien = $xl_thanh_vien_dien_dan->doc(array('ma_dien_dan'=>$ma_dien_dan, 'ma_nguoi_dung'=>$nguoi_dung['ma']));

	if($thanh_vien['loai_thanh_vien']!=0 && $thanh_vien['loai_thanh_vien']!=1)
	{
		throw new Exception('You have not permission at here!!!');
	}
	
	$_SESSION['login'] =$nguoi_dung;
	

	if(isset($_POST['remember']) && $_POST['remember']=='on')
	{
		setcookie('username-forum', $email, time() + 2*24*60*60, '/', NULL);
		setcookie('password-forum', base64_encode($mat_khau), time() + 2*24*60*60, '/', NULL);
	}
	
	$url = "/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/admin/thong_ke/tong_quat.php";
	throw new Exception();
}catch (PDOException $e){

	echo $e->getMessage();
		
}catch (Exception $e){
	throwMessage($e, $url);	
}