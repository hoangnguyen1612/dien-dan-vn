<?php
try{
	require '../ini.php';

	require '../classes/xl_thong_bao.php';
	
	$xl_thong_bao = new xl_thong_bao;
	$danh_sach = '';
	$danh_sach = $xl_thong_bao->danh_sach(0, 0, array('gui_den'=>$login['ma']), 'ngay_tao DESC', '*, 
	(select hinh_dai_dien from nguoi_dung where ma=gui_tu) as hinh_dai_dien, (select ten from nguoi_dung where ma=gui_tu) as ten,
	(select concat(ma_linh_vuc, concat("/",domain)) from dien_dan d where d.ma=ma_dien_dan) as domain', PDO::FETCH_ASSOC, '', false);

	$dt_smarty->assign('danh_sach', $danh_sach);


	$contentForLayout = $dt_smarty->fetch('thong_bao/index.tpl');
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e)
{
	throwMessage($e);
}