<?php
try{
	include '../ini.php';

	require '../classes/xl_dien_dan.php';

	$xl_dien_dan = new xl_dien_dan;
	
	#diễn đàn mới
	$ds_moi = $xl_dien_dan->danh_sach(0, 4, '', 'ngay_tao DESC', '*', PDO::FETCH_ASSOC, '', false);
	$dt_smarty->assign('ds_moi', $ds_moi);
	
	#lĩnh vực
	$sql = 'select ma_linh_vuc, count(*) as sl from dien_dan group by ma_linh_vuc order by sl DESC limit 0,2';
	$sth = $dbh->prepare($sql);
	$sth->execute();
	$ds_linh_vuc = $sth->fetchAll(PDO::FETCH_COLUMN);
	
	$ds_linh_vuc_1 = $xl_dien_dan->danh_sach(0, 4, array('ma_linh_vuc'=>$ds_linh_vuc[0]), 'feedback DESC', '*, (select ten from linh_vuc where ma=ma_linh_vuc) as ten_linh_vuc', PDO::FETCH_ASSOC, '', false);
	$ds_linh_vuc_2 = $xl_dien_dan->danh_sach(0, 4, array('ma_linh_vuc'=>$ds_linh_vuc[1]), 'feedback DESC', '*, (select ten from linh_vuc where ma=ma_linh_vuc) as ten_linh_vuc', PDO::FETCH_ASSOC, '', false);

	$dt_smarty->assign('ds_linh_vuc_1', $ds_linh_vuc_1);
	$dt_smarty->assign('ds_linh_vuc_2', $ds_linh_vuc_2);

	$contentForLayout = $dt_smarty->fetch('trang_chu/index.tpl'); 
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	include('../end.php');
	
}catch(Exception $e)
{
	throwMessage($e);
}
?>