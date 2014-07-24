<?php /* Smarty version Smarty-3.1.14, created on 2014-07-24 14:06:46
         compiled from "..\templates\trang_chu\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2097753d0b0860e9585-33966653%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5b92dd942a14706a2827e08842ff3efd9d8d3ed' => 
    array (
      0 => '..\\templates\\trang_chu\\index.tpl',
      1 => 1405667611,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2097753d0b0860e9585-33966653',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ds' => 0,
    'dien_dan' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53d0b0862cfd17_42486614',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53d0b0862cfd17_42486614')) {function content_53d0b0862cfd17_42486614($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\wamp\\www\\dien-dan-vn\\libraries\\smarty\\plugins\\modifier.truncate.php';
?><!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

       <section class="content">

<div class="row">
<div class="col-xs-12 connectedSortable">

</div><!-- /.col -->
</div>

	<div class="row">
<!-- Left col -->
<section class="col-lg-12 connectedSortable"> 
<!-- Box (with bar chart) -->
<div class="box" id="loading-example">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-flag fa-index"></i>Tất cả các diễn đàn</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="row">
        <div class="col-sm-12 custom-padding">
        <div style="width:90%; margin:auto" id="post">
           <?php  $_smarty_tpl->tpl_vars['dien_dan'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dien_dan']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ds']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dien_dan']->key => $_smarty_tpl->tpl_vars['dien_dan']->value){
$_smarty_tpl->tpl_vars['dien_dan']->_loop = true;
?>
           	<div class="forum">
           	<center><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
"><img data-action="swing"  src="/home/upload/dien_dan/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['hinh_dai_dien'];?>
" class="img"/></a></center>
           	 <p class="header"><span class="title"><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['dien_dan']->value['ten'],24);?>
</a></span><br />
             <span class="user"><i class="fa fa-users"></i> <?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['so_luong_thanh_vien'];?>
 thành viên</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="time"><i class="fa  fa-thumbs-o-up"></i>&nbsp;Đánh giá:&nbsp;<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['feedback'];?>
%</span>
             </p>
           </div>
           <?php } ?>
           </div>
        </div>
        <div id="load-more" style="display:none; margin:auto; width: 100px;"><img src="/home/templates/images/loading.gif" /></div>
        <input type="hidden" id="page" value="<?php echo count($_smarty_tpl->tpl_vars['ds']->value);?>
" />
        <input type="hidden" id="done" value="0" /> 
        </div><!-- /.row - inside box -->
    </div><!-- /.box-body -->
</div><!-- /.box -->

</section><!-- /.Left col -->
</div>
<script>
$(".forum").hover(function(){
    $(this).find(".title").addClass('animated ' + 'pulse');
});
$(".forum").bind("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd",function(){
    $(this).find(".title").removeClass('animated ' + 'pulse');
});
</script>

</section>
 </aside>

<script>
$(window).scroll(function(){
	if($(window).scrollTop() == $(document).height() - $(window).height())
	{
		if($("#done").val() == 0)
		{
			$("#load-more").show();
			$.ajax({
				type: "POST",
				url: "/home/trang_chu/get_data.php",
				data: {
					'page':document.getElementById("page").value
				},
				success: function(html)
				{
				if(html)
				{
					$("#load-more").hide();
					$("#post").append(html);
					var page = $("#page").val();
					page = parseInt(page);
					page+=10;
					$("#page").val(page);
				}
				else
				{
					$("#done").val(1);
					$("#load-more").hide();
				}
			}
			});
		}
	}
});
</script><?php }} ?>