<?php /* Smarty version Smarty-3.1.14, created on 2014-07-23 01:08:06
         compiled from "D:\wamp\www\dien-dan-vn\forum\templates\elements\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:975853cea886ef88f4-32679962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e700d3fc87be79e22c42cf000bfd96ee9ee67dbb' => 
    array (
      0 => 'D:\\wamp\\www\\dien-dan-vn\\forum\\templates\\elements\\header.tpl',
      1 => 1405974228,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '975853cea886ef88f4-32679962',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dien_dan' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53cea886f217e8_42121378',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53cea886f217e8_42121378')) {function content_53cea886f217e8_42121378($_smarty_tpl) {?><header class="header" role="banner"> <!-- Header block -->
  <div class="topArea"> <!-- Logo block -->
    <div class="leftArea">
      <div id="logo" style="width: 100px; height:100px;"><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
" ><img src="/home/upload/dien_dan/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['hinh_dai_dien'];?>
" width="100" height="100"/></a></div>
      <div class="logo-transition" style="margin-left: 110px; margin-top: -90px; float:left;">
      <a class="logo" href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
"  data-original-title="" style="text-transform:uppercase;font-size:28px"><span class="text-color"><?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ten'];?>
</span></a> 
      <span class="site-info"><?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['slogan'];?>
&nbsp;<i class="icon-umbrella icon-large"></i></span>
      </div>
      <div class="clearfix"></div>
    </div>
    <!-- Main navigation block --><!-- Everything you want hidden at 940px or less, place within here -->
    <div id="nav-listen" class="nav-collapse collapse flexnav-show">
      <nav class="hidden-desktop hidden-tablet"> <!-- MOBILE Navigation block -->
        <ul class="flexnav">
          <li><a href="" data-original-title="" title=""><i class="icon-thumbs-up"></i> Register</a></li>
          <li><a href="" data-original-title="" title=""><i class="icon-question-sign"></i> FAQ</a></li>
          <li><a href="" data-original-title="" title=""><i class="icon-group"></i> The team</a></li>
          <li class="item-with-ul"> <a href="" data-original-title="" title=""><i class="icon-search"></i> Advanced search</a>
            <ul class="collapse viewdetails">
              <li><a href="" data-original-title="" title=""><i class="icon-search"></i> View unanswered posts</a></li>
              <li><a href="" data-original-title="" title=""><i class="icon-star"></i> View active topics</a></li>
            </ul>
            <a class="touch-button" href="javascript:void(0);" data-toggle="collapse" data-target=".viewdetails" data-original-title="" title=""><i class="navicon icon-sort-down"></i></a> </li>
          
          <!-- BLOCK WITH SUBMENU EXAMPLE
	
		<li class="item-with-ul">
			  <a href="#4"><i class="icon-search"></i> Submenu Group 1</a>
		     <ul class="collapse viewdetails">
                <li><a href="#5">SubLink 1</a></li>
                <li><a href="#6">SubLink 2</a></li>
                <li><a href="#7">SubLink 3</a></li>
                <li><a href="#8">SubLink 4</a></li>
             </ul>
			  <a class="touch-button" href="javascript:void(0);" data-toggle="collapse" data-target=".viewdetails"><i class="navicon icon-sort-down"></i></a>
		</li>
		
    BLOCK WITH SUBMENU EXAMPLE -->
          
        </ul>
      </nav>
      <!-- MOBILE Navigation block --> 
    </div>
  </div>
</header>
<?php }} ?>