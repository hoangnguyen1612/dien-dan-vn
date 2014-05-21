<?php
	include 'image.php';
	
	if(empty($_GET['ten_hinh']))
	{
		echo '';
		exit;
	}
	if(empty($_GET['w']))
	{
		echo '';
		exit;
	}
	if(empty($_GET['h']))
	{
		echo '';
		exit;
	}
	
	$w = $_GET['w'];
	$h = $_GET['h'];
	$ten_hinh = $_GET['ten_hinh'];
	
	echo thumb('../../../upload/san_pham/'.$ten_hinh,$w,$h);
?>