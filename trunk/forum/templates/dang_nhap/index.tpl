<div id="page-body">
	 <main role="main">

	

<script>
	onload_functions.push('document.getElementById("username").focus();');
</script>

<div class="row-fluid">
<form action="./ucp.php?mode=login" method="post" id="login">

  		<div class="side-segment"><h3>Đăng nhập</h3></div>

<div class="well">

		<fieldset>
		
<div class="span12">
	<div class="span6">
		<label for="username" class="control-label">Tên đăng nhập:</label>
        <div class="controls">
		 <div class="input-icon left">
	       <i class="icon-user"></i>
            <input type="text" tabindex="1" name="username" id="username" value="" placeholder="Username" class="span12">
         </div>
		</div>
        
		
           <label for="password" class="control-label">Mật khẩu</label>
        <div class="controls">
		 <div class="input-icon left">
	      <i class="icon-key"></i>
            <input type="password" tabindex="2" id="password" name="password" placeholder="Password" class="span12">
         </div>
		<button type="submit" class="btn start" id="load" name="login" tabindex="6" value="Login" data-loading-text="Logging-in... <i class='icon-spin icon-spinner icon-large icon-white'></i>">Đăng nhập</button>
		</div>
		
		
		
		
		
	</div>
	
	
		
	<div class="span6">
		
			  <label class="control-label">Thành viên</label>
			<div class="controls">                                                 
		      <div class="radio"><input type="checkbox" name="autologin" id="autologin" tabindex="4"><label for="autologin">Ghi nhớ mật khẩu</label></div>
		    </div>
			
		<a href="./ucp.php?mode=sendpassword" data-original-title="" title="">Quên mật khẩu</a> | 
		
		<input type="hidden" name="redirect" value="./ucp.php?mode=login">


			<input type="hidden" name="sid" value="4a4b194f52d95234378d7eca1e127ae1">
<input type="hidden" name="redirect" value="index.php">

    </div>
 </div>
		</fieldset>
	
</div>



	<div class="side-segment"><h3>Đăng ký</h3></div>
	<div class="well">
		<p>Để đăng nhập thành công thì bạn phải là thành viên của diễn đàn việt nam. Nếu bạn chưa có tài khoản , vui lòng bấm nút "Đăng ký" phía dưới để được chuyển qua diễn đàn Việt Nam tạo tài khoản</p>
		<p><strong><a href="./ucp.php?mode=terms" data-original-title="" title="">Điều khoản sử dụng</a> | <a href="./ucp.php?mode=privacy" data-original-title="" title="">Chính sách bảo mật</a></strong></p>
		<p><a href="./ucp.php?mode=register" class="btn btn-rounded" data-original-title="" title="">Đăng ký</a></p>
	</div>


</form>
</div>

	
	  </main>
	</div>