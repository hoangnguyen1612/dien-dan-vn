<?php
	include '../ini.php';
	if(empty($_POST['ma_chuyen_muc'])){
		header('Location:'.$_SERVER['HTTP_REFERER']);
		exit;
	}
	$ma_chuyen_muc = $_POST['ma_chuyen_muc'];
	header("Location: /{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/bai_viet/danh_sach?loai=$ma_chuyen_muc");
	exit;