<?php
try{
	require '../ini.php';

	require '../classes/xl_thong_bao.php';
	
	#phân trang
	require '../classes/phan_trang.php';
	## số phần tử trên 1 trang
	$limit = 10;

	## khởi tạo đối tượng phân trang
	$pt = new phan_trang('page', $limit);	
	$pt->so_pt_tren_mot_trang = $limit;
	
	## tính vị trí bắt đầu lấy số trang 
	$start = $pt->tim_vi_tri_bat_dau();
	
	$xl_thong_bao = new xl_thong_bao;
	$danh_sach = '';
	
	if(isset($_GET['noi_dung_tb']))
	{
		$danh_sach = $xl_thong_bao->danh_sach($start, $limit, array('gui_den'=>$login['ma']), 'ngay_tao DESC', '*, 
		(select hinh_dai_dien from nguoi_dung where ma=gui_tu) as hinh_dai_dien, (select ten from nguoi_dung where ma=gui_tu) as ten,
		(select concat(ma_linh_vuc, concat("/",domain)) from dien_dan d where d.ma=ma_dien_dan) as domain', PDO::FETCH_ASSOC, ' and noi_dung like "%'.$_GET['noi_dung_tb'].'%"', true);
	}
	else
	{
		$danh_sach = $xl_thong_bao->danh_sach($start, $limit, array('gui_den'=>$login['ma']), 'ngay_tao DESC', '*, 
		(select hinh_dai_dien from nguoi_dung where ma=gui_tu) as hinh_dai_dien, (select ten from nguoi_dung where ma=gui_tu) as ten,
		(select concat(ma_linh_vuc, concat("/",domain)) from dien_dan d where d.ma=ma_dien_dan) as domain', PDO::FETCH_ASSOC, '', true);
	}
	$tong_record = $danh_sach[1];
	
	$pt->tong_record = $tong_record;
	$dt_smarty->assign('phan_trang',$pt->prev_and_next());

	$to = $pt->tim_trang_hien_tai()*$limit;
	$from = $to-$limit+1;
	
	if($from==$danh_sach[1])
	{
		$to = $from;
	}
	
	if($danh_sach[1]<$to)
	{
		$to = $danh_sach[1];
	}

	$dt_smarty->assign('danh_sach', $danh_sach[0]);
	$dt_smarty->assign('from', $from);
	$dt_smarty->assign('to', $to);
	$dt_smarty->assign('tong', $tong_record);

	$contentForLayout = $dt_smarty->fetch('thong_bao/index.tpl');
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e)
{
	throwMessage($e);
}