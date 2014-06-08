<?php 
try{
	require '../ini.php';
	$url = '';
	
	if(empty($_GET['ma']))
	{
		throw new Exception('Mã thông báo không tồn tại, vui lòng kiểm tra lại');
	}
	$ma = $_GET['ma'];
	require '../classes/xl_thong_bao.php';
	
	$xl_thong_bao = new xl_thong_bao;
	
	if(!$thong_bao = $xl_thong_bao->doc(array('ma'=>$ma, 'ma, duong_dan')))
	{
		throw new Exception('Mã thông báo không tồn tại, vui lòng kiểm tra lại');
	}
	
	$xl_thong_bao->cap_nhat_dieu_kien(array('trang_thai'=>1), array('ma'=>$ma));
	
	header("Location: {$thong_bao['duong_dan']}");
	exit;
	
}catch(Exception $e)
{
	throwMessage($e);
}