<?php /* Smarty version Smarty-3.1.14, created on 2014-07-23 01:08:06
         compiled from "D:\wamp\www\dien-dan-vn\forum\templates\elements\switcher.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1493753cea886ecf042-42720576%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5602aa906bcf0d9f2b51697f0995fdcde20d417' => 
    array (
      0 => 'D:\\wamp\\www\\dien-dan-vn\\forum\\templates\\elements\\switcher.tpl',
      1 => 1403315909,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1493753cea886ecf042-42720576',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'thanh_vien' => 0,
    'dien_dan' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53cea886eef146_40403647',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53cea886eef146_40403647')) {function content_53cea886eef146_40403647($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['thanh_vien']->value!=''&&$_smarty_tpl->tpl_vars['thanh_vien']->value['loai_thanh_vien']==0){?>
<div id="switcher-icon" ><a href="#toggle" title="" data-original-title=""><i class="icon-cogs"></i></a></div>
<div style="display: none;" class="theme-switcher" id="slickbox">
  <ul class="subnav" id="nav">
		<li class="color-1"><a href="#" onClick="changeColor('color-1');" data-color="./styles/BBOOTS/theme/style1.css" title="" data-original-title="">Electric Blue</a></li>
		<li class="color-2"><a href="#" onClick="changeColor('color-2')" data-color="./styles/BBOOTS/theme/style2.css" title="" data-original-title="">Orangy</a></li>
		<li class="color-3"><a href="#" onClick="changeColor('hong')" data-color="./styles/BBOOTS/theme/style3.css" title="" data-original-title="">Flashy Green</a></li>
		<li class="color-4"><a href="#" onClick="changeColor('xanhla')" data-color="./styles/BBOOTS/theme/style4.css" title="" data-original-title="">Indian Red</a></li>
		
		<li class="color-5"><a href="#" onClick="changeColor('xanhden')" data-color="./styles/BBOOTS/theme/style5.css" title="" data-original-title="">Blue pica</a></li>
		<li class="color-6"><a href="#" onClick="changeColor('xanhduongnhat')" data-color="./styles/BBOOTS/theme/style6.css" title="" data-original-title="">SeaMan Celest</a></li>
		<li class="color-7"><a href="#" onClick="changeColor('donhat')" data-color="./styles/BBOOTS/theme/style7.css" title="" data-original-title="">Indian Peach</a></li>
		<li class="color-8"><a href="#" onClick="changeColor('tim')" data-color="./styles/BBOOTS/theme/style8.css" title="" data-original-title="">Royal Burgandy</a></li>
		
		<li class="color-9"><a href="#" onClick="changeColor('vangcam')" data-color="./styles/BBOOTS/theme/style9.css" title="" data-original-title="">Terra Bruciata</a></li>
		<li class="color-10"><a href="#" onClick="changeColor('xanhduongdam')" data-color="./styles/BBOOTS/theme/style10.css" title="" data-original-title="">Into TheNight Blue</a></li>	
		<li class="color-11"><a href="#" onClick="changeColor('xam')" data-color="./styles/BBOOTS/theme/style11.css" title="" data-original-title="">Creamy Day</a></li>
		<li class="color-12"><a href="#" onClick="changeColor('xanhladam')" data-color="./styles/BBOOTS/theme/style12.css" title="" data-original-title="">Light Emerald</a></li>
		
		<li class="color-13"><a href="#" onClick="changeColor('vang')" data-color="./styles/BBOOTS/theme/style13.css" title="" data-original-title="">Simply Goldish</a></li>
		<li class="color-14"><a href="#" onClick="changeColor('xanhduong')" data-color="./styles/BBOOTS/theme/style14.css" title="" data-original-title="">Galactic Blue</a></li>
		<li class="color-15"><a href="#" onClick="changeColor('xanhxam')" data-color="./styles/BBOOTS/theme/style15.css" title="" data-original-title="">Flat Moderny</a></li>
		<li class="color-16"><a href="#" onClick="changeColor('xanhnuocbien')" data-color="./styles/BBOOTS/theme/style16.css" title="" data-original-title="">Blue Stone</a></li>
		
		<li class="color-17"><a href="#" onClick="changeColor('do')" data-color="./styles/BBOOTS/theme/style17.css" title="" data-original-title="">Blody Redish</a></li>
		<li class="color-18"><a href="#" onClick="changeColor('nau')" data-color="./styles/BBOOTS/theme/style18.css" title="" data-original-title="">Burned Oak</a></li>
		<li class="color-19"><a href="#" onClick="changeColor('hongnhat')" data-color="./styles/BBOOTS/theme/style19.css" title="" data-original-title="">Haway Candy</a></li>
		<li class="color-20"><a href="#" onClick="changeColor('xamnhat')" data-color="./styles/BBOOTS/theme/style20.css" title="" data-original-title="">Eternal Gray</a></li>
        <a onclick="doimau()" class="btn" > Đổi màu</a>
	</ul>
     
    <input type="hidden" name="css" id="css" value="color-1">

        <script>
		function changeColor(color)
		{
			$("#color").attr("href", "/forum/templates/css/colors/"+color+".css");
			$("#css").val(color);
		}
		function doimau(){
			window.location.href = "/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/cau_hinh/mau_sac?mau_sac="+ document.getElementById("css").value;
			
		}
</script>
</div>
<?php }?><?php }} ?>