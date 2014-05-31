<?php
try{
	require '../ini.php';
	
	if(empty($_GET['ma_thong_bao']))
	{
		throw new Exception();
	}
	$ma_thong_bao = $_GET['ma_thong_bao'];
	require '../classes/xl_thong_bao.php';
	require '../classes/xl_thanh_vien_dien_dan.php';
	
	$xl_thong_bao = new xl_thong_bao;
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	
	if(!$xl_thong_bao->doc(array('ma'=>$ma_thong_bao, 'ma')))
	{
		throw new Exception();
	}
	
	
	if(strpos($thanh_vien['thong_bao_da_doc'], $ma_thong_bao)===false)
	{
		if(!empty($thanh_vien['thong_bao_da_doc']))
		{
			$ma_thong_bao = "{$thanh_vien['thong_bao_da_doc']},$ma_thong_bao";
		}
		
		$xl_thanh_vien_dien_dan->cap_nhat_dieu_kien(array('thong_bao_da_doc'=>$ma_thong_bao), array('ma_dien_dan'=>$ma_dien_dan, 'ma_nguoi_dung'=>$ma_nguoi_dung));
	}
	header("Location: /$ma_dien_dan/thanh_vien/yeu_cau_tham_gia");
	exit;
}catch(Exception $e)
{
	$_SESSION['message']['type'] = 'error';
	$_SESSION['message']['content'] =  $e->getMessage();

	header("Location: /$ma_dien_dan/thanh_vien/yeu_cau_tham_gia");
}