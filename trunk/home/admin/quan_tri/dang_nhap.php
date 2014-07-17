<?php
try{
	session_start();
	include ('../../../libraries/smarty/Smarty.class.php');
	include ('../../../libraries/functions.php');

	# khi đã đăng nhập thì không đăng nhập tiếp
	if(isset($_SESSION['LOGIN']) && $_SESSION['LOGIN']=='OK')
	{
		header('Location: /home/admin/thong_ke/luot_truy_cap.php');
		exit;
	}
	$dt_smarty = new Smarty();
	
	$dt_smarty->setTemplateDir('../templates/');
	$dt_smarty->setCompileDir('../templates_c/');
	$dt_smarty->setConfigDir('../../configs/');
	$dt_smarty->setCacheDir('../../cache/');
	
	$dt_smarty->display('quan_tri/dang_nhap.tpl');
	
	unset($_SESSION['message']);
	unset($_SESSION['ten_dang_nhap']);
	unset($_SESSION['mat_khau']);
}catch(Exception $e)
{
	
}
?>