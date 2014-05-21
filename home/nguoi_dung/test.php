<html><head>
<title>Diễn Đàn Việt Nam</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- scripts and css -->
<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>-->
<link href="../templates/css/style.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" id="fontawsome-css" href="../templates/css/font-awsome/css/font-awesome.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="../templates/css/sliding.css">
<link rel="stylesheet" type="text/css" href="../templates/scripts/ui-lightness/jquery-ui.css">
<link href="../templates/css/general.css" rel="stylesheet" type="text/css" media="all">
<!--  jquery plguin -->

<script src="../templates/scripts/jquery-1.10.2.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="../templates/scripts/jquery.easing.min.js" type="text/javascript"></script>	
<script type="text/javascript" src="../templates/scripts/jquery.leanModal.min.js"></script>
<script type="text/javascript" src="../templates/scripts/ui/jquery-ui.custom.js"></script>
<script src="../templates/scripts/jquery.validate.min.js"></script>
<!--
	<script type="text/javascript" src="../templates/scripts/jquery.mixitup.min.js"></script>
	<script type="text/javascript">
	$(function () {
		
		var filterList = {
		
			init: function () {
			
				// MixItUp plugin
				// http://mixitup.io
				$('#portfoliolist').mixitup({
					targetSelector: '.portfolio',
					filterSelector: '.filter',
					effects: ['fade'],
					easing: 'snap',
					// call the hover effect
					onMixEnd: filterList.hoverEffect()
				});				
			
			},
			
			hoverEffect: function () {
			
				// Simple parallax effect
				$('#portfoliolist .portfolio').hover(
					function () {
						$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
						$(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');				
					},
					function () {
						$(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
						$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');								
					}		
				);				
			
			}

		};
		
		// Run the show!
		filterList.init();
			
	});	
	</script>
<!-- Add fancyBox main JS and CSS files 
<link href="../templates/css/magnific-popup.css" rel="stylesheet" type="text/css">
<script src="../templates/scripts/jquery.magnific-popup.js" type="text/javascript"></script>
		<script>
			$(document).ready(function() {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
			});
		});
		</script>       

</head>
<body>
<!-- header -->

</head><body cz-shortcut-listen="true"><div class="header_bg">
<div class="wrap">
<div class="header"> 
  <!--
        <div class="logo" style="margin-top: -14px;">
			<h1><a href="index.html"><img src="../templates/images/logo_no.png" alt=""/></a></h1>
		</div>-->
  <div class="h_right">
    <ul class="menu">
      <li class="active"><a href="../trang_chu/index.html">trang chủ</a></li>
      <li><a href="../gioi_thieu/index.html">giới thiệu</a></li>
      <li><a href="../dien_dan/index.html">diễn đàn</a></li>
      <li><a href="../lien_he/index.html">liên hệ</a></li>
          	 <li><a href="../nguoi_dung/index.html">tài khoản</a></li>
          <li><a href="../nguoi_dung/dang_xuat.php">đăng xuất</a></li>
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
    <div class="nav-mobile"></div></nav>
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
  <form id="login_form" method="POST" novalidate="novalidate">
  <div id="err-user" style="margin-bottom:5px; clear:right; display:none"><label style="color: crimson; font-size:15px; font-weight:bold;"><img src="../templates/images/warning.png" style="vertical-align: text-top"> Bạn chưa nhập tên đăng nhập</label></div>
  <i class="fa fa-user" style="border-top-left-radius: 3px; border-bottom-left-radius: 3px; display:block;width: 13%; background-color:#17AE8F;
        text-align:center; color:white; float:left; height:38px; line-height: 38px; font-size: 20px"></i>
        <input type="email" class="textbox" style="height: 38px; width: 87%; border-top-left-radius: 0px; border-top-right-radius: 3px; border-bottom-left-radius: 0px; border-bottom-right-radius: 3px;" placeholder="Địa chỉ email" id="mail" name="email"><br><br>
  <div id="err-pass" style="margin-bottom:5px; clear:right; display:none"><label style="color: crimson; font-size:15px; font-weight:bold;"><img src="../templates/images/warning.png" style="vertical-align: text-top"> Bạn chưa nhập mật khẩu</label></div>
  <i class="fa fa-key" style="border-top-left-radius: 3px; border-bottom-left-radius: 3px; display:block;width: 13%; background-color:#17AE8F;
        text-align:center; color:white; float:left; height:38px; line-height: 38px; font-size: 20px"></i>
        <input type="password" class="textbox" style="height: 38px; width: 87%; border-top-left-radius: 0px; border-top-right-radius: 3px; border-bottom-left-radius: 0px; border-bottom-right-radius: 3px;" placeholder="Mật khẩu" name="mat_khau" id="mat_khau">
        <br><br>
        <a href="" style="color: #999; float:left; font-size: 15px;">Quên mật khẩu</a>
       <center>
        <input id="remember" class="css-checkbox" type="checkbox" onclick="check()">
        <label for="remember" name="demo_lbl_1" class="css-label" style="float:right; color: #999" id="lblr">Ghi nhớ đăng nhập</label><br>
        <input type="submit" name="next" class="action-button" value="Đăng Nhập" style="margin: 15px 0px 0px 0px !important;">
        &nbsp;&nbsp;&nbsp;
        <input type="button" value="Thoát" class="modal_close action-button">
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
  </div>
