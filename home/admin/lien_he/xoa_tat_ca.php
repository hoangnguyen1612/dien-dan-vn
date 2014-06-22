<?php
	
	
	try{
		include('../ini.php');
	
		if(empty($_POST['item']))
		{
			throw new Exception("Đã có lỗi trong quá trình xóa, vui lòng thử lại sau");
		}
		
		# xóa tất cả mã liên hệ được chọn
		$item = $_POST['item'];
		
		# kiểm tra có mã nào không tồn tại trong cơ sở dữ liệu
		$xl_lien_he = new xl_lien_he;
		$str = '';
		
		foreach($item as $key=>$value)
		{
			$lien_he = $xl_lien_he->doc(array('ma'=>$value), 'ma');
			if(!$lien_he)
			{
				$str.="#{$lien_he['ma']}, ";
			}
			
			if(!$xl_lien_he->xoa(array('ma'=>$value)))
			{
				$str.="#{$lien_he['ma']}, ";
			}
		}
		
		if($str!='')
			throw new Exception('Các mã sau không xóa được: '.$str);
	
		throw new Exception('Đã xóa các mã được chọn thành công', 30);
	}catch(Exception $e)
	{
		throwMessage($e);
	}
?>