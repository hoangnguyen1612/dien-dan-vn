<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
        {if $login == ''}
			<div class="left">
				<h1>Chào mừng bạn đến với DienDanVN</h1>
				<h2>Liên hệ với DienDanVN</h2>		
				<p class="grey">Để liên hệ với diễn đàn , vui lòng nhấp vào <a href="/lien_he/bieu_mau.html">đây</a></p>
				<h2>Thông tin về DienDanVN</h2>
				<p class="grey">Để biết thêm chi tiết về chúng tôi , vui lòng nhấp vào <a href="/gioi_thieu/thong_tin.html">đây</a></p>
			</div>
			<div class="left">
				<!-- Login Form -->
				<form class="clearfix" action="/home/tai_khoan/dang_nhap_sm.php" method="post">
					<h1>Thành viên đăng nhập</h1>
					<label class="grey" for="log">Email:</label>
                    <input type="hidden" name="forum"/>
					<input class="field" type="text" name="data[email]" id="log" value="" size="23" />
					<label class="grey" for="pwd">Mật khẩu:</label>
					<input class="field" type="password" name="data[mat_khau]" id="pwd" size="23" />
	            	<label><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> &nbsp;Ghi nhớ</label>
        			<div class="clear"></div>
					<input type="submit" name="submit" value="Login" class="bt_login" />
					<a class="lost-pwd" href="#">Quên mật khẩu?</a>
				</form>
			</div>
			<div class="left right">			
				<!-- Register Form -->
					<h1>Nếu chưa là thành viên , vui lòng nhấp vào <a href="/tai_khoan/dang_nhap.html">đây</a> để tạo tài khoản</h1>					
			</div>
            {else}
            <div class="left">
            <h1>Chào {$login.ho} {$login.ten}</h1>
            <ul>
            	<li><a href="/" style="margin-left:0px !important;font-size:16px;color:white">Trang chủ</a></li>
                <li><a href="/gioi_thieu/thong_tin.html" style="margin-left:0px !important;font-size:16px;color:white">Giới thiệu</a></li>
                <li><a href="/lien_he/bieu_mau.html" style="margin-left:0px !important;font-size:16px;color:white">Liên hệ</a></li>
                <li><a href="/dien_dan/dang_ky.html" style="margin-left:0px !important;font-size:16px;color:white">Đăng ký diễn đàn</a></li>
            </ul>
            </div>
            <div class="left">
            	<h1>Danh sách các diễn đàn đã tham gia</h1>
               {if $ds_dien_dan != ''}
                            <ul class="treeview-menu">
                            {foreach $ds_dien_dan as $value}
                                <li><a href="/{$value.ma_linh_vuc}/{$value.domain}" style="margin-left:0px !important;font-size:16px;color:white"><img src="/home/upload/dien_dan/{$value.hinh_dai_dien}" width="16px" height="16px" /> {$value.ten|truncate: 22}</a></li>
                            {/foreach}
                            </ul>
               {/if}
            </div>
            
        {/if}
		</div>
</div> <!-- /login -->	

	<!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
			<li class="left">&nbsp;</li>
            {if $login ==''}
			<li>Chào!</li>
            {else}
            <li>Chào {$login.ten} !</li>
            {/if}
			<li class="sep">|</li>
			<li id="toggle">
            	{if $login == ''}
				<a id="open" class="open" href="#">Đăng nhập</a>
                {else}
                <a id="open" class="open" href="#">Thông tin thêm</a>
                {/if}
				<a id="close" style="display: none;font-size:11px" class="close" href="#">Đóng</a>			
			</li>
			<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
	
</div>