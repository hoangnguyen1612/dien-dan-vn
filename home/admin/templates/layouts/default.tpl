<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hệ Thống Quản Trị DienDanVN</title>

<!--                       CSS                       -->

<!-- Reset Stylesheet -->
<link rel="stylesheet" href="/forum/admin/templates/css/reset.css" type="text/css" media="screen" />

<!-- Main Stylesheet -->
<link rel="stylesheet" href="/forum/admin/templates/css/style.css" type="text/css" media="screen" />

<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="/forum/admin/templates/css/invalid.css" type="text/css" media="screen" />

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
<script type="text/javascript" src="/forum/admin/templates/scripts/jquery-1.9.1.js"></script>

<!-- jQuery Configuration -->
<script type="text/javascript" src="/forum/admin/templates/scripts/simpla.jquery.configuration.js"></script>

<!-- Facebox jQuery Plugin -->
<script type="text/javascript" src="/forum/admin/templates/scripts/facebox.js"></script>

<!-- Internet Explorer .png-fix -->

<!--[if IE 6]>
			<script type="text/javascript" src="../templates/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->

<script>
function inputNumber(e)
{
	// cho phep nhap so, nut backspace, delete vau dau .
	var keynum;
	if(window.event) // IE
	{
	  keynum = e.keyCode;
	}
	else if(e.which) // Netscape/Firefox/Opera
	{
	  keynum = e.which;
	}
	if ( ((keynum > 45) && (keynum <58)) || (keynum == 8) || (keynum == 9) || (keynum == 190) || (keynum == 39)|| (keynum == 37) ) return true;
	else return false;
	
	// 37 : left ; 39: right
}
</script>
</head>

<body>
<div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
  
  <div id="sidebar">
    <div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
      
      <h1 id="sidebar-title"><a href="#">DienDanVn</a></h1>
      
      <!-- Logo (221px wide) -->
	  <a href="#" style="display:block; margin: 0px"><!--<img id="logo" src="/home/upload/dien_dan/thumb/{$dien_dan.hinh_dai_dien}" width="60px" height="60px" alt="Simpla Admin logo" style="border-radius: 3px; margin: 10px 0px 10px 85px" />--><br />
      <div style="font-size: 22px;; font-weight:bold; text-transform:uppercase; color:white; text-align:center; width: 100%; word-break:break-word">
      Quản Trị Diễn Đàn</div>
      </a>
         <br />   
      <!-- Sidebar Profile links -->
      <div id="profile-links"> Chào, {$admin.ho_ten}<a href="#" title="Edit your profile"></a><br/>
        Lần đăng nhập cuối: {date('H:i:s d/m/Y', strtotime($admin.lan_dang_nhap_cuoi))}<br />
        <br/>
        <a href="/" title="Trang chủ" target="_blank">Xem trang</a> | <a href="../quan_tri/dang_xuat.php" title="Đăng xuất">Đăng xuất</a> </div>
      <ul id="main-nav">
        <!-- Accordion Menu -->
        <li><a class="nav-top-item" href="#" id="thong_ke">Thống Kê</a>
          <ul>
            <li><a href="../thong_ke/luot_truy_cap.php" id="thong_ke_luot_truy_cap.php">Lượt truy cập</a></li>
            <li><a href="../thong_ke/phan_hoi.php" id="thong_ke_phan_hoi.php">Phản hồi</a></li>
          </ul>
        </li>
        <li><a class="nav-top-item" href="#" id="dien_dan">Diễn Đàn</a>
          <ul>
            <li><a href="../dien_dan/danh_sach.php" id="dien_dan_danh_sach.php">Xem Danh Sách</a></li>
          </ul>
        </li>
        <li><a class="nav-top-item" href="#" id="nguoi_dung">Người Dùng</a>
          <ul>
            <li><a href="../nguoi_dung/danh_sach.php" id="nguoi_dung_danh_sach.php">Xem Danh Sách</a></li>
          </ul>
        </li>
        <li><a class="nav-top-item" href="#" id="lien_he">Liên Hệ</a>
          <ul>
            <li><a href="../lien_he/danh_sach.php" id="lien_he_danh_sach.php">Xem Danh Sách</a></li>
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
    </div>
  </div>
  <!-- End #sidebar -->
  
  <div id="main-content"> <!-- Main Content Section with everything -->
    
    <noscript>
    <!-- Show a notification if the user has disabled javascript -->
    <div class="notification error png_bg">
      <div> Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly. </div>
    </div>
    </noscript>
    <div class="clear"></div>
    <!-- End .clear -->
    
    <div class="content-box"><!-- Start Content Box --> 
      {$contentForLayout} </div>
    <!-- End .content-box -->
    
    <div class="clear"></div>
    <div id="footer"> <small> &#169; Copyright 2009 Simpla Admin | Powered by <a href="http://themeforest.net/item/simpla-admin-flexible-user-friendly-admin-skin/46073">Simpla Admin</a> | <a href="#">Top</a> </small> </div>
    <!-- End #footer --> 
    
  </div>
  <!-- End #main-content --> 
  
</div>
</body>
</html>
z