<div class="header_bg">
<div class="wrap">
<div class="header"> 
  <!--
        <div class="logo" style="margin-top: -14px;">
			<h1><a href="index.html"><img src="../templates/images/logo_no.png" alt=""/></a></h1>
		</div>-->
  <div class="h_right">
    <ul class="menu">
      <li class="active"><a href="/">trang chủ</a></li>
      <li><a href="../gioi_thieu/">giới thiệu</a></li>
      <li><a href="../dien_dan/tao_moi.html">diễn đàn</a></li>
      <li><a href="../lien_he/">liên hệ</a></li>
     {if isset($smarty.session.login)}
     	 <li><a href="../nguoi_dung/quan_ly_tai_khoan.html">tài khoản</a></li>
          <li><a href="../nguoi_dung/dang_xuat.html">đăng xuất</a></li>
      {else if}   
      <li><a id="go" rel="leanModal" name="signup" href="#signup">đăng ký</a></li>
      <li><a id="go" rel="leanModal" name="signup" href="#login">đăng nhập</a></li>
      {/if}
    </ul>
    <div id="sb-search" class="sb-search">
      <form>
        <input class="sb-search-input" placeholder="Nhập để tìm kiếm diễn đàn..." type="text" value="" name="search" id="search">
        <input class="sb-search-submit" type="submit" value="">
        <span class="sb-icon-search"></span>
      </form>
    </div>
    <script src="../templates/scripts/classie.js"></script> 
    <script src="../templates/scripts/uisearch.js"></script> 
    <script>
				new UISearch( document.getElementById( 'sb-search' ) );
			</script> 
    <!-- start smart_nav * -->
    <nav class="nav">
      <ul class="nav-list">
        <li class="nav-item"><a href="index.html">Home</a></li>
        <li class="nav-item"><a href="about.html">About</a></li>
        <li class="nav-item"><a href="portfolio.html">Portfolio</a></li>
        <li class="nav-item"><a href="blog.html">Blog</a></li>
        <li class="nav-item"><a href="contact.html">Contact</a></li>
        <div class="clear"></div>
      </ul>
    </nav>
    <script type="text/javascript" src="../templates/scripts/responsive.menu.js"></script> 
    <!-- end smart_nav * --> 
  </div>
  <div class="clear"></div>
</div>
<div id="login">
  <div id="login-header">
  	<i class="fa fa-lock"></i>&nbsp;&nbsp;Đăng Nhập
    <a class="modal_close" href="#"></a> 
  </div>
  <div id="content">
  <form id="login_form" method="POST">
  <div id="err-user" style="margin-bottom:5px; clear:right; display:none"><label style="color: crimson; font-size:15px; font-weight:bold;"><img src="../templates/images/warning.png"
  style="vertical-align: text-top" /> Bạn chưa nhập tên đăng nhập</label></div>
  <i class="fa fa-user" style="border-top-left-radius: 3px; border-bottom-left-radius: 3px; display:block;width: 13%; background-color:#17AE8F;
        text-align:center; color:white; float:left; height:38px; line-height: 38px; font-size: 20px"></i>
        <input type="email" class="textbox" style="height: 38px; width: 87%; border-top-left-radius: 0px; border-top-right-radius: 3px; border-bottom-left-radius: 0px; border-bottom-right-radius: 3px;" placeholder="Địa chỉ email" id="mail" name="email" class="required" /><br /><br />
  <div id="err-pass" style="margin-bottom:5px; clear:right; display:none"><label style="color: crimson; font-size:15px; font-weight:bold;"><img src="../templates/images/warning.png"
  style="vertical-align: text-top" /> Bạn chưa nhập mật khẩu</label></div>
  <i class="fa fa-key" style="border-top-left-radius: 3px; border-bottom-left-radius: 3px; display:block;width: 13%; background-color:#17AE8F;
        text-align:center; color:white; float:left; height:38px; line-height: 38px; font-size: 20px"></i>
        <input type="password" class="textbox" style="height: 38px; width: 87%; border-top-left-radius: 0px; border-top-right-radius: 3px; border-bottom-left-radius: 0px; border-bottom-right-radius: 3px;" placeholder="Mật khẩu" name="mat_khau" class="required" id="mat_khau"/>
        <br /><br />
        <a href="" style="color: #999; float:left; font-size: 15px;">Quên mật khẩu</a>
       <center>
        <input id="remember" class="css-checkbox" type="checkbox" onclick="check()"/>
        <label for="remember" name="demo_lbl_1" class="css-label" style="float:right; color: #999" id="lblr">Ghi nhớ đăng nhập</label><br />
        <input type="submit" name="next" class="action-button" value="Đăng Nhập" style="margin: 15px 0px 0px 0px !important;"/>
        &nbsp;&nbsp;&nbsp;
        <input type="button" value="Thoát" class="modal_close action-button" />
        </center>
   </form> 
   <script>
    function check()
	{
		var r = $("#remember").is(':checked');
		var l = document.getElementById("lblr");
		
		if(r==true)
		{
			l.style.color = 'darkorange';
		}
		else
		{
			l.style.color = '#999';
		}
	}
	
   </script>  
   
   
  <style>
  	#login_form input:focus{
		outline: 1;
		outline-color: #FC6;
	}
  </style>  
  </div>
