<?php
try{
	include '../../../config.php';
	include '../../../libraries/functions.php';
	include '../../../libraries/smarty/Smarty.class.php';
	
	$dbh = connection();

	$dien_dan = get_subdomain();
	$_SESSION['dien_dan'] = $dien_dan;
	
	
	if(isset($_SESSION['login']))
	{
		if(isset($_SESSION['thanh_vien']))
		{
			if($_SESSION['thanh_vien']['loai_thanh_vien']==0 || $_SESSION['thanh_vien']['loai_thanh_vien']==1)
			{
				$_SESSION[SALT.'dang_nhap'] = 1 ;
				header("Location: /{$dien_dan['ma']}/admin/thong_ke/tong_quat.php");
				exit;
			}
		}
	}
	if(!isset($_SESSION['msg_login'])){
		$_SESSION['msg_login'] = "Vui lòng đăng nhập để vào hệ thống";
	}
	$_SESSION['style_msg_login'] = "notification information png_bg";
	$dt_smarty = new Smarty();	
	$dt_smarty->setTemplateDir('../templates/');
	$dt_smarty->setCompileDir('../templates_c/');
	$dt_smarty->setConfigDir('../../configs/');
	$dt_smarty->setCacheDir('../../cache/');
	
	
	
	$dt_smarty->assign('dien_dan', $dien_dan);
	$dt_smarty->display('quan_tri/dang_nhap.tpl');
}catch(Exception $e)
{
	echo $e->getMessage();
}
?>