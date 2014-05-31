<?php
try{
	require '../ini.php';
	require '../classes/xl_feedback_bai_viet.php';
	require '../classes/xl_bai_viet.php';

	$xl_feedback_bai_viet = new xl_feedback_bai_viet;
	
	kiem_tra_quyen();
	
	if(empty($_GET['ma_bai_viet']))
	{
		throw new Exception('Mã bài viết không hợp lệ');
	}
	if($_GET['loai']!=0&&$_GET['loai']!=1)
	{
		throw new Exception('Loại bình chọn không hợp lệ');
	}
	
	$loai = $_GET['loai'];
	$ma_bai_viet = $_GET['ma_bai_viet'];
	
	$xl_bai_viet = new xl_bai_viet;
	if(!$xl_bai_viet->doc(array('ma'=>$ma_bai_viet, 'ma_dien_dan'=>$ma_dien_dan)))
	{
		throw new Exception('Mã bài_viết không hợp lệ');
	}
	
	$hien_tai = date('Y-m-d H:i:s');
	$fb = $xl_feedback_bai_viet->doc(array('ma_bai_viet'=>$ma_bai_viet, 'ma_nguoi_dung'=>$ma_nguoi_dung), 'ma, ngay_tao');
	
	if($fb)
	{
		$ngay_tao = date('Y-m-d H:i:s', strtotime($fb['ngay_tao'].'+5 minutes'));
		if($ngay_tao>$hien_tai)
		{
			throw new Exception('Vui lòng quay lại sau 5 phút để bình chọn cho bình luận này');
		}
		
		$xl_feedback_bai_viet->xoa(array('ma'=>$fb['ma']));
	}
	
	$xl_feedback_bai_viet->them(array('ma_bai_viet'=>$ma_bai_viet, 'loai'=>$loai, 'ngay_tao'=>date('Y-m-d H:i:s'), 'ma_nguoi_dung'=>$ma_nguoi_dung));
	
	$feedback_bai_viet = feedback_bai_viet($ma_bai_viet);
	
	$xl_bai_viet->cap_nhat_dieu_kien(array('feedback'=>$feedback_bai_viet),array('ma'=>$ma_bai_viet));
	
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