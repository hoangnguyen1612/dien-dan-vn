<?php
require_once 'xl_chung.php';
class xl_cap_bac extends xl_chung{
	protected $bang = 'cap_bac';
}
function lay_cap_bac($diem_so_thanh_vien){
	$xl_cap_bac = new xl_cap_bac;

	$cap_bac = $xl_cap_bac->doc(NULL,'icon',PDO::FETCH_ASSOC,"where ({$diem_so_thanh_vien} >= dau and {$diem_so_thanh_vien} <= cuoi)");
	return $cap_bac['icon'];
}