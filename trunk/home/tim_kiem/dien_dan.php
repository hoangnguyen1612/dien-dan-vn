<?php
try{
	require '../ini.php';
	$tu_khoa = $_GET['tu_khoa'];
	
	$sql = "SELECT * FROM DIEN_DAN WHERE MATCH(TEN) AGAINST ('$tu_khoa') ORDER BY TEN DESC"; 
	$sth = $dbh->prepare($sql);
	$sth->execute(array());
	$danh_sach = $sth->fetchAll(PDO::FETCH_ASSOC);
	
	$dt_smarty->assign('so_luong', count($danh_sach));
	$dt_smarty->assign('danh_sach', $danh_sach);
	
	$contentForLayout = $dt_smarty->fetch('tim_kiem/dien_dan.tpl');
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e)
{
	throwMessage($e);
}