<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../../../home/classes/xl_nguoi_dung.php';
	include '../../../home/classes/xl_thanh_vien_dien_dan.php';
	include '../../classes/phan_trang.php';

	quan_tri('thanh_vien_phan_quyen');

	if(empty($_GET['ma']))
	{
		throw new Exception('Lỗi! [Mã thành viên] rỗng, vui lòng thử lại');
	}
	$ma_nguoi_dung = $_GET['ma'];
	$ma_nguoi_dung = url_decode($ma_nguoi_dung); 
	
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	if(!$tv = $xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$ma_nguoi_dung, 'ma_dien_dan'=>$ma_dien_dan), 'ma_nguoi_dung, quyen'))
	{
		throw new Exception('Lỗi! [Mã thành viên] không tồn tại trong diễn đàn, vui lòng thử lại');
	}
	
	$thu_muc = array('thong_ke'=>'Thống kê', 'bai_viet'=>'Bài viết', 'loai_chuyen_muc'=>'Chuyên mục', 'cau_hinh'=>'Cấu hình', 'thanh_vien'=>'Thành viên', 'tinh_diem'=>'Tính điểm', 'cap_bac'=>'Cấp bậc thành viên');
	$thao_tac = array(
		'thong_ke'=>array('tong_quat'=>'Tổng quát'),
		'bai_viet'=>array('xoa'=>'Xóa', 'cap_nhat'=>'Cập nhật'),
		'loai_chuyen_muc'=>array('danh_sach'=>'Danh sách', 'them'=>'Thêm', 'cap_nhat'=>'Cập nhật', 'xoa'=>'Xóa'),
		'cau_hinh'=>array('danh_sach'=>'Danh sách', 'them'=>'Thêm', 'cap_nhat'=>'Cập nhật', 'xoa'=>'Xóa'),
		'thanh_vien'=>array('danh_sach'=>'Danh sách', 'cap_nhat'=>'Cập nhật', 'xoa'=>'Xóa', 'phan_quyen'=>'Phân quyền'),
		'tinh_diem'=>array('cau_hinh'=>'Cấu hình'),
		'cap_bac'=>array('cau_hinh'=>'Cấu hình', 'tong_quat'=>'Tổng quát')
	);
	
	$dt_smarty->assign('thu_muc', $thu_muc);
	$dt_smarty->assign('thao_tac', $thao_tac);
	$dt_smarty->assign('quyen', $tv['quyen']);
	
	$titleForLayout = 'Phân quyền';
	$contentForLayout = $dt_smarty->fetch('thanh_vien/phan_quyen.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->assign('titleForLayout', $titleForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e){
	throwMessage($e);
}