<?php
	include '../../../libraries/smarty/Smarty.class.php';
	$dt_smarty = new Smarty();		
	$dt_smarty->setTemplateDir('../templates/');
	$dt_smarty->setCompileDir('../templates_c/');
	$dt_smarty->setConfigDir('../../configs/');
	$dt_smarty->setCacheDir('../../cache/');
	
	$dt_smarty->assign('dien_dan', $dien_dan);
	$dt_smarty->assign('login', $login);
	$dt_smarty->assign('thanh_vien', $thanh_vien);
	$dt_smarty->assign('owner', $owner);