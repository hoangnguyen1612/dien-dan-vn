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
	$dt_smarty->assign('sl_thong_bao_moi', $sl_thong_bao_moi[0]);
	$dt_smarty->assign('ma_dien_dan', $ma_dien_dan);
	$dt_smarty->assign('quyen', $quyen);
	$dt_smarty->assign('ma_nguoi_dung', $ma_nguoi_dung);
	$dt_smarty->assign('thong_bao_icon', $thong_bao_icon);
	$dt_smarty->assign('ds_dien_dan', $ds_dien_dan);

	if(isset($ds_online)){
		$dt_smarty->assign('ds_online', $ds_online);
	}
	if(isset($so_luong_online)){
		$dt_smarty->assign('so_luong_online', $so_luong_online);
	}
	if(isset($mang_mau_sac)){
		$dt_smarty->assign('mang_mau_sac', $mang_mau_sac);
	}
	
		