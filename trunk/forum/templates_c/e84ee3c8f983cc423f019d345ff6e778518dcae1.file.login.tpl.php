<?php /* Smarty version Smarty-3.1.14, created on 2014-07-25 17:17:48
         compiled from "D:\wamp\www\dien-dan-vn\forum\templates\elements\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2422453cea886e268c3-65014547%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e84ee3c8f983cc423f019d345ff6e778518dcae1' => 
    array (
      0 => 'D:\\wamp\\www\\dien-dan-vn\\forum\\templates\\elements\\login.tpl',
      1 => 1406283465,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2422453cea886e268c3-65014547',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53cea886ec48b2_57671440',
  'variables' => 
  array (
    'login' => 0,
    'ds_dien_dan' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53cea886ec48b2_57671440')) {function content_53cea886ec48b2_57671440($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\wamp\\www\\dien-dan-vn\\libraries\\smarty\\plugins\\modifier.truncate.php';
?><link rel="stylesheet" type="text/css" href="/forum/templates/css/jPushMenu.css" />
<script src="/forum/templates/js/jPushMenu.js"></script>
<script>
jQuery(document).ready(function($) {
    $('.toggle-menu').jPushMenu();
});
</script>

<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" style="box-shadow:0 0 14px #FFFFFF">
<a href="/"><h3 style="font-family:'Kaushan Script', cursive; color:white; font-size: 20px; text-transform:none" class="bg-color"><i class="icon-globe"></i> Diendan.vn</h3></a>
<?php if ($_smarty_tpl->tpl_vars['login']->value!=''){?>
<div class="main">
  <div class="user-panel">
    <div class="pull-left image"> <img src="/home/upload/nguoi_dung/<?php echo $_smarty_tpl->tpl_vars['login']->value['hinh_dai_dien'];?>
" class="img-circle" alt="<?php echo $_smarty_tpl->tpl_vars['login']->value['ten'];?>
" /> </div>
    <div class="pull-left info" style="margin-left: 12px">
      <p>Xin chào, <?php echo $_smarty_tpl->tpl_vars['login']->value['ten'];?>
</p>
      <a href="#"><i class="icon-circle" style="color:#3c763d"></i> Trực tuyến</a> </div>
    <br />
    <br />
    <br />
    <br />
    <form action="/tim_kiem/dien_dan" method="get" style="margin: 0px">
      <div class="input-group">
        <input type="text" name="tu_khoa" placeholder="Tìm kiếm diễn đàn" value="<?php echo (($tmp = @$_GET['tu_khoa'])===null||$tmp==='' ? '' : $tmp);?>
" autofocus="autofocus"/>
      </div>
    </form>
  </div>
</div>
<div class="main">
  <p><a href="/tai_khoan/<?php echo url_encode($_smarty_tpl->tpl_vars['login']->value['ma']);?>
-<?php echo convert_to_dot(noi_chuoi($_smarty_tpl->tpl_vars['login']->value['ho'],$_smarty_tpl->tpl_vars['login']->value['ten'],' '));?>
"><i class="icon-user"></i>&nbsp;&nbsp;&nbsp;&nbsp;Tài khoản</a></p>
</div>
<div class="main">
  <p><a href="/thong_bao"><i class="icon-envelope"></i>&nbsp;&nbsp;&nbsp;&nbsp;Thông báo</a></p>
</div>
<div class="main" style="cursor:pointer">
<ul style="margin: 0px; padding: 0px"> 
    <li class="year" style="font-size: 15px; font-family: Arial, Helvetica, sans-serif"><p><i class="icon-bar-chart">&nbsp;&nbsp;&nbsp;&nbsp;Diễn đàn</i>
    <span style="float:right"><i class="icon-angle-left" style="color:#222" id="down"></i></span>
    </p>
        <?php if ($_smarty_tpl->tpl_vars['ds_dien_dan']->value!=''){?>
        <ul class="treeview">
        <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ds_dien_dan']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
            <li><a href="/<?php echo $_smarty_tpl->tpl_vars['value']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['value']->value['domain'];?>
" style="margin-left:0px !important"><img src="/home/upload/dien_dan/<?php echo $_smarty_tpl->tpl_vars['value']->value['hinh_dai_dien'];?>
" width="16px" height="16px" /> <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value['ten'],22);?>
</a></li>
        <?php } ?>
        </ul>
        <?php }?>
    </li>
</ul>
</div>
<div class="main">
  <p><a href="/tai_khoan/dang_xuat.html"><i class="icon-reply-all"></i>&nbsp;&nbsp;&nbsp;&nbsp;Đăng xuất</a></p>
</div>
<?php }else{ ?>
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
<?php }?>
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
<?php }} ?>