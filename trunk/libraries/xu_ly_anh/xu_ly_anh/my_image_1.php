<?php
	include 'image.php';
	
	if(empty($_GET['ten_hinh']))
	{
		echo '';
		exit;
	}
	
	$ten_hinh = $_GET['ten_hinh'];
	
	echo thumb('../../../upload/san_pham/'.$ten_hinh,260,200);
?>