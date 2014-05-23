<?php
	#Tạo kết nối
	session_start();	
	include '../../config.php';	
	$dbh = new PDO('mysql:host=localhost;dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);
	$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$dbh->exec('set names utf8');

	