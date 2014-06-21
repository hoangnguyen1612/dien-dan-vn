<?php
try{
	include '../ini.php';
	include '../../classes/xl_lien_he.php';
	$xl_lien_he = new xl_lien_he;
	
	if(empty($_GET['ma']))
	{
		throw new Exception('Mã liên hệ không hợp lệ');
	}
	
	$ma = $_GET['ma'];
	if(!$lien_he = $xl_lien_he->doc(array('ma'=>$ma)))
	{
		throw new Exception('Liên hệ không tồn tại');
	}
	
	if(!$xl_lien_he->cap_nhat_trang_thai($ma))
	{
		throw new Exception('Đã có lỗi khi cập nhật trạng thái');
	}
	
	$dt_smarty->assign('lien_he', $lien_he);
	$contentForLayout = $dt_smarty->fetch('lien_he/xem.tpl');
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
	#unset session
	include '../end.php';
	
}catch(Exception $e)
{
	throwMessage($e);
}