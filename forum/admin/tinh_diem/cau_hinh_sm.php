<?php
try{
	include '../ini.php';
	require '../../classes/xl_tinh_diem.php';
	
	quan_tri('tinh_diem_cau_hinh');
	
	$xl_tinh_diem = new xl_tinh_diem;
	kiem_tra_rong($_POST['data']['bai_viet'], 'Điểm cho tạo bài viết');
	kiem_tra_rong($_POST['data']['thich'], 'Điểm cho thích bình luận hoặc bài viết');
	kiem_tra_rong($_POST['data']['binh_luan_dung'], 'Điểm cho bình luận đúng');
	kiem_tra_la_so($_POST['data']['bai_viet'], 'Điểm cho tạo bài viết', 1);
	kiem_tra_la_so($_POST['data']['thich'], 'Điểm cho thích bình luận hoặc bài viết', 1);
	kiem_tra_la_so($_POST['data']['binh_luan_dung'], 'Điểm cho bình luận đúng', 1);
	
	if($_POST['data']['bai_viet']>500)
	{
		throw new Exception('Lỗi! [Điểm cho tạo bài viết] chỉ nằm trong khoảng từ 1 đến 500');
	}
	if($_POST['data']['thich']>500)
	{
		throw new Exception('Lỗi! [Điểm cho thích bình luận hoặc bài viết] chỉ nằm trong khoảng từ 1 đến 500');
	}
	if($_POST['data']['binh_luan_dung']>500)
	{
		throw new Exception('Lỗi! [Điểm cho bình luận đúng] chỉ nằm trong khoảng từ 1 đến 500');
	}
	
	$xl_tinh_diem->cap_nhat_dieu_kien($_POST['data'], array('ma_dien_dan'=>$ma_dien_dan));
	
	throw new Exception('Đã cập nhật giá trị tính điểm thành công', 30);
}catch(Exception $e)
{
	throwMessage($e);
}