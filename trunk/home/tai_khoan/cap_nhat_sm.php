<?php
try{
	require '../ini.php';
	require '../classes/xl_nguoi_dung.php';
	$xl_nguoi_dung = new xl_nguoi_dung;
	$data = '';
	
	if(empty($_POST['ma']))
	{
		throw new Exception('Lỗi! Mã người dùng không hợp lệ (1)');
	}
	if(empty($_POST['id']))
	{
		throw new Exception('Lỗi! Thông tin dữ liệu không hợp lệ (2)');
	}
	$id = $_POST['id'];
	
	if($id!='gioi_tinh' && empty($_POST['data']))
	{
		throw new Exception('Lỗi! Thông tin dữ liệu không hợp lệ (3)');
	}
	if($id=='gioi_tinh' && !in_array($_POST['data'], array(0, 1)))
	{
		throw new Exception('Lỗi! Thông tin dữ liệu không hợp lệ (3)');
	}
	
	$data = $_POST['data'];
	if($id=='ngay_sinh')
	{
		$data = ngay_thang_nam($data);
	}
	
	if($id=='gioi_tinh')
	{
		$data = 'Nam';
		if($_POST['data']==1)
		{
			$data = 'Nữ';
		}
	}
	
	if(!$xl_nguoi_dung->cap_nhat(array($id=>$_POST['data'], 'ma'=>$_POST['ma'])))
	{
		throw new Exception('Lỗi! Vui lòng thử lại sau');
	}
	throw new Exception('success');
}catch(Exception $e)
{
	$return['message'] = $e->getMessage();
	$return['data'] = $data;
	echo json_encode($return);
}