</div>

<div id="signup">
  <div id="signup-header">
  	<i class="fa fa-pencil"></i>&nbsp;&nbsp;Đăng Ký Tài Khoản
    <!--<a class="modal_close" href="#"></a> -->
  </div>
  <div id="content">
  <form id="signup_form" style="text-align:left" method="post">
            	<table style="width:100%">
                	<tr><td><label>Họ và Tên</label> <span class="red">*</span><br /><input class="required textbox" id="fullname" name="ho_ten" type="text" autofocus="autofocus" />
                    <label for="fullname" generated="true" class="error" style="display:none" id="err-fullname"></label>
                    </td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td><label>Giới Tính</label> <span class="red">*</span><br />
                      <div style="margin-top:8px;">
                      <input type="radio" name="gioi_tinh" id="nam" value="0" checked="checked"/>
   <label for="nam" id="lbl-nam" style="color:#666">Nam</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <input type="radio" name="gioi_tinh" id="nu" value="1" />
   <label for="nu" id="lbl-nu" style="color:#666">Nữ</label>
   <label for="nu" generated="true" class="error" style="display:none" id="err-gender"></label> 
                      </div>             
                      </td></tr>
                    
                    <tr><td>&nbsp;</td></tr>
                    
                     <tr><td><label>Ngày Sinh</label><span class="red">*</span><br />
                    <input class="required textbox" id="datepicker" name="ngay_sinh" type="text" id="ngay_sinh"/>
                     <label for="ngay_sinh" generated="true" class="error" style="display:none" id="err-birthday"></label> 
				{literal}
				<script>
					$(function() {
						$( "#datepicker" ).datepicker(
							{
								changeMonth: true,
							 	changeYear: true,
								yearRange: '1950:2000',
								dateFormat: "yy-mm-dd",
								monthNamesShort: [ "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12" ],
								dayNamesMin: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN'],
								defaultDate: '1990-01-01'
							}
						);
					});
                </script>
                {/literal}
                    </td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td><label>Email</label> <span class="red">*</span><br /><input class="textbox" name="email" type="text" id="email" />
                     <label for="email" generated="true" class="error" style="display:none" id="err-email"></label> 
                    </td></tr>
                     <tr><td>&nbsp;</td></tr>
                    <tr><td>
                   <label>Mật Khẩu</label> <span class="red">*</span><br /><input class="required textbox" name="mat_khau" type="password" id="password" />
                    <label for="password" generated="true" class="error" style="display:none" id="err-password"></label> 
                    </td></tr>
                     <tr><td>&nbsp;</td></tr>
                    
                     <tr><td>
                     <label>Nhập Lại Mật Khẩu</label> <span class="red">*</span><br /><input class="textbox" name="nhap_lai_mat_khau" type="password" id="cpassword" /><label for="cpassword" generated="true" class="error" style="display:none" id="err-cpassword"></label> 
                     </td></tr>
                     <!--<tr><td>&nbsp;</td></tr>-->
                    <!--<tr><td><label>Hình Đại Diện</label><br /><input class="textbox" name="data[hinh_dai_dien]" type="file" /></td></tr>-->
               		<tr><td>&nbsp;</td></tr> 
               <tr><td align="center">
               	<input type="submit" value="Đăng Ký" class="action-button" />&nbsp;&nbsp;&nbsp;<input type="button" value="Thoát" class="modal_close action-button" />
               </td></tr>
                </table>
      
		 </form>    
  </div>
</div>



<div id="lean_overlay" style="display: none; opacity: 0.5;"></div>
<script type="text/javascript">
	$(function() {
		$('a[rel*=leanModal]').leanModal({ top : 50, closeButton: ".modal_close" });	
	});
</script> 


<div id="loading" style="display: none; opacity: 0.5; position: fixed;
z-index: 600;
top: 0px;
left: 0px;
height: 100%;
width: 100%;
background: #000;">
	<img src="/home/templates/images/loading.gif" style="position: fixed;
left: 50%;
top: 38%;" />
</div>

 