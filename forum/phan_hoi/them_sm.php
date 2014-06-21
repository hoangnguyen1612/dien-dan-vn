<?php
try{
	include '../ini.php';
	include '../classes/xl_feedback_dien_dan.php';
	include '../classes/xl_dien_dan.php';
	
	$xl_feedback_dien_dan = new xl_feedback_dien_dan;
	$xl_dien_dan = new xl_dien_dan;
	
	if($login=='')
	{
		throw new Exception('Vui lòng đăng nhập để thực hiện chức năng này');
	}
	
	$dbh->beginTransaction();
	
	$doc = $xl_feedback_dien_dan->doc(array('ma_nguoi_dung'=>$ma_nguoi_dung, 'ma, ngay_tao'));
	if($doc)
	{
		if(date('Y-m-d H:i:s', strtotime($doc['ngay_tao'].' + 30 minutes'))>date('Y-m-d H:i:s'))
		{
			throw new Exception('Lần bình chọn cuối của bạn cho diễn đàn vào lúc: '.date('H:i d-m-Y', strtotime($doc['ngay_tao'])).'! Vui lòng quay lại vào lúc: '
			.date('H:i d-m-Y', strtotime($doc['ngay_tao'].' + 30 minutes')).' để có thể gửi lại phản hồi cho diễn đàn '.$dien_dan['ten']);
		}
		
		$xl_feedback_dien_dan->xoa(array('ma'=>$doc['ma']));
	}
	
	if(empty($_POST['data']))
	{
		throw new Exception('Dữ liệu không hợp lệ');
	}
	$data = $_POST['data'];
	$_SESSION['data'] = $data;
	
	
	if(!in_array($data['loai'], array(0,1)))
	{
		throw new Exception('Vui lòng nhập mã bảo vệ');
	}
	if(empty($data['noi_dung']))
	{
		throw new Exception('Vui lòng nhập nội dung phản hồi');
	}
	if(empty($_POST['captcha']))
	{
		throw new Exception('Vui lòng nhập mã bảo vệ');
	}
	if(strcmp($_SESSION['captcha'], $_POST['captcha'])!==0)
	{
		throw new Exception('Mã bảo vệ không hợp lệ');
	}
	
	$data['ngay_tao'] = date('Y-m-d H:i:s');
	$data['ma_dien_dan'] = $ma_dien_dan;
	$data['ma_nguoi_dung'] = $ma_nguoi_dung;

	if($xl_feedback_dien_dan->them($data)===false)
	{
		throw new Exception('Đã có lỗi trong quá trình gửi phản hồi, vui lòng trở lại sau để thực hiện chức năng này');
	}
	
	$tong = $xl_feedback_dien_dan->dem(array('ma_dien_dan'=>$ma_dien_dan));
	$like = $xl_feedback_dien_dan->dem(array('ma_dien_dan'=>$ma_dien_dan, 'loai'=>1));
	$feedback = round(($like/$tong)*100);
	
	if(!$xl_dien_dan->cap_nhat_dieu_kien(array('feedback'=>$feedback), array('ma'=>$ma_dien_dan)))
	{
		throw new Exception('Đã có lỗi trong quá trình gửi phản hồi, vui lòng trở lại sau để thực hiện chức năng này');
	}
	
	$dbh->commit();
	unset($_SESSION['data']);
	throw new Exception('Cảm ơn bạn đã gửi phản hồi về diễn đàn '.$dien_dan['ten'].'!', 30);
	
}catch(Exception $e)
{
	throwMessage($e);
}