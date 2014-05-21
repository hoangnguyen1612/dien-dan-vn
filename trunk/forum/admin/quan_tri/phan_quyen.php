<?php
try{	
	include('../ini.php');
	include('../../classes/xl_quan_tri.php');
	if(empty($_GET['ma'])){
		throw new Exception('Vui long nhap ma');
	}
	$dt_xl_quan_tri = new xl_quan_tri ;
	$quan_tri = $dt_xl_quan_tri->doc($_GET['ma']);
	if($quan_tri == NULL){
		throw new Exception('Ma quan tri khong ton tai');
	}
	$ds_quan_tri = $dt_xl_quan_tri->danh_sach_khong_phan_trang();
	if($ds_quan_tri === false){
		throw new Exception('Khong load duoc danh sach quan tri');
	}
	$dt_smarty->assign('ma',$_GET['ma']);
	$dt_smarty->assign('ds_quan_tri',$ds_quan_tri);
	
	#***************************************************************************************
	
	$contentForLayout = $dt_smarty->fetch('quan_tri/phan_quyen.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
}catch(Exception $e){
	echo $e->getMessage();
}
?>