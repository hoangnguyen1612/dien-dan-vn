<?php
require_once 'xl_chung.php';
class xl_bo_dem extends xl_chung{
	protected $bang = 'bo_dem';
}
function so_luong_theo_ngay($ngay,$ma_dien_dan) {
	global $dbh;
	$from = date("$ngay 0:0:0");
	$to =  date("$ngay 23:59:59");
	
	$sql="SELECT COUNT(ma) FROM `bo_dem` WHERE '$from' <= thoi_gian AND thoi_gian <= '$to' and ma_dien_dan =:ma_dien_dan";
	$sth = $dbh->prepare($sql);
	$sth->execute(array('ma_dien_dan'=>$ma_dien_dan));
	$result =  $sth->fetch(PDO::FETCH_NUM);
	return $result[0];		
}