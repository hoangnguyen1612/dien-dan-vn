<?php
try{
	require '../ini.php';
	require '../classes/xl_feedback_binh_luan.php';
	require '../classes/xl_binh_luan.php';

	$xl_feedback_binh_luan = new xl_feedback_binh_luan;
	
	kiem_tra_quyen();
	
	if(empty($_GET['ma_binh_luan']))
	{
		throw new Exception('Mã bình luận không hợp lệ');
	}
	if($_GET['loai']!=0&&$_GET['loai']!=1)
	{
		throw new Exception('Loại bình chọn không hợp lệ');
	}
	
	$loai = $_GET['loai'];
	$ma_binh_luan = $_GET['ma_binh_luan'];
	
	$xl_binh_luan = new xl_binh_luan;
	if(!$xl_binh_luan->doc(array('ma'=>$ma_binh_luan, 'ma_dien_dan'=>$ma_dien_dan)))
	{
		throw new Exception('Mã bình luận không hợp lệ');
	}
	
	$hien_tai = date('Y-m-d H:i:s');
	$fb = $xl_feedback_binh_luan->doc(array('ma_binh_luan'=>$ma_binh_luan, 'ma_nguoi_dung'=>$ma_nguoi_dung), 'ma, ngay_tao');
	
	if($fb)
	{
		$ngay_tao = date('Y-m-d H:i:s', strtotime($fb['ngay_tao'].'+5 minutes'));
		if($ngay_tao>$hien_tai)
		{
			throw new Exception('Vui lòng quay lại sau 5 phút để bình chọn cho bình luận này');
		}
		
		$xl_feedback_binh_luan->xoa(array('ma'=>$fb['ma']));
	}
	
	$xl_feedback_binh_luan->them(array('ma_binh_luan'=>$ma_binh_luan, 'loai'=>$loai, 'ngay_tao'=>date('Y-m-d H:i:s'), 'ma_nguoi_dung'=>$ma_nguoi_dung));
	
	header("Location: {$_SERVER['HTTP_REFERER']}");
	exit;
	
}catch(PDOException $e)
{
	echo $e->getMessage();exit;
}catch(Exception $e)
{
	$_SESSION['message']['type'] = 'error';
	$_SESSION['message']['content'] =  $e->getMessage();
		
	header("Location: {$_SERVER['HTTP_REFERER']}");
}