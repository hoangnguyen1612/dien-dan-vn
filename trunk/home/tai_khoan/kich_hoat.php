<?php 
try{
require '../ini.php';
require '../classes/xl_nguoi_dung.php';

$xl_nguoi_dung = new xl_nguoi_dung;
if(empty($_GET['email']))
{
	throw new Exception('Địa chỉ email không hợp lệ');
}
if(empty($_GET['code']))
{
	throw new Exception('Mã kích hoạt không hợp lệ');
}
$email = $_GET['email'];
$ma_kich_hoat = $_GET['code'];

$nguoi_dung = $xl_nguoi_dung->doc(array('email'=>$email));

if(!$nguoi_dung)
{
	throw new Exception('Địa chỉ email và mã kích hoạt không hợp lệ');
}

if($nguoi_dung['ma_kich_hoat']==NULL)
{
	throw new Exception('Tài khoản của bạn đã được kích hoạt');
}

if(strcmp($ma_kich_hoat, $nguoi_dung['ma_kich_hoat'])!=0)
{
	throw new Exception('Địa chỉ email và mã kích hoạt không hợp lệ');
}

$xl_nguoi_dung->cap_nhat(array('ma_kich_hoat'=>NULL, 'ma'=>$nguoi_dung['ma']));

#thành công
$_SESSION['login'] = $nguoi_dung;

header('Location: /');
exit;

}catch(Exception $e)
{
	header('Location: /');
}