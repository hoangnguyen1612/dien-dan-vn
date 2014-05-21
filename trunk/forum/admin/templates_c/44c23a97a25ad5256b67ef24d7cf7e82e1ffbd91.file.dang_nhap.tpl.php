<?php /* Smarty version Smarty-3.1.14, created on 2014-05-07 11:11:55
         compiled from "..\templates\quan_tri\dang_nhap.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2459535acbe81c2196-76741739%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44c23a97a25ad5256b67ef24d7cf7e82e1ffbd91' => 
    array (
      0 => '..\\templates\\quan_tri\\dang_nhap.tpl',
      1 => 1398474023,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2459535acbe81c2196-76741739',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_535acbe84a8c44_18920346',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535acbe84a8c44_18920346')) {function content_535acbe84a8c44_18920346($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<title>Quản Trị Hutech | Đăng Nhập</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="../templates/css/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="../templates/css/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="../templates/css/invalid.css" type="text/css" media="screen" />	
		
		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		
		<link rel="stylesheet" href="../templates/css/blue.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="../templates/css/red.css" type="text/css" media="screen" />  
	 
		-->
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="../templates/css/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
	  
		<!-- jQuery -->
		<script type="text/javascript" src="../templates/scripts/jquery-1.3.2.min.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="../templates/scripts/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="../templates/scripts/facebox.js"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="../templates/scripts/jquery.wysiwyg.js"></script>
		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="../templates/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>
  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>Hệ Thống Quản Trị Diễn Đàn Hutech</h1>
				<!-- Logo (221px width) -->
				<!--<img id="logo" src="../templates/images/logo.png" alt="Simpla Admin logo" />-->
                <div id="logo" style="font-size: 24px; font-weight:bold">Hệ Thống Quản Trị Diễn Đàn Hutech</div>
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
				<form action="dang_nhap_sm.php" method="post">
				<!--
					<div class="<?php echo $_SESSION['style_msg_login'];?>
">
						<div>
<?php echo $_SESSION['msg_login'];?>

						</div>
					</div>
				-->	
					<p>
						<label>Tên đăng nhập</label>
						<input class="text-input" type="text" name = "data[ten_dang_nhap]" value="<?php echo (($tmp = @$_COOKIE['ten_dang_nhap'])===null||$tmp==='' ? '' : $tmp);?>
"/>
					</p>
					<div class="clear"></div>
					<p>
						<label>Mật khẩu</label>
						<input class="text-input" type="password" name = "data[mat_khau]" value="<?php echo (($tmp = @base64_decode($_COOKIE['mat_khau']))===null||$tmp==='' ? '' : $tmp);?>
"/>
					</p>
					<div class="clear"></div>
					<p id="remember-password">
						<input type="checkbox" name = "remember"/>Nhớ đăng nhập
					</p>
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" value="Đăng nhập" />
					</p>
					
				</form>
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
		
  </body>
  
</html>
<?php }} ?>