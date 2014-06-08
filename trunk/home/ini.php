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

	$sql = 'select ma_dien_dan, ten, hinh_dai_dien, ma_linh_vuc, domain from dien_dan, thanh_vien_dien_dan where ma = ma_dien_dan and ma_nguoi_dung = :ma';
	$sth = $dbh->prepare($sql);
	$sth->execute(array('ma'=>$login['ma']));
	$ds_dien_dan = $sth->fetchAll(PDO::FETCH_ASSOC);

	
	$dt_smarty = new Smarty();
	$dt_smarty->setTemplateDir('../templates/');
	$dt_smarty->setCompileDir('../templates_c/');
	$dt_smarty->setConfigDir('../../configs/');
	$dt_smarty->setCacheDir('../../cache/');

	
	$dt_smarty->assign('login', $login);
	$dt_smarty->assign('ds_dien_dan', $ds_dien_dan);