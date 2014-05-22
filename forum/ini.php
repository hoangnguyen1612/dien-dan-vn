<?php
	#Tạo kết nối
	session_start();	
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	
	include '../config.php';
	include '../../home/libraries/functions.php';
		
	try{
		$dbh = new PDO('mysql:host=localhost;dbname=dien_dan_vn','root','');
		$dbh->exec('set names utf8');
	}catch(Exception $e)
	{
		echo 'Server is maintaining, please try again later!';exit;
	}
	$login = '';
	if(isset($_SESSION['login']))
	{
		$login = $_SESSION['login'];
	}
	$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERR_NONE);
	
	if(empty($_GET['forum']))
	{
		echo 'This forum does not exist!!!';
	}
	$ma_dien_dan = $_GET['forum'];
	
	$sql = 'select * from dien_dan where ma = :ma limit 0,1';
	$sth = $dbh->prepare($sql);
	$sth->execute(array('ma'=>$ma_dien_dan));
	
	$forum = $sth->fetch(PDO::FETCH_ASSOC);
	
	if(!$forum)
	{
		echo 'This forum does not exist!!!';
		exit;
	}
	
	//debug($forum);
	
	
	
	