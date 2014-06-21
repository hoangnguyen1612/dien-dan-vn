<?php
require_once 'xl_chung.php';
class xl_binh_luan extends xl_chung{
	protected $bang = 'binh_luan_bai_viet';
}
function cong_like_binh_luan($ma_binh_luan){
	$xl_binh_luan = new xl_binh_luan;
	$xl_binh_luan->cap_nhat_bo_dem_dieu_kien(array('ma'=>$ma_binh_luan),'thich',1);
}
function tru_like_binh_luan($ma_binh_luan){
	$xl_binh_luan = new xl_binh_luan;
	$xl_binh_luan->cap_nhat_bo_dem_tru_dieu_kien(array('ma'=>$ma_binh_luan),'thich',1);
}
function trang_thai_binh_luan($ma_binh_luan,$ma_dien_dan){
	$xl_binh_luan = new xl_binh_luan;
	$binh_luan = $xl_binh_luan->doc(array('ma'=>$ma_binh_luan,'ma_dien_dan'=>$ma_dien_dan));
	return $binh_luan['trang_thai'];
	
}