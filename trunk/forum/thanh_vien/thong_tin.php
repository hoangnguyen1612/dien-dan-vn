<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_nguoi_dung.php';
	include '../classes/xl_bai_viet.php';


	require '../classes/xl_thanh_vien_dien_dan.php';
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	$xl_nguoi_dung = new xl_nguoi_dung;
	
	kiem_tra_quyen();
	
	if(empty($_GET['ma_thanh_vien']))
	{
		throw new Exception('Thành viên không tồn tại');
	}
	$ma = $_GET['ma_thanh_vien'];
	if($ma_nguoi_dung==$ma)
	{
		$nguoi_dung = $login;
	}
	else
	{
		if(!$nguoi_dung = $xl_nguoi_dung->doc(array('ma'=>$ma)))
		{
			throw new Exception('Thành viên không tồn tại');
		}
	}
	
	$dt_smarty->assign('nguoi_dung', $nguoi_dung);
	
	$contentForLayout = $dt_smarty->fetch('thanh_vien/thong_tin.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
}catch(Exception $e){
	header("Location: /{$dien_dan['ma']}");
}