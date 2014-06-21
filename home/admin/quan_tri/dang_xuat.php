<?php
	session_start();
	unset($_SESSION['LOGIN']);
	header('Location: dang_nhap.php');
?>