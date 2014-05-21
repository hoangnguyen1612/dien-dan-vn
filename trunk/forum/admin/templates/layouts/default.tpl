<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<title>{$titleForLayout|Default:$smarty.const.WEB_NAME}</title>
		
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
		<script type="text/javascript" src="../templates/scripts/jquery-1.9.1.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="../templates/scripts/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="../templates/scripts/facebox.js"></script>
				
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="../templates/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>
  
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="#">Simpla Admin</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="#"><img id="logo" src="../templates/images/logo.png" alt="Simpla Admin logo" /></a>
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				Chào, <a href="#" title="Edit your profile">Lâm Quốc Hùng</a><br/>
				Last login: 12-3-2014
				<br /><br/>
				<a href="../../index.php" title="View the Site">Xem trang</a> | <a href="../quan_tri/dang_xuat.php" title="Đăng xuất">Đăng xuất</a>
			</div>        
			
			<ul id="main-nav">
				<!-- Accordion Menu -->
				<li><a class="nav-top-item" href="#" id="thong_ke">Thống Kê</a>
					<ul>
					  <li><a href="../thong_ke/tong_quat.php" id="thong_ke_tong_quat.php">Tổng quát</a></li>
					</ul>
				</li>				   
				<li><a class="nav-top-item" href="#" id="bai_viet">Bài Viết</a>
				<ul>
				  <li><a href="../bai_viet/danh_sach.php" id="bai_viet_danh_sach.php">Xem Danh Sách</a></li>
				</ul>
				</li>

				<li><a class="nav-top-item" href="#" id="loai_chuyen_muc">Loại Chuyên Mục</a>
				<ul>
				  <li><a href="../loai_chuyen_muc/them.php" id="loai_bai_viet_them.php">Thêm</a></li>
				  <li><a href="../loai_chuyen_muc/danh_sach.php" id="loai_bai_viet_danh_sach.php">Xem Danh Sách</a></li>
				</ul>
				</li>
				<li><a class="nav-top-item" href="#" id="lien_he">Liên Hệ</a>
				<ul>
				  <li><a href="../lien_he/thong_tin_lien_he.php" id="lien_he_thong_tin_lien_he.php">Thông Tin Liên Hệ</a></li>
				  <li><a href="../lien_he/danh_sach.php" id="lien_he_danh_sach.php">Xem Danh Sách</a></li>
				</ul>
				</li>
				<li><a class="nav-top-item" href="#" id="banner_quang_cao">Banner Quảng Cáo</a>
				<ul>
				  <li><a href="../banner_quang_cao/them.php" id="banner_quang_cao_them.php">Thêm</a></li>
				  <li><a href="../banner_quang_cao/danh_sach.php" id="banner_quang_cao_danh_sach.php">Xem Danh Sách</a></li>
				</ul>
				</li>
						   
				<li><a class="nav-top-item" href="#" id="ho_tro_truc_tuyen">Màu sắc giao diện</a>
				<ul>
				  <li><a href="../ho_tro_truc_tuyen/them.php" id="ho_tro_truc_tuyen_them.php">Thêm</a></li>
				  <li><a href="../ho_tro_truc_tuyen/danh_sach.php" id="ho_tro_truc_tuyen_danh_sach.php">Xem Danh Sách</a></li>
				</ul>
				</li>
						  
				<li><a class="nav-top-item" href="#" id="quan_tri">Quản trị</a>
				<ul>
				  <li><a href="../quan_tri/them.php" id="quan_tri_them.php">Thêm</a></li>
				  <li><a href="../quan_tri/danh_sach.php" id="quan_tri_danh_sach.php">Xem Danh Sách</a></li>
                   <li><a href="../quan_tri/phan_quyen.php" id="quan_tri_phan_quyen.php">Phân Quyền</a></li>
				</ul>
				</li>
								
				<li><a class="nav-top-item" href="#" id="cau_hinh">Cấu Hình</a>
				<ul>
				  <li><a href="../cau_hinh/cau_hinh.php" id="cau_hinh_cau_hinh.php">Cấu Hình Website</a></li>          
				</ul>
				</li>
			</ul>						
			
			<script>
					var url = window.location.href;
					var arr = url.split('/');
					var n = arr.length;
					var folder = arr[n-2];
					var file = arr[n-1];
					
					var i = file.indexOf('.php');					
					file = file.substring(0, i+4);
					
					document.getElementById(folder).className = 'nav-top-item current';
					document.getElementById(folder + '_' + file).className = 'current';
			</script>
		</div></div> <!-- End #sidebar -->
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>					
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->				
				{$contentForLayout}				
			</div> <!-- End .content-box -->
			
			<div class="clear"></div>
			
			
			<div id="footer">
				<small>
						&#169; Copyright 2009 Simpla Admin | Powered by <a href="http://themeforest.net/item/simpla-admin-flexible-user-friendly-admin-skin/46073">Simpla Admin</a> | <a href="#">Top</a>
				</small>
			</div><!-- End #footer -->
			
		</div> <!-- End #main-content -->
		
	</div></body>
  
</html>
