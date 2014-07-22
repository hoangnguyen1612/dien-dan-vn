<?php
require_once 'xl_chung.php';
class xl_nguoi_dung extends xl_chung{
	protected $bang = 'nguoi_dung';
}

function thong_tin_nguoi_dung($ma)
{
	$xl_nguoi_dung = new xl_nguoi_dung;
	return $xl_nguoi_dung->doc(array('ma'=>$ma));
}

function get_ho_ten($ma)
{
	$xl_nguoi_dung = new xl_nguoi_dung;
	$nguoi_dung = $xl_nguoi_dung->doc(array('ma'=>$ma), 'concat(ho, " ", ten) as ten');
	return $nguoi_dung['ten'];
}