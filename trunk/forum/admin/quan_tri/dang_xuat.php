<?php
	session_start();
	unset($_SESSION['msg_login']);
	unset($_SESSION['style_msg_login']);
	unset($_SESSION['login']);
	unset($_SESSION['thanh_vien']);
	header("Location:/{$_SESSION['dien_dan']['ma']}/admin/quan_tri/dang_nhap.php");
