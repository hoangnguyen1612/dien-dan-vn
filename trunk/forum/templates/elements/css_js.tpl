<link href="/forum/templates/css/switcher.css" rel="stylesheet" type="text/css">
<link href="/forum/templates/styles/BBOOTS/theme/print.css" rel="stylesheet" type="text/css" media="print" title="printonly">


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
<script type="text/javascript" src="/forum/templates/js/jquery.min.js"></script>
<script type="text/javascript" src="/forum/templates/scripts/jquery-ui.custom.js"></script>
<script type="text/javascript" src="/forum/templates/js/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="/forum/templates/js/bootstrap/bootstrap-select.js"></script>
<script type="text/javascript" src="/forum/templates/js/forum_fn.js"></script>
<script type="text/javascript" src="/forum/templates/js/footable/footable.js"></script>
<script type="text/javascript" src="/forum/templates/js/jquery.cookie.min.js"></script>
<script type="text/javascript" src="/forum/templates/js/twitterFetcher_v10_min.js"></script>

<script type="text/javascript" src="/forum/admin/templates/scripts/ckeditor/ckeditor.js"></script>


<script src="/home/templates/js/jquery.easing.min.js" type="text/javascript"></script>


{literal}
<script>
function find_username(e){popup(e,760,570,"_usersearch");return false}var jump_page="Enter the page number you wish to go to:";var on_page="";var per_page="";var base_url="";var style_cookie="phpBBstyle";var style_cookie_settings="; path=/; domain=sitesplat.com";var onload_functions=new Array;var onunload_functions=new Array;window.onload=function(){for(var i=0;i<onload_functions.length;i++){eval(onload_functions[i])}};window.onunload=function(){for(var i=0;i<onunload_functions.length;i++){eval(onunload_functions[i])}}
</script>
{/literal}


{if isset($smarty.session.message) && !empty($smarty.session.message.content)}
<script>
window.onload = function()
{
	alert('{$smarty.session.message.content}');
}
</script>
{/if}
<div id="lean_overlay" style="display: none; opacity: 0.5;"></div>