<?php /* Smarty version Smarty-3.1.14, created on 2014-07-23 01:08:06
         compiled from "D:\wamp\www\dien-dan-vn\forum\templates\elements\css_js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2345953cea886dbebf8-39935568%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2dfd35223fa6ee317c5b5d1da8efd220230fc539' => 
    array (
      0 => 'D:\\wamp\\www\\dien-dan-vn\\forum\\templates\\elements\\css_js.tpl',
      1 => 1405974227,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2345953cea886dbebf8-39935568',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ds_cau_hinh' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53cea886e1aa16_07713423',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53cea886e1aa16_07713423')) {function content_53cea886e1aa16_07713423($_smarty_tpl) {?><link href="/forum/templates/css/switcher.css" rel="stylesheet" type="text/css">
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

<link href="/forum/templates/css/colors/<?php echo $_smarty_tpl->tpl_vars['ds_cau_hinh']->value['CSS'];?>
.css" rel="stylesheet" id="color">
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



<script>
function find_username(e){popup(e,760,570,"_usersearch");return false}var jump_page="Enter the page number you wish to go to:";var on_page="";var per_page="";var base_url="";var style_cookie="phpBBstyle";var style_cookie_settings="; path=/; domain=sitesplat.com";var onload_functions=new Array;var onunload_functions=new Array;window.onload=function(){for(var i=0;i<onload_functions.length;i++){eval(onload_functions[i])}};window.onunload=function(){for(var i=0;i<onunload_functions.length;i++){eval(onunload_functions[i])}}
</script>



<?php if (isset($_SESSION['message'])&&!empty($_SESSION['message']['content'])){?>
<script>
window.onload = function()
{
	alert('<?php echo $_SESSION['message']['content'];?>
');
}
</script>
<?php }?>
<div id="lean_overlay" style="display: none; opacity: 0.5;"></div><?php }} ?>