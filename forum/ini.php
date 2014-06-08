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
	$ds_thong_bao = '';
	$thong_bao_moi = 0;
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
		
			#kiểm tra thông báo gửi đến diễn đàn
			$thong_bao_da_doc = $thanh_vien['thong_bao_da_doc'];
			if($thanh_vien['loai_thanh_vien']==0 || $thanh_vien['loai_thanh_vien']==1)
			{
				if($thong_bao_da_doc==NULL || $thong_bao_da_doc=='')
					$sql = 'select * from thong_bao where gui_den = :ma_dien_dan order by ngay_tao DESC';
				else	
					$sql = 'select * from thong_bao where gui_den = :ma_dien_dan and ma not in('.$thong_bao_da_doc.') order by ngay_tao DESC';
				$sth = $dbh->prepare($sql);
				
				$sth->execute(array('ma_dien_dan'=>$ma_dien_dan));
				if($ds_thong_bao = $sth->fetchAll(PDO::FETCH_ASSOC))
				{
					$thong_bao_moi = $sth->rowCount();
				}
			}
		}
	}
	
	
	
	