<?php /* Smarty version Smarty-3.1.14, created on 2014-07-23 01:10:05
         compiled from "..\templates\bai_viet\danh_sach.tpl" */ ?>
<?php /*%%SmartyHeaderCode:562453cea8fd1059d0-40021691%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eced0136f1b67a72e39942374d763569344f6fc4' => 
    array (
      0 => '..\\templates\\bai_viet\\danh_sach.tpl',
      1 => 1406052481,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '562453cea8fd1059d0-40021691',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'chuyen_muc' => 0,
    'tong_so_bai_viet' => 0,
    'trang_hien_tai' => 0,
    'tong_so_trang' => 0,
    'bo_nut' => 0,
    'dien_dan' => 0,
    'ds_chuyen_muc_con' => 0,
    'thanh_vien' => 0,
    'chuyen_muc_con' => 0,
    'ma_dien_dan' => 0,
    'bai_viet_moi' => 0,
    'ds_bai_viet_danh_dau' => 0,
    'bai_viet_danh_dau' => 0,
    'binh_luan_danh_dau' => 0,
    'ds_bai_viet_moi_nhat' => 0,
    'bai_viet_moi_nhat' => 0,
    'binh_luan_moi' => 0,
    'ds_bai_viet_yeu_thich_nhat' => 0,
    'bai_viet_yeu_thich_nhat' => 0,
    'binh_luan_yeu_thich' => 0,
    'ds_bai_viet_theo_loai' => 0,
    'bai_viet' => 0,
    'binh_luan_theo_loai' => 0,
    'quan_tri_vien' => 0,
    'qt' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53cea8fd79a992_77583164',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53cea8fd79a992_77583164')) {function content_53cea8fd79a992_77583164($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\wamp\\www\\dien-dan-vn\\libraries\\smarty\\plugins\\modifier.truncate.php';
?><div id="page-body">
  <main role="main">
    <div class="side-segment">
      <h3><a href="#" data-original-title="" title=""><?php echo $_smarty_tpl->tpl_vars['chuyen_muc']->value['ten'];?>
</a></h3>
    </div>
    <div> 
      <!-- NOTE: remove the style="display: none" when you want to have the forum description on the forum body -->
      <div style="display: none !important;">Description of your first forum. it can be really really long so let's see what happens to the container here.<br>
      </div>
    </div>
    <div class="row-fluid">
      <div class="pull-left">
        <form method="get" id="topic-search" action="danh_sach">
          <div class="input-append hidden-phone input-icon left"> <i class="icon-search"></i>
          <input type="hidden" name = "loai" value="<?php echo $_GET['loai'];?>
">
            <input type="text" class="span9" size="9" name="tu_khoa" id="search_keywords" placeholder="Tìm kiếm bài viết…">
            <button type="submit" class="btn black">Tìm kiếm</button>
          </div>
        </form>
      </div>
      <div class="pull-right">
        <div class="pagination pagination-small hidden-phone">
          <ul>
            <li class="active"><a data-original-title="" title=""><?php echo $_smarty_tpl->tpl_vars['tong_so_bai_viet']->value;?>
 Bài viết</a></li>
            <li><a data-original-title="" title="">Trang <strong><?php echo $_smarty_tpl->tpl_vars['trang_hien_tai']->value;?>
</strong> trên <strong><?php if ($_smarty_tpl->tpl_vars['tong_so_trang']->value==0){?> 1 <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['tong_so_trang']->value;?>
 <?php }?></strong></a></li>
            <li><?php echo $_smarty_tpl->tpl_vars['bo_nut']->value;?>
</li>
          </ul>
        </div>
        <div class="visible-phone">
          <div class="pagination pagination-small">
            <ul>
              <li class="active"><a data-original-title="" title=""><?php echo $_smarty_tpl->tpl_vars['tong_so_bai_viet']->value;?>
 Bài viết</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="pull-right">
        <div class="btn-group"> </div>
      </div>
     <div class="pull-left"> <a href="./them?loai=<?php echo $_GET['loai'];?>
" data-original-title="Tạo bài viết mới" type="button" class="btn"><i class="icon-share-alt"></i>Tạo bài viết mới</a> </div> 
       <div class="pull-left" style="margin-left:2px"><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/bai_viet/danh_sach?loai=<?php echo $_smarty_tpl->tpl_vars['chuyen_muc']->value['ma'];?>
&bo_loc=1" class="btn" data-original-title="Danh sách 10 bài viết được yêu thích nhất của chuyên mục" title="Danh sách 10 bài viết được yêu thích nhất của chuyên mục"><i class="icon-heart" style="color:crimson;font-size:1.2em" ></i></a> </div>
        <div class="pull-left" style="margin-left:2px"><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/bai_viet/danh_sach?loai=<?php echo $_smarty_tpl->tpl_vars['chuyen_muc']->value['ma'];?>
&bo_loc=0" class="btn" data-original-title="Danh sách 10 bài viết mới nhất của chuyên mục" title="Danh sách 10 bài viết mới nhất của chuyên mục"><i class="icon-bolt" style="color:yellow;font-size:1.2em" ></i></a> </div>
    </div>
    <div class="space10"></div>
    <?php if ($_smarty_tpl->tpl_vars['ds_chuyen_muc_con']->value!=null){?>
     <table class="footable table table-striped table-bordered table-white table-primary table-hover default footable-loaded">
      <thead>
        <tr>
          <th data-class="expand" class="footable-first-column"><i class="icon-group"></i> Phụ mục : <?php echo $_smarty_tpl->tpl_vars['chuyen_muc']->value['ten'];?>
</th>
          <th data-hide="phone"><i class="icon-bar-chart"></i> Thống kê</th>
          <th data-hide="phone" class="footable-last-column"><i class="icon-comments-alt"></i> Bình luận mới</th>
        </tr>
      </thead>
      <tbody>
      
     
      <?php  $_smarty_tpl->tpl_vars['chuyen_muc_con'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['chuyen_muc_con']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ds_chuyen_muc_con']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['chuyen_muc_con']->key => $_smarty_tpl->tpl_vars['chuyen_muc_con']->value){
$_smarty_tpl->tpl_vars['chuyen_muc_con']->_loop = true;
?>
      	<?php if (empty($_smarty_tpl->tpl_vars['thanh_vien']->value)||$_smarty_tpl->tpl_vars['thanh_vien']->value['loai_thanh_vien']==3){?>
        	<?php if ($_smarty_tpl->tpl_vars['chuyen_muc_con']->value['rieng_tu']==1){?>
            	<?php continue 1?>
            <?php }?>
        <?php }?> 	
        	<tr class="">
        <td class="expand footable-first-column"><span class="footable-toggle"></span> <i class="icon-comment"  title="No unread posts"></i>   <a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/bai_viet/danh_sach?loai=<?php echo $_smarty_tpl->tpl_vars['chuyen_muc_con']->value['ma'];?>
" class="topictitle" data-original-title="" title=""><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['chuyen_muc_con']->value['ten'],100,"...");?>
</a> <br><small><?php echo (($tmp = @$_smarty_tpl->tpl_vars['chuyen_muc_con']->value['ghi_chu'])===null||$tmp==='' ? '' : $tmp);?>
</small></td>
        <td class="center"><?php echo dem_bai_viet($_smarty_tpl->tpl_vars['ma_dien_dan']->value,$_smarty_tpl->tpl_vars['chuyen_muc_con']->value['ma']);?>
 bài viết </td>
         <?php $_smarty_tpl->tpl_vars['bai_viet_moi'] = new Smarty_variable(bai_viet_moi($_smarty_tpl->tpl_vars['ma_dien_dan']->value,$_smarty_tpl->tpl_vars['chuyen_muc_con']->value['ma']), null, 0);?>
         
        <td class="center footable-last-column"> 
        <?php if ($_smarty_tpl->tpl_vars['bai_viet_moi']->value!=0){?>
          	<i class="icon-user"></i> bởi 
          <a href="" data-original-title="" title=""><?php echo get_ho_ten($_smarty_tpl->tpl_vars['bai_viet_moi']->value['ma_nguoi_dang']);?>
</a> <a rel="tooltip" data-placement="right" data-original-title="Đi đến <?php echo get_ho_ten($_smarty_tpl->tpl_vars['bai_viet_moi']->value['ma_nguoi_dang']);?>
" href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thanh_vien/thong_tin?ma_thanh_vien=<?php echo url_encode($_smarty_tpl->tpl_vars['bai_viet_moi']->value['ma_nguoi_dang']);?>
"><i class="mobile-post icon-signout"></i></a> <br>
          <i class="icon-time"></i> <small><?php echo date('H:i d-m-Y',strtotime($_smarty_tpl->tpl_vars['bai_viet_moi']->value['ngay_tao']));?>
</small>
           <?php }else{ ?> 
           	  0 bài viết
           <?php }?></td>
      </tr>
      <?php } ?>
      </tbody>
      
    </table>
    <?php }?>
    <table class="footable table table-striped table-bordered table-white table-primary table-hover default footable-loaded">
      <thead>
        <tr>
          <th data-class="expand" class="footable-first-column"><i class="icon-group"></i> Bài viết được đánh dấu</th>
          <th data-hide="phone"><i class="icon-bar-chart"></i> Thống kê</th>
         
          <th data-hide="phone" class="footable-last-column"><i class="icon-comments-alt"></i> Bình luận mới</th>
        </tr>
      </thead>
      <tbody>
     	<?php if ($_smarty_tpl->tpl_vars['ds_bai_viet_danh_dau']->value!=null){?>
        <?php  $_smarty_tpl->tpl_vars['bai_viet_danh_dau'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['bai_viet_danh_dau']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ds_bai_viet_danh_dau']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['bai_viet_danh_dau']->key => $_smarty_tpl->tpl_vars['bai_viet_danh_dau']->value){
$_smarty_tpl->tpl_vars['bai_viet_danh_dau']->_loop = true;
?>       	 	
        <tr class="">
        <td class="expand footable-first-column"><span class="footable-toggle"></span> <i class="row-icon" style=" background-image: url(/forum/templates/images/icons/misc/0.gif) ; background-repeat: no-repeat;" title="No unread posts"></i> <a href="./chi_tiet?ma=24" class="topictitle" data-original-title="" title=""><i class="icon-tag"></i> <span style="color:red">Chú ý :</span> <?php echo $_smarty_tpl->tpl_vars['bai_viet_danh_dau']->value['tieu_de'];?>
</a>
        <?php if ($_smarty_tpl->tpl_vars['thanh_vien']->value!=''&&($_smarty_tpl->tpl_vars['thanh_vien']->value['loai_thanh_vien']==0||$_smarty_tpl->tpl_vars['thanh_vien']->value['loai_thanh_vien']==1)){?>	
        <a class="feed-icon-forum hidden-phone" title="Bỏ đánh dấu bài viết" href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/bai_viet/trang_thai_danh_dau?ma=<?php echo $_smarty_tpl->tpl_vars['bai_viet_danh_dau']->value['ma'];?>
" data-original-title="Bình chọn diễn đàn">
          <i class="icon-tag"></i></a>
         <?php }?> 
         <br>
          <i class="icon-user"></i> bởi <a href="/29/sinh-vien-hutech/thanh_vien/thong_tin?ma_thanh_vien=<?php echo url_encode($_smarty_tpl->tpl_vars['bai_viet_danh_dau']->value['ma_nguoi_dang']);?>
" style="color: #AA0000;" class="username-coloured" data-original-title="" title=""><?php echo $_smarty_tpl->tpl_vars['bai_viet_danh_dau']->value['ho_ten'];?>
</a>&nbsp;&nbsp; <i class="icon-time"></i> <small><?php echo $_smarty_tpl->tpl_vars['bai_viet_danh_dau']->value['ngay_tao'];?>
</small></td>
        <td class="center"><?php echo $_smarty_tpl->tpl_vars['bai_viet_danh_dau']->value['so_luong_binh_luan'];?>
 Trả lời <br>
          <?php echo $_smarty_tpl->tpl_vars['bai_viet_danh_dau']->value['luot_xem'];?>
 Lượt xem</td>
         <?php $_smarty_tpl->tpl_vars['binh_luan_danh_dau'] = new Smarty_variable(binh_luan_moi_nhat($_smarty_tpl->tpl_vars['bai_viet_danh_dau']->value['ma'],$_smarty_tpl->tpl_vars['ma_dien_dan']->value), null, 0);?>
        	<?php if ($_smarty_tpl->tpl_vars['binh_luan_danh_dau']->value!=null){?>
        <td class="center footable-last-column"><i class="icon-user"></i> bởi <a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thanh_vien/thong_tin?ma_thanh_vien=<?php echo url_encode($_smarty_tpl->tpl_vars['binh_luan_danh_dau']->value[0]['ma_nguoi_dung']);?>
" data-original-title="" title=""><?php echo get_ho_ten($_smarty_tpl->tpl_vars['binh_luan_danh_dau']->value[0]['ma_nguoi_dung']);?>
</a> <a rel="tooltip" data-placement="right" data-original-title="Đi đến bài viết" href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/bai_viet/chi_tiet?ma=<?php echo $_smarty_tpl->tpl_vars['bai_viet_danh_dau']->value['ma'];?>
#<?php echo $_smarty_tpl->tpl_vars['binh_luan_danh_dau']->value[0]['ma'];?>
<?php echo $_smarty_tpl->tpl_vars['bai_viet_danh_dau']->value['ma'];?>
"><i class="mobile-post icon-signout"></i></a> <br>
          <i class="icon-time"></i> <small><?php echo date('H:i d-m-Y',strtotime($_smarty_tpl->tpl_vars['binh_luan_danh_dau']->value[0]['ngay_tao']));?>
</small></td>
          <?php }else{ ?>
          	<td class="center footable-last-column">Chưa có bình luận nào</td>
          	<?php }?>
        
        
      	
        <?php } ?>
        <?php }else{ ?>
        <tr>
        <td>Chưa có bài viết nào được đánh dấu</td>
        </tr>
        
        <?php }?>
            	 	
        	
            </tbody>
      
    </table>
  
   
 
    

    <?php if (isset($_GET['bo_loc'])){?>
    	<?php if ($_GET['bo_loc']==0){?>
            <table class="footable table table-striped table-bordered table-white table-primary table-hover default footable-loaded">
      <thead>
        <tr>
          <th data-class="expand" class="footable-first-column"><i class="icon-group"></i> Bài viết</th>
          <th data-hide="phone"><i class="icon-bar-chart"></i> Thống kê</th>
          <th data-hide="phone"><i class="icon-bar-chart"></i> Thời gian</th>
          <th data-hide="phone" class="footable-last-column"><i class="icon-comments-alt"></i> Bình luận mới</th>
        </tr>
      </thead>
      <tbody>
      
      <?php if ($_smarty_tpl->tpl_vars['ds_bai_viet_moi_nhat']->value==null){?>
      <tr>
        <td>Chưa có bài viết nào để hiển thị</td>
      </tr>
      <?php }?>
      <?php  $_smarty_tpl->tpl_vars['bai_viet_moi_nhat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ds_bai_viet_moi_nhat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->key => $_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->value){
$_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->_loop = true;
?>
      	<?php if (empty($_smarty_tpl->tpl_vars['thanh_vien']->value)||$_smarty_tpl->tpl_vars['thanh_vien']->value['loai_thanh_vien']==3){?>
        	<?php if ($_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->value['rieng_tu']==1){?>
            	<?php continue 1?>
            <?php }?>
        <?php }?> 	
        	<tr class="">
        <td class="expand footable-first-column"><span class="footable-toggle"></span> <i class="row-icon" style="background-image: url(/forum/templates/images/icons/misc/<?php echo $_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->value['icon'];?>
.gif); background-repeat: no-repeat;" title="No unread posts"></i> <a href="./chi_tiet?ma=<?php echo $_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->value['ma'];?>
" class="topictitle" data-original-title="" title=""><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->value['tieu_de'],100,"...");?>
</a> <br>
          <i class="icon-user"></i> bởi <a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thanh_vien/thong_tin?ma_thanh_vien=<?php echo url_encode($_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->value['ma_nguoi_dang']);?>
" style="color: #AA0000;" class="username-coloured" data-original-title="" title=""><?php echo $_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->value['ho_ten'];?>
</a>&nbsp;&nbsp; <i class="icon-time"></i> <small><?php echo date('H:i d-m-Y',strtotime($_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->value['ngay_tao']));?>
</small></td>
        <td class="center"><?php echo $_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->value['so_luong_binh_luan'];?>
 Trả lời <br>
          <?php echo $_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->value['luot_xem'];?>
 Lượt xem</td>
           <td class="center"><?php echo time_since(time()-strtotime($_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->value['ngay_tao']));?>
</td>
       
       <?php $_smarty_tpl->tpl_vars['binh_luan_moi'] = new Smarty_variable(binh_luan_moi_nhat($_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->value['ma'],$_smarty_tpl->tpl_vars['ma_dien_dan']->value), null, 0);?>
        	<?php if ($_smarty_tpl->tpl_vars['binh_luan_moi']->value!=null){?>
        <td class="center footable-last-column"><i class="icon-user"></i> bởi <a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thanh_vien/thong_tin?ma_thanh_vien=<?php echo url_encode($_smarty_tpl->tpl_vars['binh_luan_moi']->value[0]['ma_nguoi_dung']);?>
" data-original-title="" title=""><?php echo get_ho_ten($_smarty_tpl->tpl_vars['binh_luan_moi']->value[0]['ma_nguoi_dung']);?>
</a> <a rel="tooltip" data-placement="right" data-original-title="Đi đến bài viết" href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/bai_viet/chi_tiet?ma=<?php echo $_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->value['ma'];?>
#<?php echo $_smarty_tpl->tpl_vars['binh_luan_moi']->value[0]['ma'];?>
<?php echo $_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->value['ma'];?>
"><i class="mobile-post icon-signout"></i></a> <br>
          <i class="icon-time"></i> <small><?php echo date('H:i d-m-Y',strtotime($_smarty_tpl->tpl_vars['binh_luan_moi']->value[0]['ngay_tao']));?>
</small></td>
          <?php }else{ ?>
          	<td class="center footable-last-column">Chưa có bình luận nào</td>
          	<?php }?>
       
       
       
      </tr>
      <?php } ?>
      </tbody>
      
    </table>
        <?php }?>
       
        
     	<?php if ($_GET['bo_loc']==1){?>
        <table class="footable table table-striped table-bordered table-white table-primary table-hover default footable-loaded">
      <thead>
        <tr>
          <th data-class="expand" class="footable-first-column"><i class="icon-group"></i> Bài viết</th>
          <th data-hide="phone"><i class="icon-bar-chart"></i> Thống kê</th>
          <th data-hide="phone"><i class="icon-bar-chart"></i> Lượt thích</th>
          <th data-hide="phone" class="footable-last-column"><i class="icon-comments-alt"></i> Bình luận mới</th>
        </tr>
      </thead>
      <tbody>
      
      <?php if ($_smarty_tpl->tpl_vars['ds_bai_viet_yeu_thich_nhat']->value==null){?>
      <tr>
        <td>Chưa có bài viết nào để hiển thị</td>
      </tr>
      <?php }?>
      <?php  $_smarty_tpl->tpl_vars['bai_viet_yeu_thich_nhat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['bai_viet_yeu_thich_nhat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ds_bai_viet_yeu_thich_nhat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['bai_viet_yeu_thich_nhat']->key => $_smarty_tpl->tpl_vars['bai_viet_yeu_thich_nhat']->value){
$_smarty_tpl->tpl_vars['bai_viet_yeu_thich_nhat']->_loop = true;
?>
      	<?php if (empty($_smarty_tpl->tpl_vars['thanh_vien']->value)||$_smarty_tpl->tpl_vars['thanh_vien']->value['loai_thanh_vien']==3){?>
        	<?php if ($_smarty_tpl->tpl_vars['bai_viet_yeu_thich_nhat']->value['rieng_tu']==1){?>
            	<?php continue 1?>
            <?php }?>
        <?php }?> 	
        	<tr class="">
        <td class="expand footable-first-column"><span class="footable-toggle"></span> <i class="row-icon" style="background-image: url(/forum/templates/images/icons/misc/<?php echo $_smarty_tpl->tpl_vars['bai_viet_yeu_thich_nhat']->value['icon'];?>
.gif); background-repeat: no-repeat;" title="No unread posts"></i> <a href="./chi_tiet?ma=<?php echo $_smarty_tpl->tpl_vars['bai_viet_yeu_thich_nhat']->value['ma'];?>
" class="topictitle" data-original-title="" title=""><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['bai_viet_yeu_thich_nhat']->value['tieu_de'],100,"...");?>
</a> <br>
          <i class="icon-user"></i> bởi <a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thanh_vien/thong_tin?ma_thanh_vien=<?php echo url_encode($_smarty_tpl->tpl_vars['bai_viet_yeu_thich_nhat']->value['ma_nguoi_dang']);?>
" style="color: #AA0000;" class="username-coloured" data-original-title="" title=""><?php echo $_smarty_tpl->tpl_vars['bai_viet_yeu_thich_nhat']->value['ho_ten'];?>
</a>&nbsp;&nbsp; <i class="icon-time"></i> <small><?php echo date('H:i d-m-Y',strtotime($_smarty_tpl->tpl_vars['bai_viet_yeu_thich_nhat']->value['ngay_tao']));?>
</small></td>
        <td class="center"><?php echo $_smarty_tpl->tpl_vars['bai_viet_yeu_thich_nhat']->value['so_luong_binh_luan'];?>
 Trả lời <br>
          <?php echo $_smarty_tpl->tpl_vars['bai_viet_yeu_thich_nhat']->value['luot_xem'];?>
 Lượt xem</td>
           <td class="center"><?php echo $_smarty_tpl->tpl_vars['bai_viet_yeu_thich_nhat']->value['thich'];?>
 <i class="icon-thumbs-up-alt" style="color:crimson"></i> <br>
          <?php echo $_smarty_tpl->tpl_vars['bai_viet_yeu_thich_nhat']->value['luot_xem'];?>
 Lượt xem</td>
          
          
         <?php $_smarty_tpl->tpl_vars['binh_luan_yeu_thich'] = new Smarty_variable(binh_luan_moi_nhat($_smarty_tpl->tpl_vars['bai_viet_yeu_thich_nhat']->value['ma'],$_smarty_tpl->tpl_vars['ma_dien_dan']->value), null, 0);?>
        	<?php if ($_smarty_tpl->tpl_vars['binh_luan_yeu_thich']->value!=null){?>
        <td class="center footable-last-column"><i class="icon-user"></i> bởi <a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thanh_vien/thong_tin?ma_thanh_vien=<?php echo url_encode($_smarty_tpl->tpl_vars['binh_luan_yeu_thich']->value[0]['ma_nguoi_dung']);?>
" data-original-title="" title=""><?php echo get_ho_ten($_smarty_tpl->tpl_vars['binh_luan_yeu_thich']->value[0]['ma_nguoi_dung']);?>
</a> <a rel="tooltip" data-placement="right" data-original-title="Đi đến bài viết" href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/bai_viet/chi_tiet?ma=<?php echo $_smarty_tpl->tpl_vars['bai_viet_yeu_thich_nhat']->value['ma'];?>
#<?php echo $_smarty_tpl->tpl_vars['binh_luan_yeu_thich']->value[0]['ma'];?>
<?php echo $_smarty_tpl->tpl_vars['bai_viet_yeu_thich_nhat']->value['ma'];?>
"><i class="mobile-post icon-signout"></i></a> <br>
          <i class="icon-time"></i> <small><?php echo date('H:i d-m-Y',strtotime($_smarty_tpl->tpl_vars['binh_luan_yeu_thich']->value[0]['ngay_tao']));?>
</small></td>
          	<?php }else{ ?>
          	<td class="center footable-last-column">Chưa có bình luận nào</td>
          	<?php }?>
        
        
      </tr>
      <?php } ?>
      </tbody>
      
    </table>
        <?php }?>
         <?php }else{ ?>
        <table class="footable table table-striped table-bordered table-white table-primary table-hover default footable-loaded">
      <thead>
        <tr>
          <th data-class="expand" class="footable-first-column"><i class="icon-group"></i> Bài viết</th>
          <th data-hide="phone"><i class="icon-bar-chart"></i> Thống kê</th>
         
          <th data-hide="phone" class="footable-last-column"><i class="icon-comments-alt"></i> Bình luận mới</th>
        </tr>
      </thead>
      <tbody>
      
      <?php if ($_smarty_tpl->tpl_vars['ds_bai_viet_theo_loai']->value==null){?>
      <tr>
        <td>Chưa có bài viết nào để hiển thị</td>
      </tr>
      <?php }?>
      <?php  $_smarty_tpl->tpl_vars['bai_viet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['bai_viet']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ds_bai_viet_theo_loai']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['bai_viet']->key => $_smarty_tpl->tpl_vars['bai_viet']->value){
$_smarty_tpl->tpl_vars['bai_viet']->_loop = true;
?>
      	<?php if (empty($_smarty_tpl->tpl_vars['thanh_vien']->value)||$_smarty_tpl->tpl_vars['thanh_vien']->value['loai_thanh_vien']==3){?>
        	<?php if ($_smarty_tpl->tpl_vars['bai_viet']->value['rieng_tu']==1){?>
            	<?php continue 1?>
            <?php }?>
        <?php }?> 	
        	<tr class="">
        <td class="expand footable-first-column"><span class="footable-toggle"></span> <i class="row-icon" style="<?php if ($_smarty_tpl->tpl_vars['bai_viet']->value['trang_thai']==0){?>background-image: url(/forum/templates/images/icons/misc/lock_closed.png)<?php }else{ ?> background-image: url(/forum/templates/images/icons/misc/<?php echo $_smarty_tpl->tpl_vars['bai_viet']->value['icon'];?>
.gif) <?php }?>; background-repeat: no-repeat;" title="No unread posts"></i> <a href="./chi_tiet?ma=<?php echo $_smarty_tpl->tpl_vars['bai_viet']->value['ma'];?>
" class="topictitle" data-original-title="" title="" <?php if ($_smarty_tpl->tpl_vars['bai_viet']->value['trang_thai']==0){?> style="text-decoration:line-through" <?php }?>><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['bai_viet']->value['tieu_de'],100,"...");?>
</a>
        <?php if ($_smarty_tpl->tpl_vars['thanh_vien']->value!=''&&($_smarty_tpl->tpl_vars['thanh_vien']->value['loai_thanh_vien']==0||$_smarty_tpl->tpl_vars['thanh_vien']->value['loai_thanh_vien']==1)&&$_smarty_tpl->tpl_vars['bai_viet']->value['stick']==0){?>	
        <a class="feed-icon-forum hidden-phone" title="Đánh dấu bài viết" href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/bai_viet/trang_thai_danh_dau?ma=<?php echo $_smarty_tpl->tpl_vars['bai_viet']->value['ma'];?>
" data-original-title="Bình chọn diễn đàn">
          <i class="icon-tag"></i></a>
         <?php }?> 
          <br />
          <i class="icon-user"></i> bởi <a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thanh_vien/thong_tin?ma_thanh_vien=<?php echo url_encode($_smarty_tpl->tpl_vars['bai_viet']->value['ma_nguoi_dang']);?>
" style="color: #AA0000;" class="username-coloured" data-original-title="" title=""><?php echo $_smarty_tpl->tpl_vars['bai_viet']->value['ho_ten'];?>
</a>&nbsp;&nbsp; <i class="icon-time"></i> <small><?php echo date('H:i d-m-Y',strtotime($_smarty_tpl->tpl_vars['bai_viet']->value['ngay_tao']));?>
</small></td>
        <td class="center"><?php echo $_smarty_tpl->tpl_vars['bai_viet']->value['so_luong_binh_luan'];?>
 Trả lời <br>
          <?php echo $_smarty_tpl->tpl_vars['bai_viet']->value['luot_xem'];?>
 Lượt xem</td>
        
        <?php $_smarty_tpl->tpl_vars['binh_luan_theo_loai'] = new Smarty_variable(binh_luan_moi_nhat($_smarty_tpl->tpl_vars['bai_viet']->value['ma'],$_smarty_tpl->tpl_vars['ma_dien_dan']->value), null, 0);?>
        	<?php if ($_smarty_tpl->tpl_vars['binh_luan_theo_loai']->value!=null){?>
        <td class="center footable-last-column"><i class="icon-user"></i> bởi <a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thanh_vien/thong_tin?ma_thanh_vien=<?php echo url_encode($_smarty_tpl->tpl_vars['binh_luan_theo_loai']->value[0]['ma_nguoi_dung']);?>
" data-original-title="" title=""><?php echo get_ho_ten($_smarty_tpl->tpl_vars['binh_luan_theo_loai']->value[0]['ma_nguoi_dung']);?>
</a> <a rel="tooltip" data-placement="right" data-original-title="Đi đến bài viết" href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/bai_viet/chi_tiet?ma=<?php echo $_smarty_tpl->tpl_vars['bai_viet']->value['ma'];?>
#<?php echo $_smarty_tpl->tpl_vars['binh_luan_theo_loai']->value[0]['ma'];?>
<?php echo $_smarty_tpl->tpl_vars['bai_viet']->value['ma'];?>
"><i class="mobile-post icon-signout"></i></a> <br>
          <i class="icon-time"></i> <small><?php echo date('H:i d-m-Y',strtotime($_smarty_tpl->tpl_vars['binh_luan_theo_loai']->value[0]['ngay_tao']));?>
</small></td>
          <?php }else{ ?>
          	<td class="center footable-last-column">Chưa có bình luận nào</td>
          	<?php }?>
      </tr>
      <?php } ?>
      </tbody>
      
    </table>
    <?php }?>
    <div class="row-fluid">
      <div class="pull-left">
     <div class="da-panel-content"> <a href="./them?loai=<?php echo $_GET['loai'];?>
" data-original-title="Tạo bài viết mới" type="button" class="btn"><i class="icon-share-alt"></i> Tạo bài viết mới</a> </div> 
      </div>
      <div class="pull-right">
        <div class="pagination pagination-small hidden-phone">
          <ul>
            <li class="active"><a data-original-title="" title=""><?php echo $_smarty_tpl->tpl_vars['tong_so_bai_viet']->value;?>
 Bài viết</a></li>
            <li><a data-original-title="" title="">Trang <strong><?php echo $_smarty_tpl->tpl_vars['trang_hien_tai']->value;?>
</strong> trên <strong><?php if ($_smarty_tpl->tpl_vars['tong_so_trang']->value==0){?> 1 <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['tong_so_trang']->value;?>
 <?php }?></strong></a></li>
            <li><?php echo $_smarty_tpl->tpl_vars['bo_nut']->value;?>
</li>
          </ul>
        </div>
        <div class="visible-phone">
          <div class="pagination pagination-small">
            <ul>
              <li><a data-original-title="" title="">Trang <strong>1</strong> trên <strong>1</strong></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="space10"></div>
    <div class="row-fluid">
      <div class="row-fluid">
      </div>
    </div>
    <!--  change the attribute "none" to "block" to display the forum permission -->
    <div style="display:block;">
      <div class="side-segment">
        <h3>Điều hành của diễn đàn</h3>
      </div>
      <p>
      <table>
      <tr>
      <td width="200px">
      	<img src="/forum/templates/images/icons/misc/star-icon.png" title="Chủ diễn đàn" />&nbsp;&nbsp;&nbsp;<a title="Chủ diễn đàn" class="text-color" href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thanh_vien/thong_tin?ma_thanh_vien=<?php echo url_encode($_smarty_tpl->tpl_vars['dien_dan']->value['ma_nguoi_tao']);?>
"><?php echo get_ho_ten($_smarty_tpl->tpl_vars['dien_dan']->value['ma_nguoi_tao']);?>
</a>
      </td>
      	<?php  $_smarty_tpl->tpl_vars['qt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['qt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['quan_tri_vien']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['qt']->key => $_smarty_tpl->tpl_vars['qt']->value){
$_smarty_tpl->tpl_vars['qt']->_loop = true;
?>
        <td>
        	<img src="/forum/upload/rankCF/<?php echo lay_icon_diem($_smarty_tpl->tpl_vars['qt']->value['ma_nguoi_dung'],$_smarty_tpl->tpl_vars['ma_dien_dan']->value);?>
" style="height:18px" />&nbsp;&nbsp;&nbsp;<a class="text-color" href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thanh_vien/thong_tin?ma_thanh_vien=<?php echo url_encode($_smarty_tpl->tpl_vars['qt']->value['ma_nguoi_dung']);?>
" title="Quản trị viên"><?php echo $_smarty_tpl->tpl_vars['qt']->value['ho_ten'];?>
</a>
        </td>
        <?php } ?>
       </tr>
       </table> 
      </p>
    </div>
    <!--  change the attribute "none" to "block" to display the forum permission --> 
    
  </main>
</div>
<?php }} ?>