</div>

<div id="signup">
  <div id="signup-header">
  	<i class="fa fa-pencil"></i>&nbsp;&nbsp;Đăng Ký Tài Khoản
    <!--<a class="modal_close" href="#"></a> -->
  </div>
  <div id="content">
  <form id="signup_form" style="text-align:left" method="post" novalidate="novalidate">
            	<table style="width:100%">
                	<tbody><tr><td><label>Họ và Tên</label> <span class="red">*</span><br><input class="required textbox" id="fullname" name="ho_ten" type="text" autofocus="autofocus">
                    <label for="fullname" generated="true" class="error" style="display:none" id="err-fullname"></label>
                    </td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td><label>Giới Tính</label> <span class="red">*</span><br>
                      <div style="margin-top:8px;">
                      <input type="radio" name="gioi_tinh" id="nam" value="0" checked="checked">
   <label for="nam" id="lbl-nam" style="color:#666">Nam</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <input type="radio" name="gioi_tinh" id="nu" value="1">
   <label for="nu" id="lbl-nu" style="color:#666">Nữ</label>
   <label for="nu" generated="true" class="error" style="display:none" id="err-gender"></label> 
                      </div>             
                      </td></tr>
                    
                    <tr><td>&nbsp;</td></tr>
                    
                     <tr><td><label>Ngày Sinh</label><span class="red">*</span><br>
                    <input class="required textbox hasDatepicker" id="datepicker" name="ngay_sinh" type="text">
                     <label for="ngay_sinh" generated="true" class="error" style="display:none" id="err-birthday"></label> 
				
				<script>
					$(function() {
						$( "#datepicker" ).datepicker(
							{
								changeMonth: true,
							 	changeYear: true,
								yearRange: '1950:2000',
								dateFormat: "yy-mm-dd",
								monthNamesShort: [ "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12" ],
								dayNamesMin: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN']
							}
						);
					});
                </script>
                
                    </td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td><label>Email</label> <span class="red">*</span><br><input class="textbox" name="email" type="text" id="email">
                     <label for="email" generated="true" class="error" style="display:none" id="err-email"></label> 
                    </td></tr>
                     <tr><td>&nbsp;</td></tr>
                    <tr><td>
                   <label>Mật Khẩu</label> <span class="red">*</span><br><input class="required textbox" name="mat_khau" type="password" id="password">
                    <label for="password" generated="true" class="error" style="display:none" id="err-password"></label> 
                    </td></tr>
                     <tr><td>&nbsp;</td></tr>
                    
                     <tr><td>
                     <label>Nhập Lại Mật Khẩu</label> <span class="red">*</span><br><input class="textbox" name="nhap_lai_mat_khau" type="password" id="cpassword"><label for="cpassword" generated="true" class="error" style="display:none" id="err-cpassword"></label> 
                     </td></tr>
                     <!--<tr><td>&nbsp;</td></tr>-->
                    <!--<tr><td><label>Hình Đại Diện</label><br /><input class="textbox" name="data[hinh_dai_dien]" type="file" /></td></tr>-->
               		<tr><td>&nbsp;</td></tr> 
               <tr><td align="center">
               	<input type="submit" value="Đăng Ký" class="action-button">&nbsp;&nbsp;&nbsp;<input type="button" value="Thoát" class="modal_close action-button">
               </td></tr>
                </tbody></table>
      
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
	<img src="../templates/images/loading.gif" style="position: fixed;
left: 50%;
top: 38%;">
</div>

 
<!-- main -->
</div>
</div>
<!-- start slider -->
<div class="slider_bg">
  <div class="wrap">
    <div class="slider">
      <h2>Thông Tin Tài Khoản</h2>
      <h3 style="">Xem và cập nhật thông tin cá nhân của bạn để chúng tôi có thể hỗ trợ bạn tốt hơn</h3>
    </div>
  </div>
