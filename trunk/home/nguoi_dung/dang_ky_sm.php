<?php 
try{
	require '../ini.php';
	require '../classes/xl_nguoi_dung.php';
	require '../../libraries/send_gmail/send_gmail.php';
	$xl_nguoi_dung = new xl_nguoi_dung;
	
	$url = '';
	$_SESSION['data'] = $_POST['data'];
	
	if (empty($_POST['data']['ho'])){
		throw new Exception('Vui lòng nhập đầy đủ họ tên');
	}
	if (empty($_POST['data']['ten'])){
		throw new Exception('Vui lòng nhập đầy đủ họ tên');
	}
	if ($_POST['data']['gioi_tinh']!=0 && $_POST['data']['gioi_tinh']!=1){
		throw new Exception('Lỗi! [Giới tính] không hợp lệ');
	}
	if (empty($_POST['data']['ngay_sinh'])){
		throw new Exception('Vui lòng nhập ngày sinh');
	}
	$ngay_sinh = date('Y-m-d', strtotime($_POST['data']['ngay_sinh']));
	if($ngay_sinh=='1970-01-01')
	{
		throw new Exception('Lỗi! [Ngày sinh] không đúng định dạng');
	}
	if (empty($_POST['data']['email'])){
		throw new Exception('Vui lòng nhập địa chỉ Email');
	}
	if(!filter_var($_POST['data']['email'], FILTER_VALIDATE_EMAIL))
	{
		throw new Exception('Lỗi! [Địa chỉ Email] không hợp lệ');
	}
	if (empty($_POST['data']['mat_khau'])){
		throw new Exception('Vui lòng nhậpmật khẩu');
	}
	if (strlen($_POST['data']['mat_khau'])<6){
		throw new Exception('Lỗi! [Mật khẩu] phải có tối thiểu 6 ký tự');
	}
	if (empty($_POST['data']['nhap_lai_mat_khau'])){
		throw new Exception('Vui lòng nhập mật khẩu xác nhận');
	}
	if (strcmp($_POST['data']['mat_khau'], $_POST['data']['nhap_lai_mat_khau'])!=0){
		throw new Exception('Lỗi! [Mật khẩu xác nhận] không trùng khớp với mật khẩu đã nhập');
	}
	if (!in_array($_POST['data']['nghe_nghiep'], array(0, 1, 2, 3))){
		throw new Exception('Lỗi! [Nghề nghiệp] không hợp lệ');
	}
	if($xl_nguoi_dung->doc(array('email'=>$_POST['data']['email']), 'ma'))
	{
		throw new Exception('Địa chỉ Email đã được dùng để đăng ký tài khoản, vui lòng chọn một Email khác');
	}
	
	$dbh->beginTransaction();
		
	$ho = $_POST['data']['ho'];
	$ten = $_POST['data']['ten'];
	$gioi_tinh = $_POST['data']['gioi_tinh'];
	$email  = $_POST['data']['email'];
	$mat_khau = $_POST['data']['mat_khau'];
	$nhap_lai_mat_khau = $_POST['data']['nhap_lai_mat_khau'];
	$ma_kich_hoat = tao_chuoi(20);
	$nghe_nghiep = array(0=>'Học sinh', 1=>'Sinh viên', 2=>'Nhân viên văn phòng', 3=>'Khác');
	if($gioi_tinh==0)
	{
		$avatar = 'no_avatar_male.jpg';
	}
	else
	{
		$avatar = 'no_avatar_female.jpg';
	}
		
	
	$xl_nguoi_dung->them(array('ma'=>tao_chuoi(15), 'mat_khau'=>md5($email.$mat_khau), 'ho'=>$ho, 'ten'=>$ten, 'gioi_tinh'=>$gioi_tinh, 'ngay_sinh'=>$ngay_sinh,  
	'email'=>$email, 'ma_kich_hoat'=>$ma_kich_hoat, 'hinh_dai_dien'=>$avatar, 'ngay_tham_gia'=>date('Y-m-d'), 'nghe_nghiep'=>$nghe_nghiep[$_POST['data']['nghe_nghiep']]));
		
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
		
		
	send_gmail('nt.hoang1612@gmail.com', 'hoangit1612', $email, $ho_ten, 'Kích hoạt tài khoản', $mail, NAME_WEBSITE);

	unset($_SESSION['data']);
	
	$dbh->commit();
	$url = '/';
	
	throw new Exception('Chúc mừng bạn đã đăng tài khoản thành công! Vui lòng kiểm tra hộp thư mail để kích hoạt tài khoản', 30);
	
}catch(Exception $e)
{
	throwMessage($e, $url);
}

