<?php /* Smarty version Smarty-3.1.14, created on 2014-07-23 01:08:12
         compiled from "..\templates\thanh_vien\thong_tin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1761253cea88c1af304-82775241%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6960c7358fe42787d27d6e49e5136ec197e6241' => 
    array (
      0 => '..\\templates\\thanh_vien\\thong_tin.tpl',
      1 => 1405390561,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1761253cea88c1af304-82775241',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nguoi_dung' => 0,
    'thanh_vien_dien_dan' => 0,
    'quyen' => 0,
    'ma_dien_dan' => 0,
    'cap_bac' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53cea88c266c41_12915329',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53cea88c266c41_12915329')) {function content_53cea88c266c41_12915329($_smarty_tpl) {?><div id="page-body">
  <main role="main">
    <div class="row-fluid">
      <div class="side-segment">
        <h3>Xem thông tin cá nhân</h3>
      </div>
      <form method="post" action="./memberlist.php?mode=group" id="viewprofile">
        <div class="well">
          <div class="row-fluid">
            <div class="span2">
              <div class="space10"></div>
              <ul class="unstyled">
                <li><span class="imageframe imageframe-glow avatar-frame"> <img src="/home/upload/nguoi_dung/<?php if ($_smarty_tpl->tpl_vars['nguoi_dung']->value['hinh_dai_dien']!=null){?><?php echo $_smarty_tpl->tpl_vars['nguoi_dung']->value['hinh_dai_dien'];?>
<?php }elseif($_smarty_tpl->tpl_vars['nguoi_dung']->value['gioi_tinh']==0){?>no_avatar_male.jpg<?php }else{ ?>no_avatar_female.jpg<?php }?>" width="100" height="100" title="Random avatar" alt="Random avatar"></span></li>
                <li></li>
                <li> </li>
                <!--<li> <a href="./ucp.php?i=zebra&amp;add=Mimi" data-original-title="" title=""><strong>Thêm bạn</strong></a>-->
              </ul>
            </div>
            <div class="span9">
              <div class="row-fluid">
                <div class="span7">
                  <h4>Thông tin cá nhân</h4>
                  <div class="menubar links primary">
                    <ul class="reset-list">
                      <li><i class="icon-user"></i> Tên: <?php echo $_smarty_tpl->tpl_vars['nguoi_dung']->value['ho'];?>
 <?php echo $_smarty_tpl->tpl_vars['nguoi_dung']->value['ten'];?>
</li>
                      <li><i class="icon-map-marker"></i> &nbsp;Địa chỉ:  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['nguoi_dung']->value['dia_chi'])===null||$tmp==='' ? 'chưa có' : $tmp);?>
<i class="custom-none icon-large"></i></li>
                      <li><i class="icon-gift"></i> Tuổi: <?php echo date('Y')-date('Y',strtotime($_smarty_tpl->tpl_vars['nguoi_dung']->value['ngay_sinh']));?>
<i class="custom-none icon-large"></i></li>
                      <!--<li><i class="icon-briefcase"></i> Nghề nghiệp: Sinh Viên <i class="custom-none icon-large"></i></li>-->
                    </ul>
                  </div>
                </div>
                <div class="span5"> 
                  <!-- Bio -->
                
                  <!-- // Bio END --> 
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="row-fluid">
          <div class="side-segment">
            <h3>Thống kê cá nhân</h3>
          </div>
          <div class="well">
            <div class="widget-content">
              <ul class="recent-activity">
              	<li class="item"> <span class="icon red"><i class="icon16 icon-group"></i></span>
                  <div class="text">Quyền: </div>
                  <span class="recent-detail"><?php echo $_smarty_tpl->tpl_vars['quyen']->value[$_smarty_tpl->tpl_vars['thanh_vien_dien_dan']->value['loai_thanh_vien']];?>
</span> </li>
                <li class="item"> <span class="icon red"><i class="icon16 icon-flag"></i></span>
                  <div class="text">Gia nhập: </div>
                  <span class="recent-detail"><?php echo date('d-m-Y',strtotime($_smarty_tpl->tpl_vars['thanh_vien_dien_dan']->value['ngay_gia_nhap']));?>
</span> </li>
                <!--<li class="item"> <span class="icon yellow"><i class="icon16 icon-eye-open"></i></span> <span class="text">Lần cuối đăng nhập: </span> <span class="recent-detail"> 03-04-2014, 09:07</span> </li>-->
                <li class="item"> <span class="icon blue"><i class="icon16 icon-comments"></i></span> <span class="text">Tổng số bài viết: </span> <span class="recent-detail"><?php echo dem_bai_viet_thanh_vien($_smarty_tpl->tpl_vars['ma_dien_dan']->value,$_smarty_tpl->tpl_vars['thanh_vien_dien_dan']->value['ma_nguoi_dung']);?>
<strong><a href="./search.php?author_id=104&amp;sr=posts" data-original-title="" title=""></a></strong></span> </li>
                 <li class="item"> <span class="icon blue"><i class="icon16 icon-bar-chart"></i></span> <span class="text">Điểm số: </span> <span class="recent-detail"><img src="/forum/upload/rankCF/<?php echo $_smarty_tpl->tpl_vars['cap_bac']->value;?>
"/>    <?php echo $_smarty_tpl->tpl_vars['thanh_vien_dien_dan']->value['diem_so'];?>
<strong><a href="./search.php?author_id=104&amp;sr=posts" data-original-title="" title=""></a></strong></span> </li>
                <!--
                <li class="item"> <span class="icon green"><i class="icon16 icon-refresh"></i></span> <span class="text">Chuyên mục yêu thích nhất: <a href="./viewforum.php?f=2" data-original-title="" title="">Công nghệ thông tin</a> </span> <span class="recent-detail">(20 Bài viết)</span> </li>
                <li class="item"> <span class="icon green"><i class="icon16 icon-refresh"></i></span> <span class="text">Bài viết yêu thích nhất: <a href="./viewtopic.php?t=15" data-original-title="" title="">Lập trình căn bản PHP</a> </span> <span class="recent-detail">(10 Bài viết)</span> </li>-->
              </ul>
            </div>
          </div>
        </div>
      </form>
    </div>
  </main>
</div>



<?php }} ?>