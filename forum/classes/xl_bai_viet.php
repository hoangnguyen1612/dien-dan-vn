<?php
require_once 'xl_chung.php';
class xl_bai_viet extends xl_chung{
	protected $bang = 'bai_viet';
}

function dem_bai_viet($ma_dien_dan, $ma_loai_chuyen_muc)
{
	$xl_bai_viet = new xl_bai_viet;
	return $xl_bai_viet->dem(array('ma_dien_dan'=>$ma_dien_dan, 'ma_loai_chuyen_muc'=>$ma_loai_chuyen_muc));
}
function bai_viet_moi($ma_dien_dan, $ma_loai_chuyen_muc)
{
	$xl_bai_viet = new xl_bai_viet;
	return $xl_bai_viet->doc(array('ma_dien_dan'=>$ma_dien_dan, 'ma_loai_chuyen_muc'=>$ma_loai_chuyen_muc), 'ngay_tao, ma, ma_nguoi_dang, tieu_de', 
	PDO::FETCH_ASSOC, " and ngay_tao = (select max(ngay_tao) from `bai_viet` where ma_dien_dan = '$ma_dien_dan' and ma_loai_chuyen_muc = '$ma_loai_chuyen_muc')");
}
function dem_bai_viet_thanh_vien($ma_dien_dan, $ma_nguoi_dang)
{
	$xl_bai_viet = new xl_bai_viet;
	return $xl_bai_viet->dem(array('ma_dien_dan'=>$ma_dien_dan, 'ma_nguoi_dang'=>$ma_nguoi_dang));
}
function cong_like_bai_viet($ma_bai_viet){
	$xl_bai_viet = new xl_bai_viet;
	$xl_bai_viet->cap_nhat_bo_dem_dieu_kien(array('ma'=>$ma_bai_viet),'thich',1);
}
function tru_like_bai_viet($ma_bai_viet){
	$xl_bai_viet = new xl_bai_viet;
	$xl_bai_viet->cap_nhat_bo_dem_tru_dieu_kien(array('ma'=>$ma_bai_viet),'thich',1);
}
function trang_thai_bai_viet($ma_bai_viet,$ma_dien_dan){
	$xl_bai_viet = new xl_bai_viet;
	$bai_viet = $xl_bai_viet->doc(array('ma'=>$ma_bai_viet,'ma_dien_dan'=>$ma_dien_dan));
	return $bai_viet['trang_thai'];	
}
function so_luong_bai_viet_theo_ngay($ngay,$ma_dien_dan) {
	global $dbh;
	$from = date("$ngay 0:0:0");
	$to =  date("$ngay 23:59:59");
	
	$sql="SELECT COUNT(ma) FROM `bai_viet` WHERE '$from' <= ngay_tao AND ngay_tao <= '$to' and ma_dien_dan=:ma_dien_dan";
	$sth = $dbh->prepare($sql);
	$sth->execute(array('ma_dien_dan'=>$ma_dien_dan));
	$result =  $sth->fetch(PDO::FETCH_NUM);
	return $result[0];		
}