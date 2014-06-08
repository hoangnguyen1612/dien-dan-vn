<?php
try{

	require '../ini.php';

	require '../classes/xl_feedback_bai_viet.php';
	

	require '../classes/xl_bai_viet.php';
	require '../classes/xl_thanh_vien_dien_dan.php';

	$xl_feedback_bai_viet = new xl_feedback_bai_viet;	

	kiem_tra_quyen();
		
	if(empty($_GET['ma_bai_viet']))
	{
		echo 'Mã bài viết không hợp lệ'; exit;
	}
	
	$ma_bai_viet = $_GET['ma_bai_viet'];
	
	$xl_bai_viet = new xl_bai_viet;

	if(!$xl_bai_viet->doc(array('ma'=>$ma_bai_viet, 'ma_dien_dan'=>$ma_dien_dan)))
	{
		echo 'Mã bài_viết không hợp lệ';exit;
	}
	
	$bai_viet_thich = $xl_feedback_bai_viet->doc(array('ma_bai_viet'=>$ma_bai_viet,'ma_nguoi_dung'=>$ma_nguoi_dung),'ma');
	if($bai_viet_thich == NULL){		
		$xl_feedback_bai_viet->them(array('ma_bai_viet'=>$ma_bai_viet, 'ngay_tao'=>date('Y-m-d H:i:s'), 'ma_nguoi_dung'=>$ma_nguoi_dung));	
		cong_like_bai_viet($ma_bai_viet);
		$bai_viet = $xl_bai_viet->doc(array('ma'=>$ma_bai_viet,'ma_dien_dan'=>$ma_dien_dan));
		cong_diem_thanh_vien($bai_viet['ma_nguoi_dang'],$ma_dien_dan,$diem_duoc_thich);
		$so_luong_nguoi_thich = $bai_viet['thich'];
		echo "like~$so_luong_nguoi_thich";exit;
	}else{
		$xl_feedback_bai_viet->xoa(array('ma_bai_viet'=>$ma_bai_viet,'ma_nguoi_dung'=>$ma_nguoi_dung));
		tru_like_bai_viet($ma_bai_viet);
		$bai_viet = $xl_bai_viet->doc(array('ma'=>$ma_bai_viet,'ma_dien_dan'=>$ma_dien_dan));	
		tru_diem_thanh_vien($bai_viet['ma_nguoi_dang'],$ma_dien_dan,$diem_duoc_thich);	
		$so_luong_nguoi_thich = $bai_viet['thich'];
		echo "dislike~$so_luong_nguoi_thich";exit;
	}
	echo 'Lỗi trong quá trình thích bài viết ,vui lòng thử lại sau';exit;
}catch(PDOException $e)
{
	echo $e->getMessage();exit;
}catch(Exception $e)
{
	$_SESSION['message']['type'] = 'error';
	$_SESSION['message']['content'] =  $e->getMessage();
	header("Location: {$_SERVER['HTTP_REFERER']}");
}