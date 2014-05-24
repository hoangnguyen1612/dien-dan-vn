<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_bai_viet.php';
	
	if($login == ''){
		header('Location: diendan.vn');
		exit;
	}
	if($thanh_vien['loai_thanh_vien'] == 3){
		echo 'Tài khoản của bạn chưa được kích hoạt trong diễn đàn này';
		exit;
	}
	
	if(empty($_GET['ma_bai_viet'])){
		echo 'Vui lòng nhập mã bài viết';
		exit;
	}
	$dt_xl_bai_viet = new xl_bai_viet;
	$bai_viet = $dt_xl_bai_viet->doc(array('ma'=>$_GET['ma_bai_viet'],'ma_dien_dan'=>$ma_dien_dan));
	if($bai_viet == NULL){
		echo 'Bài viết không tồn tại';
		exit;
	}
	$dt_smarty->assign('bai_viet',$bai_viet);
		
	$contentForLayout = $dt_smarty->fetch('binh_luan/them.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
}catch(Exception $e){
	echo $e->getMessage();
}