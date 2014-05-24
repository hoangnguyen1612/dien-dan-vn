<?php		
	include '../../libraries/smarty/Smarty.class.php';
	
	$dt_smarty = new Smarty();		
	$dt_smarty->setTemplateDir('../templates/');
	$dt_smarty->setCompileDir('../templates_c/');
	$dt_smarty->setConfigDir('../configs/');
	$dt_smarty->setCacheDir('../cache/');
	
	$dt_smarty->assign('login', $login);
	$dt_smarty->assign('dien_dan', $dien_dan);
	$dt_smarty->assign('ds_cau_hinh', $ds_cau_hinh);
	$dt_smarty->assign('thanh_vien', $thanh_vien);
	$dt_smarty->assign('ds_thong_bao', $ds_thong_bao);
	$dt_smarty->assign('thong_bao_moi', $thong_bao_moi);
	$dt_smarty->assign('ma_dien_dan', $ma_dien_dan);
		
		
		