<?php
	include '../../../libraries/smarty/Smarty.class.php';
	$dt_smarty = new Smarty();		
	$dt_smarty->setTemplateDir('../templates/');
	$dt_smarty->setCompileDir('../templates_c/');
	$dt_smarty->setConfigDir('../../configs/');
	$dt_smarty->setCacheDir('../../cache/');