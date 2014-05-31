<?php
try{
	include '../ini.php';	
	include '../ini_interface.php';
	include '../../classes/xl_chuyen_muc.php';
	
		
	$dt_xl_chuyen_muc = new xl_chuyen_muc;
	$ds_chuyen_muc = $dt_xl_chuyen_muc->danh_sach(0, 0, array('ma_dien_dan'=>$ma_dien_dan),'thu_tu_hien_thi ASC', '*', PDO::FETCH_ASSOC, '', false);
	
	$dt_smarty->assign('ds_chuyen_muc',$ds_chuyen_muc);
	$dt_smarty->assign('rieng_ru',array('Có'=>1 , 'Không' => 0));
	$dt_smarty->assign('chon',1);
	
	$contentForLayout = $dt_smarty->fetch('loai_chuyen_muc/them.tpl');		
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->assign('titleForLayout', 'Chuyên mục - thêm mới');
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e){
	throwMessage($e);
}
?>