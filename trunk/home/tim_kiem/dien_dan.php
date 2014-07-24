<?php
try{
	require '../ini.php';
	
	$url ='';
	if(empty($_GET['tu_khoa']))
	{
		throw new Exception('Vui lòng nhập từ khóa để tìm kiếm');
	}
	
	#phân trang
	require '../classes/phan_trang.php';
	
	## số phần tử trên 1 trang
	$limit = 4;

	## khởi tạo đối tượng phân trang
	$pt = new phan_trang('page',$limit);	
	$pt->so_pt_tren_mot_trang = $limit;
	
	## tính vị trí bắt đầu lấy số trang 
	$start = $pt->tim_vi_tri_bat_dau();
	
	/*====================================================*/
	$tu_khoa = $_GET['tu_khoa'];
	$dieu_kien = '';
	$bo_loc = array(0=>'Bộ lọc', 1=>'Thời gian', 2=>'Lượt xem', 3=>'Xếp hạng');
	$dt_smarty->assign('bo_loc', $bo_loc);
	
	if(isset($_GET['loai']) && in_array($_GET['loai'], array(1, 2, 3)))
	{
		switch($_GET['loai']){
			case 1: $dieu_kien = ' order by ngay_tao DESC';break;
			case 2: $dieu_kien = ' order by luot_xem DESC';break;
			case 3: $dieu_kien = ' order by feedback DESC';break;
		}
	}
	$sql = "SELECT d.ten, (select count(*) from bo_dem where bo_dem.ma_dien_dan = d.ma) as luot_xem, feedback, so_luong_thanh_vien, ngay_tao, hinh_dai_dien, ma_linh_vuc, domain
			FROM  `dien_dan` d
			LEFT JOIN  `linh_vuc` l ON d.ma_linh_vuc = l.ma
			WHERE MATCH(d.ten) AGAINST('$tu_khoa' in boolean mode) OR MATCH(l.ten) AGAINST('$tu_khoa' in boolean mode)
			$dieu_kien
			LIMIT $start, $limit
			";
				
	$sth = $dbh->prepare($sql);
	$sth->execute(array());
	$danh_sach = $sth->fetchAll(PDO::FETCH_ASSOC);
	
	## tính tổng số record
	$sql = "SELECT count(*)
			FROM  `dien_dan` d
			LEFT JOIN  `linh_vuc` l ON d.ma_linh_vuc = l.ma
			WHERE MATCH(d.ten) AGAINST('$tu_khoa' in boolean mode) OR MATCH(l.ten) AGAINST('$tu_khoa' in boolean mode)
			$dieu_kien";
				
	$sth = $dbh->prepare($sql);
	$sth->execute(array());
	$sl = $sth->fetchAll(PDO::FETCH_COLUMN);
	
	$tong_record = $sl[0];
	$pt->tong_record = $tong_record;
	$dt_smarty->assign('phan_trang',$pt->in_bo_nut());
	
	
	$dt_smarty->assign('so_luong', $sl[0]);
	$dt_smarty->assign('danh_sach', $danh_sach);
	
	$contentForLayout = $dt_smarty->fetch('tim_kiem/dien_dan.tpl');
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e)
{
	throwMessage($e, $url);
}