<?php
try{
	include '../ini.php';
	include '../ini_interface.php';


##########Nhờ smarty hiển thị giao diện#############	

$contentForLayout = $dt_smarty->fetch('bai_viet/danh_sach.tpl');

$dt_smarty->assign('contentForLayout', $contentForLayout);

$dt_smarty->display('layouts/default.tpl');
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}
