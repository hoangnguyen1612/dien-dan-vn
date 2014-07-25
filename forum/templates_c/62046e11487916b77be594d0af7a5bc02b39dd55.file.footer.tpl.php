<?php /* Smarty version Smarty-3.1.14, created on 2014-07-25 20:10:12
         compiled from "D:\wamp\www\dien-dan-vn\forum\templates\elements\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:383953cea886f343c6-36007190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62046e11487916b77be594d0af7a5bc02b39dd55' => 
    array (
      0 => 'D:\\wamp\\www\\dien-dan-vn\\forum\\templates\\elements\\footer.tpl',
      1 => 1406293807,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '383953cea886f343c6-36007190',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53cea88701a3f9_58781863',
  'variables' => 
  array (
    'dien_dan' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53cea88701a3f9_58781863')) {function content_53cea88701a3f9_58781863($_smarty_tpl) {?><footer role="contentinfo"> <!-- Footer block -->
            
            <div id="footerContent"> <!-- About us , links, twitter, recent posts layout -->
              <div class="row-fluid">
              
                <div class="span3">
                  <div class="side-segment">                
                    <h3>Yêu thích</h3>
                  </div>
                  <ul class="navList">
                    <li><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/" data-original-title="" title=""><i class="icon-home"></i> Trang chủ</a></li>
               
                    <li><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thanh_vien/danh_sach" data-original-title="" title=""><i class="icon-group"></i> Thành viên</a></li>
                    <li><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/phan_hoi/them" data-original-title="" title=""><i class="icon-comments"></i> Phản hồi</a></li>
                   
                  </ul>
                </div>
                <div class="span3">
                  <div class="side-segment">
                    <h3>Liên hệ</h3>
                  </div>
                  <!--<p>Địa chỉ : 475 Điện Biên Phủ , phường 25 , Quận Bình Thạnh , TP.HCM</p>
                  <p>Số điện thoại:098765432.</p>
                  <p>Fax:09-664-657-87.</p>-->
                 <p class="logo" style="text-transform:capitalize; font-size: 14px;"><span>Diễn đàn <?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ten'];?>
</span></p>
                </div>
              </div>
            </div>
            <!-- About us , links, twitter, recent posts layout -->
            
            <div class="row-fluid bottomLinks"> <!-- Credit, links and copyright block do not remove please -->
              <div class="pull-left"> <small><a href="#" title="" target="_blank" data-original-title="Forum Software © phpBB® Group"><i aria-hidden="true" class="icon-moon-forphp"></i></a> <i aria-hidden="true" class="icon-moon-bootstrap"></i> <i aria-hidden="true" class="icon-moon-html5"></i> <i aria-hidden="true" class="icon-moon-css3"></i> <i aria-hidden="true" class="icon-moon-forjq"></i> <i aria-hidden="true" class="icon-moon-less_c"></i> <a href="#" title="" target="_blank" data-original-title="Conform to W3C HTML5 Standard"> <i aria-hidden="true" class="icon-moon-w3c"></i></a> </small> </div>
              <div class="pull-right"> <small>Copyright with&nbsp;<i class="icon-heart rosso"></i> By<a href="http://www.sitesplat.com/" title="" target="_blank" data-original-title="SiteSplat.com">DienDanVN</a> on <i class="icon-moon-earth earth"></i>&nbsp; &copy; DienDanVN 2014</small> </div>
            </div>
            <!-- Credit, links and copyright block do not remove please --> 
            
          </footer><?php }} ?>