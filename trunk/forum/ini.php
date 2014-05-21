<?php
	#Tạo kết nối
	session_start();	
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	
	include '../config.php';
	include '../../dien_dan_vn/libraries/functions.php';
		
	$dbh = new PDO('mysql:host=localhost;dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);
	$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$dbh->exec('set names utf8');
	
	$login = '';
	if(isset($_SESSION['login']))
	{
	$login = $_SESSION['login'];
	}
	