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
	$ma_nguoi_dung = $login['ma'];
	
	# loại thành viên
	$thanh_vien = $xl_thanh_vien_dien_dan->doc(array('ma_dien_dan'=>$ma_dien_dan, 'ma_nguoi_dung'=>$ma_nguoi_dung));

	if($thanh_vien['loai_thanh_vien']!=0 && $thanh_vien['loai_thanh_vien']!=1)
	{
		echo 'You have not permission at here!!!';
		exit;
	}
	$owner = 0;
	if($thanh_vien['loai_thanh_vien']==0)
	{
		$owner = 1;
	}
	

	