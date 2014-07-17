<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../../classes/xl_chuyen_muc.php';
	$url = '';
	
	quan_tri('loai_chuyen_muc_cap_nhat_ttht');
	
	$xl_chuyen_muc = new xl_chuyen_muc;
	kiem_tra_rong($_GET['ma'], 'Mã chuyên mục');
	
	$ma = $_GET['ma'];
	
	if(!$chuyen_muc = $xl_chuyen_muc->doc(array('ma_dien_dan'=>$ma_dien_dan, 'ma'=>$ma)))
	{
		throw new Exception('Lỗi! Mã chuyên mục không tồn tại');	
	}
	
	$ds = '';
	
	if(empty($chuyen_muc['ma_loai_cha']))
	{
		$ds = $xl_chuyen_muc->danh_sach(0, 0, array('ma_dien_dan'=>$ma_dien_dan, 'ma_loai_cha'=>0), 'thu_tu_hien_thi ASC', '*', PDO::FETCH_ASSOC, '', false);
	}
	else
	{
		$ds = $xl_chuyen_muc->danh_sach(0, 0, array('ma_dien_dan'=>$ma_dien_dan, 'ma_loai_cha'=>$chuyen_muc['ma_loai_cha']), 'thu_tu_hien_thi ASC', '*', PDO::FETCH_ASSOC, '', false);
	}

	$dt_smarty->assign('ds', $ds);	
	$dt_smarty->assign('chuyen_muc', $chuyen_muc);	
	
	$contentForLayout = $dt_smarty->fetch('loai_chuyen_muc/ttht.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
}catch(Exception $e){
	throwMessage($e, $url);
}
?>