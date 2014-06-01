<?php
try{
	include '../ini.php';
	require '../../classes/xl_cap_bac.php';
	
	$_SESSION['data'] = $_POST['data'];
	
	$xl_cap_bac = new xl_cap_bac;
	kiem_tra_gia_tri($_POST['data']['icon'], array(1,2), 'Bộ biểu tượng cấp bậc');
	kiem_tra_rong($_POST['data']['so_cap_bac'], 'Số lượng cấp bậc');
	kiem_tra_la_so($_POST['data']['so_cap_bac'], 'Số lượng cấp bậc', 1);
	
	$dbh->beginTransaction();
	
	$icon = $_POST['data']['icon'];
	$so_cap_bac = $_POST['data']['so_cap_bac'];
	if($so_cap_bac<4)
	{
		throw new Exception('Lỗi! [Số lượng cấp bậc] phải tối thiểu từ 4 trở lên]');
	}
	
	if($icon==1)
	{
		if($so_cap_bac>11)
		{
			throw new Exception('Lỗi! [Số lượng cấp bậc] thuộc về [Bộ biểu tượng cấp bậc 1] phải nhỏ hơn hoặc bằng 11 (11: tổng số cấp bậc có trong bộ biểu tượng 1)');
		}
	}
	
	if($icon==2)
	{
		if($so_cap_bac>25)
		{
			throw new Exception('Lỗi! [Số lượng cấp bậc] thuộc về [Bộ biểu tượng cấp bậc 2] phải nhỏ hơn hoặc bằng 25 (25: tổng số cấp bậc có trong bộ biểu tượng 2)');
		}
	}
	
	if($xl_cap_bac->doc(array('ma_dien_dan'=>$ma_dien_dan)))
	{
		$xl_cap_bac->xoa(array('ma_dien_dan'=>$ma_dien_dan));
	}

	require '../../classes/xl_cau_hinh.php';
	$xl_cau_hinh = new xl_cau_hinh;
	
		$xl_cau_hinh->cap_nhat_dieu_kien(array('noi_dung'=>$so_cap_bac), array('ma_dien_dan'=>$ma_dien_dan, 'tu_khoa'=>'SO_LUONG_CAP_BAC'));
		$xl_cau_hinh->cap_nhat_dieu_kien(array('noi_dung'=>'icon'.$icon), array('ma_dien_dan'=>$ma_dien_dan, 'tu_khoa'=>'BIEU_TUONG_CAP_BAC'));
	
	$dbh->commit();	
	
	$url = 'cau_hinh.php';
	throw new Exception('Đã thiết lập biểu tượng và số lượng cấp bậc thành công', 30);
}catch(Exception $e)
{
	throwMessage($e, $url);
}