<?php
	session_start();
	unset($_SESSION['msg_login']);
	unset($_SESSION['style_msg_login']);
	header('Location: dang_nhap.php');
