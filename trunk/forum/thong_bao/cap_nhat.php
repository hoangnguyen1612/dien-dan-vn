<?php
require '../../libraries/functions.php';
require '../../config.php';

$dbh = connection();
$dien_dan = get_subdomain();

$sl_cu = $_GET['sl_cu'];

$sql = 'select count(*) from thong_bao where gui_den = :ma_nguoi_dung and trang_thai = 0 and ma_dien_dan = :ma_dien_dan';
$sth = $dbh->prepare($sql);
$sth->execute(array('ma_nguoi_dung'=>$_SESSION['login']['ma'], 'ma_dien_dan'=>$dien_dan['ma']));
$dem = $sth->fetchAll(PDO::FETCH_COLUMN);
$co = 0;

if($dem[0]>$sl_cu)
{
	$co = 1;
}

$return = array('co'=>$co, 'sl'=>$dem[0]);
print json_encode($return);