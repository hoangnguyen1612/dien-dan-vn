<?php /* Smarty version Smarty-3.1.14, created on 2014-07-24 14:04:53
         compiled from "..\templates\layouts\default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3121953d0b015945516-90354926%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bade88d50b6d1492c402e56813fb4e867e187d31' => 
    array (
      0 => '..\\templates\\layouts\\default.tpl',
      1 => 1404905702,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3121953d0b015945516-90354926',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contentForLayout' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d0b015959ef6_32839311',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d0b015959ef6_32839311')) {function content_53d0b015959ef6_32839311($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Diễn Đàn Việt Nam</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<?php echo $_smarty_tpl->getSubTemplate ('../elements/css_js.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head>
<body class="skin-blue">

    <?php echo $_smarty_tpl->getSubTemplate ('../elements/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

 <div style="width:100%">   
    <div class="wrapper row-offcanvas row-offcanvas-left"> 
      <?php echo $_smarty_tpl->getSubTemplate ('../elements/left.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      <?php echo $_smarty_tpl->tpl_vars['contentForLayout']->value;?>

      <div class="clear"></div>
    </div>
  </div>  
<div id="footer">
 <div id="left"></div>
 <div id="right"></div>
</div>
</body>
</html>
<?php }} ?>