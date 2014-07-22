<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../../classes/xl_chuyen_muc.php';

	quan_tri('thanh_vien_phan_quyen_chuyen_muc');

	if(empty($_GET['ma']))
	{
		throw new Exception('Lỗi! [Mã thành viên] rỗng, vui lòng thử lại');
	}
	
	$ma_nguoi_dung = $_GET['ma'];
	$ma_nguoi_dung = urldecode(base64_decode($ma_nguoi_dung)); 

	$tv = $xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$ma_nguoi_dung, 'ma_dien_dan'=>$ma_dien_dan), 'ma_nguoi_dung, quyen,(select concat(ho, " ", ten)
	from nguoi_dung where ma=ma_nguoi_dung) as ho_ten');
	if(!$tv)
	{
		throw new Exception('Lỗi! Bạn không có quyền truy cập chức năng này');
	}

	$xl_chuyen_muc = new xl_chuyen_muc;
	$ds = $xl_chuyen_muc->danh_sach(0, 0, array('ma_dien_dan'=>$ma_dien_dan), 'ma DESC', '*', PDO::FETCH_ASSOC, '', false);
	
	$quyen = '';
	
	if($item=$xl_thanh_vien_dien_dan->doc(array('ma_dien_dan'=>$ma_dien_dan, 'ma_nguoi_dung'=>$ma_nguoi_dung), 'quyen_chuyen_muc'))
	{
		$quyen = $item['quyen_chuyen_muc'];
	}

	$dt_smarty->assign('thanh_vien', $tv);
	$dt_smarty->assign('quyen', $quyen);
	$dt_smarty->assign('ds_chuyen_muc', $ds);

	$titleForLayout = 'Phân quyền chuyên mục';
	$contentForLayout = $dt_smarty->fetch('thanh_vien/phan_quyen_chuyen_muc.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->assign('titleForLayout', $titleForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e){
	throwMessage($e, "/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/admin");
}