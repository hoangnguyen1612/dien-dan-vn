<?php

try{
	include '../ini.php';

	if(empty($_GET['ma']))
	{
		throw new Exception("Lỗi! Mã người dùng không hợp lệ");
	}
	$ma = $_GET['ma'];
	
	include '../../classes/xl_nguoi_dung.php';
	$xl_nguoi_dung = new xl_nguoi_dung;
	
	#kt người dùng
	if(!$item = $xl_nguoi_dung->doc(array('ma'=>$ma), 'ma, hinh_dai_dien'))
	{
		throw new Exception('Lỗi! Người dùng không tồn tại');
	}
	
	include '../../classes/xl_thanh_vien_dien_dan.php';
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	
	#kt là chủ của 1 diễn đàn
	if($tv = $xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$ma, 'loai_thanh_vien'=>0), 'ma_nguoi_dung, (select ten from dien_dan where dien_dan.ma = thanh_vien_dien_dan.ma_dien_dan) ten_dien_dan'))
	{
		throw new Exception("Lỗi! Người dùng này là chủ của diễn đàn {$tv['ten_dien_dan']}, bạn cần phải xóa dữ liệu của diễn đàn này trước khi thực hiện thao tác này thành công");
	}
	
	include '../../classes/xl_bai_viet.php';
	include '../../classes/xl_bao_cao_bai_viet.php';
	include '../../classes/xl_bao_cao_binh_luan.php';
	include '../../classes/xl_feedback_bai_viet.php';
	include '../../classes/xl_feedback_binh_luan.php';
	include '../../classes/xl_thong_bao.php';
	include '../../classes/xl_binh_luan.php';
	
	$xl_bai_viet = new xl_bai_viet;
	$xl_bao_cao_bai_viet = new xl_bao_cao_bai_viet;
	$xl_bao_cao_binh_luan = new xl_bao_cao_binh_luan;
	$xl_feedback_bai_viet = new xl_feedback_bai_viet;
	$xl_feedback_binh_luan = new xl_feedback_binh_luan;
	$xl_thong_bao = new xl_thong_bao;
	$xl_binh_luan = new xl_binh_luan;
	
	#start
	$dbh->beginTransaction();
	
	#xử lý bai_viet
	if($xl_bai_viet->doc(array('ma_nguoi_dang'=>$ma), 'ma') && $xl_bai_viet->xoa(array('ma_nguoi_dang'=>$ma))===false)
	{
		throw new Exception('Đã có lỗi khi xóa các bài viết thuộc về người dùng này');
	}
	
	#xử lý binh_luan
	if($xl_binh_luan->doc(array('ma_nguoi_dung'=>$ma), 'ma') && $xl_binh_luan->xoa(array('ma_nguoi_dung'=>$ma))===false)
	{
		throw new Exception('Đã có lỗi khi xóa các bình luận thuộc về người dùng này');
	}
	
	#xử lý feedback_binh_luan
	if($xl_feedback_binh_luan->doc(array('ma_nguoi_dung'=>$ma), 'ma') && $xl_feedback_binh_luan->xoa(array('ma_nguoi_dung'=>$ma))===false)
	{
		throw new Exception('Đã có lỗi khi xóa các bình chọn thuộc về người dùng này');
	}
	
	#xử lý feedback_bai_viet
	if($xl_feedback_bai_viet->doc(array('ma_nguoi_dung'=>$ma), 'ma') && $xl_feedback_bai_viet->xoa(array('ma_nguoi_dung'=>$ma))===false)
	{
		throw new Exception('Đã có lỗi khi xóa các bình chọn cho các bài viết thuộc về người dùng này');
	}
	
	#xử lý báo cáo bài viết
	if($xl_bao_cao_bai_viet->doc(array('ma_nguoi_bao_cao'=>$ma), 'ma') && $xl_bao_cao_bai_viet->xoa(array('ma_nguoi_bao_cao'=>$ma))===false)
	{
		throw new Exception('Đã có lỗi khi xóa các báo cáo bài viết thuộc về người dùng này');
	}
	
	#xử lý báo cáo bình luận
	if($xl_bao_cao_binh_luan->doc(array('ma_nguoi_bao_cao'=>$ma), 'ma') && $xl_bao_cao_binh_luan->xoa(array('ma_nguoi_bao_cao'=>$ma))===false)
	{
		throw new Exception('Đã có lỗi khi xóa các báo cáo bình luận thuộc về người dùng này');
	}

	#xử lý thông báo
	if($xl_thong_bao->doc(array('gui_tu'=>$ma), 'ma') && !$xl_thong_bao->xoa(array('gui_tu'=>$ma)))
	{
		throw new Exception('Đã có lỗi khi xóa các thông báo thuộc về người dùng này');
	}
	if($xl_thong_bao->doc(array('gui_den'=>$ma), 'ma') && !$xl_thong_bao->xoa(array('gui_den'=>$ma)))
	{
		throw new Exception('Đã có lỗi khi xóa các thông báo thuộc về người dùng này');
	}
	
	#xử lý thành viên diễn đàn
	if($xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$ma), 'ma') && !$xl_thanh_vien_dien_dan->xoa(array('ma_nguoi_dung'=>$ma)))
	{
		throw new Exception('Đã có lỗi khi xóa người dùng này trong thành viên diễn đàn');
	}
	
	#xử lý người dùng
	if($xl_nguoi_dung->doc(array('ma'=>$ma), 'ma') && !$xl_nguoi_dung->xoa(array('ma'=>$ma)))
	{
		throw new Exception('Đã có lỗi khi xóa người dùng này');
	}
	
	if(!empty($item['hinh_dai_dien']))
	{
		if(file_exists("../../upload/nguoi_dung/{$item['hinh_dai_dien']}"))
		{
			unlink('../../upload/nguoi_dung/'.$item['hinh_dai_dien']);	
		}
	}
	#end
	$dbh->commit();
	
	throw new Exception('Đã xóa dữ liệu thuộc người dùng này thành công', 30);
}catch(PDOException $e)
{
	echo $e->getMessage();exit;	
}catch(Exception $e)
{
	throwMessage($e);	
}
?>