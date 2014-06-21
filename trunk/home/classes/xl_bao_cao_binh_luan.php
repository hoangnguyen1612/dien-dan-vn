<?php
require_once 'xl_chung.php';
class xl_bao_cao_binh_luan extends xl_chung{
	protected $bang = 'bao_cao_binh_luan';
}
function trang_thai_bao_cao_binh_luan($ma_binh_luan,$ma_nguoi_dung,$ma_dien_dan){
	$xl_bao_cao_binh_luan = new xl_bao_cao_binh_luan;
	$trang_thai = $xl_bao_cao_binh_luan->doc(array('ma_binh_luan'=>$ma_binh_luan,'ma_nguoi_bao_cao'=>$ma_nguoi_dung,'ma_dien_dan'=>$ma_dien_dan),'ma');
	return $trang_thai;
}