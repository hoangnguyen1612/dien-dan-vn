<?php

try{	
	include '../ini.php';
	include '../../classes/xl_nguoi_dung.php';
	include '../../classes/phan_trang_admin.php';
	
	# số phần tử trên 1 trang
	$limit = 5;
	$xl_nguoi_dung = new xl_nguoi_dung;
	
	# khởi tạo đối tượng phân trang
	$pt = new phan_trang('page',$limit);	
	$pt->so_pt_tren_mot_trang = $limit;
	
	# tính vị trí bắt đầu lấy số trang 
	$tu_khoa = '';
	if(isset($_GET['tu_khoa']))
	{
		$tu_khoa = $_GET['tu_khoa'];
	}
	$start = $pt->tim_vi_tri_bat_dau();
	
	# tính tổng số record
	$tong_record = $xl_nguoi_dung->dem(array('ten'=>$tu_khoa));
	$pt->tong_record = $tong_record;
	
	$dt_smarty->assign('phan_trang',$pt->in_bo_nut());
	
	# danh sách
	$danh_sach = $xl_nguoi_dung->danh_sach($start, $limit, '', 'ma ASC', '*', PDO::FETCH_ASSOC, '', false);
	if(isset($_GET['tu_khoa']))	
		$danh_sach = $xl_nguoi_dung->danh_sach($start, $limit, '', 'ma ASC', '*', PDO::FETCH_ASSOC, ' where ten like "%'.$tu_khoa.'%"', false);

	$dt_smarty->assign('danh_sach', $danh_sach);
	$contentForLayout = $dt_smarty->fetch('nguoi_dung/danh_sach.tpl');
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
	#unset session
	include '../end.php';
	
}catch(Exception $e)
{
	throwMessage($e);
}
?>