<?php /* Smarty version Smarty-3.1.14, created on 2014-06-16 19:43:40
         compiled from "..\templates\trang_chu\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3474539ee6230871b2-76835803%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5b92dd942a14706a2827e08842ff3efd9d8d3ed' => 
    array (
      0 => '..\\templates\\trang_chu\\index.tpl',
      1 => 1402823559,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3474539ee6230871b2-76835803',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_539ee6230c1448_17012600',
  'variables' => 
  array (
    'ds_moi' => 0,
    'dien_dan' => 0,
    'ds_linh_vuc_1' => 0,
    'ds_linh_vuc_2' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539ee6230c1448_17012600')) {function content_539ee6230c1448_17012600($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\wamp\\www\\dien-dan-vn\\libraries\\smarty\\plugins\\modifier.truncate.php';
?><!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

       <section class="content">

<div class="row">
<div class="col-xs-12 connectedSortable">

</div><!-- /.col -->
</div>

<?php if ($_smarty_tpl->tpl_vars['ds_moi']->value!=null){?>
	<div class="row">
<!-- Left col -->
<section class="col-lg-12 connectedSortable"> 
<!-- Box (with bar chart) -->
<div class="box" id="loading-example">
    <div class="box-header">
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Ẩn mục này đi"><i class="fa fa-minus"></i></button>
            <button class="btn btn-primary btn-sm" data-widget='remove' data-toggle="tooltip" title="Không hiển thị mục này"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
        <h3 class="box-title"><i class="fa fa-star fa-index"></i> Mới nhất trên DienDanVn</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="row">
        <div class="col-sm-12 custom-padding">
           <?php  $_smarty_tpl->tpl_vars['dien_dan'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dien_dan']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ds_moi']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dien_dan']->key => $_smarty_tpl->tpl_vars['dien_dan']->value){
$_smarty_tpl->tpl_vars['dien_dan']->_loop = true;
?>
           	<div class="forum">
           	<center><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
"><img src="/home/upload/dien_dan/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['hinh_dai_dien'];?>
" class="img"/></a></center>
           	 <p class="header"><span class="title"><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['dien_dan']->value['ten'],24);?>
</a></span><br />
             <span class="user"><i class="fa fa-user"></i> <?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['so_luong_thanh_vien'];?>
 thành viên</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="time"><i class="fa fa-clock-o"></i> <?php echo humanTiming(strtotime($_smarty_tpl->tpl_vars['dien_dan']->value['ngay_tao']));?>
</span>
             </p>
           </div>
           <?php } ?>
        </div>
        </div><!-- /.row - inside box -->
    </div><!-- /.box-body -->
</div><!-- /.box -->

</section><!-- /.Left col -->
</div>
<?php }?>

<div class="row">
<!-- Left col -->
<section class="col-lg-12 connectedSortable"> 
<!-- Box (with bar chart) -->
<div class="box" id="loading-example">
    <div class="box-header">
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Ẩn mục này đi"><i class="fa fa-minus"></i></button>
            <button class="btn btn-primary btn-sm" data-widget='remove' data-toggle="tooltip" title="Không hiển thị mục này"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
        <h3 class="box-title"><i class="fa fa-star fa-index"></i> <a href="/tim_kiem/dien_dan?tu_khoa=<?php echo $_smarty_tpl->tpl_vars['ds_linh_vuc_1']->value[0]['ten_linh_vuc'];?>
"><?php echo $_smarty_tpl->tpl_vars['ds_linh_vuc_1']->value[0]['ten_linh_vuc'];?>
</a></h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="row">
        <div class="col-sm-12 custom-padding">
           <?php  $_smarty_tpl->tpl_vars['dien_dan'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dien_dan']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ds_linh_vuc_1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dien_dan']->key => $_smarty_tpl->tpl_vars['dien_dan']->value){
$_smarty_tpl->tpl_vars['dien_dan']->_loop = true;
?>
           	<div class="forum">
           	<center><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
"><img src="/home/upload/dien_dan/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['hinh_dai_dien'];?>
" class="img"/></a></center>
           	 <p class="header"><span class="title"><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['dien_dan']->value['ten'],24);?>
</a></span><br />
             <span class="user"><i class="fa fa-user"></i> <?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['so_luong_thanh_vien'];?>
 thành viên</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="time"><i class="fa fa-clock-o"></i> <?php echo humanTiming(strtotime($_smarty_tpl->tpl_vars['dien_dan']->value['ngay_tao']));?>
</span>
             </p>
           </div>
           <?php } ?>
        </div>
        </div><!-- /.row - inside box -->
    </div><!-- /.box-body -->
</div><!-- /.box -->

</section><!-- /.Left col -->
</div>

<div class="row">
<!-- Left col -->
<section class="col-lg-12 connectedSortable"> 
<!-- Box (with bar chart) -->
<div class="box" id="loading-example">
    <div class="box-header">
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Ẩn mục này đi"><i class="fa fa-minus"></i></button>
            <button class="btn btn-primary btn-sm" data-widget='remove' data-toggle="tooltip" title="Không hiển thị mục này"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
        <h3 class="box-title"><i class="fa fa-star fa-index"></i> <a href="/tim_kiem/dien_dan?tu_khoa=<?php echo $_smarty_tpl->tpl_vars['ds_linh_vuc_2']->value[0]['ten_linh_vuc'];?>
"><?php echo $_smarty_tpl->tpl_vars['ds_linh_vuc_2']->value[0]['ten_linh_vuc'];?>
</a></h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="row">
        <div class="col-sm-12 custom-padding">
           <?php  $_smarty_tpl->tpl_vars['dien_dan'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dien_dan']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ds_linh_vuc_2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dien_dan']->key => $_smarty_tpl->tpl_vars['dien_dan']->value){
$_smarty_tpl->tpl_vars['dien_dan']->_loop = true;
?>
           	<div class="forum">
           	<center><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
"><img src="/home/upload/dien_dan/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['hinh_dai_dien'];?>
" class="img"/></a></center>
           	 <p class="header"><span class="title"><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['dien_dan']->value['ten'],24);?>
</a></span><br />
             <span class="user"><i class="fa fa-user"></i> <?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['so_luong_thanh_vien'];?>
 thành viên</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="time"><i class="fa fa-clock-o"></i> <?php echo humanTiming(strtotime($_smarty_tpl->tpl_vars['dien_dan']->value['ngay_tao']));?>
</span>
             </p>
           </div>
           <?php } ?>
        </div>
        </div><!-- /.row - inside box -->
    </div><!-- /.box-body -->
</div><!-- /.box -->

</section><!-- /.Left col -->
</div>

</section>
 </aside>

<?php }} ?>