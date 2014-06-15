<?php
try{
	require '../ini.php';
	require '../classes/xl_cau_hinh.php';
	if(empty($_GET['mau_sac'])){
		throw new Exception('Vui lòng nhập màu');
	}
	
	$dt_xl_cau_hinh = new xl_cau_hinh;
	
	$dt_xl_cau_hinh->cap_nhat_dieu_kien(array('noi_dung'=>$_GET['mau_sac']),array('ma_dien_dan'=>$ma_dien_dan,'tu_khoa'=>'CSS'));
	
	
	header('Location:'.$_SERVER['HTTP_REFERER']);
	exit;
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}