<?php
try{
	require '../ini.php';
	require '../ini_interface.php';
	require '../../classes/xl_binh_luan.php';
	require '../../classes/xl_bao_cao_binh_luan.php';
	require '../../classes/xl_nguoi_dung.php';
	require '../../classes/xl_loai_xu_ly_vi_pham_binh_luan.php';

	$xl_bao_cao_binh_luan = new xl_bao_cao_binh_luan;
	$xl_loai_xu_ly_vi_pham_binh_luan = new xl_loai_xu_ly_vi_pham_binh_luan;
	
	if(empty($_GET['ma_bao_cao']))
	{
		throw new Exception('Mã báo cáo bình_luận không hợp lệ');
	}
	
	$ma = url_decode($_GET['ma_bao_cao']);
	
	$bao_cao = $xl_bao_cao_binh_luan->doc(array('ma_dien_dan'=>$ma_dien_dan, 'ma'=>$ma), 'bao_cao_binh_luan.*, (select tieu_de from binh_luan_bai_viet where bao_cao_binh_luan.ma_binh_luan = binh_luan_bai_viet.ma) as tieu_de, (select ma_nguoi_dung from binh_luan_bai_viet where bao_cao_binh_luan.ma_binh_luan = binh_luan_bai_viet.ma) as ma_nguoi_dang, (Select ma_bai_viet from binh_luan_bai_viet where binh_luan_bai_viet.ma = bao_cao_binh_luan.ma_binh_luan) ma_bai_viet, (select ma_loai_chuyen_muc from bai_viet where ma_bai_viet = bai_viet.ma) as ma_loai_chuyen_muc');
	if(!$bao_cao)
	{
		throw new Exception('Mã báo cáo bình luận không hợp lệ');
	}
	if($bao_cao['trang_thai']==1)
	{
		throw new Exception('Báo cáo bình luận này đã được xử lý');
	}
	
	quan_tri_chuyen_muc($bao_cao['ma_loai_chuyen_muc']);
	
	$ds_xl = $xl_loai_xu_ly_vi_pham_binh_luan->danh_sach(0, 0, '','ma ASC', '*', PDO::FETCH_KEY_PAIR, '', false);

	$dt_smarty->assign('bao_cao', $bao_cao);
	$dt_smarty->assign('ds_xl', $ds_xl);
	
	$contentForLayout = $dt_smarty->fetch('bao_cao/xu_ly_bao_cao_binh_luan.tpl');
	$dt_smarty->assign('contentForLayout',$contentForLayout);
	$dt_smarty->display('layouts/default.tpl'); 
	
}catch(Exception $e){
	throwMessage($e);
}
