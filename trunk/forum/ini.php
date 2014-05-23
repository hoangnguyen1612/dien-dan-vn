<?php
	#Tạo kết nối
	include '../../config.php';
	include '../../libraries/functions.php';
		
	$dbh = connection();
	$dien_dan = get_subdomain();
	$ma_dien_dan = $dien_dan['ma'];
	
	# kiểm tra diễn đàn
	if(empty($_GET['forum']))
	{
		echo 'This forum does not exist!!!';
	}

	# cấu hình
	$sql = 'select * from cau_hinh where ma_dien_dan = :ma limit 0,1';
	$sth = $dbh->prepare($sql);
	$sth->execute(array('ma'=>$ma_dien_dan));
	$ds_cau_hinh = $sth->fetch(PDO::FETCH_ASSOC);

	
	#đăng nhập
	$login = '';
	$thanh_vien = '';
	if(isset($_SESSION['login']))
	{
		$login = $_SESSION['login'];
		
		# loại thành viên
		$sql = 'select * from thanh_vien_dien_dan where ma_dien_dan = :ma_dien_dan and ma_nguoi_dung = :ma_nguoi_dung limit 0,1';
		$sth = $dbh->prepare($sql);
		$sth->execute(array('ma_dien_dan'=>$ma_dien_dan, 'ma_nguoi_dung'=>$login['ma']));
		$thanh_vien = $sth->fetch(PDO::FETCH_ASSOC);

		if(!$thanh_vien)
		{
			$thanh_vien = '';
		}
		
		$_SESSION['thanh_vien'] = $thanh_vien;
	}
	//debug($forum);
	
	
	
	