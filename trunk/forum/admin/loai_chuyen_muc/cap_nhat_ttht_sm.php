<?php
try{
	require '../ini.php';
	require '../../classes/xl_chuyen_muc.php';
	
	$xl_chuyen_muc = new xl_chuyen_muc;
	kiem_tra_rong($_POST['sort'], 'Thứ tự hiển thị các chuyên mục');
	
	$dbh->beginTransaction();
	
	$sort = $_POST['sort'];
	
	$ds = explode(',', $sort);
	$data = array();
	$i = 1;
	
	foreach($ds as $value)
	{
		if(!$xl_chuyen_muc->doc(array('ma_dien_dan'=>$ma_dien_dan, 'ma'=>$value)))
		{
			throw new Exception("Lỗi! Mã chuyên mục [#$value] không tồn tại");
		}
		$data[$i] = $value;
		$i++;
	}
	
	foreach($data as $key=>$value)
	{
		if(!$xl_chuyen_muc->cap_nhat_dieu_kien(array('thu_tu_hien_thi'=>$key), array('ma_dien_dan'=>$ma_dien_dan, 'ma'=>$value)))
		{
			throw new Exception();
		}
	}
	
	if(isset($_POST['save-and-exit']))
	{
		$url = 'danh_sach.php';
	}
	
	$dbh->commit();
	throw new Exception('', 30);
	
}catch(Exception $e)
{
	throwMessage($e, $url);
}