<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	require '../classes/xl_bai_viet.php';
	include '../classes/xl_binh_luan.php';
	
	$title = 'Cập nhật bình luận';
	
	kiem_tra_quyen();
	
	if(empty($_GET['ma'])){
		throw new Exception('Vui lòng nhập mã bình luận');
	}
	$dt_xl_binh_luan = new xl_binh_luan;
	$dt_xl_bai_viet = new xl_bai_viet;
	$binh_luan = $dt_xl_binh_luan->doc(array('ma'=>$_GET['ma'],'ma_dien_dan'=>$ma_dien_dan));
	if($binh_luan == NULL){
		throw new Exception('Bình luận không tồn tại');
	}
	$bai_viet = $dt_xl_bai_viet->doc(array('ma'=>$binh_luan['ma_bai_viet'],'ma_dien_dan'=>$ma_dien_dan));
	$dt_smarty->assign('bai_viet',$bai_viet);
	$dt_smarty->assign('binh_luan',$binh_luan);
	$dt_smarty->assign('title',$title);	
	$contentForLayout = $dt_smarty->fetch('binh_luan/cap_nhat.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e){
	$_SESSION['message']['type'] = 'error';
	$_SESSION['message']['content'] =  $e->getMessage();
	header("Location: /$ma_dien_dan");
}