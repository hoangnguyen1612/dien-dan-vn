<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../../classes/xl_nguoi_dung.php';
	include '../../classes/phan_trang.php';

	quan_tri('thanh_vien_phan_quyen');

	if(empty($_GET['ma']))
	{
		throw new Exception('Lỗi! [Mã thành viên] rỗng, vui lòng thử lại');
	}
	$ma = $_GET['ma'];
	$ma = url_decode($ma); 

	if(!$tv = $xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$ma, 'ma_dien_dan'=>$ma_dien_dan), 'quyen'))
	{
		throw new Exception('Lỗi! [Mã thành viên] không tồn tại trong diễn đàn, vui lòng thử lại');
	}
	
	$thu_muc = array('thong_ke'=>'Thống kê', 'loai_chuyen_muc'=>'Chuyên mục', 'thanh_vien'=>'Thành viên', 'cau_hinh'=>'Cấu hình');
	$thao_tac = array(
		'thong_ke'=>array('tong_quat'=>array('Tổng quát','* Thống kê top các diễn đàn có lượt truy cập nhiều nhất và các diễn đàn nhận được điểm phản hồi cao nhất'), 'thanh_vien'=>array('Thành viên', '* Thống kê số lượng bài viết của các thành viên, các bình luận đúng, bình luận giúp ích và điểm số')),
		'loai_chuyen_muc'=>array('them'=>'Thêm', 'cap_nhat'=>'Cập nhật', 'xoa'=>'Xóa'),
		'thanh_vien'=>array('cap_nhat'=>'Cập nhật', 'xoa'=>'Xóa', 'phan_quyen'=>array('Phân quyền chức năng', '* Phân quyền chức năng cho phép thành viên có thể thao tác thêm xóa sửa dữ liệu của các chuyên mục, thông tin của diễn đàn, danh sách các thành viên trong diễn đàn...'), 'phan_quyen_chuyen_muc'=>array('Phân quyền chuyên mục', '* Phân quyền chuyên mục cho phép thành viên có thể bổ nhiệm quản trị viên cho bất kỳ một chuyên mục nào đó trong diễn đàn. Người quản trị viên này sẽ có quyền xử lý các vấn đề liên quan đến bài viết và bình luận thuộc về chuyên mục mà họ được cấp quyền')),
		'cau_hinh'=>array('cap_nhat_mau_sac'=>array('Cập nhật màu sắc menu', '* Cập nhật màu sắc cho thanh menu ở trang chủ'), 'cap_nhat_thong_so'=>array('Cập nhật thông số', '* Các thông số bao gồm: câu khẩu hiệu của diễn đàn (slogan), mô tả về diễn đàn, hình đại diện cho diễn đàn'))
	);
	
	$dt_smarty->assign('ma_tv', $ma);
	$dt_smarty->assign('ho_ten', get_ho_ten($ma));
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
	throwMessage($e, "/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/admin");
}