<?php
try{
	require '../ini.php';
	require '../classes/xl_nguoi_dung.php';
	
	if(!empty($_POST['email']))
	{
		throw new Exception('Lỗi! Email không thể cập nhật');
	}
	
	$dia_chi = '';
	if(!empty($_POST['dia_chi']))
	{
		$dia_chi = $_POST['dia_chi'];
	}
	
	$dien_thoai = '';
	if(!empty($_POST['dien_thoai']))
	{
		$dien_thoai = $_POST['dien_thoai'];
		if(!is_numeric($dien_thoai))
		{
			throw new Exception('Lỗi! Số điện thoại phải là kiểu số');
		}
	}
	
	$xl_nguoi_dung = new xl_nguoi_dung;
	$nguoi_dung = $xl_nguoi_dung->cap_nhat(array('ma'=>$_SESSION['login']['ma'], 'dia_chi'=>$dia_chi, 'dien_thoai'=>$dien_thoai));
	
	$_SESSION['login']['dia_chi'] = $dia_chi;
	$_SESSION['login']['dien_thoai'] = $dien_thoai;
	
	$return['error'] = false;
	$return['message'] = 'Đã cập nhật thông tin thành công';
	echo json_encode($return);
	exit;
	
}catch(Exception $e)
{
	$return['error'] = true;
	$return['message'] = $e->getMessage();
	echo json_encode($return);
}