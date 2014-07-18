<?php 
try{
	include '../ini.php';

	$nghe_nghiep = array(0=>'Học sinh', 1=>'Sinh viên', 2=>'Nhân viên văn phòng', 3=>'Khác');
	$dt_smarty->assign('nghe_nghiep', $nghe_nghiep);
	
	$contentForLayout = $dt_smarty->fetch('nguoi_dung/dang_ky.tpl');
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
	
}catch(Exception $e)
{
	throwMessage($e);
}
?>