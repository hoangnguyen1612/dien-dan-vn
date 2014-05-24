<?php
try{
	require '../../../config.php';
	require '../../../libraries/functions.php';
	require '../../../home/classes/xl_nguoi_dung.php';
	require '../../../home/classes/xl_thanh_vien_dien_dan.php';
	$dbh = connection();
	$data = $_POST['data'];
	if(empty($data['ten_dang_nhap'])){
		echo 'Vui lòng nhập tên';
		exit;
	}
	if(empty($data['mat_khau'])){
		echo 'Vui lòng nhập mật khẩu';
		exit;
	}
	if(isset($_SESSION['login']))
	{
		if(isset($_SESSION['thanh_vien']))
		{
			if($_SESSION['thanh_vien']['loai_thanh_vien']==0 || $_SESSION['thanh_vien']['loai_thanh_vien']==1)
			{
				header("Location: /{$dien_dan['ma']}/admin/thong_ke/tong_quat.php");
				exit;
			}
		}
	}
	$dt_xl_nguoi_dung = new xl_nguoi_dung;
	$dt_xl_thanh_vien_dien_dan = new xl_thanh_vien_dien_dan;
	$ten_dang_nhap = $data['ten_dang_nhap'];
	$mat_khau = md5($data['ten_dang_nhap'].$data['mat_khau']);
	$dang_nhap = $dt_xl_nguoi_dung->doc(array('email'=>$ten_dang_nhap,'mat_khau'=>$mat_khau));
	if($dang_nhap == NULL){
		throw new Exception('Lỗi đăng nhập !!! Vui lòng thử lại');
	}
$thanh_vien = $dt_xl_thanh_vien_dien_dan->doc(array('ma_dien_dan'=>$_SESSION['dien_dan']['ma'],'ma_nguoi_dung'=>$dang_nhap['ma']),'*',PDO::FETCH_ASSOC,'AND (loai_thanh_vien = 0 or loai_thanh_vien = 1)');

	if($thanh_vien == NULL){
		throw new Exception('Bạn không có quyền thực hiện chức năng này'); 
	}
	$_SESSION[SALT.'dang_nhap'] = 1 ;
	$dbh = NULL;
	$_SESSION['login'] = $dang_nhap;
	$_SESSION['thanh_vien'] = $thanh_vien;
	
	if(isset($_POST['remember'])){
		setcookie('ten_dang_nhap',$data['ten_dang_nhap'],time()+ 7*24*60*60,'/');
		setcookie('mat_khau',base64_encode($data['mat_khau']),time()+ 7*24*60*60,'/');
	} 
	header("Location: /{$_SESSION['dien_dan']['ma']}/admin/thong_ke/tong_quat.php");	
	exit;	
}catch (PDOException $e){

	echo $e->getMessage();
		
}catch (Exception $e){
	# Đóng kết nối
	$dbh = NULL;
	#Lay cau du lieu 
	$_SESSION['msg_login'] = $e->getMessage();
	$_SESSION['style_msg_login'] = 'notification information png_bg';
	header("Location: /{$_SESSION['dien_dan']['ma']}/admin/quan_tri/dang_nhap.php");		
}