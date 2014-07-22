<?php
try{
	include '../../../config.php';
	include '../../../libraries/functions.php';
	include '../../../libraries/smarty/Smarty.class.php';
	
	$dbh = connection();

	$dien_dan = get_subdomain();
	$_SESSION['dien_dan'] = $dien_dan;
	
	
	if(isset($_SESSION['login']))
	{
		if(isset($_SESSION['thanh_vien']))
		{
			if($_SESSION['thanh_vien']['loai_thanh_vien']==0 || $_SESSION['thanh_vien']['loai_thanh_vien']==1)
			{
				$_SESSION[SALT.'dang_nhap'] = 1 ;
				header("Location: /{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/admin/thong_ke/tong_quat.php");
				exit;
			}
		}
	}
	
	require '../../classes/xl_nguoi_dung.php';
	require '../../classes/xl_thanh_vien_dien_dan.php';
	
	$xl_nguoi_dung = new xl_nguoi_dung;
	$xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	
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
		
		$thanh_vien = $xl_thanh_vien_dien_dan->doc(array('ma_dien_dan'=>$ma_dien_dan, 'ma_nguoi_dung'=>$nguoi_dung['ma']));

		if($thanh_vien['loai_thanh_vien']!=0 && $thanh_vien['loai_thanh_vien']!=1)
		{
			throw new Exception('You have not permission at here!!!');
		}
		
		header("Location: /{$dien_dan['ma_linh_vuc']}/{$dien_dan['domain']}/admin/thong_ke/tong_quat.php");
		exit;
	}
	
	if(isset($_SESSION['login']))
	{
		$login = $_SESSION['login'];
	}

	$_SESSION['style_msg_login'] = "notification information png_bg";
	$dt_smarty = new Smarty();	
	$dt_smarty->setTemplateDir('../templates/');
	$dt_smarty->setCompileDir('../templates_c/');
	$dt_smarty->setConfigDir('../../configs/');
	$dt_smarty->setCacheDir('../../cache/');
	
	
	
	$dt_smarty->assign('dien_dan', $dien_dan);
	$dt_smarty->display('quan_tri/dang_nhap.tpl');
}catch(Exception $e)
{
	echo $e->getMessage();
}
?>