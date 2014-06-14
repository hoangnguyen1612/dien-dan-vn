<?php
require_once 'xl_chung.php';
class xl_thanh_vien_dien_dan extends xl_chung{
	protected $bang = 'thanh_vien_dien_dan';
}
function cong_diem_thanh_vien($ma_nguoi_dung,$ma_dien_dan,$so_luong_diem){
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	$result = $xl_thanh_vien_dien_dan->cap_nhat_bo_dem_dieu_kien(array('ma_nguoi_dung'=>$ma_nguoi_dung,'ma_dien_dan'=>$ma_dien_dan),'diem_so',$so_luong_diem);
	
}
function tru_diem_thanh_vien($ma_nguoi_dung,$ma_dien_dan,$so_luong_diem){
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	$result = $xl_thanh_vien_dien_dan->cap_nhat_bo_dem_tru_dieu_kien(array('ma_nguoi_dung'=>$ma_nguoi_dung,'ma_dien_dan'=>$ma_dien_dan),'diem_so',$so_luong_diem);
}
function lay_icon_diem($ma_nguoi_dung,$ma_dien_dan){
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	$thanh_vien = $xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$ma_nguoi_dung,'ma_dien_dan'=>$ma_dien_dan),'thanh_vien_dien_dan.*,(Select icon from cap_bac where dau <= thanh_vien_dien_dan.diem_so and thanh_vien_dien_dan.diem_so <= cuoi) icon');
	return $thanh_vien['icon'];
}
function trang_thai_tai_khoan($ma_nguoi_dung,$ma_dien_dan){
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	$thanh_vien = $xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$ma_nguoi_dung,'ma_dien_dan'=>$ma_dien_dan));
	return $thanh_vien['trang_thai'];
}