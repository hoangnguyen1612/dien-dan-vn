<?php
	#Tạo kết nối
	session_start();	
	include '../../config.php';	
	require '../../../libraries/functions.php';
	$dbh = connection();
	$dien_dan = get_subdomain();
	$_SESSION['dien_dan'] = $dien_dan;
	

	if(empty($_SESSION[SALT.'dang_nhap']) || $_SESSION[SALT.'dang_nhap'] != 1){
			header("Location:/{$_SESSION['dien_dan']['ma']}/admin/quan_tri/dang_nhap.php");
			exit;
	}

	