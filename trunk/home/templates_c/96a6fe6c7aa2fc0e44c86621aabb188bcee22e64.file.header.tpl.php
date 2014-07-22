<?php /* Smarty version Smarty-3.1.14, created on 2014-07-23 01:07:55
         compiled from "D:\wamp\www\dien-dan-vn\home\templates\elements\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2157453cea87b0a23c3-90955416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96a6fe6c7aa2fc0e44c86621aabb188bcee22e64' => 
    array (
      0 => 'D:\\wamp\\www\\dien-dan-vn\\home\\templates\\elements\\header.tpl',
      1 => 1405835203,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2157453cea87b0a23c3-90955416',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'login' => 0,
    'sl_thong_bao_moi' => 0,
    'thong_bao_moi' => 0,
    'thong_bao' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53cea87b158721_23643783',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53cea87b158721_23643783')) {function content_53cea87b158721_23643783($_smarty_tpl) {?><header class="header">
            <a href="/" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Diendan.vn
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
               
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                    <li class="dropdown messages-menu">
                        <a href="/" class="dropdown-toggle header-user">
                            <i class="fa fa-home"></i> <span>Trang chủ</span>
                        </a>
                    </li>
                    <li class="dropdown messages-menu">
                        <a href="/gioi_thieu/thong_tin.html" class="dropdown-toggle header-user">
                            <i class="fa fa-info-circle"></i> <span>Về chúng tôi</span>
                        </a>
                    </li>
                    <?php if ($_smarty_tpl->tpl_vars['login']->value!=''){?>
                    	<li class="dropdown messages-menu">
                            <a href="/dien_dan/dang_ky.html" class="dropdown-toggle header-user">
                                <i class="fa fa-globe"></i> <span>Đăng ký diễn đàn</span>
                            </a>
                    	</li>
                        <li class="dropdown messages-menu">
                            <a href="/lien_he/bieu_mau.html" class="dropdown-toggle header-user">
                                <i class="fa fa-twitter"></i> <span>Liên hệ</span>
                            </a>
                    	</li>  
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                               <span class="label label-success" id="thong_bao_moi"><?php echo $_smarty_tpl->tpl_vars['sl_thong_bao_moi']->value;?>
</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Bạn có <span id="tbm"><?php echo $_smarty_tpl->tpl_vars['sl_thong_bao_moi']->value;?>
</span> tin nhắn mới</li>
                                <input type="hidden" id="sl_thong_bao_moi" value="<?php echo $_smarty_tpl->tpl_vars['sl_thong_bao_moi']->value;?>
" />
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu" id="menu">
                                     <?php if ($_smarty_tpl->tpl_vars['sl_thong_bao_moi']->value!=0){?>
                                     	<?php  $_smarty_tpl->tpl_vars['thong_bao'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['thong_bao']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['thong_bao_moi']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['thong_bao']->key => $_smarty_tpl->tpl_vars['thong_bao']->value){
$_smarty_tpl->tpl_vars['thong_bao']->_loop = true;
?>
                                            <li>
                                                <a href="/<?php echo $_smarty_tpl->tpl_vars['thong_bao']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['thong_bao']->value['domain'];?>
/thong_bao/da_doc?ma=<?php echo $_smarty_tpl->tpl_vars['thong_bao']->value['ma'];?>
" style="white-space:normal">
                                                    <div class="pull-left">
                                                        <img src="/home/upload/nguoi_dung/<?php echo $_smarty_tpl->tpl_vars['thong_bao']->value['hinh_dai_dien'];?>
" class="img-circle" alt="user image"/>
                                                    </div>
                                                    <p style="width: 200px;"><?php echo $_smarty_tpl->tpl_vars['thong_bao']->value['noi_dung'];?>
<br /><small><i class="fa fa-clock-o"></i> <?php echo time_since(time()-strtotime($_smarty_tpl->tpl_vars['thong_bao']->value['ngay_tao']));?>
</small></p>
                                                </a>
                                            </li>
                                          <?php } ?>
                                     <?php }else{ ?>   
                                     	<li>
                                            <a href="#">
                                                <div class="pull-left">
                                                   
                                                </div>
                                                <p>Không có thông báo mới nào</p>
                                            </a>
                                        </li>
                                     <?php }?>
                                    </ul>
                                </li>
                                <li class="footer"><a href="/thong_bao">Xem tất cả các thông báo</a></li>
                            </ul>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><i class="caret"></i></span>
                                <!--<span><?php echo $_smarty_tpl->tpl_vars['login']->value['ho_ten'];?>
<i class="caret"></i></span>-->
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="/home/upload/nguoi_dung/<?php echo $_smarty_tpl->tpl_vars['login']->value['hinh_dai_dien'];?>
" class="img-circle" alt="User Image" />
                                    <p style="color:white">
                                        <?php echo $_smarty_tpl->tpl_vars['login']->value['ho'];?>
 <?php echo $_smarty_tpl->tpl_vars['login']->value['ten'];?>
<br />
                                        <span style="font-size: 13px">Nghề nghiệp: <?php echo $_smarty_tpl->tpl_vars['login']->value['nghe_nghiep'];?>
</span>
                                        <small>Kể từ tháng <?php echo date('m',strtotime($_smarty_tpl->tpl_vars['login']->value['ngay_tham_gia']));?>
 năm  <?php echo date('Y',strtotime($_smarty_tpl->tpl_vars['login']->value['ngay_tham_gia']));?>
</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="/tai_khoan/<?php echo urlencode(base64_encode($_smarty_tpl->tpl_vars['login']->value['ma']));?>
-<?php echo convert_to_dot(noi_chuoi($_smarty_tpl->tpl_vars['login']->value['ho'],$_smarty_tpl->tpl_vars['login']->value['ten'],' '));?>
" class="btn btn-default"style="border: 1px solid #ddd; background-color: #fafafa">Tài khoản</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="/tai_khoan/dang_xuat.html" class="btn btn-default" style="border: 1px solid #ddd; background-color: #fafafa">Đăng xuất</a>
                                    </div>
                                </li>
                            </ul>
                        </li>  
                    <?php }else{ ?>
                    	<li class="dropdown messages-menu">
                            <a href="/tai_khoan/dang_ky.html" class="dropdown-toggle header-user">
                                <i class="fa fa-pencil"></i> <span>Đăng ký</span>
                            </a>
                        </li>
                        <li class="dropdown messages-menu">
                            <a href="/tai_khoan/dang_nhap.html" class="dropdown-toggle header-user">
                                <i class="fa fa-key"></i> <span>Đăng nhập</span>
                            </a>
                        </li>  
                    <?php }?>  
                    
                    </ul>
                </div>
            </nav>
        </header>
        
        <script type="text/javascript">
        	var delay = 2000;
			var bing = window.setInterval(checkNotification, delay);
			
			function checkNotification()
			{
				$.getJSON('../thong_bao/cap_nhat.php', {
						ma_nguoi_dung:'<?php echo $_smarty_tpl->tpl_vars['login']->value['ma'];?>
', sl_cu:document.getElementById("sl_thong_bao_moi").value
						}, function(data){
						if(data.co==1)
						{
							document.getElementById("thong_bao_moi").innerHTML = data.sl;
							document.getElementById("tbm").innerHTML = data.sl;
							document.getElementById("menu").innerHTML = '';
							document.getElementById("menu").innerHTML = data.ds;
							document.getElementById("sl_thong_bao_moi").value = data.sl;
						}
				});
			}
        </script><?php }} ?>