<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_chuyen_muc.php';
	include '../classes/xl_bai_viet.php';
	include '../classes/xl_binh_luan.php';
	
	$danh_sach = '';
	$ma_thong_bao = '';
	
	require '../classes/xl_thanh_vien_dien_dan.php';
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	
	if(!empty($_GET['ma_thong_bao']))
	{
		$ma_thong_bao = $_GET['ma_thong_bao'];
		require '../classes/xl_thong_bao.php';
		$xl_thong_bao = new xl_thong_bao;
		if(!$xl_thong_bao->doc(array('ma'=>$ma_thong_bao, 'ma')))
		{
			throw new Exception('Vui lòng không thay đổi mã thông báo');
		}
		
		if(strpos($thanh_vien['thong_bao_da_doc'], $ma_thong_bao)===false)
		{
			if(!empty($thanh_vien['thong_bao_da_doc']))
			{
				$ma_thong_bao = "{$thanh_vien['thong_bao_da_doc']},$ma_thong_bao";
			}
			
			$xl_thanh_vien_dien_dan->cap_nhat_dieu_kien(array('thong_bao_da_doc'=>$ma_thong_bao), array('ma_dien_dan'=>$ma_dien_dan, 'ma_nguoi_dung'=>$ma_nguoi_dung));
		}
	}
	
	$danh_sach = $xl_thanh_vien_dien_dan->danh_sach(0, 0, array('loai_thanh_vien'=>3), 'ngay_gia_nhap DESC', 'ma_nguoi_dung, (select ho_ten from nguoi_dung where ma = ma_nguoi_dung) as ho_ten, (select thumbnail from nguoi_dung where ma = ma_nguoi_dung) as thumbnail, (select gioi_tinh from nguoi_dung where ma = ma_nguoi_dung) as gioi_tinh', PDO::FETCH_ASSOC, '', false);

	$dt_smarty->assign('danh_sach', $danh_sach);
		
	$contentForLayout = $dt_smarty->fetch('thanh_vien/yeu_cau_tham_gia.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
}catch(Exception $e){
	header("Location: /{$dien_dan['ma']}");
}