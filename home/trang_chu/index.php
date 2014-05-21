<?php
try{
	include '../ini.php';

	require '../classes/xl_dien_dan.php';

	$xl_dien_dan = new xl_dien_dan;
	$danh_sach = $xl_dien_dan->danh_sach(0, 0, '', 'ngay_tao DESC', '*', PDO::FETCH_ASSOC, '', false);
	$dt_smarty->assign('danh_sach', $danh_sach);
	$contentForLayout = $dt_smarty->fetch('trang_chu/index.tpl'); 
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
}catch(Exception $e)
{
	
}
?>