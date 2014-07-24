<?php /* Smarty version Smarty-3.1.14, created on 2014-07-24 14:04:53
         compiled from "D:\wamp\www\dien-dan-vn\home\templates\elements\left.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2167853d0b015add2b9-75495055%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4899ca540b2f93282a4d968b63b4ef52213a8983' => 
    array (
      0 => 'D:\\wamp\\www\\dien-dan-vn\\home\\templates\\elements\\left.tpl',
      1 => 1406052597,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2167853d0b015add2b9-75495055',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'login' => 0,
    'ds_dien_dan' => 0,
    'value' => 0,
    'danh_sach_linh_vuc' => 0,
    'linh_vuc' => 0,
    'linh_vuc_con' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d0b015bd3639_10778649',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d0b015bd3639_10778649')) {function content_53d0b015bd3639_10778649($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\wamp\\www\\dien-dan-vn\\libraries\\smarty\\plugins\\modifier.truncate.php';
?><aside class="left-side sidebar-offcanvas"> 
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar"> 
    <!-- Sidebar user panel --> 
    <?php if ($_smarty_tpl->tpl_vars['login']->value!=''){?>
    <div class="user-panel">
      <div class="pull-left image"> <img src="/home/upload/nguoi_dung/<?php echo $_smarty_tpl->tpl_vars['login']->value['hinh_dai_dien'];?>
" class="img-circle" alt="<?php echo $_smarty_tpl->tpl_vars['login']->value['ten'];?>
" /> </div>
      <div class="pull-left info">
        <p>Xin chào, <?php echo $_smarty_tpl->tpl_vars['login']->value['ten'];?>
</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Trực tuyến</a> </div>
    </div>
    <?php }?> 
    <!-- search form -->
    <form action="/tim_kiem/dien_dan" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="tu_khoa" class="form-control" placeholder="Tìm kiếm diễn đàn" value="<?php echo (($tmp = @$_GET['tu_khoa'])===null||$tmp==='' ? '' : $tmp);?>
" autofocus="autofocus"/>
        <span class="input-group-btn">
        <button type='submit' id='search-btn' class="btn btn-flat" style="margin: 0px; width: 29px"><i class="fa fa-search"></i></button>
        </span> </div>
    </form>
    <ul class="sidebar-menu">
      </li>
      <li class="active"> <a href="#" style="background-color: #fff; box-shadow:0 0 14px #FFFFFF; color:#3c8dbc; text-transform:capitalize"> <i class="fa fa-globe"></i> <span style="">Cá nhân</span> </a> </li>
      <?php if ($_smarty_tpl->tpl_vars['login']->value!=''){?>
      <li> <a href="/tai_khoan/<?php echo urlencode(base64_encode($_smarty_tpl->tpl_vars['login']->value['ma']));?>
-<?php echo convert_to_dot(noi_chuoi($_smarty_tpl->tpl_vars['login']->value['ho'],$_smarty_tpl->tpl_vars['login']->value['ten'],' '));?>
"> <i class="fa fa-user"></i> <span>Tài khoản</span> </a></li>
      <li class="treeview"> <a href="#"> <i class="fa fa-bar-chart-o"></i> <span>Diễn đàn</span> <?php if (!empty($_smarty_tpl->tpl_vars['ds_dien_dan']->value)){?><i class="fa fa-angle-left pull-right"></i><?php }?> </a> <?php if ($_smarty_tpl->tpl_vars['ds_dien_dan']->value!=''){?>
        <ul class="treeview-menu">
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
        <?php }?> </li>
      <li> <a href="/thong_bao"> <i class="fa fa-envelope"></i> <span>Thông báo</span> </a> </li>
      <?php }else{ ?>
      	<li class="active">
        <p style="padding: 10px;">Nếu bạn chưa có tài khoản hãy đăng ký ngay bây giờ!</p>
  		<center>
        <button id="dang-ky-btn" class="btn" onclick="window.location.href = '/tai_khoan/dang_ky.html'">Đăng ký</button>
        </center>
        <br />
        </li>
      <?php }?>
    </ul>
    <ul class="sidebar-menu">
      <li class="active"> <a href="index.html" style="background-color: #fff; box-shadow:0 0 14px #FFFFFF; color:#3c8dbc; text-transform:capitalize"> <i class="fa fa-globe"></i> <span style="">Lĩnh vực phổ biến</span> </a> </li>
      <?php  $_smarty_tpl->tpl_vars['linh_vuc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['linh_vuc']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['danh_sach_linh_vuc']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['linh_vuc']->key => $_smarty_tpl->tpl_vars['linh_vuc']->value){
$_smarty_tpl->tpl_vars['linh_vuc']->_loop = true;
?>
      <?php if ($_smarty_tpl->tpl_vars['linh_vuc']->value['ma_loai_cha']==0){?>
      <li class="treeview"> <a href="#"> <span><?php echo $_smarty_tpl->tpl_vars['linh_vuc']->value['ten'];?>
</span><i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <?php  $_smarty_tpl->tpl_vars['linh_vuc_con'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['linh_vuc_con']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['danh_sach_linh_vuc']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['linh_vuc_con']->key => $_smarty_tpl->tpl_vars['linh_vuc_con']->value){
$_smarty_tpl->tpl_vars['linh_vuc_con']->_loop = true;
?>
          <?php if ($_smarty_tpl->tpl_vars['linh_vuc_con']->value['ma_loai_cha']==$_smarty_tpl->tpl_vars['linh_vuc']->value['ma']){?>
          <li><a href="/linh_vuc/danh_sach?ma_linh_vuc=<?php echo $_smarty_tpl->tpl_vars['linh_vuc_con']->value['ma'];?>
" style="margin-left:0px !important"><i class="fa fa-angle-right"></i><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['linh_vuc_con']->value['ten'],22);?>
</a></li>
          <?php }?>
          <?php } ?>
        </ul>
      </li>
      <?php }?>
      <?php } ?>
    </ul>
   
    <br />
  </section>
  <!-- /.sidebar --> 
</aside>
<?php }} ?>