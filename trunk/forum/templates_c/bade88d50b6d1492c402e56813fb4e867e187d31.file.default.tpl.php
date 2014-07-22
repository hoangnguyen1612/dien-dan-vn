<?php /* Smarty version Smarty-3.1.14, created on 2014-07-23 01:09:31
         compiled from "..\templates\layouts\default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2837053cea886ab48b7-31955395%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bade88d50b6d1492c402e56813fb4e867e187d31' => 
    array (
      0 => '..\\templates\\layouts\\default.tpl',
      1 => 1406052566,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2837053cea886ab48b7-31955395',
  'function' => 
  array (
    'in_loai_chuyen_muc' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53cea886cfad75_92662184',
  'variables' => 
  array (
    'dien_dan' => 0,
    'mang_mau_sac' => 0,
    'chuyen_muc_ong_noi' => 0,
    'chuyen_muc_cha' => 0,
    'chuyen_muc' => 0,
    'bai_viet' => 0,
    'login' => 0,
    'thanh_vien' => 0,
    'sl_thong_bao_moi' => 0,
    'ma_nguoi_dung' => 0,
    'contentForLayout' => 0,
    'ds_lcm' => 0,
    'lcm' => 0,
    'ma' => 0,
    'kitu' => 0,
    'ds_chuyen_muc' => 0,
    'so_luong_online' => 0,
    'ds_online' => 0,
    'online' => 0,
  ),
  'has_nocache_code' => 0,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53cea886cfad75_92662184')) {function content_53cea886cfad75_92662184($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\wamp\\www\\dien-dan-vn\\libraries\\smarty\\plugins\\modifier.truncate.php';
?><!DOCTYPE html>
<!-- saved from url=(0046)http://www.sitesplat.com/demo/phpBB3/index.php -->
<html dir="ltr" lang="en-gb" class=" js no-mobile desktop no-ie chrome chrome34 demo-section phpbb3-section gradient rgba opacity textshadow multiplebgs boxshadow borderimage borderradius cssreflections csstransforms csstransitions no-touch no-retina fontface domloaded w-1366 gt-240 gt-320 gt-480 gt-640 gt-768 gt-800 gt-1024 gt-1280 lt-1440 lt-1680 lt-1920 no-portrait landscape" id="index-page">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta name="author" content="SiteSplat | www.sitesplat.com">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Set the viewport width to device width for mobile -->
<meta name="Description" content="">
<!-- Set Your forum description here inside the "" tag -->
<meta name="Keywords" content="">
<!-- Set Your forum keywords here inside the "" tag and make sure they are separated by a comma -->
<meta name="application-name" content="BBOOTS">
<!-- WIN8 Tiles setup -->
<meta name="msapplication-TileColor" content="#ffffff">
<!-- WIN8 Tiles setup --><!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

<script type="text/javascript">
var rev = "fwd";
function titlebar(val)
{
	var msg  = "<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ten'];?>
";
	var res = " ";
	var speed = 200;
	var pos = val;

	var le = msg.length;
	if(rev == "fwd"){
		if(pos < le){
		pos = pos+1;
		scroll = msg.substr(0,pos);
		document.title = scroll;
		timer = window.setTimeout("titlebar("+pos+")",speed);
		}
		else{
		rev = "bwd";
		timer = window.setTimeout("titlebar("+pos+")",speed);
		}
	}
}

titlebar(0);
</script>

<title><?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ten'];?>
</title>
<link href="/home/upload/dien_dan/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['hinh_dai_dien'];?>
" rel="shortcut icon" type="image/icon">
<?php echo $_smarty_tpl->getSubTemplate ("../elements/css_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script>
$(document).ready(
    function(){
        $("#mau").click(function () {
            $("#switcher-icon").show();
        });

    });

head.ready(function() {

    if($.cookie("css")) {
	$("#bg").attr("href",$.cookie("css"));
    }

    $("#nav li a").click(function() { 
		$("#bg").attr("href",$(this).attr('data-color'));
		$.cookie("css",$(this).attr('data-color'), {expires: 365, path: '/'});
		return false;
	});

	$('#slick-show').click(function() {
		$('#slickbox').show('slow');
	return false;
	}); 
	
	$('#slick-hide').click(function() {
		$('#slickbox').hide('fast');
		return false;
	});	
  
	$("div#switcher-icon").click(function(){
		$(this).toggleClass("div#switcher-icon .active a").next().slideToggle(350);
	});  
});
</script>


</head>
<body id="phpbb" class="section-index ltr">
<button id="home-btn" title="Thanh điều khiển" class="toggle-menu menu-left push-body" style="
padding: 5px;
border-bottom-right-radius: 20px;
border-top-right-radius: 20px;
background-color: white;
border-collapse: collapse;
border: 1px solid #ccc;"> <span style="font-family:'Kaushan Script', cursive !important" class="text-color"><img id="arrow" src="/forum/templates/images/ani-arrow.gif" 
style="vertical-align:inherit;"> Diendan.vn</span> </button>
<style>
#home-btn{
	-webkit-transition-duration: 0.8s;
    -moz-transition-duration: 0.8s;
    -o-transition-duration: 0.8s;
    transition-duration: 0.8s;
     
    -webkit-transition-property: -webkit-transform;
    -moz-transition-property: -moz-transform;
    -o-transition-property: -o-transform;
    transition-property: transform;
}
#home-btn:hover{
	border: 1px solid #ccc;border-bottom-right-radius: 20px;
border-top-right-radius: 20px;
-webkit-transform:rotate(360deg);
    -moz-transform:rotate(360deg);
    -o-transform:rotate(360deg);
}
#home-btn:focus{
	outline: 0 !important;
}
</style>
<?php echo $_smarty_tpl->getSubTemplate ('../elements/login.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
<!--Theme Switcher--> 
<!-- include switcher.tpl --> 
<?php echo $_smarty_tpl->getSubTemplate ('../elements/switcher.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
<!--Theme Switcher End-->
<div id="wrap" class="corners container"> 
  <!-- start content -->
  <div id="content-forum">
    <div class="padding_0_40"> 
      <!-- include header.tpl --> 
      <?php echo $_smarty_tpl->getSubTemplate ('../elements/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
      <!-- Header block -->
      <div id="top-line" style="height:2px"></div>
      <div id="breadcrumb" style="padding: 0px">
        <div class="index-header-head row-fluid" style="height:1px;"></div>
      </div>
      <div id="menu-header" style="width:100%; background-color:#ffffff; border-bottom:1px solid #f1f1f1;  border-top:1px solid #f1f1f1; height: 38px;">
        <nav class="mainnav" role="navigation" aria-label="Primary"><!-- Main navigation block -->
          <ul style="margin-left: 0px;">
            <li class="nav-icon"><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
" data-original-title="" title="" style="color:<?php echo $_smarty_tpl->tpl_vars['mang_mau_sac']->value[0];?>
"><span class="has-sub"><i class="icon-home"></i></span> Trang chủ</a></li>
            <li class="line">|</li>
            <li class="nav-icon"><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thanh_vien/danh_sach" data-original-title="" title="" style="color:<?php echo $_smarty_tpl->tpl_vars['mang_mau_sac']->value[1];?>
"><span class="has-sub"><i class="icon-user"></i></span> Thành viên</a> </li>
            <li class="line">|</li>
            <li class="nav-icon"><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/phan_hoi/them" data-original-title="" title="" style="color:<?php echo $_smarty_tpl->tpl_vars['mang_mau_sac']->value[2];?>
"><span class="has-sub"><i class="icon-thumbs-up"></i></span> Phản hồi</a> </li>
            <li class="line">|</li>
             <li class="nav-icon"><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/cap_bac/danh_sach_cap_bac" data-original-title="" title="" style="color:<?php echo $_smarty_tpl->tpl_vars['mang_mau_sac']->value[3];?>
"><span class="has-sub"><i class="icon-bar-chart"></i></span> Cấp bậc</a> </li>
          </ul>
          <div id="navBtn" class="" data-toggle="collapse" data-target=".nav-collapse">MENU<i class="icon  icon-list"></i></div>
        </nav>
      </div>
      <div id="breadcrumb" style="padding: 0px;">
        <div class="index-header-head row-fluid" style="height:1px; border-bottom:1px solid #f1f1f1;"></div>
      </div>
      <div class="crumbs">
        <ul class="sub-crumb hidden-phone">
          <li class="active text-color"> &nbsp;<a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
"><i class="icon-flag"></i> Trang chủ</a></li>
          <?php if (isset($_smarty_tpl->tpl_vars['chuyen_muc_ong_noi']->value)){?>
          <li class="active text-color"> &nbsp;<a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/bai_viet/danh_sach?loai=<?php echo $_smarty_tpl->tpl_vars['chuyen_muc_ong_noi']->value['ma'];?>
"><i class="icon-long-arrow-right"></i><?php echo $_smarty_tpl->tpl_vars['chuyen_muc_ong_noi']->value['ten'];?>
</a></li>
          <?php }?>
          <?php if (isset($_smarty_tpl->tpl_vars['chuyen_muc_cha']->value)){?>
          <li class="active text-color"> &nbsp;<a  href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/bai_viet/danh_sach?loai=<?php echo $_smarty_tpl->tpl_vars['chuyen_muc_cha']->value['ma'];?>
"><i class="icon-long-arrow-right"></i><?php echo $_smarty_tpl->tpl_vars['chuyen_muc_cha']->value['ten'];?>
</a></li>
          <?php }?>
          <?php if (isset($_smarty_tpl->tpl_vars['chuyen_muc']->value)){?>
          <li class="active text-color"> &nbsp;<a  href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/bai_viet/danh_sach?loai=<?php echo $_smarty_tpl->tpl_vars['chuyen_muc']->value['ma'];?>
"><i class="icon-long-arrow-right"></i><?php echo $_smarty_tpl->tpl_vars['chuyen_muc']->value['ten'];?>
</a></li>
          <?php }?>
          <?php if (isset($_smarty_tpl->tpl_vars['bai_viet']->value)){?>
          <li class="active text-color"> &nbsp;<a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/bai_viet/chi_tiet?ma=<?php echo $_smarty_tpl->tpl_vars['bai_viet']->value['ma'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['bai_viet']->value['tieu_de'];?>
"><i class="icon-long-arrow-right"></i><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['bai_viet']->value['tieu_de'],50);?>
</a></li>
          <?php }?>
        </ul>
        <ul class="top-menu">
          <?php if ($_smarty_tpl->tpl_vars['login']->value!=''){?>
          <?php if ($_smarty_tpl->tpl_vars['thanh_vien']->value==''){?>
          <li class="dropdown"> <a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thanh_vien/tham_gia" class="user-menu" id="user-menu" data-original-title="" title=""><i class="icon-hand-right"></i><span>Gửi yêu cầu tham gia diễn đàn</span></a></li>
          <?php }elseif($_smarty_tpl->tpl_vars['thanh_vien']->value['loai_thanh_vien']==3){?>
          <li class="dropdown"><i class="icon-spinner"></i>&nbsp;&nbsp;<span>Đã gửi yêu cầu tham gia</span></li>
          <?php }elseif($_smarty_tpl->tpl_vars['thanh_vien']->value['loai_thanh_vien']!=3){?>
          <li class="dropdown"> <a data-toggle="dropdown" class="user-menu" id="user-menu" data-original-title="" title=""><i class="icon-globe"></i><span>Xin chào, <?php echo $_smarty_tpl->tpl_vars['login']->value['ten'];?>
 &nbsp;<span class="badge badge-info" id="tbm2" title="<?php if ($_smarty_tpl->tpl_vars['sl_thong_bao_moi']->value==0){?>Không có thông báo mới nào<?php }else{ ?>Có <?php echo $_smarty_tpl->tpl_vars['sl_thong_bao_moi']->value;?>
 thông báo mới<?php }?>"><?php echo $_smarty_tpl->tpl_vars['sl_thong_bao_moi']->value;?>
</span><i class="caret"></i></span></a>
            <ul class="dropdown-menu" id="dropdown-menu">
              <!--<li><a title="" href="./ucp.php?i=profile" data-original-title=""><i class="icon-user"></i>Thành Viên</a></li>-->
              <li><a title="" href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thong_bao/danh_sach" ><i class="icon-inbox"></i>Thông báo mới<span class="badge badge-info" id="tbm1" style="left: 15px;" title="<?php if ($_smarty_tpl->tpl_vars['sl_thong_bao_moi']->value==0){?>Không có thông báo mới nào<?php }else{ ?>Có <?php echo $_smarty_tpl->tpl_vars['sl_thong_bao_moi']->value;?>
 thông báo mới<?php }?>"><?php echo $_smarty_tpl->tpl_vars['sl_thong_bao_moi']->value;?>
</span></a></li>
              <li><a title="" href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thanh_vien/thong_tin?ma_thanh_vien=<?php echo url_encode($_smarty_tpl->tpl_vars['ma_nguoi_dung']->value);?>
" data-original-title=""><i class="icon-cog"></i>Thông Tin Cá Nhân</a></li>
              <?php if ($_smarty_tpl->tpl_vars['thanh_vien']->value['loai_thanh_vien']==0||$_smarty_tpl->tpl_vars['thanh_vien']->value['loai_thanh_vien']==1){?>
              <li><a title="" href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/admin" data-original-title=""><i class="icon-user-md"></i>Quản Trị</a></li>
              <?php }?>
              <li><a title="" href="/tai_khoan/dang_xuat.html" data-original-title=""><i class="icon-off"></i>Đăng Xuất</a></li>
            </ul>
          </li>
          <?php }?>
          <?php }?>
        </ul>
      </div>
      <?php echo $_smarty_tpl->tpl_vars['contentForLayout']->value;?>

      <div class="row-fluid">
        <div class="pull-left" style="height: 60px;">
          <form method="post" id="jumpbox" action="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/chuyen_trang/chuyen_trang" >
            <fieldset class="controls-row">
              <label class="control-label" for="f" accesskey="j">Đi đến:</label>
              <select class="selectpicker"  id="ma_chuyen_muc" name="ma_chuyen_muc">
                <option value="0">Chọn diễn đàn cần đến</option>
                
                                                                                
                    <?php if (!function_exists('smarty_template_function_in_loai_chuyen_muc')) {
    function smarty_template_function_in_loai_chuyen_muc($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['in_loai_chuyen_muc']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
                    	<?php  $_smarty_tpl->tpl_vars['lcm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lcm']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ds_lcm']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lcm']->key => $_smarty_tpl->tpl_vars['lcm']->value){
$_smarty_tpl->tpl_vars['lcm']->_loop = true;
?>
                        	<?php if ($_smarty_tpl->tpl_vars['lcm']->value['ma_loai_cha']==$_smarty_tpl->tpl_vars['ma']->value){?>
                            	
                <option value="<?php echo $_smarty_tpl->tpl_vars['lcm']->value['ma'];?>
"><?php echo $_smarty_tpl->tpl_vars['kitu']->value;?>
<?php echo $_smarty_tpl->tpl_vars['lcm']->value['ten'];?>
</option>
                
                                <?php smarty_template_function_in_loai_chuyen_muc($_smarty_tpl,array('ds_lcm'=>$_smarty_tpl->tpl_vars['ds_lcm']->value,'ma'=>$_smarty_tpl->tpl_vars['lcm']->value['ma'],'kitu'=>((string)$_smarty_tpl->tpl_vars['kitu']->value).((string)$_smarty_tpl->tpl_vars['kitu']->value)));?>

                        	<?php }?>
                        <?php } ?>
                    
                    <?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

                    
                    
                    <?php smarty_template_function_in_loai_chuyen_muc($_smarty_tpl,array('ds_lcm'=>$_smarty_tpl->tpl_vars['ds_chuyen_muc']->value,'ma'=>0,'kitu'=>'='));?>

                    
                
              </select>
              <button type="submit" class="btn">Đi</button>
            </fieldset>
          </form>
        </div>
      </div>
      <div style="clear:both"></div>
      <div class="side-segment">
        <h3><a data-original-title="" title="">Ai đang online</a></h3>
      </div>
      <?php if (isset($_smarty_tpl->tpl_vars['so_luong_online']->value)&&isset($_smarty_tpl->tpl_vars['ds_online']->value)){?>
      <p class="online">Tổng số <span class="text-color"><?php echo $_smarty_tpl->tpl_vars['so_luong_online']->value;?>
</span> thành viên đang online : <span class="text-color"><?php  $_smarty_tpl->tpl_vars['online'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['online']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ds_online']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['online']->key => $_smarty_tpl->tpl_vars['online']->value){
$_smarty_tpl->tpl_vars['online']->_loop = true;
?> <?php echo $_smarty_tpl->tpl_vars['online']->value['ten_nguoi_dung'];?>
 <?php } ?></span></p>
      <?php }else{ ?>
      <p class="online">Hiện không có ai đang online</p>
      <?php }?>
      <?php echo $_smarty_tpl->getSubTemplate ("../elements/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 </div>
    <!-- padding_0_40 in header --> 
    
  </div>
  <!-- content-forum in header --> 
  
</div>
<!-- wrap - corners container in header --> 

<a id="totop" class="topstyle" href="" onclick="return false;" style="display:none;" data-original-title="" title=""><i class="icon-chevron-up"></i></a>
<div class="container">
  <div class="copyright"> <small class="pull-left"><!-- <a href="http://www.sitesplat.com/phpBB3/">BBOOTS</a> --> 
    </small> <small class="pull-right"></small> </div>
</div>
<div class="space10"></div>
<div> </div>
<input type="hidden" id="sl_thong_bao_moi" value="<?php echo $_smarty_tpl->tpl_vars['sl_thong_bao_moi']->value;?>
" />
<script type="text/javascript">
	var delay = 2000;
	var bing = window.setInterval(checkNotification, delay);
	
	function checkNotification()
	{
		$.getJSON('/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thong_bao/cap_nhat', {
				sl_cu:document.getElementById("sl_thong_bao_moi").value
				}, function(data){
				if(data.co==1)
				{
					document.getElementById("tbm1").innerHTML = data.sl;
					document.getElementById("tbm2").innerHTML = data.sl;
					document.getElementById("sl_thong_bao_moi").value = data.sl;
				}
		});
	}
</script> 
<a class="back-to-top text-color" title="Về đầu trang"><i class="icon-circle-arrow-up"></i></a>
 
<script>
    // some function that depends on bootstrap and jquery
	head.ready(function () {
	   $.fn.tooltip&&$('[rel="tooltip"]').tooltip();$.fn.popover&&$('[rel="popover"]').popover();$(".selectpicker").selectpicker();$(".selectpicker").tooltip("disable");$(".btn-group [title]").tooltip({container:"body"});twitterFetcher.fetch("391407906655965184","example1",3,true,false);var totop=$("#totop");totop.click(function(){$("html, body").stop(true,true).animate({scrollTop:0},500);return false});$(window).scroll(function(){if($(this).scrollTop()>600){totop.fadeIn()}else{totop.fadeOut()}});$("button[data-loading-text]").click(function(){var e=$(this);e.button("loading");setTimeout(function(){e.button("reset")},3e3)});$("#nav-listen").on("show hide",function(e){if($(e.target).attr("id")!="nav-listen"){return}$("#nav-shown").toggleClass("icon-list icon-align-justify",200)});$("#target-col").on("show hide",function(e){if($(e.target).attr("id")!="target-col"){return}$("#target-shown").toggleClass("icon-arrow-up icon-arrow-down",200)});jQuery(function(e){e("a").tooltip({html:true,container:"body"})});$(".btn-group [title]").tooltip({container:"body"})
    });
</script> 
 
</body>
</html>
<script>
$(document).ready(function(e) {
    var offset = 300;
	var time = 500;
	jQuery(window).scroll(function(){
		if(jQuery(window).scrollTop()>offset){
			jQuery(".back-to-top").fadeIn(time);
		}else{
			jQuery(".back-to-top").fadeOut(time);
		}
	});
	
	jQuery(".back-to-top").click(function(event){
		event.preventDefault();
		jQuery('html, body').animate({
			scrollTop: 0}, time);
		return false;
	});
});
</script><?php }} ?>