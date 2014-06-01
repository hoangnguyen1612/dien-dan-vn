<?php
require_once 'xl_chung.php';
class xl_bao_cao_bai_viet extends xl_chung{
	protected $bang = 'bao_cao_bai_viet';
}
function trang_thai_bao_cao_bai_viet($ma_bai_viet,$ma_nguoi_dung,$ma_dien_dan){
	$xl_bao_cao_bai_viet = new xl_bao_cao_bai_viet;
	$trang_thai = $xl_bao_cao_bai_viet->doc(array('ma_bai_viet'=>$ma_bai_viet,'ma_nguoi_bao_cao'=>$ma_nguoi_dung,'ma_dien_dan'=>$ma_dien_dan),'ma');
	return $trang_thai;
}
