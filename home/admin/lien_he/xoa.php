<?php

	try{
		include('../ini.php');
	
		if(empty($_GET['ma']))
		{
			throw new Exception("Mã liên hệ không hợp lệ, vui lòng thử lại!");
		}

		$ma = $_GET['ma'];
		
		$xl_lien_he = new xl_lien_he;
		
		$lien_he = $xl_lien_he->doc($ma);
		if($lien_he==NULL)
		{
			throw new Exception('Mã liên hệ không tồn tại, vui lòng thử lại!');
		}
	
		$lien_he = $xl_lien_he->xoa($ma);
		if($lien_he === false)
		{
			throw new Exception(mysql_error());
		}

		throw new Exception('Đã xóa thành công', 30);
	}catch(Exception $e)
	{
		throwMessage($e);
	}
?>