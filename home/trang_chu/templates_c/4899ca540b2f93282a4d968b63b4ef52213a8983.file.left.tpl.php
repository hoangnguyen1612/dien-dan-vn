<?php /* Smarty version Smarty-3.1.14, created on 2014-06-16 19:43:41
         compiled from "D:\wamp\www\dien-dan-vn\home\templates\elements\left.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28894539ee6233834a4-50997707%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4899ca540b2f93282a4d968b63b4ef52213a8983' => 
    array (
      0 => 'D:\\wamp\\www\\dien-dan-vn\\home\\templates\\elements\\left.tpl',
      1 => 1402828936,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28894539ee6233834a4-50997707',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_539ee623389940_59379095',
  'variables' => 
  array (
    'login' => 0,
    'ds_dien_dan' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539ee623389940_59379095')) {function content_539ee623389940_59379095($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\wamp\\www\\dien-dan-vn\\libraries\\smarty\\plugins\\modifier.truncate.php';
?><aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <?php if ($_smarty_tpl->tpl_vars['login']->value!=''){?>
                    	<div class="user-panel">
                        <div class="pull-left image">
                            <img src="/home/upload/nguoi_dung/<?php echo $_smarty_tpl->tpl_vars['login']->value['hinh_dai_dien'];?>
" class="img-circle" alt="<?php echo $_smarty_tpl->tpl_vars['login']->value['ten'];?>
" />
                        </div>
                        <div class="pull-left info">
                            <p>Xin chào, <?php echo $_smarty_tpl->tpl_vars['login']->value['ten'];?>
</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Trực tuyến</a>
                        </div>
                    </div>
                    <?php }?>
                    <!-- search form -->
                    <form action="/tim_kiem/dien_dan" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="tu_khoa" class="form-control" placeholder="Tìm kiếm diễn đàn" value="<?php echo (($tmp = @$_GET['tu_khoa'])===null||$tmp==='' ? '' : $tmp);?>
" autofocus="autofocus"/>
                            <span class="input-group-btn">
                                <button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="index.html">
                                <i class="fa fa-globe"></i> <span style="font-family: 'Kaushan Script', cursive;">diendan.vn</span>
                            </a>
                        </li>
                        <?php if ($_smarty_tpl->tpl_vars['login']->value!=''){?>
                        <li>
                            <a href="pages/widgets.html">
                                <i class="fa fa-user"></i> <span>Tài khoản</span>
                            </a>
                        </li>
                        <li>
                            <a href="/thong_bao">
                                <i class="fa fa-envelope"></i> <span>Thông báo</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Diễn đàn</span>
                                <!--<?php if (!empty($_smarty_tpl->tpl_vars['ds_dien_dan']->value)){?><i class="fa fa-angle-left pull-right"></i><?php }?>-->
                            </a>
                            <?php if ($_smarty_tpl->tpl_vars['ds_dien_dan']->value!=''){?>
                            <ul class="treeview-menu" style="display:block">
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
                        <?php }?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside><?php }} ?>