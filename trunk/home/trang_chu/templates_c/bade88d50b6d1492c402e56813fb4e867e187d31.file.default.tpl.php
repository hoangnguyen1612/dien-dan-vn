<?php /* Smarty version Smarty-3.1.14, created on 2014-06-16 19:43:40
         compiled from "..\templates\layouts\default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29539539ee62324bf62-69728504%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bade88d50b6d1492c402e56813fb4e867e187d31' => 
    array (
      0 => '..\\templates\\layouts\\default.tpl',
      1 => 1402815380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29539539ee62324bf62-69728504',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_539ee6232cf196_24320115',
  'variables' => 
  array (
    'contentForLayout' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539ee6232cf196_24320115')) {function content_539ee6232cf196_24320115($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Diễn Đàn Việt Nam</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <?php echo $_smarty_tpl->getSubTemplate ('../elements/css_js.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php echo $_smarty_tpl->getSubTemplate ('../elements/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php echo $_smarty_tpl->getSubTemplate ('../elements/left.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<?php echo $_smarty_tpl->tpl_vars['contentForLayout']->value;?>

           
        </div><!-- ./wrapper -->
    </body>
</html>

<?php }} ?>