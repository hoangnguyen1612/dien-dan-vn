<?php
	include ('../libraries/smarty/Smarty.class.php');
	include 'config.php';
	include 'libraries/functions.php';
	
	session_start();
	
	date_default_timezone_set('Asia/Ho_Chi_Minh');

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

	
	$dt_smarty = new Smarty();
	$dt_smarty->setTemplateDir('../templates/');
	$dt_smarty->setCompileDir('../templates_c/');
	$dt_smarty->setConfigDir('../../configs/');
	$dt_smarty->setCacheDir('../../cache/');
	
	$dt_smarty->assign('login', $login);