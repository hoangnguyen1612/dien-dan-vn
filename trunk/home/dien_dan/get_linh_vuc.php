<?php
require '../ini.php';
$sql = 'select * from linh_vuc where ma_loai_cha = :ma_linh_vuc';
$sth = $dbh->prepare($sql);
$sth->execute(array('ma_linh_vuc'=>$_POST['linh_vuc']));
$danh_sach = $sth->fetchAll(PDO::FETCH_ASSOC);
$str = '';
foreach($danh_sach as $value)
{
	$str.= "<option value='{$value['ma']}'>{$value['ten']}</option>";
}
echo $str;