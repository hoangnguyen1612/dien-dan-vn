<?php
try{
	require '../ini.php';
	require '../ini_interface.php';
	require '../../classes/xl_bai_viet.php';
	require '../../classes/xl_bao_cao_bai_viet.php';
	require '../../classes/xl_nguoi_dung.php';
	require '../../classes/xl_loai_xu_ly_vi_pham_bai_viet.php';

	$xl_bao_cao_bai_viet = new xl_bao_cao_bai_viet;
	$xl_loai_xu_ly_vi_pham_bai_viet = new xl_loai_xu_ly_vi_pham_bai_viet;
	
	if(empty($_GET['ma_bao_cao']))
	{
		throw new Exception('Mã báo cáo bài viết không hợp lệ');
	}
	
	$ma = url_decode($_GET['ma_bao_cao']);
	
	$bao_cao = $xl_bao_cao_bai_viet->doc(array('ma_dien_dan'=>$ma_dien_dan, 'ma'=>$ma), 'bao_cao_bai_viet.*, (select tieu_de from bai_viet where ma_bai_viet = ma) as tieu_de, (select ma_nguoi_dang from bai_viet where ma_bai_viet = ma) as ma_nguoi_dang, (select ma_loai_chuyen_muc from bai_viet where ma_bai_viet = ma) as ma_loai_chuyen_muc');
	if(!$bao_cao)
	{
		throw new Exception('Mã báo cáo bài viết không hợp lệ');
	}
	
	if($bao_cao['trang_thai']==1)
	{
		throw new Exception('Báo cáo bài viết này đã được xử lý');
	}

	quan_tri_chuyen_muc($bao_cao['ma_loai_chuyen_muc']);
	
	$ds_xl = $xl_loai_xu_ly_vi_pham_bai_viet->danh_sach(0, 0, '','ma ASC', '*', PDO::FETCH_KEY_PAIR, '', false);

	$dt_smarty->assign('bao_cao', $bao_cao);
	$dt_smarty->assign('ds_xl', $ds_xl);
	
	$contentForLayout = $dt_smarty->fetch('bao_cao/xu_ly_bao_cao_bai_viet.tpl');
	$dt_smarty->assign('contentForLayout',$contentForLayout);
	$dt_smarty->display('layouts/default.tpl'); 
	
}catch(Exception $e){
	throwMessage($e);
}
