<?php 
	function send_sms()
	{
		$user = "phpvn"; //Ten dang nhap do he thong cap phat 
		$pass = "Syne6yBe"; //Mat khau do he thong cap phat 
		$code = "DuyNN_".time(); //Ma cua tin nhan, do Quy khach tu dinh nghia 
		$phone = "0972985805"; //So dien thoai can gui tin 
		$content = "Dai ka nhan hang."; //Noi dung tin nhan 
		
		$content = urlencode($content);
		$code = urlencode($code);
		$str = "http://netvn.vn/apis/send_sms?smsUser=$user&smsPass=$pass&smsNumber=$phone&smsContent=$content&smsCode=$code"; 
		
		$result = @file_get_contents($str); 
		
		if (strpos($result, "<code>200</code>") === false) { 
			echo false; 
		} else { 
			echo true; 
		} 
	}
?>