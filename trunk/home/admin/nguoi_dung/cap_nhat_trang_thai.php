<?php
try
{
	include("../../classes/xl_nguoi_dung.php");
	include ('../ini.php');
	
	# kiểm tra mã 
	if(empty($_GET['ma']))
	{
		throw new Exception("Mã người dùng không hợp lệ");
	}		

	$ma=$_GET['ma'];
	$xl_nguoi_dung = new xl_nguoi_dung;
	
	
	if(!$xl_nguoi_dung->cap_nhat_trang_thai($ma)) 
		throw new Exception("Cập nhật trạng thái không thành công");

	throw new Exception('Cập nhật trạng thái người dùng thành công', 30);
}
catch(Exception $e)
{
	throwMessage($e);
}
?>