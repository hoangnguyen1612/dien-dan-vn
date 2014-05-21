<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	include '../../classes/xl_chuyen_muc.php';
	include '../../classes/phan_trang.php';
	
	$dt_phan_trang = new phan_trang;
	$dt_xl_chuyen_muc = new xl_chuyen_muc;
	$vi_tri_bat_dau = $dt_phan_trang->tim_trang_hien_tai();
	$start = $dt_phan_trang->tim_vi_tri_query($vi_tri_bat_dau,4);
	if(isset($_GET['tu_khoa'])){
		$tu_khoa = $_GET['tu_khoa'];	
		
			$ds_chuyen_muc = $dt_xl_chuyen_muc->danh_sach($start,4,array('ma_dien_dan'=>'abcd1234'),'ma ASC','loai_chuyen_muc.*,(Select ten from loai_chuyen_muc l2 where l2.ma = loai_chuyen_muc.ma_loai_cha) ten_loai_cha',PDO::FETCH_ASSOC,"and ten like '%$tu_khoa%'",true);
	}else{
		$ds_chuyen_muc = $dt_xl_chuyen_muc->danh_sach($start,4,array('ma_dien_dan'=>'abcd1234'),'ma ASC','loai_chuyen_muc.*,(Select ten from loai_chuyen_muc l2 where l2.ma = loai_chuyen_muc.ma_loai_cha) ten_loai_cha',PDO::FETCH_ASSOC,'',true);
	}
	
	
	$dt_smarty->assign('ds_chuyen_muc', $ds_chuyen_muc[0]);	
	
	#############Chuẩn bị bộ nút #####################
	$bo_nut = $dt_phan_trang->bo_nut_phan_trang($ds_chuyen_muc[1],$vi_tri_bat_dau,4);
	$dt_smarty->assign('bo_nut', $bo_nut);
	############## Chuẩn bị câu thông báo ##############
	if(isset($_SESSION['msg'])){
		$thong_bao = $dt_smarty->fetch('elements/message.tpl');
		# Xóa session
		unset($_SESSION['msg']);
		unset($_SESSION['style_msg']);
	}else{
		$thong_bao = '';
	}
	##########Nhờ smarty hiển thị giao diện#############
	$dt_smarty->assign('thong_bao', $thong_bao);
	
	$contentForLayout = $dt_smarty->fetch('loai_chuyen_muc/danh_sach.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	
	$dt_smarty->display('layouts/default.tpl');
	
	$dbh = NULL;
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}

?>