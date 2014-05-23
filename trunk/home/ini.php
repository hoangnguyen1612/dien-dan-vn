<?php
	require '../../libraries/smarty/Smarty.class.php';
	require '../../config.php';
	require '../../libraries/functions.php';

	
	$dbh = connection();
	
	$login = '';
	if(isset($_SESSION['login']))
	{
		$login = $_SESSION['login'];
	}
	$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERR_NONE);

	
	$dt_smarty = new Smarty();
	$dt_smarty->setTemplateDir('../templates/');
	$dt_smarty->setCompileDir('../templates_c/');
	$dt_smarty->setConfigDir('../../configs/');
	$dt_smarty->setCacheDir('../../cache/');
	
	$dt_smarty->assign('login', $login);