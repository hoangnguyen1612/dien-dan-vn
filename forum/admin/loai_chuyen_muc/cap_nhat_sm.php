<?php
try{
	include '../ini.php';
	require '../../classes/xl_chuyen_muc.php';
	
	quan_tri('loai_chuyen_muc_cap_nhat');
	
	$url = '';
	$dbh->beginTransaction();
	
	$xl_chuyen_muc = new xl_chuyen_muc;
	
	$_SESSION['data'] = $_POST['data'];
	
	kiem_tra_rong($_POST['data']['ma'], 'Mã chuyên mục');
	kiem_tra_rong($_POST['data']['ten'], 'Tên chuyên mục');
	kiem_tra_gia_tri($_POST['data']['rieng_tu'], array(0,1), 'Trạng thái riêng tư');
	
	$ma = $_POST['data']['ma'];

	if(!$xl_chuyen_muc->doc(array('ma_dien_dan'=>$ma_dien_dan, 'ma'=>$ma), 'ma'))
	{
		throw new Exception('Lỗi! [Mã chuyên mục] không tồn tại, vui lòng kiểm tra lại');
	}

	$rieng_tu = $_POST['data']['rieng_tu'];
	$ghi_chu = '';
	$ma_loai_cha = 0;
	$ten = $_POST['data']['ten'];
	
	if(isset($_POST['data']['ghi_chu']))
	{
		$ghi_chu = $_POST['data']['ghi_chu'];
	}
	
	if(!empty($_POST['data']['ma_loai_cha']))
	{ 
		kiem_tra_la_so($_POST['data']['ma_loai_cha'], 'Mã loại cha');
		$ma_loai_cha = $_POST['data']['ma_loai_cha'];
		
		if(!$tv = $xl_chuyen_muc->doc(array('ma_dien_dan'=>$ma_dien_dan), 'ma, ma_loai_cha', PDO::FETCH_ASSOC, " and ma = '$ma_loai_cha'"))
		{
			throw new Exception('Lỗi! [Mã chuyên mục cha] không tồn tại');
		}

		if($tv['ma_loai_cha']!=0)
		{
			$ds_chuyen_muc = $xl_chuyen_muc->danh_sach(0, 0, array('ma_dien_dan'=>$ma_dien_dan),'thu_tu_hien_thi ASC', 'ma, ma_loai_cha', PDO::FETCH_KEY_PAIR, '', false);
			
			if(kiem_tra_loai_cha($ma_loai_cha, $ds_chuyen_muc)==1)
			{
				throw new Exception('Lỗi! [Mã chuyên mục cha] này không thể có thêm chuyên mục con, vui lòng bố trí ở một chuyên mục khác thích hợp hơn');
			}
		}
	}
	
	if(!empty($_POST['data']['ma_loai_cha']))
	{
		$ttht = $xl_chuyen_muc->doc(array('ma_dien_dan'=>$ma_dien_dan), 'thu_tu_hien_thi, ten', PDO::FETCH_ASSOC, 
		' and thu_tu_hien_thi = (select max(thu_tu_hien_thi) from loai_chuyen_muc where ma_dien_dan = "'.$ma_dien_dan.'" and ma_loai_cha = "'.$_POST['data']['ma_loai_cha'].'")');
	}
	else
	{
		$ttht = $xl_chuyen_muc->doc(array('ma_dien_dan'=>$ma_dien_dan), 'thu_tu_hien_thi, ten', PDO::FETCH_ASSOC, 
		' and thu_tu_hien_thi = (select max(thu_tu_hien_thi) from loai_chuyen_muc where ma_dien_dan = "'.$ma_dien_dan.'" and ma_loai_cha = 0)');
	}
	$thu_tu_hien_thi = 1;
	if($ttht['thu_tu_hien_thi']!=NULL)
	{ 
		$thu_tu_hien_thi = ++$ttht['thu_tu_hien_thi'];
	}

	$data['ma'] = $ma;
	$data['ten'] = $ten;
	$data['rieng_tu'] = $rieng_tu;
	$data['ghi_chu'] = $ghi_chu;
	$data['ma_loai_cha'] = $ma_loai_cha;
	$data['thu_tu_hien_thi'] = $thu_tu_hien_thi;

	$sql = "UPDATE `loai_chuyen_muc` SET `ten` = '$ten',`rieng_tu` = $rieng_tu,`ghi_chu` = '$ghi_chu',`ma_loai_cha` = '$ma_loai_cha',`thu_tu_hien_thi` = $thu_tu_hien_thi WHERE `ma` = '$ma' LIMIT 1";
	$con =  mysqli_connect("localhost","root","","dien_dan_vn");
	$con->set_charset("utf8");
	mysqli_query($con, $sql);

	unset($_SESSION['data']);
	
	if(isset($_POST['save-and-exit']))
	{
		$url = 'danh_sach.php';
	}
	
	throw new Exception('Đã cập nhật chuyên mục thành công', 30);
	
}catch(Exception $e)
{
	throwMessage($e, $url);
}