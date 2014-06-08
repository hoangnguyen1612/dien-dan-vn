<?php
try{
	require '../ini.php';
	
	if($login=='')
	{
		throw new Exception('Vui lòng đăng nhập để thực hiện chức năng này');
	}
	if($thanh_vien!='')
	{
		if($thanh_vien['loai_thanh_vien']==3)
		{
			throw new Exception('Yêu cầu của bạn đã được gửi vào lúc '.date('H:i d/m/Y', strtotime($thanh_vien['ngay_gia_nhap'])).', vui lòng đợi chấp nhận từ ban quản trị của diễn đàn');
		}
		throw new Exception('Bạn đã là thành viên của diễn đàn, vui lòng không cố gắng để thực hiện tác vụ này');
	}
	$dbh->beginTransaction();
	
	require '../classes/xl_thanh_vien_dien_dan.php';
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	
	$xl_thanh_vien_dien_dan->them(array('ma_dien_dan'=>$ma_dien_dan, 'ma_nguoi_dung'=>$ma_nguoi_dung, 'loai_thanh_vien'=>3, 'ngay_gia_nhap'=>date('Y-m-d H:i:s'), 'trang_thai'=>1));

	require '../classes/xl_thong_bao.php';
	$xl_thong_bao = new xl_thong_bao;
	// loại thông báo 0: thành viên mới diễn đàn
	$xl_thong_bao->them(array('loai_thong_bao'=>0, 'gui_tu'=>$ma_nguoi_dung, 'gui_den'=>$dien_dan['ma_nguoi_tao'], 'ma_dien_dan'=>$ma_dien_dan, 'trang_thai'=>0, 'noi_dung'=>"{$login['ho']} {$login['ten']} đã gửi yêu cầu xin gia nhập vào diễn đàn {$dien_dan['ten']}", 'ngay_tao'=>date('Y-m-d H:i:s'), 
	'duong_dan'=>"/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/thanh_vien/yeu_cau_tham_gia"));
	
	$dbh->commit();
	
	throw new Exception('Yêu cầu tham gia diễn đàn của bạn đã được gửi thành công, vui lòng đợi chấp nhận từ ban quản trị', 30);
}catch(PDOException $e)
{
	$e->getMessage();exit;
}catch(Exception $e)
{
	throwMessage($e);
}