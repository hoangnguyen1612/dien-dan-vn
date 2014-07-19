<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_bai_viet.php';
	
	$title = 'Bình luận';
	
	kiem_tra_quyen();
	
	if(empty($_GET['ma_bai_viet'])){
		throw new Exception('Vui lòng nhập mã bài viết');
	}
	$dt_xl_bai_viet = new xl_bai_viet;
	$bai_viet = $dt_xl_bai_viet->doc(array('ma'=>$_GET['ma_bai_viet'],'ma_dien_dan'=>$ma_dien_dan));
	if($bai_viet == NULL){
		throw new Exception('Bài viết không tồn tại');
	}
	$dt_smarty->assign('bai_viet',$bai_viet);
	$dt_smarty->assign('title',$title);	
	$contentForLayout = $dt_smarty->fetch('binh_luan/them.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e){
	throwMessage($e,"/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}");
}