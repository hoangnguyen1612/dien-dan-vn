<!--
<link rel="alternate" type="application/atom+xml" title="Feed - SiteSplat.com" href="http://www.sitesplat.com/demo/phpBB3/feed.php"><link rel="alternate" type="application/atom+xml" title="Feed - New Topics" href="http://www.sitesplat.com/demo/phpBB3/feed.php?mode=topics"><!-- phpBB Premium style name: BBOOTS (2.3.2) @SiteSplat.com --><!-- CSS files start here
<link href="http://www.sitesplat.com/demo/phpBB3/style.php?id=3&lang=en" rel="stylesheet">
<link href="http://www.sitesplat.com/demo/phpBB3/styles/BBOOTS/theme/style7.css" rel="stylesheet" id="bg">
<!-- Google free font here
<link href="./SiteSplat.com Index page_files/css" rel="stylesheet" type="text/css">
<link href="./SiteSplat.com Index page_files/css(1)" rel="stylesheet" type="text/css">
<!-- CSS files -->
<!-- CSS files start here-->
<link href="/forum/templates/css/switcher.css" rel="stylesheet" type="text/css">
<link href="/forum/templates/styles/BBOOTS/theme/print.css" rel="stylesheet" type="text/css" media="print" title="printonly">
<!-- CSS files --><!-- google free font used for the foum content -->
<!--<link href="http://fonts.googleapis.com/css?family=Ubuntu:400,700" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet" type="text/css">
<!-- google free font used for the foum content --><!-- bootstrap.css essential  -->

<link href="/forum/templates/css/print.css" rel="stylesheet" type="text/css">
<link href="/forum/templates/css/stylesheet.css" rel="stylesheet" type="text/css">
<link href="/forum/templates/css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css">
<!-- responsive css stylesheet  -->
<link href="/forum/templates/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" type="text/css">
<!-- bootstrap.css  --><!-- Footable CSS files -->
<link href="/forum/templates/css/footable/footable.core.css" rel="stylesheet" type="text/css">
<!-- FontAwesome CSS files --><!-- Custom Font CSS files -->
<link href="/forum/templates/css/style.css" rel="stylesheet" type="text/css">
<link href="/forum/templates/css/bootstrap/bootstrap-select.css" rel="stylesheet" type="text/css">
<!-- Footable CSS files --><!-- FontAwesome CSS files -->
<link href="/forum/templates/styles/BBOOTS/theme/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="/forum/templates/css/general.css" rel="stylesheet" type="text/css">
<link href="/forum/templates/css/colors/{$ds_cau_hinh.CSS}.css" rel="stylesheet" id="color">
<!-- Custom Font CSS files -->



<script src="/forum/templates/js/head.min.js"></script>
<!--<script type="text/javascript" src="/forum/js/jquery.min.js"></script>-->
<script src="/home/templates/scripts/jquery-1.10.2.min.js" type="text/javascript"></script>

<script type="text/javascript" src="/forum/templates/js/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="/forum/templates/js/bootstrap/bootstrap-select.js"></script>
<script type="text/javascript" src="/forum/templates/js/forum_fn.js"></script>
<script type="text/javascript" src="/forum/templates/js/footable/footable.js"></script>
<script type="text/javascript" src="/forum/templates/js/jquery.cookie.min.js"></script>
<script type="text/javascript" src="/forum/templates/js/twitterFetcher_v10_min.js"></script>
<script type="text/javascript" src="/forum/admin/templates/scripts/ckeditor/ckeditor.js"></script>


<script src="/home/templates/scripts/jquery.easing.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/home/templates/scripts/jquery.leanModal.min.js"></script>
<!-- Scripts start here after the jquery.js -->
<script>
// this loads jquery asyncrounously & in parallel
/*head.load("../templates/js/jquery.min.js", "../templates/js/bootstrap/bootstrap.min.js", "../templates/js/bootstrap/bootstrap-select.min.js", "../templates/js/forum_fn.js", "../templates/js/footable/footable.min.js", "../templates/js/jquery.cookie.min.js", "../templates/js/twitterFetcher_v10_min.js", function() {
    // Call a function when done
    // some callback stuff
   $('.footable').footable();
}); */
</script>

{literal}
<script>
function find_username(e){popup(e,760,570,"_usersearch");return false}var jump_page="Enter the page number you wish to go to:";var on_page="";var per_page="";var base_url="";var style_cookie="phpBBstyle";var style_cookie_settings="; path=/; domain=sitesplat.com";var onload_functions=new Array;var onunload_functions=new Array;window.onload=function(){for(var i=0;i<onload_functions.length;i++){eval(onload_functions[i])}};window.onunload=function(){for(var i=0;i<onunload_functions.length;i++){eval(onunload_functions[i])}}
</script>

<script type="text/javascript">
	$(function() {
		$('a[rel*=leanModal]').leanModal({ top : 50, closeButton: ".modal_close" });	
	});
</script> 
{/literal}


{if isset($smarty.session.message) && $smarty.session.message.type == 'error'}
<script>
window.onload = function()
{
	alert('{$smarty.session.message.content}');
}
</script>
{/if}
<div id="lean_overlay" style="display: none; opacity: 0.5;"></div>