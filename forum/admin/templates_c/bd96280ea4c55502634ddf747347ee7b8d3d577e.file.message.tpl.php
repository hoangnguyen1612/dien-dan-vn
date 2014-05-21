<?php /* Smarty version Smarty-3.1.14, created on 2014-05-10 10:24:17
         compiled from "..\templates\elements\message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7563536dfe518d0805-30619031%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd96280ea4c55502634ddf747347ee7b8d3d577e' => 
    array (
      0 => '..\\templates\\elements\\message.tpl',
      1 => 1398459301,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7563536dfe518d0805-30619031',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_536dfe51963825_79864795',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536dfe51963825_79864795')) {function content_536dfe51963825_79864795($_smarty_tpl) {?><div class="<?php echo $_SESSION['style_msg'];?>
"> <a href="#" class="close"><img src="../templates/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
  <div> <?php echo $_SESSION['msg'];?>
 </div>
</div>
<?php }} ?>