<?php /* Smarty version Smarty-3.1.14, created on 2014-05-23 09:08:15
         compiled from "..\templates\loai_chuyen_muc\danh_sach.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2821536dfdaaa16c60-44479414%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6233c13f906d2fe1680444fbbd09b2b95d85631f' => 
    array (
      0 => '..\\templates\\loai_chuyen_muc\\danh_sach.tpl',
      1 => 1400836093,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2821536dfdaaa16c60-44479414',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_536dfdaaad03e0_75361552',
  'variables' => 
  array (
    'thong_bao' => 0,
    'bo_nut' => 0,
    'ds_chuyen_muc' => 0,
    'chuyen_muc' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536dfdaaad03e0_75361552')) {function content_536dfdaaad03e0_75361552($_smarty_tpl) {?><div class="content-box-header">
					
	<h3>Loại bài viết [Danh sách]</h3>
	
	<ul class="content-box-tabs">
		<li><a href="#" class="default-tab">Danh sách</a></li>
		<li><a href="them.php">Thêm mới</a></li>
	</ul>
	
	<div class="clear"></div>
	
</div> <!-- End .content-box-header -->

<div class="content-box-content">

	<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

		<div>
			<?php echo $_smarty_tpl->tpl_vars['thong_bao']->value;?>

		</div>	
														
		<form method="get" action="danh_sach.php" name="fSearch" id="fSearch">
          Từ Khóa
          <input type="text" name="tu_khoa" class="text-input small-input" value="">
          <input class="button" type="submit" value="Tìm Kiếm">
          <input class="button" type="button" value="Tất cả" onclick="window.location.href='danh_sach.php'">
        </form>
		<form action="xoa_nhieu.php" method="post">
		  <table class="table">
			<thead>
              <tr>
                <th><input type="checkbox" class="check-all"></th>
                <th >Mã</th>
                <th >Tên</th>
                <th >Tên Loại Cha</th>
                <th >Thứ Tự Hiển Thị</th>
                <th >Riêng tư</th>
                <th >Tác Vụ</th>
              </tr>
            </thead>
			<tfoot>
			  <tr>
				<td colspan="8"><div class="bulk-actions align-left"><img src="/forum/admin/templates/images/arrow_ltr.png" /> <input name="xoa_muc_chon" class="button" type="submit" value="Xóa Các Mục Đã Chọn" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')"></div>
				  <div class="pagination">
                  <?php echo $_smarty_tpl->tpl_vars['bo_nut']->value;?>

				</div></td>
			  </tr>
			</tfoot>
			<tbody>       
               <?php  $_smarty_tpl->tpl_vars['chuyen_muc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['chuyen_muc']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ds_chuyen_muc']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['chuyen_muc']->key => $_smarty_tpl->tpl_vars['chuyen_muc']->value){
$_smarty_tpl->tpl_vars['chuyen_muc']->_loop = true;
?>   
                <tr>
                <td><input name="data[<?php echo $_smarty_tpl->tpl_vars['chuyen_muc']->value['ma'];?>
]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['chuyen_muc']->value['ma'];?>
"></td>
                <td ><?php echo $_smarty_tpl->tpl_vars['chuyen_muc']->value['ma'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['chuyen_muc']->value['ten'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['chuyen_muc']->value['ten_loai_cha'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['chuyen_muc']->value['thu_tu_hien_thi'];?>
</td>
                <td ><a href="cap_nhat_trang_thai.php?ma=<?php echo $_smarty_tpl->tpl_vars['chuyen_muc']->value['ma'];?>
" title="Hiển Thị"><img src="/forum/admin/templates/images/trang_thai_<?php echo $_smarty_tpl->tpl_vars['chuyen_muc']->value['rieng_tu'];?>
.png" width="20" height="20"> </a></td>
                <td><!-- Icons --> 
                 <a href="cap_nhat.php?ma=<?php echo $_smarty_tpl->tpl_vars['chuyen_muc']->value['ma'];?>
" title="Edit"><img alt="Edit" src="/forum/admin/templates/images/icons/pencil.png"></a>
                 
                 <a href="xoa.php?ma=<?php echo $_smarty_tpl->tpl_vars['chuyen_muc']->value['ma'];?>
" onclick="return confirm('Bạn có chắc chắn muốn xóa <?php echo $_smarty_tpl->tpl_vars['chuyen_muc']->value['ten'];?>
 không ?')" title="Delete"><img style="cursor:pointer" alt="Xóa" src="/forum/admin/templates/images/icons/cross.png"> </a></td>
              </tr>      
 				<?php } ?> 
              
                                            
                  </tbody>
		  </table>
		</form>	
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content --><?php }} ?>