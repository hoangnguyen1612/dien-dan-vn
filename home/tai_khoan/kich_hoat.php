<?php 
try{
require '../ini.php';

$url = '/';

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

$xl_nguoi_dung->cap_nhat(array('ma_kich_hoat'=>NULL, 'ma'=>$nguoi_dung['ma'], 'trang_thai'=>1));

#thành công
$_SESSION['login'] = $nguoi_dung;

throw new Exception('Chúc mừng bạn đã trở thành thành viên của diendan.vn!');

}catch(Exception $e)
{
	throwMessage($e, $url);
}