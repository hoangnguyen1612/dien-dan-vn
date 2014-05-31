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
	
	
	$xl_thanh_vien_dien_dan->xoa(array('ma_nguoi_dung'=>$ma, 'ma_dien_dan'=>$ma_dien_dan));
	$dbh->commit();
	
	
	header("Location: /$ma_dien_dan/thanh_vien/yeu_cau_tham_gia");
	exit;
	
}catch(Exception $e)
{
	$_SESSION['message']['type'] = 'error';
	$_SESSION['message']['content'] =  $e->getMessage();
	header("Location: {$_SERVER['HTTP_REFERER']}");
}