<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_bai_viet.php';
	include '../classes/xl_binh_luan.php';
	
	$dt_xl_bai_viet = new xl_bai_viet;
	$dt_xl_binh_luan = new xl_binh_luan;
	kiem_tra_quyen();
	
	$title = 'Báo cáo sai phạm';
	if(empty($_GET['ma'])){
		throw new Exception('Vui lòng nhập mã');
	}
	if($_GET['loai'] !=0 && $_GET['loai'] !=1){
		throw new Exception('Loại báo cáo không đúng , vui lòng thử lại');
	}

	$ma = $_GET['ma'];

	if($_GET['loai'] == 0){
		$bai_viet = $dt_xl_bai_viet->doc(array('ma'=>$ma,'ma_dien_dan'=>$ma_dien_dan));
		$dt_smarty->assign('bai_viet',$bai_viet);
	
		
	}
	if($_GET['loai'] == 1){
		$binh_luan = $dt_xl_binh_luan->doc(array('ma'=>$ma,'ma_dien_dan'=>$ma_dien_dan));
		$dt_smarty->assign('binh_luan',$binh_luan);	
	}
	$dt_smarty->assign('title',$title);	
	$contentForLayout = $dt_smarty->fetch('bao_cao/index.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
}catch(Exception $e){
	throwMessage($e,"/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}");
}