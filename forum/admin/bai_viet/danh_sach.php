<?php
try{
	include '../ini.php';
	include '../ini_interface.php';
	require '../../classes/xl_bai_viet.php';
	include '../../classes/phan_trang_1.php';
	require '../../classes/xl_chuyen_muc.php';
	
	$xl_bai_viet = new xl_bai_viet;
	$xl_chuyen_muc = new xl_chuyen_muc;
	$limit = 5;
	# khởi tạo đối tượng phân trang
	$pt = new phan_trang('page',$limit);	
	$pt->so_pt_tren_mot_trang = $limit;
	$start = $pt->tim_vi_tri_bat_dau();
	
	$quyen_chuyen_muc = quyen_chuyen_muc();
	$ten_qcm = $quyen_chuyen_muc['ten'];
	$ma_qcm = $quyen_chuyen_muc['ma'];
	
	if(isset($_GET['tu_khoa'])){
		$tu_khoa = $_GET['tu_khoa'];
		$_SESSION['data']['tu_khoa'] = $tu_khoa;	
		$ds_bai_viet = $xl_bai_viet->danh_sach($start,$limit,array('ma_dien_dan'=>$ma_dien_dan),'ma ASC','*',PDO::FETCH_ASSOC,"and tieu_de like '%$tu_khoa%'",true);
	}else
	{
		if(isset($_GET['ma_chuyen_muc'])){
			$ma_chuyen_muc = url_decode($_GET['ma_chuyen_muc']);
			$ds_bai_viet = $xl_bai_viet->danh_sach($start,$limit,array('ma_loai_chuyen_muc'=>$ma_chuyen_muc,'ma_dien_dan'=>$ma_dien_dan),'ma ASC','*',PDO::FETCH_ASSOC,'',true);
		}else{
			$ds_bai_viet = $xl_bai_viet->danh_sach($start,$limit,array('ma_dien_dan'=>$ma_dien_dan),'ma ASC','*',PDO::FETCH_ASSOC,'',true);
		}
	}
	
	$ds_chuyen_muc = $xl_chuyen_muc->danh_sach(0,0,array('ma_dien_dan'=>$ma_dien_dan),'ma ASC','*',PDO::FETCH_ASSOC,'',false);
	
	
	$dt_smarty->assign('ds_chuyen_muc',$ds_chuyen_muc);	
	$pt->tong_record = $ds_bai_viet[1];
	
	$dt_smarty->assign('quyen_chuyen_muc', $ten_qcm);
	$dt_smarty->assign('qcm', $ma_qcm);
	$dt_smarty->assign('bo_nut', $pt->in_bo_nut());
	$dt_smarty->assign('ds_bai_viet', $ds_bai_viet[0]);
	
	$contentForLayout = $dt_smarty->fetch('bai_viet/danh_sach.tpl');	
	$dt_smarty->assign('contentForLayout', $contentForLayout);
	$dt_smarty->assign('titleForLayout', 'Bài viết - danh sách');
	
	$dt_smarty->display('layouts/default.tpl');
	
	include '../end.php';
}catch(Exception $e){
	throwMessage($e);
}
