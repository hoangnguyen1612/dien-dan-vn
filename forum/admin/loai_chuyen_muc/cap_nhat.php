<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../../classes/xl_chuyen_muc.php';
	
	quan_tri('loai_chuyen_muc_cap_nhat');
	
	$xl_chuyen_muc = new xl_chuyen_muc;
	kiem_tra_rong($_GET['ma'], 'Mã chuyên mục');
	
	$ma = $_GET['ma'];
	
	if(!$loai_chuyen_muc = $xl_chuyen_muc->doc(array('ma_dien_dan'=>$ma_dien_dan, 'ma'=>$ma)))
	{
		throw new Exception('Lỗi! Mã chuyên mục không tồn tại');	
	}
	
	$ds_chuyen_muc = '';
	$kt = kiem_tra_co_con($ma, $ma_dien_dan);
	if($kt==0)
	{
		$ds_chuyen_muc = $xl_chuyen_muc->danh_sach(0,0,array('ma_dien_dan'=>$_SESSION['dien_dan']['ma']),'thu_tu_hien_thi ASC', '*', PDO::FETCH_ASSOC, '', false);;
	}
	
	
    $dt_smarty->assign('ds_chuyen_muc',$ds_chuyen_muc);
	$dt_smarty->assign('rieng_tu',array(1=>'Có',0=>'Không'));
	$dt_smarty->assign('loai_chuyen_muc',$loai_chuyen_muc);	
	
	$contentForLayout = $dt_smarty->fetch('loai_chuyen_muc/cap_nhat.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
}catch(Exception $e){
	throwMessage($e);
}
?>