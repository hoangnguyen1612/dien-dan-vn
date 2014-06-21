<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../classes/xl_feedback_dien_dan.php';
	include '../classes/phan_trang_1.php';
	
	$limit = 4;
	$pt = new phan_trang('page',$limit);	
	$pt->so_pt_tren_mot_trang = $limit;
	$start = $pt->tim_vi_tri_bat_dau();
	
	if(!is_array($login))
	{
		throw new Exception('Vui lòng đăng nhập để thực hiện chức năng này ');
	}
	$danh_sach = '';
	$title = 'Phản hồi diễn đàn';
	
	$xl_feedback_dien_dan = new xl_feedback_dien_dan;
	$danh_sach = $xl_feedback_dien_dan->danh_sach($start, $limit, array('ma_dien_dan'=>$ma_dien_dan), 'ngay_tao DESC', '*, (select hinh_dai_dien from nguoi_dung where ma = ma_nguoi_dung) as hinh_dai_dien, (select concat(ho, concat(" ", ten)) from nguoi_dung where ma = ma_nguoi_dung) as ho_ten', PDO::FETCH_ASSOC, '', true);

	$pt->tong_record = $danh_sach[1];
	$tong_so_trang = $pt->ceil_tong_so_trang();
	$trang_hien_tai = $pt->tim_trang_hien_tai();
	
	$dt_smarty->assign('phan_trang', $pt->in_bo_nut());
	$dt_smarty->assign('tong_so_trang',$tong_so_trang);
	$dt_smarty->assign('trang_hien_tai',$trang_hien_tai);
	$dt_smarty->assign('danh_sach',$danh_sach[0]);
	
	$contentForLayout = $dt_smarty->fetch('phan_hoi/them.tpl');
	$dt_smarty->assign('title', $title);
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e){
	throwMessage($e);
}