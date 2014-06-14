<?php 
try{
	include '../ini.php';
	require '../classes/xl_nguoi_dung.php';
	require '../classes/xl_thanh_vien_dien_dan.php';

	if(empty($_GET['ma']))
	{
		throw new Exception('Tài khoản không tồn tại');
	}
	$ma = $_GET['ma'];
	$xl_nguoi_dung = new xl_nguoi_dung;
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	
	$nguoi_dung = $xl_nguoi_dung->doc(array('ma'=>$ma));
	
	$sql = 'select ma_linh_vuc, ten, hinh_dai_dien from thanh_vien_dien_dan t, dien_dan d where ma_dien_dan = ma and ma_nguoi_dung = :ma_nguoi_dung';
	$sth = $dbh->prepare($sql);
	$sth->execute(array('ma_nguoi_dung'=>$ma));
	$ds_dien_dan = $sth->fetchAll(PDO::FETCH_ASSOC);
	
	
		
	$contentForLayout = $dt_smarty->fetch('nguoi_dung/thong_tin.tpl');
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
}catch(Exception $e)
{
	throwMessage($e);
}
?>