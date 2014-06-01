<?php
try{
	include '../ini.php';
	require '../../classes/xl_cap_bac.php';
	require '../../classes/xl_cau_hinh.php';
	
	quan_tri('cap_bac_cau_hinh');
	
	$_SESSION['data'] = $_POST['data'];
	
	$xl_cau_hinh = new xl_cau_hinh;
	$cau_hinh = $xl_cau_hinh->danh_sach(0, 0, array('ma_dien_dan'), 'tu_khoa ASC', 'tu_khoa, noi_dung', PDO::FETCH_KEY_PAIR, 
	' and tu_khoa = "SO_LUONG_CAP_BAC"', false);
	
	$so_luong = $cau_hinh['SO_LUONG_CAP_BAC'];
	
	for($i=1; $i<=$so_luong; $i++)
	{
		if(empty($_POST['data']['ten_cap_bac_'.$i]))
		{
			throw new Exception("Lỗi! [Tên cấp bậc $i] phải có giá trị, vui lòng kiểm tra lại");
		}
	}

	for($i=1; $i<=$so_luong; $i++)
	{
		if(!is_numeric($_POST['data']['tu_diem_'.$i]) || $_POST['data']['tu_diem_'.$i]<1)
		{
			throw new Exception("Lỗi! [Từ điểm của cấp bậc $i] phải là số và lớn hơn 1, vui lòng kiểm tra lại");
		}
		
		if(!is_numeric($_POST['data']['den_diem_'.$i]) || $_POST['data']['den_diem_'.$i]<1)
		{
			throw new Exception("Lỗi! [Đến điểm của cấp bậc $i] phải là số và lớn hơn 1, vui lòng kiểm tra lại");
		}
		
		if($_POST['data']['den_diem_'.$i]<=$_POST['data']['tu_diem_'.$i])
		{
			throw new Exception("Lỗi! [Cấp bậc $i] đến điểm không thể nhỏ hơn hoặc bằng điểm bắt đầu, vui lòng kiểm tra lại");
		}
		
		if($i!=1)
		{
			if($_POST['data']['tu_diem_'.$i]<$_POST['data']['den_diem_'.($i-1)])
			{
				throw new Exception("Lỗi! [Cấp bậc $i] điểm bắt đầu không thể nhỏ hơn hoặc bằng những điểm đầu mút của các cấp bậc trước đó, vui lòng kiểm tra lại");
			}
		}
	}
	
	$dbh->beginTransaction();
	
	$xl_cap_bac = new xl_cap_bac;
	for($i=1; $i<=$so_luong; $i++)
	{
		if(isset($_POST['data']['cap_bac_'.$i]))
		{
			if(!$xl_cap_bac->cap_nhat_dieu_kien(array('ten'=>$_POST['data']['ten_cap_bac_'.$i], 'dau'=>$_POST['data']['tu_diem_'.$i], 'cuoi'=>$_POST['data']['den_diem_'.$i]), array('ma_dien_dan'=>$ma_dien_dan, 'ma'=>$_POST['data']['cap_bac_'.$i])))
			{
				throw new Exception("Lỗi! [Cấp bậc $i] không tồn tại, vui lòng kiểm tra lại");
			}
		}
		else
		{
			$xl_cap_bac->them(array('ma_dien_dan'=>$ma_dien_dan, 'ten'=>$_POST['data']['ten_cap_bac_'.$i], 'dau'=>$_POST['data']['tu_diem_'.$i], 'cuoi'=>$_POST['data']['den_diem_'.$i]));
		}
	}
	
	$dbh->commit();
	
	throw new Exception('Đã cấu hình cấp bậc thành công', 30);
	
}catch(PDOException $e)
{
	echo $e->getMessage();exit;
}
catch(Exception $e)
{
	throwMessage($e, $url);
}