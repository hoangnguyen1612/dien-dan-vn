<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_nguoi_dung.php';
	include '../classes/xl_bai_viet.php';
	include '../classes/xl_cap_bac.php';
	

	require '../classes/xl_thanh_vien_dien_dan.php';
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	$xl_nguoi_dung = new xl_nguoi_dung;
	$xl_cap_bac = new xl_cap_bac;
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
		$nguoi_dung = $xl_nguoi_dung->doc(array('ma'=>$ma));
		if(!$nguoi_dung)
		{
			throw new Exception('Thành viên không tồn tại');
		}
	}
	
	$thanh_vien_dien_dan = $xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$nguoi_dung['ma'],'ma_dien_dan'=>$ma_dien_dan));
	
	$cap_bac = lay_cap_bac($ma_dien_dan,$thanh_vien_dien_dan['diem_so']);
	
	$dt_smarty->assign('cap_bac',$cap_bac);
	$dt_smarty->assign('nguoi_dung', $nguoi_dung);
	$dt_smarty->assign('thanh_vien_dien_dan', $thanh_vien_dien_dan);
	
	$contentForLayout = $dt_smarty->fetch('thanh_vien/thong_tin.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');

	include '../end.php';
}catch(Exception $e){
	$_SESSION['message']['type'] = 'error';
	$_SESSION['message']['content'] =  $e->getMessage();
	header("Location: {$_SERVER['HTTP_REFERER']}");
}