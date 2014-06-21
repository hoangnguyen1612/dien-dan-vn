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

	$sql = 'select ma, ma_linh_vuc, ten, hinh_dai_dien, domain from thanh_vien_dien_dan t, dien_dan d where ma_dien_dan = ma and ma_nguoi_dung = :ma_nguoi_dung';
	$sth = $dbh->prepare($sql);
	$sth->execute(array('ma_nguoi_dung'=>$ma));
	$ds_dien_dan = $sth->fetchAll(PDO::FETCH_ASSOC);
	
	$dt_smarty->assign('gt', array(0=>'Nam', 1=>'Nữ'));

	$co = 1;
	if($login['ma'] != $nguoi_dung['ma'])
	{
		$co = 0;
	}

	$dt_smarty->assign('co', $co);
	$dt_smarty->assign('nguoi_dung', $nguoi_dung);
	$dt_smarty->assign('ds_dien_dan', $ds_dien_dan);
		
	$contentForLayout = $dt_smarty->fetch('nguoi_dung/thong_tin.tpl');
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
}catch(Exception $e)
{
	throwMessage($e);
}
?>