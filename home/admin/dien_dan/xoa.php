<?php

try{
	include '../ini.php';

	if(empty($_GET['ma']))
	{
		throw new Exception("Lỗi! Mã diễn đàn không hợp lệ");
	}
	$ma = $_GET['ma'];
	
	include '../../classes/xl_dien_dan.php';
	$xl_dien_dan = new xl_dien_dan;
	
	#kt_dien_dan
	if(!$item = $xl_dien_dan->doc(array('ma'=>$ma), 'ma, hinh_dai_dien'))
	{
		throw new Exception('Lỗi! Diễn đàn không tồn tại');
	}
	
	include '../../classes/xl_bai_viet.php';
	include '../../classes/xl_bao_cao_bai_viet.php';
	include '../../classes/xl_bao_cao_binh_luan.php';
	include '../../classes/xl_cau_hinh.php';
	include '../../classes/xl_feedback_bai_viet.php';
	include '../../classes/xl_feedback_binh_luan.php';
	include '../../classes/xl_chuyen_muc.php';
	include '../../classes/xl_thong_bao.php';
	include '../../classes/xl_thanh_vien_dien_dan.php';
	include '../../classes/xl_binh_luan.php';
	
	$xl_bai_viet = new xl_bai_viet;
	$xl_bao_cao_bai_viet = new xl_bao_cao_bai_viet;
	$xl_bao_cao_binh_luan = new xl_bao_cao_binh_luan;
	$xl_cau_hinh = new xl_cau_hinh ;
	$xl_feedback_bai_viet = new xl_feedback_bai_viet;
	$xl_feedback_binh_luan = new xl_feedback_binh_luan;
	$xl_chuyen_muc = new xl_chuyen_muc;
	$xl_thong_bao = new xl_thong_bao;
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	$xl_binh_luan = new xl_binh_luan;
	
	#start
	$dbh->beginTransaction();
	
	#xử lý bai_viet
	if($xl_bai_viet->doc(array('ma_dien_dan'=>$ma), 'ma_dien_dan') && !$xl_bai_viet->xoa(array('ma_dien_dan'=>$ma)))
	{
		throw new Exception('Đã có lỗi khi xóa các bài viết thuộc diễn đàn này');
	}
	
	#xử lý binh_luan
	if($xl_binh_luan->doc(array('ma_dien_dan'=>$ma), 'ma_dien_dan') && !$xl_binh_luan->xoa(array('ma_dien_dan'=>$ma)))
	{
		throw new Exception('Đã có lỗi khi xóa các bình luận cho bài viết thuộc diễn đàn này');
	}
	
	#xử lý feedback_binh_luan
	if($xl_feedback_binh_luan->doc(array('ma_dien_dan'=>$ma), 'ma') && !$xl_feedback_binh_luan->xoa(array('ma_dien_dan'=>$ma)))
	{
		throw new Exception('Đã có lỗi khi xóa các bình chọn cho bình luận trong diễn đàn này');
	}
	
	#xử lý feedback_bai_viet
	if($xl_feedback_bai_viet->doc(array('ma_dien_dan'=>$ma), 'ma') && !$xl_feedback_bai_viet->xoa(array('ma_dien_dan'=>$ma)))
	{
		throw new Exception('Đã có lỗi khi xóa các bình chọn cho các bài viết thuộc diễn đàn này');
	}
	
	#xử lý báo cáo bài viết
	if($xl_bao_cao_bai_viet->doc(array('ma_dien_dan'=>$ma), 'ma') && !$xl_bao_cao_bai_viet->xoa(array('ma_dien_dan'=>$ma)))
	{
		throw new Exception('Đã có lỗi khi xóa các báo cáo bài viết thuộc về diễn đàn này');
	}
	
	#xử lý báo cáo bình luận
	if($xl_bao_cao_binh_luan->doc(array('ma_dien_dan'=>$ma), 'ma') && !$xl_bao_cao_binh_luan->xoa(array('ma_dien_dan'=>$ma)))
	{
		throw new Exception('Đã có lỗi khi xóa các báo cáo bình luận thuộc về diễn đàn này');
	}
	
	#xử lý cấu hình
	if($xl_cau_hinh->doc(array('ma_dien_dan'=>$ma), 'ma_dien_dan') && !$xl_cau_hinh->xoa(array('ma_dien_dan'=>$ma)))
	{
		throw new Exception('Đã có lỗi khi xóa thông tin cấu hình của diễn đàn này');
	}
	
	#xử lý loại chuyên mục
	if($xl_chuyen_muc->doc(array('ma_dien_dan'=>$ma), 'ma') && !$xl_chuyen_muc->xoa(array('ma_dien_dan'=>$ma)))
	{
		throw new Exception('Đã có lỗi khi xóa các chuyên mục thuộc diễn đàn này');
	}
	
	#xử lý thông báo
	if($xl_thong_bao->doc(array('ma_dien_dan'=>$ma), 'ma') && !$xl_thong_bao->xoa(array('ma_dien_dan'=>$ma)))
	{
		throw new Exception('Đã có lỗi khi xóa các thông báo thuộc diễn đàn này');
	}
	
	#xử lý thành viên diễn đàn
	if(!$xl_thanh_vien_dien_dan->xoa(array('ma_dien_dan'=>$ma)))
	{
		throw new Exception('Đã có lỗi khi xóa các thành viên thuộc diễn đàn này');
	}
	
	#xử lý diễn đàn
	if(!$xl_dien_dan->xoa(array('ma'=>$ma)))
	{
		throw new Exception('Đã có lỗi khi xóa diễn đàn này');
	}
	
	#end
	if(!empty($item['hinh_dai_dien']))
	{
		unlink('../../upload/dien_dan/'.$item['hinh_dai_dien']);
	}
	
	$dbh->commit();
	
	throw new Exception('Đã xóa dữ liệu thuộc diễn đàn này thành công', 30);
}catch(PDOException $e)
{
	echo $e->getMessage();exit;	
}catch(Exception $e)
{
	throwMessage($e);	
}
?>