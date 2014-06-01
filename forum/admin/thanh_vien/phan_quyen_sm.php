<?php 
try{
	require '../ini.php';
	require '../../classes/xl_thanh_vien_dien_dan.php';
	
	quan_tri('thanh_vien_phan_quyen');
	
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	
	if(empty($_POST['ma_nguoi_dung']))
	{
		throw new Exception('Lỗi! [Mã thành viên] không hợp lệ');
	}
	if(empty($_POST['item']))
	{
		throw new Exception('Lỗi! [Danh sách quyền] không hợp lệ');
	}
	$ma_nguoi_dung = $_POST['ma_nguoi_dung'];
	$ma_nguoi_dung = url_decode($ma_nguoi_dung); 
	$ds_quyen = $_POST['item'];
	$quyen = '';
	
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	if(!$tv = $xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$ma_nguoi_dung, 'ma_dien_dan'=>$ma_dien_dan), 'ma_nguoi_dung, quyen'))
	{
		throw new Exception('Lỗi! [Mã thành viên] không tồn tại trong diễn đàn, vui lòng thử lại');
	}
	

	foreach($ds_quyen as $key=>$value)
	{
		$quyen.=$value.',';
	}

	$xl_thanh_vien_dien_dan->cap_nhat_dieu_kien(array('quyen'=>$quyen), array('ma_nguoi_dung'=>$ma_nguoi_dung, 'ma_dien_dan'=>$ma_dien_dan));
	
	if(isset($_POST['save-and-end']))
	{
		$url = 'danh_sach.php';
	}
	
	throw new Exception('Thành công! Đã cập nhật quyền cho thành viên', 30);
}catch(Exception $e)
{
	throwMessage($e, $url);
}