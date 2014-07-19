<link rel="stylesheet" type="text/css" href="/forum/templates/css/jPushMenu.css" />
<script src="/forum/templates/js/jPushMenu.js"></script>
<script>
jQuery(document).ready(function($) {
    $('.toggle-menu').jPushMenu();
});
</script>

<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" style="box-shadow:0 0 14px #FFFFFF">
<a href="/"><h3 style="font-family:'Kaushan Script', cursive; color:white; font-size: 20px; text-transform:none" class="bg-color"><i class="icon-globe"></i> Diendan.vn</h3></a>
{if $login!=''}
<div class="main">
  <div class="user-panel">
    <div class="pull-left image"> <img src="/home/upload/nguoi_dung/{$login.hinh_dai_dien}" class="img-circle" alt="{$login.ten}" /> </div>
    <div class="pull-left info" style="margin-left: 12px">
      <p>Xin chào, {$login.ten}</p>
      <a href="#"><i class="icon-circle" style="color:#3c763d"></i> Trực tuyến</a> </div>
    <br />
    <br />
    <br />
    <br />
    <form action="/tim_kiem/dien_dan" method="get" style="margin: 0px">
      <div class="input-group">
        <input type="text" name="tu_khoa" placeholder="Tìm kiếm diễn đàn" value="{$smarty.get.tu_khoa|default:''}" autofocus="autofocus"/>
      </div>
    </form>
  </div>
</div>
<div class="main">
  <p><a href="/tai_khoan/{$login.ma}-{convert_to_dot(noi_chuoi($login.ho, $login.ten, ' '))}"><i class="icon-user"></i>&nbsp;&nbsp;&nbsp;&nbsp;Tài khoản</a></p>
</div>
<div class="main">
  <p><a href="/thong_bao"><i class="icon-envelope"></i>&nbsp;&nbsp;&nbsp;&nbsp;Thông báo</a></p>
</div>
<div class="main" style="cursor:pointer">
<ul style="margin: 0px; padding: 0px"> 
    <li class="year" style="font-size: 15px; font-family: Arial, Helvetica, sans-serif"><p><i class="icon-bar-chart">&nbsp;&nbsp;&nbsp;&nbsp;Diễn đàn</i>
    <span style="float:right"><i class="icon-angle-left" style="color:#222" id="down"></i></span>
    </p>
        {if $ds_dien_dan != ''}
        <ul class="treeview">
        {foreach $ds_dien_dan as $value}
            <li><a href="/{$value.ma_linh_vuc}/{$value.domain}" style="margin-left:0px !important"><img src="/home/upload/dien_dan/{$value.hinh_dai_dien}" width="16px" height="16px" /> {$value.ten|truncate: 22}</a></li>
        {/foreach}
        </ul>
        {/if}
    </li>
</ul>
</div>
<div class="main">
  <p><a href="/tai_khoan/dang_xuat.html"><i class="icon-reply-all"></i>&nbsp;&nbsp;&nbsp;&nbsp;Đăng xuất</a></p>
</div>
{else if}
<div class="main">
<p>Hãy đăng nhập ngay bây giờ để có thể tham gia vào nhiều diễn đàn!</p>
<form action="/home/tai_khoan/dang_nhap_sm.php" method="post">
<label><i class="icon-user"></i> Email</label>
<input type="text" name="data[email]" id="email" />
<label><i class="icon-unlock-alt"></i> Mật khẩu</label>
<input name="data[mat_khau]" type="password" id="mat_khau"  />
<input type="checkbox" name="remember" id="remember"/><label for="remember">Ghi nhớ</label><br />
<input type="submit" onclick="return kiem_tra();" style="display:block; padding: 5px; width: 100px; color: white; border:none; margin:auto; border-radius: 2px" class="bg-color" value="Đăng nhập" />
</form>
</div>
<div class="main">
  <p>Nếu bạn chưa có tài khoản hãy đăng ký ngay bây giờ!</p>
  <button style="display:block; padding: 5px; width: 100px; color: white; border:none; margin:auto; border-radius: 2px" class="bg-color" onclick="window.location.href = '/tai_khoan/dang_ky.html'">Đăng ký</button>
</div>
{/if}
</nav>
<script type="text/javascript">
$('li').click(function(e){
	
    if( $(this).find('>ul').hasClass('active') ){
        $(this).children('ul').removeClass('active').children('li').slideUp();
        e.stopPropagation();
    }
    else{
        $(this).children('ul').addClass('active').children('li').slideDown();
		e.stopPropagation();
    }
	var down = $("#down").attr("class");
	if(down == 'icon-angle-left')
	{
		$("#down").addClass('icon-angle-down');
	}
	else
	{
		$("#down").removeClass('icon-angle-down');
		$("#down").addClass('icon-angle-left');
	}
	
});
</script>
<style>
.treeview{
	list-style:none; 
	cursor: pointer;
}
.treeview li{
	margin-top: 5px;
}
.treeview li{
    display: none;
}
li.year{
    display: block;
}
.pull-left {
float: left!important;
}
.user-panel:before, .user-panel:after {
display: table;
content: " ";
}
.user-panel > .image > img {
border: 1px solid #dfdfdf;
}
.user-panel > .image > img {
width: 45px;
height: 45px;
}
.img-circle {
border-radius: 50%;
}
.user-panel > .info > p {
margin-bottom: 6px;
}
.user-panel > .info > a {
text-decoration: none;
padding-right: 5px;
margin-top: 3px;
font-size: 11px;
font-weight: normal;
}
.user-panel:after {
clear: both;
}
</style>
{literal} 
<script>
function validateEmail(email) { 
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>	()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

function kiem_tra()
{
	var email = document.getElementById("email");
	var mat_khau = document.getElementById("mat_khau");
	
	if(email.value == '')
	{
		alert('Vui lòng nhập địa chỉ email');
		email.focus();
		return false;
	}
	if(validateEmail(email.value)==false)
	{
		alert('Địa chỉ email không hợp lệ');
		email.select();
		return false;
	}
	if(mat_khau.value == '')
	{
		alert('Vui lòng nhập mật khẩu');
		mat_khau.focus();
		return false;
	}
}
</script> 
{/literal}