<!DOCTYPE html>
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
	var msg  = "{$dien_dan.ten}";
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

<title>{$dien_dan.ten}</title>
<link href="/home/upload/dien_dan/{$dien_dan.hinh_dai_dien}" rel="shortcut icon" type="image/icon">
{include "../elements/css_js.tpl"}
{literal}
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
{/literal}
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
{include '../elements/login.tpl'} 
<!--Theme Switcher--> 
<!-- include switcher.tpl --> 
{include '../elements/switcher.tpl'} 
<!--Theme Switcher End-->
<div id="wrap" class="corners container"> 
  <!-- start content -->
  <div id="content-forum">
    <div class="padding_0_40"> 
      <!-- include header.tpl --> 
      {include '../elements/header.tpl'} 
      <!-- Header block -->
      <div id="top-line" style="height:2px"></div>
      <div id="breadcrumb" style="padding: 0px">
        <div class="index-header-head row-fluid" style="height:1px;"></div>
      </div>
      <div id="menu-header" style="width:100%; background-color:#ffffff; border-bottom:1px solid #f1f1f1;  border-top:1px solid #f1f1f1; height: 38px;">
        <nav class="mainnav" role="navigation" aria-label="Primary"><!-- Main navigation block -->
          <ul style="margin-left: 0px;">
            <li class="nav-icon"><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}" data-original-title="" title="" style="color:{$mang_mau_sac[0]}"><span class="has-sub"><i class="icon-home"></i></span> Trang chủ</a></li>
            <li class="line">|</li>
            <li class="nav-icon"><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/danh_sach" data-original-title="" title="" style="color:{$mang_mau_sac[1]}"><span class="has-sub"><i class="icon-user"></i></span> Thành viên</a> </li>
            <li class="line">|</li>
            <li class="nav-icon"><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/phan_hoi/them" data-original-title="" title="" style="color:{$mang_mau_sac[2]}"><span class="has-sub"><i class="icon-thumbs-up"></i></span> Phản hồi</a> </li>
            <li class="line">|</li>
             <li class="nav-icon"><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/cap_bac/danh_sach_cap_bac" data-original-title="" title="" style="color:{$mang_mau_sac[3]}"><span class="has-sub"><i class="icon-bar-chart"></i></span> Cấp bậc</a> </li>
          </ul>
          <div id="navBtn" class="" data-toggle="collapse" data-target=".nav-collapse">MENU<i class="icon  icon-list"></i></div>
        </nav>
      </div>
      <div id="breadcrumb" style="padding: 0px;">
        <div class="index-header-head row-fluid" style="height:1px; border-bottom:1px solid #f1f1f1;"></div>
      </div>
      <div class="crumbs">
        <ul class="sub-crumb hidden-phone">
          <li class="active"> &nbsp;<a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}"><i class="icon-flag"></i> Trang chủ</a></li>
          {if isset($chuyen_muc_ong_noi)}
          <li class="active"> &nbsp;<a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/danh_sach?loai={$chuyen_muc_ong_noi.ma}"><i class="icon-long-arrow-right"></i>{$chuyen_muc_ong_noi.ten}</a></li>
          {/if}
          {if isset($chuyen_muc_cha)}
          <li class="active"> &nbsp;<a  href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/danh_sach?loai={$chuyen_muc_cha.ma}"><i class="icon-long-arrow-right"></i>{$chuyen_muc_cha.ten}</a></li>
          {/if}
          {if isset($chuyen_muc)}
          <li class="active"> &nbsp;<a  href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/danh_sach?loai={$chuyen_muc.ma}"><i class="icon-long-arrow-right"></i>{$chuyen_muc.ten}</a></li>
          {/if}
          {if isset($bai_viet)}
          <li class="active"> &nbsp;<a  href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/chi_tiet?ma={$bai_viet.ma}"><i class="icon-long-arrow-right"></i>{$bai_viet.tieu_de|truncate:100}</a></li>
          {/if}
        </ul>
        <ul class="top-menu">
          {if $login!=''}
          {if $thanh_vien==''}
          <li class="dropdown"> <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/tham_gia" class="user-menu" id="user-menu" data-original-title="" title=""><i class="icon-hand-right"></i><span>Gửi yêu cầu tham gia diễn đàn</span></a></li>
          {else if $thanh_vien.loai_thanh_vien==3}
          <li class="dropdown"><i class="icon-spinner"></i>&nbsp;&nbsp;<span>Đã gửi yêu cầu tham gia</span></li>
          {else if $thanh_vien.loai_thanh_vien!=3}
          <li class="dropdown"> <a data-toggle="dropdown" class="user-menu" id="user-menu" data-original-title="" title=""><i class="icon-globe"></i><span>Xin chào, {$login.ten} &nbsp;<span class="badge badge-info" id="tbm2" title="{if $sl_thong_bao_moi==0}Không có thông báo mới nào{else if}Có {$sl_thong_bao_moi} thông báo mới{/if}">{$sl_thong_bao_moi}</span><i class="caret"></i></span></a>
            <ul class="dropdown-menu" id="dropdown-menu">
              <!--<li><a title="" href="./ucp.php?i=profile" data-original-title=""><i class="icon-user"></i>Thành Viên</a></li>-->
              <li><a title="" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thong_bao/danh_sach" ><i class="icon-inbox"></i>Tin Nhắn<span class="badge badge-info" id="tbm1" title="{if $sl_thong_bao_moi==0}Không có thông báo mới nào{else if}Có {$sl_thong_bao_moi} thông báo mới{/if}">{$sl_thong_bao_moi}</span></a></li>
              <li><a title="" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={$ma_nguoi_dung}" data-original-title=""><i class="icon-cog"></i>Thông Tin Cá Nhân</a></li>
              {if $thanh_vien.loai_thanh_vien==0 || $thanh_vien.loai_thanh_vien==1}
              <li><a title="" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/admin" data-original-title=""><i class="icon-user-md"></i>Quản Trị</a></li>
              {/if}
              <li><a title="" href="/tai_khoan/dang_xuat.html" data-original-title=""><i class="icon-off"></i>Đăng Xuất</a></li>
            </ul>
          </li>
          {/if}
          {/if}
        </ul>
      </div>
      {$contentForLayout}
      <div class="row-fluid">
        <div class="pull-left" style="height: 60px;">
          <form method="post" id="jumpbox" action="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/chuyen_trang/chuyen_trang" >
            <fieldset class="controls-row">
              <label class="control-label" for="f" accesskey="j">Đi đến:</label>
              <select class="selectpicker"  id="ma_chuyen_muc" name="ma_chuyen_muc">
                <option value="0">Chọn diễn đàn cần đến</option>
                
                    {*  Tuong tuong la se co 2 tham so nay: $ds_lcm,  $ma, kitu *}                                                            
                    {function in_loai_chuyen_muc}
                    	{foreach $ds_lcm as $lcm}
                        	{if $lcm.ma_loai_cha == $ma}
                            	
                <option value="{$lcm.ma}">{$kitu}{$lcm.ten}</option>
                
                                {in_loai_chuyen_muc ds_lcm=$ds_lcm ma=$lcm.ma kitu="$kitu$kitu"}
                        	{/if}
                        {/foreach}
                    
                    {/function}
                    
                    
                    {in_loai_chuyen_muc  ds_lcm=$ds_chuyen_muc ma=0 kitu='='}
                    
                
              </select>
              <button type="submit" class="btn" style="margin-bottom: 10px;">Đi</button>
            </fieldset>
          </form>
        </div>
      </div>
      <div style="clear:both"></div>
      <div class="side-segment">
        <h3><a data-original-title="" title="">Ai đang online</a></h3>
      </div>
      {if isset($so_luong_online) && isset($ds_online)}
      <p class="online">Tổng số <span class="text-color">{$so_luong_online}</span> thành viên đang online : <span class="text-color">{foreach $ds_online as $online} {$online.ten_nguoi_dung} {/foreach}</span></p>
      {else}
      <p class="online">Hiện không có ai đang online</p>
      {/if}
      {include "../elements/footer.tpl"} </div>
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
<input type="hidden" id="sl_thong_bao_moi" value="{$sl_thong_bao_moi}" />
<script type="text/javascript">
	var delay = 2000;
	var bing = window.setInterval(checkNotification, delay);
	
	function checkNotification()
	{
		$.getJSON('/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thong_bao/cap_nhat', {
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
</script>