</div>
<!-- start main -->
<div class="main_bg">
  <div class="wrap">
    <div class="main">
      <div class="content"> 
         <div class="user">
         	<div class="title"><h3><i class="fa fa-pencil-square"></i>&nbsp;&nbsp;Thông Tin Cơ Bản</h3></div>
            <table>
            	<tbody><tr>
                	<td rowspan="3">
                    <div id="img"><!--onmouseover="document.getElementById('edit-image').style.display = 'block'"
                    onmouseout="document.getElementById('edit-image').style.display = 'none'"-->
         					<img id="avatar" src="../upload/hinh_dai_dien/no_avatar_male.jpg" width="168" height="168">
              		</div>
            </td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            		<td style="vertical-align:top">
                    	<!--<table id="info-basic" style="display:block">
                        	<tr>
                            	<td><i class="fa fa-user"></i>&nbsp;<label class="info">Họ tên</label></td>
                                <td><label>Nguyễn Thanh Hoàng</label></td>
                            </tr>
                            <tr>
                            	<td><i class="fa fa-male"></i>&nbsp;&nbsp;<label class="info">Giới tính</label></td>
                                <td><label>Nam</label></td>
                            </tr>
                            <tr>
                            	<td><i class="fa fa-calendar-o"></i> <label class="info">Ngày sinh</label></td>
                                <td><label>16-12-1992</label></td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                            	<td>
                                	<input type="button" class="action-button" value="Chỉnh Sửa" onclick="open_edit_basic()"/>
                                </td>
                            </tr>
                        </table>-->
                        <table id="info-edit-basic" style="display:block">
                           
                        </tbody></table>
                    </td>
                </tr>
            </tbody></table>
            
<form id="co_ban_form" method="post">
                        	<input type="text" class="required textbox" style="width:100%" name="ho_ten" id="ho_ten">
                       <input type="text" class="required textbox hasDatepicker" id="datepicker1" value="1992-12-16" style="width:100%" name="ngay_sinh"><script>
					$(function() {
						$( "#datepicker1" ).datepicker(
							{
								changeMonth: true,
							 	changeYear: true,
								yearRange: '1950:2000',
								dateFormat: "yy-mm-dd",
								monthNamesShort: [ "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12" ],
								dayNamesMin: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN']
							}
						);
					});
                </script>
                        
                                	<input type="submit" class="action-button" value="Cập Nhật">
  
                         </form>
            <script>
            function open_edit_basic()
            {
                document.getElementById("info-basic").style.display = 'none';
                document.getElementById("info-edit-basic").style.display = 'block';
            }
            function close_edit_basic()
            {
                document.getElementById("info-basic").style.display = 'block';
                document.getElementById("info-edit-basic").style.display = 'none';
            }
            function open_edit_contact()
            {
                document.getElementById("info-contact").style.display = 'none';
                document.getElementById("info-edit-contact").style.display = 'block';
            }
            function close_edit_contact()
            {
                document.getElementById("info-contact").style.display = 'block';
                document.getElementById("info-edit-contact").style.display = 'none';
            }
            </script>
         </div>
         <div class="user">
         	<div class="title"><h3><i class="fa fa-pencil-square"></i>&nbsp;&nbsp;Thông Tin Liên Hệ</h3></div>
            <table id="info-contact" style="display:block">
                        <form id="msform"></form>
                        	<tbody><tr>
                    <td><i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;<label class="info">Địa chỉ</label></td>
                    <td><label>chưa có</label></td>
                </tr>
                <tr>
                    <td><i class="fa fa-phone"></i>&nbsp;&nbsp;<label class="info">Điện Thoại</label></td>
                    <td><label>chưa có</label></td>
                </tr>
                <tr>
                    <td><i class="fa fa-envelope"></i> <label class="info">Email</label></td>
                    <td><label>irisforever1612@gmail.com</label></td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td>
                        <input type="button" class="action-button" value="Chỉnh Sửa" onclick="open_edit_contact()">
                    </td>
                    
                </tr>
                            
            </tbody></table>
            
            <table id="info-edit-contact" style="display:none">
                <tbody><tr>
                    <td width="150px;"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;<label class="info">Địa chỉ</label></td>
                    <td width="70%"><input type="text" class="textbox" value="" style="width:100%"></td>
                </tr>
                 <tr><td>&nbsp;</td></tr>
                <tr>
                    <td><i class="fa fa-phone"></i>&nbsp;&nbsp;<label class="info">Điện Thoại</label></td>
                    <td><input type="text" class="textbox" value="" style="width:100%"></td>
                </tr>
                 <tr><td>&nbsp;</td></tr>
                <tr>
                    <td><i class="fa fa-envelope"></i> <label class="info">Email</label></td>
                    <td><input type="email" class="textbox" value="irisforever1612@gmail.com" style="width:100%"></td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td>
                        <input type="button" class="action-button" value="Cập Nhật">
                    </td>
                    <td>
                        <input type="button" class="action-button" value="Thoát" onclick="close_edit_contact()">
                    </td>
                </tr>
            </tbody></table>
         </div>
         <div class="user">
         	<div class="title"><h3><i class="fa fa-pencil-square"></i>&nbsp;&nbsp;lĩnh vực quan tâm</h3></div>
            
         </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="../templates/scripts/sliding.js"></script>
