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
		$_SESSION['data']['tu_khoa'] = $tu_khoa;	
		if(!empty($_GET['ma_loai_cha']))
		{	
			$ma_loai_cha = $_GET['ma_loai_cha'];
			$_SESSION['data']['ma_loai_cha'] = $ma_loai_cha;
			$ds_chuyen_muc = $dt_xl_chuyen_muc->danh_sach($start,4,array('ma_dien_dan'=>$_SESSION['dien_dan']['ma']),'ma ASC','loai_chuyen_muc.*,(Select ten from loai_chuyen_muc l2 where l2.ma = loai_chuyen_muc.ma_loai_cha) ten_loai_cha',PDO::FETCH_ASSOC,"and ten like '%$tu_khoa%' and ma_loai_cha like '%$ma_loai_cha%'",true);
		}
		else
		{
			$ds_chuyen_muc = $dt_xl_chuyen_muc->danh_sach($start,4,array('ma_dien_dan'=>$_SESSION['dien_dan']['ma']),'ma ASC','loai_chuyen_muc.*,(Select ten from loai_chuyen_muc l2 where l2.ma = loai_chuyen_muc.ma_loai_cha) ten_loai_cha',PDO::FETCH_ASSOC,"and ten like '%$tu_khoa%'",true);
		}
	}else{
		if(!empty($_GET['ma_loai_cha']))
		{	
			$ma_loai_cha = $_GET['ma_loai_cha'];
			$_SESSION['data']['ma_loai_cha'] = $ma_loai_cha;
			$ds_chuyen_muc = $dt_xl_chuyen_muc->danh_sach($start,4,array('ma_dien_dan'=>$_SESSION['dien_dan']['ma']),'ma ASC','loai_chuyen_muc.*,(Select ten from loai_chuyen_muc l2 where l2.ma = loai_chuyen_muc.ma_loai_cha) ten_loai_cha',PDO::FETCH_ASSOC,"and ma_loai_cha like '%$ma_loai_cha%'",true);
		}
		else
		{
			$ds_chuyen_muc = $dt_xl_chuyen_muc->danh_sach($start,4,array('ma_dien_dan'=>$_SESSION['dien_dan']['ma']),'ma ASC','loai_chuyen_muc.*,(Select ten from loai_chuyen_muc l2 where l2.ma = loai_chuyen_muc.ma_loai_cha) ten_loai_cha',PDO::FETCH_ASSOC,"",true);
		}
	}
	
	$ds = $dt_xl_chuyen_muc->danh_sach(0, 0, array('ma_dien_dan'=>$ma_dien_dan),'thu_tu_hien_thi ASC', '*', PDO::FETCH_ASSOC, '', false);
	$dt_smarty->assign('ds', $ds);
	
	#debug($ds_chuyen_muc);
	$dt_smarty->assign('ds_chuyen_muc', $ds_chuyen_muc[0]);	
	
	#############Chuẩn bị bộ nút #####################
	$bo_nut = $dt_phan_trang->bo_nut_phan_trang($ds_chuyen_muc[1],$vi_tri_bat_dau,4);
	$dt_smarty->assign('bo_nut', $bo_nut);
	
	
	$contentForLayout = $dt_smarty->fetch('loai_chuyen_muc/danh_sach.tpl');
	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->assign('titleForLayout', 'Chuyên mục - danh sách');
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e){
	throwMessage($e);
}

?>