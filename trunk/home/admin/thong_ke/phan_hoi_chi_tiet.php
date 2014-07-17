<?php
try{
	include ('../ini.php');	
	include ('../../classes/xl_dien_dan.php');

	$xl_dien_dan = new xl_dien_dan;

	
	$ds = $xl_dien_dan->danh_sach(0, 4, '', 'feedback DESC', 'ma, ten, feedback', PDO::FETCH_ASSOC, '', false);

	
	$dt_smarty->assign('ds', $ds);
	$contentForLayout = $dt_smarty->fetch('thong_ke/phan_hoi_chi_tiet.tpl');

	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
	
}catch(Exception $e)
{
	throwMessage($e);
}
?>