<script>
$(document).ready(function(){
    var validator = $("#signup_form").validate({ 
        rules: { 
			ho_ten: {
				required: true
			},
		 	ngay_sinh: {
				date: true, 
                required: true, 
            }, 
            mat_khau: { 
                required: true, 
                minlength: 6, 
            }, 
            nhap_lai_mat_khau: {
				required: true,
                equalTo: "#password" 
            }, 
            email: { 
                required: true, 
                email: true,
				remote:{   //gọi AJAX tương tự $.ajax của jquery
					url: "http://localhost:88/DATN/forumvn/dien_dan_vn/nguoi_dung/kiem_tra_email.php",// gọi đến trang kiểm tra username
					type: "post",
					//data :  nếu cần
   				 }
            }
        }, 
        messages: { 
			ho_ten:{
				required:" Bạn chưa nhập họ tên",
			},
			ngay_sinh: {
				date: " Vui lòng nhập ngày hợp lệ",
				required: " Bạn chưa nhập ngày sinh"
			},
            mat_khau: { 
                required: " Bạn chưa nhập mật khẩu", 
                minlength: " Mật khẩu phải có ít nhất 6 ký tự"
            }, 
            nhap_lai_mat_khau: { 
				required: " Bạn chưa nhập mật khẩu xác nhận",
                equalTo: "Mật khẩu xác nhận không chính xác" 
            }, 
            email: { 
                required: " Bạn chưa nhập địa chỉ email", 
                email:" Địa chỉ email không hợp lệ",
				remote: " Địa chỉ email này đã tồn tại, vui lòng chọn email khác"
            }
        },
		submitHandler: function(){
			$("#loading").show();
			$.ajax({
				type: "POST",
				url: "http://localhost:88/DATN/forumvn/dien_dan_vn/nguoi_dung/dang_ky_sm.php",
				dataType: "json",
				data: $("#signup_form").serialize(),
				success: function(data){
					if(data.error==true)
					{
						if(data.ho_ten==true)
						{
							$("#err-fullname").show();
							document.getElementById("err-fullname").innerHTML = data.message;
						}
						if(data.gioi_tinh==true)
						{
							$("#err-gender").show();
							document.getElementById("err-gender").innerHTML = data.message;
						}
						if(data.ngay_sinh==true)
						{
							$("#err-birthday").show();
							document.getElementById("err-birthday").innerHTML = data.message;
						}
						if(data.ten_dang_nhap==true)
						{
							$("#err-username").show();
							document.getElementById("err-username").innerHTML = data.message;
						}
						if(data.mat_khau==true)
						{
							$("#err-password").show();
							document.getElementById("err-password").innerHTML = data.message;
						}
						if(data.nhap_lai_mat_khau==true)
						{
							$("#err-rpassword").show();
							document.getElementById("err-rpassword").innerHTML = data.message;
						}
					}
					else
					{
						$("#loading").hide();
						alert(data.message);
						location.reload();
					}
				}
			});
		}
    });
	
	 var validator_login = $("#login_form").validate({ 
	 	rules: { 
			email: {
				email: true,
				required: true
			},
		 	mat_khau: {
                required: true, 
				minlength: 6, 
            }, 
		},
		 messages: { 
			mat_khau: { 
				required: " Bạn chưa nhập mật khẩu", 
				minlength: " Mật khẩu phải có ít nhất 6 ký tự"
			}, 
            email: { 
                required: " Bạn chưa nhập địa chỉ email", 
                email:" Địa chỉ email không hợp lệ",
            }
		 },
		 submitHandler: function(){
			$("#loading").show();
			$.ajax({
				type: "POST",
				url: "http://localhost:88/DATN/forumvn/dien_dan_vn/nguoi_dung/dang_nhap_sm.php",
				dataType: "json",
				data: $("#login_form").serialize(),
				success: function(data){
					$("#loading").hide();
					if(data.error == true)
						alert(data.message);
					else
						location.reload();	
				}
			})
		 }
			
	 }); 
	 
	 var validator_co_ban_form = $("#co_ban_form").validate({ 
	 	rules: { 
			ho_ten: {
				required: true
			},
		 	ngay_sinh: {
                required: true, 
				date: true, 
            }, 
		},
		 messages: { 
			ho_ten:{
				required:" Bạn chưa nhập họ tên",
			},
			ngay_sinh: {
				date: " Vui lòng nhập ngày hợp lệ",
				required: " Bạn chưa nhập ngày sinh"
			},
		 },
		
	 }); 
	 
	 $("#co_ban_form").removeAttr("novalidate");
})
</script>
<!-- footer -->
<div class="footer_bg">
<div class="wrap">
	<div class="footer">
		<div class="span_of_4">
			<div class="span1_of_4">
				<h4>Về chúng tôi</h4>
				<p>Diendanvn.com.vn mang đến cho bạn những trải nghiệm theo cách hoàn toàn mới và thật sự dễ dàng để tạo một diễn đàn cho riêng bạn.</p>
				<span>Địa Chỉ</span>
				<p class="top">475A Điện Biên Phủ,</p>
				<p>Phường 25, Quận Bình Thạnh, TP. HCM</p>
				<p>Việt Nam</p>
				<p>Điện Thoại:(00) 222 666 444</p>
				<p>Fax: (000) 000 00 00 0</p>
				<div class="f_icons">
						<ul>
							<li><a class="icon2" href="#"></a></li>
							<li><a class="icon1" href="#"></a></li>
							<li><a class="icon3" href="#"></a></li>
							<li><a class="icon4" href="#"></a></li>
							<li><a class="icon5" href="#"></a></li>
						</ul>	
				</div>
			</div>
			<div class="span1_of_4">
				<h4>bài đăng mới nhất</h4>
				<span>Hướng dẫn cách đăng ký diễn đàn</span>
				<p>25 april 2013</p>
				<span>Khắc phục lỗi giao diện diễn đàn</span>
				<p>15 march 2013</p>
				<span>DIENDANVN thử nghiệm chức năng kết bạn và trò chuyện trực tuyến</span>
				<p>25 april 2013</p>
			</div>
			<div class="span1_of_4">
				<h4>Chính sách và dịch vụ</h4>
				<!--
                <span class="bg">It is a long established fact that a reader will looking layout.</span>
				<span class="bg top">There are many variations of passages of Lorem Ipsum available words.</span>
				<span class="bg">It is a long established fact that a reader will looking layout.</span>-->
			</div>
			<div class="span1_of_4">
				<h4>diễn đàn nổi bật</h4>
				<ul class="f_nav">
					<li><a href="#"><img src="../templates/images/f_pic1.jpg" alt=""> </a></li>
					<li><a href="#"><img src="../templates/images/f_pic2.jpg" alt=""> </a></li>
					<li><a href="#"><img src="../templates/images/f_pic3.jpg" alt=""> </a></li>
					<li><a href="#"><img src="../templates/images/f_pic4.jpg" alt=""> </a></li>
					<li><a href="#"><img src="../templates/images/f_pic5.jpg" alt=""> </a></li>
					<li><a href="#"><img src="../templates/images/f_pic6.jpg" alt=""> </a></li>
					<li><a href="#"><img src="../templates/images/f_pic7.jpg" alt=""> </a></li>
					<li><a href="#"><img src="../templates/images/f_pic8.jpg" alt=""> </a></li>
					<li><a href="#"><img src="../templates/images/f_pic9.jpg" alt=""> </a></li>
					<li><a href="#"><img src="../templates/images/f_pic10.jpg" alt=""> </a></li>
					<li><a href="#"><img src="../templates/images/f_pic11.jpg" alt=""> </a></li>
					<li><a href="#"><img src="../templates/images/f_pic12.jpg" alt=""> </a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="footer_top">
			<div class="f_nav1">
				<ul>
					<li><a href="index.html">trang chủ</a></li>
					<li><a href="about.html">giới thiệu</a></li>
					<li><a href="portfolio.html">diễn đàn</a></li>
                    <li><a href="portfolio.html">liên hệ</a></li>
					<li><a href="blog.html">tài khoản</a></li>
					<li><a href="index.html">đăng ký</a></li>
					<li><a href="contact.html">đăng nhập</a></li>
				</ul>
			</div>
			<div class="copy">
				<p class="link"><span>© Copy right by DIENDANVN 2014</span></p>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
</div>

<div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div><div id="lean_overlay"></div></body></html>