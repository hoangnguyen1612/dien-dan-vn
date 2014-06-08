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

	$ds_dien_dan = '';


	$dt_smarty = new Smarty();
	$dt_smarty->setTemplateDir('../templates/');
	$dt_smarty->setCompileDir('../templates_c/');
	$dt_smarty->setConfigDir('../../configs/');
	$dt_smarty->setCacheDir('../../cache/');
	
	if($login!='')
	{
		$sql = 'select ma_dien_dan, ten, hinh_dai_dien, ma_linh_vuc, domain from dien_dan, thanh_vien_dien_dan where ma = ma_dien_dan and ma_nguoi_dung = :ma';
		$sth = $dbh->prepare($sql);
		$sth->execute(array('ma'=>$login['ma']));
		$ds_dien_dan = $sth->fetchAll(PDO::FETCH_ASSOC);
	
		$sql = 'select t.*, hinh_dai_dien, (select domain from dien_dan where ma=t.ma_dien_dan) as domain, (select ma_linh_vuc from dien_dan where ma=t.ma_dien_dan) as ma_linh_vuc from thong_bao t, nguoi_dung n where n.ma = gui_tu and gui_den = :ma_nguoi_dung and t.trang_thai = 0';
		$sth = $dbh->prepare($sql);
		$sth->execute(array('ma_nguoi_dung'=>$login['ma']));
		$thong_bao_moi = $sth->fetchAll(PDO::FETCH_ASSOC);

		if(count($thong_bao_moi)>0)
		{
			$dt_smarty->assign('sl_thong_bao_moi', count($thong_bao_moi));
		}
		else
		{
			$dt_smarty->assign('sl_thong_bao_moi', 0);
		}
		$dt_smarty->assign('thong_bao_moi', $thong_bao_moi);
	}	
	
	$dt_smarty->assign('login', $login);
	$dt_smarty->assign('ds_dien_dan', $ds_dien_dan);