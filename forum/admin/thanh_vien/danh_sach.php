<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../../classes/xl_nguoi_dung.php';
	include '../../classes/phan_trang.php';
	
	quan_tri('thanh_vien_cap_nhat');
	
	$dt_phan_trang = new phan_trang;
	$dt_xl_nguoi_dung = new xl_nguoi_dung;
	$vi_tri_bat_dau = $dt_phan_trang->tim_trang_hien_tai();

	$start = $dt_phan_trang->tim_vi_tri_query($vi_tri_bat_dau,4);
	if(isset($_GET['tu_khoa'])){
		
		$tu_khoa = $_GET['tu_khoa'];		
			$ds_thanh_vien = $xl_thanh_vien_dien_dan->danh_sach($start,10,array('ma_dien_dan'=>$_SESSION['dien_dan']['ma']),'ma_dien_dan ASC','thanh_vien_dien_dan.*,(Select ho from nguoi_dung l2 where l2.ma = thanh_vien_dien_dan.ma_nguoi_dung) ho_thanh_vien,(Select ten from nguoi_dung l2 where l2.ma = thanh_vien_dien_dan.ma_nguoi_dung) ten_thanh_vien',PDO::FETCH_ASSOC,"and ten_thanh_vien like '%$tu_khoa%' and loai_thanh_vien != 0",true);
	}else{
		
		$ds_thanh_vien = $xl_thanh_vien_dien_dan->danh_sach($start,10,array('ma_dien_dan'=>$_SESSION['dien_dan']['ma']),'ma_dien_dan ASC','thanh_vien_dien_dan.*,(Select ho from nguoi_dung l2 where l2.ma = thanh_vien_dien_dan.ma_nguoi_dung) ho_thanh_vien,(Select ten from nguoi_dung l2 where l2.ma = thanh_vien_dien_dan.ma_nguoi_dung) ten_thanh_vien',PDO::FETCH_ASSOC,'and loai_thanh_vien != 0',true);
		
	}
	$sl_thanh_vien = $xl_thanh_vien_dien_dan->dem(array('ma_dien_dan'=>$_SESSION['dien_dan']['ma']),'ma_nguoi_dung',PDO::FETCH_ASSOC,'');
	
	$quyen = '';
	$tv = $xl_thanh_vien_dien_dan->doc(array('ma_nguoi_dung'=>$ma_nguoi_dung, 'ma_dien_dan'=>$ma_dien_dan), 'quyen');
	$quyen = $tv['quyen'];
	$dt_smarty->assign('quyen', $quyen);
	
	$dt_smarty->assign('loai_thanh_vien', array(0=>'Chủ trang web',1=>'Admin diễn đàn',2=>'Thành viên',3=>'Mới'));
	$dt_smarty->assign('cap_nhat_thanh_vien', array(1=>'Admin diễn đàn',2=>'Thành viên'));
	$dt_smarty->assign('trang_thai', array(0=>'Khóa',1=>'Đang hoạt động'));
	$dt_smarty->assign('ds_thanh_vien', $ds_thanh_vien[0]);	
	
	#############Chuẩn bị bộ nút #####################
	$bo_nut = $dt_phan_trang->bo_nut_phan_trang($sl_thanh_vien,$vi_tri_bat_dau,4);
	$dt_smarty->assign('bo_nut', $bo_nut);

	$contentForLayout = $dt_smarty->fetch('thanh_vien/danh_sach.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->assign('titleForLayout', 'Thành viên - Danh sách');
	
	$dt_smarty->display('layouts/default.tpl');
	
	$dbh = NULL;
}catch(Exception $e){
	throwMessage($e, "/{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/admin");
}
?>