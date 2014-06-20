<?php
require_once 'xl_chung.php';
class xl_chuyen_muc extends xl_chung{
	protected $bang = 'loai_chuyen_muc';
}
function ten_chuyen_muc($ma_chuyen_muc,$ma_dien_dan){
	$dt_xl_chuyen_muc = new xl_chuyen_muc;
	$chuyen_muc = $dt_xl_chuyen_muc->doc(array('ma'=>$ma_chuyen_muc,'ma_dien_dan'=>$ma_dien_dan));
	return $chuyen_muc['ten'];
}