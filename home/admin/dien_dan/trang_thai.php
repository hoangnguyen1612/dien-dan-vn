<?php
	try
	{
		include("../../classes/xl_dien_dan.php");
		include ('../ini.php');
		
		# kiểm tra mã 
		if(empty($_GET['ma']))
		{
			throw new Exception("Mã không hợp lệ");
		}		
	
		$ma=$_GET['ma'];
		$xl_dien_dan=new xl_dien_dan;
		
		
		if(!$xl_dien_dan->cap_nhat_trang_thai($ma)) 
			throw new Exception("Cập nhật trạng thái không thành công");

		throw new Exception('Cập nhật trạng thái diễn đàn thành công', 30);
	}
	catch(Exception $e)
	{
		throwMessage($e);
	}
?>