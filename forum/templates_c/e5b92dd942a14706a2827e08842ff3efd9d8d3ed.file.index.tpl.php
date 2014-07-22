<?php /* Smarty version Smarty-3.1.14, created on 2014-07-23 01:08:06
         compiled from "..\templates\trang_chu\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1720453cea8866cbc92-76950456%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5b92dd942a14706a2827e08842ff3efd9d8d3ed' => 
    array (
      0 => '..\\templates\\trang_chu\\index.tpl',
      1 => 1406052481,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1720453cea8866cbc92-76950456',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ds_chuyen_muc' => 0,
    'chuyen_muc' => 0,
    'thanh_vien' => 0,
    'dien_dan' => 0,
    'children' => 0,
    'value' => 0,
    'key' => 0,
    'child' => 0,
    'k1' => 0,
    'v1' => 0,
    'ma_dien_dan' => 0,
    'bai_viet_moi' => 0,
    'kt' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53cea8868ea0d1_99358350',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53cea8868ea0d1_99358350')) {function content_53cea8868ea0d1_99358350($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\wamp\\www\\dien-dan-vn\\libraries\\smarty\\plugins\\modifier.truncate.php';
?><div id="page-body">
  <main role="main"> <?php echo $_smarty_tpl->getSubTemplate ("../elements/statistics.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    
    <?php if (empty($_smarty_tpl->tpl_vars['ds_chuyen_muc']->value)){?><span style="color: #999">Chưa có chuyên mục nào để hiển thị</span><?php }else{ ?>	
    <?php  $_smarty_tpl->tpl_vars['chuyen_muc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['chuyen_muc']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ds_chuyen_muc']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['chuyen_muc']->key => $_smarty_tpl->tpl_vars['chuyen_muc']->value){
$_smarty_tpl->tpl_vars['chuyen_muc']->_loop = true;
?>
    <?php if (empty($_smarty_tpl->tpl_vars['chuyen_muc']->value['ma_loai_cha'])){?>
    <table class="footable table table-striped table-bordered table-white table-primary table-hover default footable-loaded">
      <thead>
      
      <?php if (empty($_smarty_tpl->tpl_vars['thanh_vien']->value)||$_smarty_tpl->tpl_vars['thanh_vien']->value['loai_thanh_vien']==3){?>
      <?php if ($_smarty_tpl->tpl_vars['chuyen_muc']->value['rieng_tu']==1){?>
      <?php continue 1?>
      <?php }?>
      <?php }?>
      <tr>
        <th data-class="expand" class="footable-first-column"><i class="icon-list-ol"></i> <a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/bai_viet/danh_sach?loai=<?php echo $_smarty_tpl->tpl_vars['chuyen_muc']->value['ma'];?>
" data-original-title="" title="" style="text-transform: capitalize"> <?php echo $_smarty_tpl->tpl_vars['chuyen_muc']->value['ten'];?>
 </a></th>
        <th class="large80" data-hide="phone"><i class="icon-bar-chart"></i> Thống kê</th>
        <th class="large20 footable-last-column" data-hide="phone"><i class="icon-comments-alt"></i> Bài mới</th>
      </tr>
      </thead>
      
      <tbody>
      
      <?php $_smarty_tpl->tpl_vars['children'] = new Smarty_variable(getChildrenFirstForum($_smarty_tpl->tpl_vars['chuyen_muc']->value['ma'],$_smarty_tpl->tpl_vars['ds_chuyen_muc']->value), null, 0);?>
      <?php if ($_smarty_tpl->tpl_vars['children']->value==null){?>
      <tr>
        <td class="expand footable-first-column">Chuyên mục chưa có chuyên mục con</td>
      </tr>
      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['children']->value!=null){?>
      	<?php if ($_smarty_tpl->tpl_vars['children']->value==null){?>
        <tr> <td class="expand footable-first-column">Chuyên mục chưa có chuyên mục con</td> </tr>
        </tbody>
        </table>
        <?php }?>
       <?php if ($_smarty_tpl->tpl_vars['children']->value!=null){?>
      <?php $_smarty_tpl->tpl_vars['kt'] = new Smarty_variable(0, null, 0);?>
      <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['children']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
      
      <?php $_smarty_tpl->tpl_vars['kt'] = new Smarty_variable(1, null, 0);?>
      <?php if (empty($_smarty_tpl->tpl_vars['thanh_vien']->value)||$_smarty_tpl->tpl_vars['thanh_vien']->value['loai_thanh_vien']==3){?>
          <?php if ($_smarty_tpl->tpl_vars['value']->value['rieng_tu']==1){?>
          <?php continue 1?>
          <?php }?>
      <?php }?>
      <tr>
        <td class="expand footable-first-column"><span class="footable-toggle"></span> <i class="row-icon" style="background-image: url(/forum/templates/styles/BBOOTS/imageset/forum_read.gif); background-repeat: no-repeat;" ></i> <a class="feed-icon-forum hidden-phone" title="" href="../bai_viet/index.php?loai=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" data-original-title="Bình chọn diễn đàn"> <img src="/forum/templates/images/icons/misc/star-icon.png" /></a> <a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/bai_viet/danh_sach?loai=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class="forumtitle" data-original-title="" title="" style="text-transform:capitalize"><?php echo $_smarty_tpl->tpl_vars['value']->value['ten'];?>
</a><br>
          <small><?php echo (($tmp = @$_smarty_tpl->tpl_vars['value']->value['ghi_chu'])===null||$tmp==='' ? '' : $tmp);?>
</small><br />
          <?php $_smarty_tpl->tpl_vars['child'] = new Smarty_variable(getChildrenFirstForum($_smarty_tpl->tpl_vars['key']->value,$_smarty_tpl->tpl_vars['ds_chuyen_muc']->value), null, 0);?>
          <?php if ($_smarty_tpl->tpl_vars['child']->value!=null){?>
          &nbsp;&nbsp;Phụ mục : 
          <?php  $_smarty_tpl->tpl_vars['v1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v1']->_loop = false;
 $_smarty_tpl->tpl_vars['k1'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['child']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v1']->key => $_smarty_tpl->tpl_vars['v1']->value){
$_smarty_tpl->tpl_vars['v1']->_loop = true;
 $_smarty_tpl->tpl_vars['k1']->value = $_smarty_tpl->tpl_vars['v1']->key;
?> <i class="icon-comment"> <a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/bai_viet/danh_sach?loai=<?php echo $_smarty_tpl->tpl_vars['k1']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v1']->value['ten'];?>
</a>&nbsp;&nbsp;
          <?php } ?>
          
          <?php }?> </td>
        <td class="center"><!--<?php echo $_smarty_tpl->tpl_vars['chuyen_muc']->value['so_luong_bai_viet'];?>
Chủ đề <br>--> 
          <?php echo dem_bai_viet($_smarty_tpl->tpl_vars['ma_dien_dan']->value,$_smarty_tpl->tpl_vars['key']->value);?>
 bài viết </td>
        <?php $_smarty_tpl->tpl_vars['bai_viet_moi'] = new Smarty_variable(bai_viet_moi($_smarty_tpl->tpl_vars['ma_dien_dan']->value,$_smarty_tpl->tpl_vars['key']->value), null, 0);?>
        <td class="center footable-last-column"> <?php if ($_smarty_tpl->tpl_vars['bai_viet_moi']->value!=0){?> 
        <a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/bai_viet/chi_tiet?ma=<?php echo $_smarty_tpl->tpl_vars['bai_viet_moi']->value['ma'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['bai_viet_moi']->value['tieu_de'];?>
" class="text-color"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['bai_viet_moi']->value['tieu_de'],30);?>
</a><br />
        <i class="icon-user"></i> bởi <a class="text-color" href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thanh_vien/thong_tin?ma_thanh_vien=<?php echo url_encode($_smarty_tpl->tpl_vars['bai_viet_moi']->value['ma_nguoi_dang']);?>
" data-original-title="" title=""><?php echo get_ho_ten($_smarty_tpl->tpl_vars['bai_viet_moi']->value['ma_nguoi_dang']);?>
</a> <a rel="tooltip" data-placement="right" data-original-title="Đi đến <?php echo get_ho_ten($_smarty_tpl->tpl_vars['bai_viet_moi']->value['ma_nguoi_dang']);?>
" href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thanh_vien/thong_tin?ma_thanh_vien=<?php echo url_encode($_smarty_tpl->tpl_vars['bai_viet_moi']->value['ma_nguoi_dang']);?>
"> <i class="mobile-post icon-signout"></i></a> <br>
          <i class="icon-time"></i> <small><?php echo date('H:i d-m-Y',strtotime($_smarty_tpl->tpl_vars['bai_viet_moi']->value['ngay_tao']));?>
</small> <?php }else{ ?> 
          0 bài viết
          <?php }?> </td>
      </tr>
      <?php } ?>
      
      <?php if ($_smarty_tpl->tpl_vars['kt']->value==0){?>
      <tr>
        <td>Chưa có chuyên mục nào để hiển thị</td>
      </tr>
      <?php }?>
      </tbody>
      
    </table>
    <?php }?>
    <?php }?>
    <?php }?>
    <?php } ?><?php }?>
    <div class="row-fluid"> </div>
  </main>
</div>
<?php }} ?>