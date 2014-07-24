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

function kiem_tra_co_con($ma_chuyen_muc, $ma_dien_dan){
	$dt_xl_chuyen_muc = new xl_chuyen_muc;
	$chuyen_muc = $dt_xl_chuyen_muc->doc(array('ma_loai_cha'=>$ma_chuyen_muc,'ma_dien_dan'=>$ma_dien_dan), 'ma');
	
	if(!empty($chuyen_muc['ma']))
	{
		return 1;
	}
	return 0;
}