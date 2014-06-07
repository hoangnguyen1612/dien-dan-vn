<?php
try{
	include '../ini.php';
	include '../classes/xl_bai_viet.php';
	
	$dt_xl_bai_viet = new xl_bai_viet;
	
	$ds_thanh_vien_nhieu_bai_viet = $dt_xl_bai_viet->danh_sach(0,10,array('ma_dien_dan'=>$ma_dien_dan),'so_luong DESC','count(ma) so_luong,ma_nguoi_dang,(Select ho_ten from nguoi_dung where nguoi_dung.ma = bai_viet.ma_nguoi_dang) ten_nguoi_dang',PDO::FETCH_ASSOC,'group by ma_nguoi_dang',true);
	$chuoi_thanh_vien = "";
	$chuoi_so_luong_bai_viet = "";
	$chuoi_ma_thanh_vien ="";
	$so_luong_thanh_vien = $ds_thanh_vien_nhieu_bai_viet[1];
	foreach($ds_thanh_vien_nhieu_bai_viet[0] as $thanh_vien){
		$chuoi_thanh_vien .= $thanh_vien['ten_nguoi_dang'].',';
		$chuoi_so_luong_bai_viet .= $thanh_vien['so_luong'].',';
		$chuoi_ma_thanh_vien .= $thanh_vien['ma_nguoi_dang'].',';
	}
	$chuoi_thanh_vien = trim($chuoi_thanh_vien,',');
	$chuoi_so_luong_bai_viet = trim($chuoi_so_luong_bai_viet,',');
	$chuoi_ma_thanh_vien = trim($chuoi_ma_thanh_vien,',');
	
	echo "$chuoi_thanh_vien~$chuoi_so_luong_bai_viet~$so_luong_thanh_vien~$chuoi_ma_thanh_vien";
	exit;
	
	
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}