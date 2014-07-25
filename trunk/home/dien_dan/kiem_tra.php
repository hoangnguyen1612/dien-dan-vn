<?php
	require '../../config.php';
	require '../../libraries/functions.php';
	require '../classes/xl_dien_dan.php';
	
	$dbh = connection();
	$xl_dien_dan = new xl_dien_dan;
	
	$ten_dien_dan = convert_to_slug(trim($_POST['ten_dien_dan'])); 
	$ma_linh_vuc = $_POST['linh_vuc'];

	$item = $xl_dien_dan->doc(array('domain'=>$ten_dien_dan, 'ma_linh_vuc'=>$ma_linh_vuc));
	
	if($item)
	{
		echo 'false';
		exit;
	}
	else
	{
		echo 'true';
		exit;
	}