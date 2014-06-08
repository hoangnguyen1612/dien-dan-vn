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

<title>Hutech</title>

{include "../elements/css_js.tpl"}
{literal}
<script>
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
<script type="text/javascript" src="./SiteSplat.com Index page_files/391407906655965184"></script>
</head>
<body id="phpbb" class="section-index ltr">
<!--Theme Switcher--> 
<!-- include switcher.tpl --> 
<!--{include '../elements/switcher.tpl'}--> 
<!--Theme Switcher End-->
<div id="wrap" class="corners container"> 
  <!-- start content -->
  <div id="content-forum">
    <div class="padding_0_40"> 
      <!-- include header.tpl --> 
      {include '../elements/header.tpl'} 
      <!-- Header block -->
      <div id="top-line"></div>
      <div id="breadcrumb">
        <div class="index-header-head row-fluid">
          <div class="fxicon"> <i class="icon-home"></i> </div>
          <ul class="index-pos">
            <li class="index-title" style="margin-bottom:5px;">
              <h1 style="font-size:28px;">{$title|default:''}</h1>
            </li>
            <li class="index-sub">Chào mừng bạn đến diễn đàn {$dien_dan.ten}</li>
          </ul>
          
          <!-- SEARCH block -->
          <div class="search-pos pull-right">
          <div class="search-box">
           
          <form action="./search.php" method="get">
           <fieldset> 
            <input name="keywords" id="keywords" type="text" maxlength="128" title="Search for keywords" placeholder="Search" value="Tìm kiếm bài viết…" onclick="if(this.value=='Search…')this.value='';" onblur="if(this.value=='')this.value='Search…';">
           </fieldset>
          </form>
         </div>	
        </div>
        </div>
      </div>
      <div class="crumbs">
        <ul class="sub-crumb hidden-phone">
          <li><i class="icon-home"></i> <a href="./index.php" accesskey="h" data-original-title="" title="">Hutech</a> <span class="divider"></span></li>
            <li class="active"> &nbsp;<a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}"><i class="icon-long-arrow-right"></i>Trang chủ</a></li>
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
          <li class="dropdown"> <a data-toggle="dropdown" class="user-menu" id="user-menu" data-original-title="" title=""><i class="icon-globe"></i><span>Xin chào, {$login.ten}{if $sl_thong_bao_moi!=0}&nbsp;&nbsp;<span class="badge badge-info">{$sl_thong_bao_moi}</span>{/if}<i class="caret"></i></span></a>
            <ul class="dropdown-menu" id="dropdown-menu">
              <!--<li><a title="" href="./ucp.php?i=profile" data-original-title=""><i class="icon-user"></i>Thành Viên</a></li>-->
              <li><a title="" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thong_bao/danh_sach" ><i class="icon-inbox"></i>Tin Nhắn<span class="badge badge-info">{$sl_thong_bao_moi}</span></a></li>
              <li><a title="" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={$ma_nguoi_dung}" data-original-title=""><i class="icon-cog"></i>Thông Tin Thành Viên</a></li>
              {if $thanh_vien.loai_thanh_vien==0 || $thanh_vien.loai_thanh_vien==1}<li><a title="" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/admin" data-original-title=""><i class="icon-user-md"></i>Quản Trị</a></li>{/if}
              <li><a title="" href="./ucp.php?mode=logout&amp;sid=b3e0d35dad8925f9d80fb5a1387e5b2f" data-original-title=""><i class="icon-off"></i>Đăng Xuất</a></li>
            </ul>
          </li>
          	{/if}
         {/if}   
        </ul>
      </div>
      <!-- Lower Breadcrumb block -->
      <ul class="sub-breadcrumb">
        <li class="pull-left"> <span class="time"><i class="icon-clock"></i> {date('d-m-Y', strtotime($dien_dan.ngay_tao))}</span> </li>
        <li class="pull-right hidden-phone"> </li>
      </ul>
      <!-- Lower Breadcrumb block --> 
      {$contentForLayout}
      <!--{literal}{include '../elements/footer.tpl'}{/literal}--> 
      <!-- page-body id in header --> 
    </div>
    <!-- padding_0_40 in header --> 
  </div>
  <!-- content-forum in header --> 
</div>
<!-- wrap - corners container in header --> 

<a id="totop" class="topstyle" href="" onclick="return false;" style="display:none;" data-original-title="" title=""><i class="icon-chevron-up"></i></a>
<div class="container">
  <div class="copyright"> <small class="pull-left"> Time : 0.035s | 8 Queries | GZIP : On<!-- <a href="http://www.sitesplat.com/phpBB3/">BBOOTS</a> --> 
    </small> <small class="pull-right"> All times are UTC </small> </div>
</div>
<div class="space10"></div>
<div> </div>

<!-- injected via a module or an include --> 
{literal} 
<script>
    // some function that depends on bootstrap and jquery
	head.ready(function () {
	   $.fn.tooltip&&$('[rel="tooltip"]').tooltip();$.fn.popover&&$('[rel="popover"]').popover();$(".selectpicker").selectpicker();$(".selectpicker").tooltip("disable");$(".btn-group [title]").tooltip({container:"body"});twitterFetcher.fetch("391407906655965184","example1",3,true,false);var totop=$("#totop");totop.click(function(){$("html, body").stop(true,true).animate({scrollTop:0},500);return false});$(window).scroll(function(){if($(this).scrollTop()>600){totop.fadeIn()}else{totop.fadeOut()}});$("button[data-loading-text]").click(function(){var e=$(this);e.button("loading");setTimeout(function(){e.button("reset")},3e3)});$("#nav-listen").on("show hide",function(e){if($(e.target).attr("id")!="nav-listen"){return}$("#nav-shown").toggleClass("icon-list icon-align-justify",200)});$("#target-col").on("show hide",function(e){if($(e.target).attr("id")!="target-col"){return}$("#target-shown").toggleClass("icon-arrow-up icon-arrow-down",200)});jQuery(function(e){e("a").tooltip({html:true,container:"body"})});$(".btn-group [title]").tooltip({container:"body"})
    });
</script> 
{/literal} 
<!-- Google Analytics: change UA-XXXXXXXX-X to be your site's ID. -->
</body>
</html>

