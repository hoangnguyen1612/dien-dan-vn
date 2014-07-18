<?php
	session_start();
	unset($_SESSION['login']);
	if(!empty($_COOKIE['username-forum']) && !empty($_COOKIE['password-forum']))
	{
		setcookie('username-forum', $email, time() - (2*24*60*60), '/', NULL);
		setcookie('password-forum', base64_encode($mat_khau), time() - (2*24*60*60), '/', NULL);
	}
	header('Location: '.$_SERVER['HTTP_REFERER']);