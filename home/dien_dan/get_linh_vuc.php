<?php
require '../ini.php';
require '../classes/xl_linh_vuc.php';
$xl_linh_vuc = new xl_linh_vuc;
$danh_sach = $xl_linh_vuc->danh_sach(0, 0, array('ma_loai_cha'=>$_POST['linh_vuc']), 'ten ASC', '*', PDO::FETCH_ASSOC, '', false);
$str = '';
foreach($danh_sach as $value)
{
	$str.= "<option value='{$value['ma']}'>{$value['ten']}</option>";
}
echo $str;