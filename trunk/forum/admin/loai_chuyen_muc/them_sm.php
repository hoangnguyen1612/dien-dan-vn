<?php
try{
	include '../ini.php';
	require '../../classes/xl_chuyen_muc.php';
	
	quan_tri('loai_chuyen_muc_them');
	
	$url = '';
	
	$xl_chuyen_muc = new xl_chuyen_muc;
	
	$_SESSION['data'] = $_POST['data'];
	
	kiem_tra_rong($_POST['data']['ten'], 'Tên chuyên mục');
	kiem_tra_gia_tri($_POST['data']['rieng_tu'], array(0,1), 'Trạng thái riêng tư');
	
	$ten = $_POST['data']['ten'];
	if($xl_chuyen_muc->doc(array('ma_dien_dan'=>$ma_dien_dan, 'ten'=>$ten), 'ma'))
	{
		throw new Exception('Lỗi! [Tên chuyên mục] đã tồn tại, vui lòng kiểm tra lại');
	}
	
	$rieng_tu = $_POST['data']['rieng_tu'];
	$ghi_chu = '';
	$ma_loai_cha = 0;
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
			throw new Exception('Lỗi! [Mã chuyên mục cha] không hợp lệ');
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
	
	$xl_chuyen_muc->them(array('ma'=>tao_chuoi(18), 'ma_dien_dan'=>$ma_dien_dan, 'ten'=>$ten, 'ghi_chu'=>$ghi_chu, 'ma_loai_cha'=>$ma_loai_cha, 'thu_tu_hien_thi'=>$thu_tu_hien_thi, 'rieng_tu'=>$rieng_tu));
	
	unset($_SESSION['data']);
	
	if(isset($_POST['save-and-exit']))
	{
		$url = 'danh_sach.php';
	}
	
	throw new Exception('Thành công! Chuyên mục đã được thêm mới', 30);
	
}catch(Exception $e)
{
	throwMessage($e, $url);
}