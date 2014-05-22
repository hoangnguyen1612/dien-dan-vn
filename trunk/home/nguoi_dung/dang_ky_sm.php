<?php
$return = array();

$return['message'] = '';
$return['error'] = false;

if (empty($_POST['ho_ten'])){
	$return['message'] = 'Lỗi! Bạn chưa nhập họ tên';
	$return['ho_ten'] = true;
	$return['error'] = true;
}
if ($_POST['gioi_tinh']!=0 && $_POST['gioi_tinh']!=1){
	$return['message'] = 'Lỗi! Giới tính chỉ có hai giá trị nam và nữ';
	$return['gioi_tinh'] = true;
	$return['error'] = true;
}
if (empty($_POST['ngay_sinh'])){
	$return['message'] = 'Lỗi! Bạn chưa nhập ngày sinh';
	$return['ngay_sinh'] = true;
	$return['error'] = true;
}
$ngay_sinh = date('Y-m-d', strtotime($_POST['ngay_sinh']));
if($ngay_sinh=='1970-01-01')
{
	$return['message'] = 'Lỗi! Ngày sinh bạn đã nhập không đúng định dạng';
	$return['ngay_sinh'] = true;
	$return['error'] = true;
}
if (empty($_POST['email'])){
	$return['message'] = 'Lỗi! Bạn chưa nhập email';
	$return['email'] = true;
	$return['error'] = true;
}
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
	$return['message'] = 'Lỗi! Địa chỉ email không hợp lệ';
	$return['email'] = true;
	$return['error'] = true;
}
if (empty($_POST['mat_khau'])){
	$return['message'] = 'Lỗi! Bạn chưa nhập mật khẩu';
	$return['mat_khau'] = true;
	$return['error'] = true;
}
if (strlen($_POST['mat_khau'])<6){
	$return['message'] = 'Lỗi! Mật khẩu phải có tối thiểu 6 ký tự';
	$return['mat_khau'] = true;
	$return['error'] = true;
}
if (empty($_POST['nhap_lai_mat_khau'])){
	$return['message'] = 'Lỗi! Bạn chưa nhập mật khẩu xác nhận';
	$return['nhap_lai_mat_khau'] = true;
	$return['error'] = true;
}
if (strcmp($_POST['mat_khau'], $_POST['nhap_lai_mat_khau'])!=0){
	$return['message'] = 'Lỗi! Mật khẩu xác nhận không trùng khớp';
	$return['nhap_lai_mat_khau'] = true;
	$return['error'] = true;
}


if($return['error']==false)
{
	$return['message'] = 'Chúc mừng! Bạn đã đăng ký tài khoản thành công, vui lòng kiểm tra hộp thư mail để kích hoạt tài khoản';
	
	require '../ini.php';
	require '../classes/xl_nguoi_dung.php';
	
	$ho_ten = $_POST['ho_ten'];
	$gioi_tinh = $_POST['gioi_tinh'];
	$email  = $_POST['email'];
	$mat_khau = $_POST['mat_khau'];
	$nhap_lai_mat_khau = $_POST['nhap_lai_mat_khau'];
	$ma_kich_hoat = tao_chuoi(20);
	
	
	
	$xl_nguoi_dung = new xl_nguoi_dung;
	$xl_nguoi_dung->them(array('ma'=>tao_chuoi(15), 'mat_khau'=>md5($email.$mat_khau), 'ho_ten'=>$ho_ten, 'gioi_tinh'=>$gioi_tinh, 'ngay_sinh'=>$ngay_sinh,  
	'email'=>$email, 'ma_kich_hoat'=>$ma_kich_hoat));
	
	#send mail
	$mail = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Xác nhận đăng ký thành viên</title>
<style>
input[type=button]:hover,input[type=button]:focus{
	box-shadow:0 0 0 2px white,0 0 0 3px #27AE60;
}
</style>
</head>

<body>
<span style="font-size: 1em">Xin chào,</span>
<p>
	Bạn đã đăng ký tài khoản tại <span style="color: red; font-weight:bold">diendanvn.com.vn</span>, bạn hãy nhấp vào nút xác nhận bên dưới để kích hoạt tài khoản:
</p>
<p style="margin-left: 20%"><a href="http:diendan.vn/nguoi_dung/kich_hoat?email='.$email.'&code='.$ma_kich_hoat.'"

 style="
 	text-align: center;
 	text-decoration: none;
 	display: block;
	width:100px;
	cursor: pointer;
	background: #15A285;
	font-weight: bold;
	color: white;
	border:0 none;
	border-radius:1px;
	cursor:pointer;
	padding:10px 5px;
	margin:10px 5px;">Xác Nhận</a>
	
	</p>
<p>
	Cảm ơn bạn đã đăng ký tài khoản tại website của chúng tôi. Để biết thêm thông tin, vui lòng nhấp <a href="" style="color: #15A285">vào đây</a>
    để gửi những thắc mắc của bạn về ban quản trị của website.
</p>
<p>
	Chúc bạn một ngày tốt lành!
</p>
<p>
	Trân trọng!<br />
    <span style="color: red; font-weight:bold">diendanvn.com.vn</span>
</p>
</body>
</html>
';
	
	require '../libraries/send_gmail/send_gmail.php';
	send_gmail('nt.hoang1612@gmail.com', 'hoangit1612', $email, $ho_ten, 'Kích hoạt tài khoản', $mail, NAME_WEBSITE);
}


echo json_encode($return);

