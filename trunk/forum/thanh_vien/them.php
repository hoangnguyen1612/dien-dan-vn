<?php
try{
	require '../ini.php';

	if(empty($_GET['ma']))
	{
		throw new Exception('Mã thành viên không tồn tại');
	}
	$ma = $_GET['ma'];
	require '../classes/xl_thanh_vien_dien_dan.php';
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	
	if(!$xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$ma, 'ma_dien_dan'=>$ma_dien_dan, 'loai_thanh_vien'=>3), 'ma_nguoi_dung'))
	{ 
		throw new Exception('Thành viên không tồn tại trong diễn đàn này');
	}
	
	$dbh->beginTransaction();
	require '../classes/xl_thong_bao.php';
	$xl_thong_bao = new xl_thong_bao;
	
	$thong_bao = $xl_thong_bao->doc(array('gui_tu'=>$ma, 'gui_den'=>$ma_dien_dan, 'ma_loai_thong_bao'=>0), 'ma');
	if($thong_bao)
	{
		$ma_thong_bao = $thong_bao['ma'];
		if(strpos($thanh_vien['thong_bao_da_doc'], $ma_thong_bao)===false)
		{
			if(!empty($thanh_vien['thong_bao_da_doc']))
			{
				$ma_thong_bao = "{$thanh_vien['thong_bao_da_doc']},$ma_thong_bao";
			}
			
			$xl_thanh_vien_dien_dan->cap_nhat_dieu_kien(array('thong_bao_da_doc'=>$ma_thong_bao), array('ma_dien_dan'=>$ma_dien_dan, 'ma_nguoi_dung'=>$ma_nguoi_dung));
		}
	}
	
	
	$xl_thanh_vien_dien_dan->cap_nhat_dieu_kien(array('loai_thanh_vien'=>2), array('ma_nguoi_dung'=>$ma, 'ma_dien_dan'=>$ma_dien_dan));
	
	require '../classes/xl_dien_dan.php';
	$xl_dien_dan = new xl_dien_dan;
	$item = $xl_dien_dan->doc(array('ma'=>$ma_dien_dan), 'so_luong_thanh_vien');

	$xl_dien_dan->cap_nhat_dieu_kien(array('so_luong_thanh_vien'=>$item['so_luong_thanh_vien']+1), array('ma'=>$ma_dien_dan)); 
	
	$dbh->commit();
	
	
	throw new Exception('Đã thêm thành viên vào diễn đàn', 30);
	
}catch(Exception $e)
{
	throwMessage($e);
}