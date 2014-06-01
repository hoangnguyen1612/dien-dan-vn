<?php
try{
	require '../ini.php';
	include '../classes/xl_binh_luan.php';
	
	$sql = "INSERT INTO `dien_dan_vn`.`binh_luan_bai_viet` (`ma`, `ma_bai_viet`, `tieu_de`, `noi_dung`, `ngay_tao`, `ma_dien_dan`, `ma_nguoi_dung`, `ma_loai_cha`, `dung`, `giup_ich`) VALUES (NULL, '15', 'TEST', 'TEST', '2014-05-07 00:00:00', '1400930572', '1400930572', '0', '0', '0');";
	$sth = $dbh->prepare($sql);
	$sth->execute(array());
	
	$return['message'] = 1111;
	echo json_encode($return);
	exit;
}catch(Exception $e)
{
	$_SESSION['message']['type'] = 'error';
	$_SESSION['message']['content'] =  $e->getMessage();
	header("Location: {$_SERVER['HTTP_REFERER']}");
}