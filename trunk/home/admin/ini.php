<?php	
	include '../../../config.php';
	include '../../../libraries/functions.php';
	include ('../../../libraries/smarty/Smarty.class.php');
	
	# kiem tra session login
	if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN']!='OK')
	{	
		$_SESSION['URL'] = $_SERVER['REQUEST_URI'];
		header('Location: /home/admin/quan_tri/dang_nhap.php');
		exit;
	}
	
	$dbh = connection();
	
	$dt_smarty = new Smarty();	
	
	$dt_smarty->setTemplateDir('../templates/');
	$dt_smarty->setCompileDir('../templates_c/');
	$dt_smarty->setConfigDir('../../configs/');
	$dt_smarty->setCacheDir('../../cache/');
	
	if(isset($_SESSION['admin']))
	{
		$dt_smarty->assign('admin', $_SESSION['admin']);
	}


	include '../../classes/xl_lien_he.php';
	$xl_lien_he = new xl_lien_he;
	$tin_nhan_moi = $xl_lien_he->dem(array('trang_thai'=>0));
	$dt_smarty->assign('tin_nhan_moi', $tin_nhan_moi);
