<?php		
	#Kiem tra nguoi dung da dang nhap vao he thong chua ? ############3
	
	#Tạo đối tượng smarty
	include '../libraries/smarty/Smarty.class.php';
	$dt_smarty = new Smarty();		
	$dt_smarty->setTemplateDir('../templates/');
	$dt_smarty->setCompileDir('../templates_c/');
	$dt_smarty->setConfigDir('../configs/');
	$dt_smarty->setCacheDir('../cache/');
	
	$dt_smarty->assign('login', $login);
		
		
		
		