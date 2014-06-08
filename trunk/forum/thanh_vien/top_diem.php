<?php
try{
	include '../ini.php';
	include '../classes/xl_thanh_vien_dien_dan.php';

	
	$dt_xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	
	$ds_thanh_vien_diem_so_cao = $dt_xl_thanh_vien_dien_dan->danh_sach(0,10,array('ma_dien_dan'=>$ma_dien_dan),'diem_so DESC','ma_dien_dan,ma_nguoi_dung,diem_so,(Select ten from nguoi_dung where nguoi_dung.ma = thanh_vien_dien_dan.ma_nguoi_dung) ten_nguoi_dung',PDO::FETCH_ASSOC,'',true);
	$chuoi_ma_thanh_vien ="";
	$chuoi_thanh_vien = "";
	$chuoi_so_luong_bai_viet = "";
	$chuoi_icon = "";
	$chuoi_diem_so = "";
	$so_luong_thanh_vien = 0;
	foreach($ds_thanh_vien_diem_so_cao[0] as $thanh_vien){	
		$so_luong_thanh_vien = $so_luong_thanh_vien + 1;
		$chuoi_icon .= lay_icon_diem($thanh_vien['ma_nguoi_dung'],$ma_dien_dan).',';
		$chuoi_thanh_vien .= $thanh_vien['ten_nguoi_dung'].',';
		$chuoi_diem_so .= $thanh_vien['diem_so'].',';
		$chuoi_ma_thanh_vien .= $thanh_vien['ma_nguoi_dung'].',';
	}
	$chuoi_thanh_vien = trim($chuoi_thanh_vien,',');
	$chuoi_diem_so = trim($chuoi_diem_so,',');
	$chuoi_icon = trim($chuoi_icon,',');
	$chuoi_ma_thanh_vien = trim($chuoi_ma_thanh_vien,',');
	echo "$chuoi_thanh_vien~$chuoi_diem_so~$chuoi_icon~$so_luong_thanh_vien~$chuoi_ma_thanh_vien";
	
	
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}