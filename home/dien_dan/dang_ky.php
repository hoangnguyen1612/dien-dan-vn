<?php
try{
	include '../ini.php';

	$url = '/';
	if($login=='')
	{
		throw new Exception('Vui lòng đăng nhập để thực hiện chức năng này');
	}
	require '../classes/xl_linh_vuc.php';
	$xl_linh_vuc = new xl_linh_vuc;
	
	$danh_sach = $xl_linh_vuc->danh_sach(0, 0, array('ma_loai_cha'=>0), 'ma ASC', '*', PDO::FETCH_ASSOC, '', false);
	$dt_smarty->assign('linh_vuc', $danh_sach);

	if(!empty($_SESSION['data']['rGroup']))
	{
		$mac_dinh = $xl_linh_vuc->danh_sach(0, 0, array('ma_loai_cha'=>$_SESSION['data']['rGroup']), 'ma ASC', '*', PDO::FETCH_ASSOC, '', false);
	}
	else
	{
		$mac_dinh = $xl_linh_vuc->danh_sach(0, 0, array('ma_loai_cha'=>$danh_sach[0]['ma']), 'ma ASC', '*', PDO::FETCH_ASSOC, '', false);
	}
	
	$dt_smarty->assign('mac_dinh', $mac_dinh);
	
	$ds_mau = array('color-1'=>'color-1', 'color-2'=>'color-2', 'hong'=>'color-3', 'xanhla'=>'color-4', 'xanhden'=>'color-5', 'xanhduongnhat'=>'color-6', 
	'donhat'=>'color-7', 'tim'=>'color-8', 'vangcam'=>'color-9', 'xanhduongdam'=>'color-10', 'xam'=>'color-11', 'xanhladam'=>'color-12', 'vang'=>'color-13',
	'xanhduong'=>'color-14', 'xanhxam'=>'color-15', 'xanhnuocbien'=>'color-16', 'do'=>'color-17', 'nau'=>'color-18', 'hongnhat'=>'color-19', 'xamnhat'=>'color-20');

	$dt_smarty->assign('ds_mau', $ds_mau);
	
	$dt_smarty->assign('mau', array('green', 'blue', 'yellow', 'red', 'aqua', 'maroon'));

	$contentForLayout = $dt_smarty->fetch('dien_dan/dang_ky.tpl');
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e)
{
	throwMessage($e, $url);
}
?>