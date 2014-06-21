<?php 
	#Tạo kết nối
	include '../../config.php';
	include '../../libraries/functions.php';
	//session_destroy();exit;
	
	$dbh = connection();
	$dien_dan = get_subdomain();

	$ma_dien_dan = $dien_dan['ma'];

	# cấu hình
	$sql = 'select tu_khoa, noi_dung from cau_hinh where ma_dien_dan = :ma ';

	$sth = $dbh->prepare($sql);
	$sth->execute(array('ma'=>$ma_dien_dan));
	$ds_cau_hinh = $sth->fetchAll(PDO::FETCH_KEY_PAIR);
	
	$sql = 'Select * from tinh_diem';
	$sth = $dbh->prepare($sql);
	$sth->execute();
	$ds_tinh_diem = $sth->fetch(PDO::FETCH_ASSOC);

	
	
	$diem_bai_viet = $ds_tinh_diem['bai_viet'];
	$diem_duoc_thich = $ds_tinh_diem['thich'];
	$diem_bai_viet_dung = $ds_tinh_diem['binh_luan_dung'];
	
	###
	$ma_nguoi_dung = '';
	$login = '';
	$thanh_vien = '';
	$sl_thong_bao_moi = 0;
	$quyen = array(0=>'Chủ diễn đàn', 1=>'Quản trị', 2=>'Thành viên');
	
	if(isset($_SESSION['login']))
	{
		$login = $_SESSION['login'];
		$ma_nguoi_dung = $login['ma'];
		
		# loại thành viên
		$sql = 'select * from thanh_vien_dien_dan where ma_dien_dan = :ma_dien_dan and ma_nguoi_dung = :ma_nguoi_dung limit 0,1';
		$sth = $dbh->prepare($sql);
		$sth->execute(array('ma_dien_dan'=>$ma_dien_dan, 'ma_nguoi_dung'=>$login['ma']));
		$thanh_vien = $sth->fetch(PDO::FETCH_ASSOC);

		if($thanh_vien)
		{
			$_SESSION['thanh_vien'] = $thanh_vien;
		
			$sql = 'select count(*) from thong_bao where gui_den = :ma_nguoi_dung and ma_dien_dan = :ma_dien_dan and trang_thai=0 order by ngay_tao DESC';
			$sth = $dbh->prepare($sql);
			$sth->execute(array('ma_nguoi_dung'=>$ma_nguoi_dung, 'ma_dien_dan'=>$ma_dien_dan));
			$sl_thong_bao_moi = $sth->fetchAll(PDO::FETCH_COLUMN);
		}
	}
	
	
	# icon notification
	# 0 tham gia
	# 1 binh luan dung
	# 2 thong bao da xu ly bao cao
	# 3 gui canh cao den thanh vien dien dan
	# 4 Gui thong bao khoa tai khoan
	# 5 Gui thong bao kich hoat tai khoan
	$thong_bao_icon = array(0=>'plus-sign', 1=>'thumbs-up-alt', 2=>'info-sign', 3=>'exclamation-sign',4=>'remove-sign',5=>'ok-sign');
	
	
	#bo_dem
	include '../classes/xl_bo_dem.php';
	$data = array();
	
	$data['ma_dien_dan'] = $ma_dien_dan;
	$data['dia_chi_ip'] = $_SERVER['REMOTE_ADDR'];
	$data['trinh_duyet'] = $_SERVER['HTTP_USER_AGENT'];
	$data['thoi_gian'] = date('Y-m-d h:i:s');
	$data['url'] = $_SERVER['REQUEST_URI'];
	
	$xl_bo_dem = new xl_bo_dem;

	$xl_bo_dem->them($data);
	
	
	
	