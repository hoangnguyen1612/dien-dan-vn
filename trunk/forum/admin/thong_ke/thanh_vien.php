<?php
try{
	include ('../ini.php');	
	include ('../ini_interface.php');
	include ('../../classes/xl_bai_viet.php');

	$xl_bai_viet = new xl_bai_viet;

	
	$ds = $xl_bai_viet->danh_sach(0, 10, array('ma_dien_dan'=>$ma_dien_dan), 'count(ma) DESC', 'ma_nguoi_dang, (select concat(ho, " ", ten) from nguoi_dung where ma = ma_nguoi_dang) as ten, count(ma_nguoi_dang) as tong', PDO::FETCH_ASSOC, ' group by ma_nguoi_dang', false);

	$options = array('Tổng số bài viết', 'Bình luận đúng', 'Bình luận giúp ích');

	$dt_smarty->assign('ds', $ds);
	$dt_smarty->assign('options', $options);
	$contentForLayout = $dt_smarty->fetch('thong_ke/thanh_vien.tpl');

	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->display('layouts/default.tpl');
	
}catch(Exception $e)
{
	throwMessage($e);
}
?>