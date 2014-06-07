<?php
require_once 'xl_chung.php';
class xl_cap_bac extends xl_chung{
	protected $bang = 'cap_bac';
}
function lay_cap_bac($ma_dien_dan,$diem_so_thanh_vien){
	$xl_cap_bac = new xl_cap_bac;

$cap_bac = $xl_cap_bac->doc(array('ma_dien_dan'=>$ma_dien_dan),'icon',PDO::FETCH_ASSOC,"and ({$diem_so_thanh_vien} >= dau and {$diem_so_thanh_vien} <= cuoi)");
	return $cap_bac;
}