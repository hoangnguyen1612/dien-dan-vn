<?php
	require '../ini.php';
	$ten_dien_dan = convert_to_slug($_POST['ten_dien_dan']);
	$ma_linh_vuc = $_POST['ma_linh_vuc'];
	
	require '../classes/xl_dien_dan.php';
	
	$xl_dien_dan = new xl_dien_dan;
	if($xl_dien_dan->doc(array('domain'=>$ten_dien_dan, 'ma_linh_vuc'=>$ma_linh_vuc), 'ma'))
	{
		echo 'yes';
		exit;
	}
	echo 'no';
