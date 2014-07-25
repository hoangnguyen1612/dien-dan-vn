<?php

	include '../../../config.php';	 
	include '../../../libraries/functions.php';
	require '../../classes/xl_thanh_vien_dien_dan.php';
	
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	
	$dbh = connection();
	$dien_dan = get_subdomain();
	$ma_dien_dan = $dien_dan['ma'];
	
	//unset($_SESSION['message']);exit;
	
	$login = '';
	$thanh_vien = '';
	
	
	if(!isset($_SESSION['login']))
	{
		header("Location: /{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/admin");
	}
	
	$login = $_SESSION['login'];
	
	$sql = 'select trang_thai from nguoi_dung where ma=:ma limit 1';
	$sth = $dbh->prepare($sql);
	$sth->execute(array('ma'=>$login['ma'])); 
	$item = $sth->fetchAll(PDO::FETCH_COLUMN); 
	$login['trang_thai'] = $item[0];
	if($login['trang_thai']==0)
	{
		unset($_SESSION['login']);
		throw new Exception('Tài khoản của bạn đang tạm khóa, vui lòng gửi liên hệ về ban quản trị Diendan.vn để biết thêm thông tin chi tiết');
	}
	
	
	$ma_nguoi_dung = $login['ma'];
	
	# loại thành viên
	$thanh_vien = $xl_thanh_vien_dien_dan->doc(array('ma_dien_dan'=>$ma_dien_dan, 'ma_nguoi_dung'=>$ma_nguoi_dung));
	if($thanh_vien['trang_thai']==0)
	{
		header("Location: /{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}");
		exit;
	}

	if($thanh_vien['loai_thanh_vien']!=0 && $thanh_vien['loai_thanh_vien']!=1)
	{
		echo 'You have not permission at here!!!';
		header('Location: /');exit;
	}
	$owner = 0;
	if($thanh_vien['loai_thanh_vien']==0)
	{
		$owner = 1;
	}
	

	