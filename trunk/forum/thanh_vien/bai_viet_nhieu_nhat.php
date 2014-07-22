<?php
try{
	include '../ini.php';
	include '../classes/xl_bai_viet.php';
	include '../classes/xl_cap_bac.php';
	
	$dt_xl_bai_viet = new xl_bai_viet;
	$dt_xl_cap_bac = new xl_cap_bac;
	
	$ds_thanh_vien_nhieu_bai_viet = $dt_xl_bai_viet->danh_sach(0,10,array('ma_dien_dan'=>$ma_dien_dan),'so_luong DESC','count(ma) so_luong,ma_nguoi_dang,(Select ten from nguoi_dung where nguoi_dung.ma = bai_viet.ma_nguoi_dang) ten_nguoi_dang,(Select diem_so from thanh_vien_dien_dan where thanh_vien_dien_dan.ma_nguoi_dung = bai_viet.ma_nguoi_dang and thanh_vien_dien_dan.ma_dien_dan = bai_viet.ma_dien_dan) diem_so',PDO::FETCH_ASSOC,'group by ma_nguoi_dang',false);
	$chuoi_thanh_vien = "";
	$chuoi_so_luong_bai_viet = "";
	$chuoi_ma_thanh_vien ="";
	$chuoi_cap_bac = "";
	$so_luong_thanh_vien = 0;
	foreach($ds_thanh_vien_nhieu_bai_viet as $thanh_vien){
		$so_luong_thanh_vien = $so_luong_thanh_vien + 1;
		$cap_bac = lay_cap_bac($thanh_vien['diem_so']);	
		$chuoi_cap_bac .= $cap_bac.',';
		$chuoi_thanh_vien .= $thanh_vien['ten_nguoi_dang'].',';
		$chuoi_so_luong_bai_viet .= $thanh_vien['so_luong'].',';
		$chuoi_ma_thanh_vien .= url_encode($thanh_vien['ma_nguoi_dang']).',';
	}
	$chuoi_cap_bac = trim($chuoi_cap_bac,',');
	$chuoi_thanh_vien = trim($chuoi_thanh_vien,',');
	$chuoi_so_luong_bai_viet = trim($chuoi_so_luong_bai_viet,',');
	$chuoi_ma_thanh_vien = trim($chuoi_ma_thanh_vien,',');
	
	echo "$chuoi_thanh_vien~$chuoi_so_luong_bai_viet~$so_luong_thanh_vien~$chuoi_ma_thanh_vien~$chuoi_cap_bac";
	exit;
	
	
}catch(Exception $e){
	throwMessage($e);
}