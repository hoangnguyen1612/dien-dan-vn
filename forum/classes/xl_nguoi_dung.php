<?php
require_once 'xl_chung.php';
class xl_nguoi_dung extends xl_chung{
	protected $bang = 'nguoi_dung';
}

function ho_ten($ma)
{
	$xl_nguoi_dung = new xl_nguoi_dung;
	return $xl_nguoi_dung->doc(array('ma'=>$ma), 'ho_ten');
}