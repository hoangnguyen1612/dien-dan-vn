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
	$sql = 'select tu_khoa, noi_dung from cau_hinh where ma_dien_dan = :ma limit 0,1';
	$sth = $dbh->prepare($sql);
	$sth->execute(array('ma'=>$ma_dien_dan));
	$ds_cau_hinh = $sth->fetch(PDO::FETCH_KEY_PAIR);

	
	###
	$login = '';
	$thanh_vien = '';
	$ds_thong_bao = 'asas';
	$thong_bao_moi = 0;
	
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
	
	
	
	