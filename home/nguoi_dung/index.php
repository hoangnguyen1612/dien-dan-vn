<?php
try{
	include '../ini.php';
	//debug($login);
	require '../classes/xl_nguoi_dung.php';
	
	if(empty($_SESSION['login']))
	{
		throw new Exception('Bạn cần đăng nhập để thực hiện chức năng này');
	}

	$nguoi_dung = $_SESSION['login'];
	$dt_smarty->assign('nguoi_dung', $nguoi_dung);
	
	$contentForLayout = $dt_smarty->fetch('nguoi_dung/index.tpl');
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
}catch(Exception $e)
{
	header('Location: http://localhost/DATN/forumvn/dien_dan_vn');
}
?>