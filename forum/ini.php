<?php 
	#Tạo kết nối
	include '../../config.php';
	include '../../libraries/functions.php';
	include '../classes/xl_nguoi_dung.php';
	
	//session_destroy();exit;
	$dbh = connection();
	$dien_dan = get_subdomain();
	
	$xl_nguoi_dung = new xl_nguoi_dung;

	$ma_dien_dan = $dien_dan['ma'];

	# cấu hình
	$sql = 'select tu_khoa, noi_dung from cau_hinh where ma_dien_dan = :ma ';

	$sth = $dbh->prepare($sql);
	$sth->execute(array('ma'=>$ma_dien_dan));
	$ds_cau_hinh = $sth->fetchAll(PDO::FETCH_KEY_PAIR);
	if(isset($ds_cau_hinh['MAU_MENU'])){	
		$mang_mau_sac = explode(',',$ds_cau_hinh['MAU_MENU']);
	}
	else{
		$mang_mau_sac = array(0=>'red',1=>'blue',2=>'green',3=>'black');
	}
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
	$ds_dien_dan = '';
	$quyen = array(0=>'Chủ diễn đàn', 1=>'Quản trị', 2=>'Thành viên');
	
	if(isset($_COOKIE['username-forum']) && isset($_COOKIE['password-forum']))
	{
		$email = $_COOKIE['username-forum'];
		$mat_khau = base64_decode($_COOKIE['password-forum']);
		
		$nguoi_dung = $xl_nguoi_dung->doc(array('email'=>$email));

		if(!$nguoi_dung)
		{
			throw new Exception('Tài khoản không tồn tại, vui lòng kiểm tra lại');
		}
		if($nguoi_dung['ma_kich_hoat']!=NULL)
		{
			throw new Exception('Tài khoản của bạn chưa được kích hoạt, vui lòng kiểm tra hộp thư mail để kích hoạt tài khoản');
		}
		if(strcmp(md5($email.$mat_khau), $nguoi_dung['mat_khau']))
		{
			throw new Exception('Mật khẩu không đúng, vui lòng kiểm tra lại');
		}
		if($nguoi_dung['trang_thai']==0)
		{
			throw new Exception('Tài khoản của bạn đang tạm khóa, vui lòng gửi liên hệ về ban quản trị Diendan.vn để biết thêm thông tin chi tiết');
		}
		
		$_SESSION['login'] =$nguoi_dung;
	}
	
	if(isset($_SESSION['login']))
	{
		$login = $_SESSION['login'];
		$item = $xl_nguoi_dung->doc(array('ma'=>$login['ma']), 'trang_thai');
		$login['trang_thai'] = $item['trang_thai'];
		if($login['trang_thai']==0)
		{
			unset($_SESSION['login']);
			throw new Exception('Tài khoản của bạn đang tạm khóa, vui lòng gửi liên hệ về ban quản trị Diendan.vn để biết thêm thông tin chi tiết');
		}
		
		
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
		$sql = 'select ma_dien_dan, ten, hinh_dai_dien, ma_linh_vuc, domain from dien_dan, thanh_vien_dien_dan where ma = ma_dien_dan and ma_nguoi_dung = :ma';
		$sth = $dbh->prepare($sql);
		$sth->execute(array('ma'=>$login['ma']));
		$ds_dien_dan = $sth->fetchAll(PDO::FETCH_ASSOC);
		include '../../libraries/online.php';
	}
	
	
	# icon notification
	# 0 tham gia
	# 1 binh luan dung
	# 2 thong bao da xu ly bao cao
	# 3 gui canh cao den thanh vien dien dan
	# 4 Gui thong bao khoa tai khoan
	# 5 Gui thong bao kich hoat tai khoan
	# 6 Duoc chon lam quan tri vien
	$thong_bao_icon = array(0=>'plus-sign', 1=>'thumbs-up-alt', 2=>'info-sign', 3=>'exclamation-sign', 4=>'remove-sign', 5=>'ok-sign', 6=>'user');
	
	
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
	
	
	