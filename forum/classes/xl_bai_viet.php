<?php
require_once 'xl_chung.php';
class xl_bai_viet extends xl_chung{
	protected $bang = 'bai_viet';
}

function dem_bai_viet($ma_dien_dan, $ma_loai_chuyen_muc)
{
	$xl_bai_viet = new xl_bai_viet;
	return $xl_bai_viet->dem(array('ma_dien_dan'=>$ma_dien_dan, 'ma_loai_chuyen_muc'=>$ma_loai_chuyen_muc));
}
function bai_viet_moi($ma_dien_dan, $ma_loai_chuyen_muc)
{
	$xl_bai_viet = new xl_bai_viet;
	return $xl_bai_viet->doc(array('ma_dien_dan'=>$ma_dien_dan, 'ma_loai_chuyen_muc'=>$ma_loai_chuyen_muc), 'ngay_tao, ma, ma_nguoi_dang', 
	PDO::FETCH_ASSOC, " and ngay_tao = (select max(ngay_tao) from `bai_viet` where ma_dien_dan = '$ma_dien_dan' and ma_loai_chuyen_muc = '$ma_loai_chuyen_muc')");
}
function dem_bai_viet_thanh_vien($ma_dien_dan, $ma_nguoi_dang)
{
	$xl_bai_viet = new xl_bai_viet;
	return $xl_bai_viet->dem(array('ma_dien_dan'=>$ma_dien_dan, 'ma_nguoi_dang'=>$ma_nguoi_dang));
}
function cong_like_bai_viet($ma_bai_viet){
	$xl_bai_viet = new xl_bai_viet;
	$xl_bai_viet->cap_nhat_bo_dem_dieu_kien(array('ma'=>$ma_bai_viet),'thich',1);
}
function tru_like_bai_viet($ma_bai_viet){
	$xl_bai_viet = new xl_bai_viet;
	$xl_bai_viet->cap_nhat_bo_dem_tru_dieu_kien(array('ma'=>$ma_bai_viet),'thich',1);
}