<?php
	require '../../libraries/smarty/Smarty.class.php';
	require '../../config.php';
	require '../../libraries/functions.php';
	require_once '../classes/xl_nguoi_dung.php';
	
	$dbh = connection();
	$xl_nguoi_dung = new xl_nguoi_dung;
	
	$login = '';
	
	/* test owner forum
	echo "<meta charset='utf-8'></meta>";
		//$sql = 'select ma, ma_nguoi_tao, ten, (select concat(ho, " ", ten) from nguoi_dung where ma_nguoi_tao = ma) as ho_ten from dien_dan';
	$sql = 'select ma, ma_nguoi_tao from dien_dan where domain != "qh-online-solutions"';
	$sth = $dbh->prepare($sql);
	$sth->execute(array());
	$ds = $sth->fetchAll(PDO::FETCH_KEY_PAIR);
	
	foreach($ds as $key=>$value)
	{
		$sql = "insert into `thanh_vien_dien_dan` value('$key', '$value', 0, '2014-07-20', 1, NULL, '', 0, NULL)";
		$sth = $dbh->prepare($sql);
		$sth->execute(array());
	}
	echo 111;exit;*/
	
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
	}
	
	$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERR_NONE);

	$ds_dien_dan = '';


	$dt_smarty = new Smarty();
	$dt_smarty->setTemplateDir('../templates/');
	$dt_smarty->setCompileDir('../templates_c/');
	$dt_smarty->setConfigDir('../../configs/');
	$dt_smarty->setCacheDir('../../cache/');
	
	if($login!='')
	{
		$sql = 'select ma_dien_dan, ten, hinh_dai_dien, ma_linh_vuc, domain from dien_dan, thanh_vien_dien_dan where ma = ma_dien_dan and ma_nguoi_dung = :ma';
		$sth = $dbh->prepare($sql);
		$sth->execute(array('ma'=>$login['ma']));
		$ds_dien_dan = $sth->fetchAll(PDO::FETCH_ASSOC);
	
		$sql = 'select t.*, hinh_dai_dien, (select domain from dien_dan where ma=t.ma_dien_dan) as domain, (select ma_linh_vuc from dien_dan where ma=t.ma_dien_dan) as ma_linh_vuc from thong_bao t, nguoi_dung n where n.ma = gui_tu and gui_den = :ma_nguoi_dung and t.trang_thai = 0';
		$sth = $dbh->prepare($sql);
		$sth->execute(array('ma_nguoi_dung'=>$login['ma']));
		$thong_bao_moi = $sth->fetchAll(PDO::FETCH_ASSOC);

		if(count($thong_bao_moi)>0)
		{
			$dt_smarty->assign('sl_thong_bao_moi', count($thong_bao_moi));
		}
		else
		{
			$dt_smarty->assign('sl_thong_bao_moi', 0);
		}
		$dt_smarty->assign('thong_bao_moi', $thong_bao_moi);
	}	
	
	$sql = 'select * from linh_vuc';
	$sth = $dbh->prepare($sql);
	$sth->execute();
	$danh_sach_linh_vuc = $sth->fetchAll();
	
	
	$dt_smarty->assign('login', $login);
	$dt_smarty->assign('ds_dien_dan', $ds_dien_dan);
	$dt_smarty->assign('danh_sach_linh_vuc', $danh_sach_linh_vuc);
	