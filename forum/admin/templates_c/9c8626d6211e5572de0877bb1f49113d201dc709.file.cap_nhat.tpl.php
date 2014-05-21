<?php /* Smarty version Smarty-3.1.14, created on 2014-05-10 10:22:25
         compiled from "..\templates\loai_chuyen_muc\cap_nhat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26458536dfde18a89f9-51066118%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c8626d6211e5572de0877bb1f49113d201dc709' => 
    array (
      0 => '..\\templates\\loai_chuyen_muc\\cap_nhat.tpl',
      1 => 1399715226,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26458536dfde18a89f9-51066118',
  'function' => 
  array (
    'in_loai_chuyen_muc' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'thong_bao' => 0,
    'loai_chuyen_muc' => 0,
    'ds_lcm' => 0,
    'lcm' => 0,
    'ma' => 0,
    'kitu' => 0,
    'ds_chuyen_muc' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_536dfde19910f9_68118619',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536dfde19910f9_68118619')) {function content_536dfde19910f9_68118619($_smarty_tpl) {?><div class="content-box-header">
					
	<h3>Loại bài viết [Cập nhật]</h3>
	
	<ul class="content-box-tabs">
		<li><a href="danh_sach.php">Danh sách</a></li>
		<li><a href="#" class="default-tab">Thêm mới</a></li>
	</ul>
	
	<div class="clear"></div>
	
</div> <!-- End .content-box-header -->

<div class="content-box-content">

	<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

		<div>		
			<?php echo $_smarty_tpl->tpl_vars['thong_bao']->value;?>

		</div>													

<form method="post" action="cap_nhat_sm.php" name="fthem" onsubmit="return kiemtra()">
          <fieldset>
              <p>
                <label class="admin_tieu_de">Tên<b style="color: red;"> (*)</b></label>
                <input type="hidden" name="data[ma]" value="<?php echo $_smarty_tpl->tpl_vars['loai_chuyen_muc']->value['ma'];?>
" />
                <input type="text" class="text-input medium-input" id="ten" name="data[ten]" value="<?php echo $_smarty_tpl->tpl_vars['loai_chuyen_muc']->value['ten'];?>
">
              </p>
               <p>
                <label class="admin_tieu_de">Ghi chú</label>
                <input type="text" class="text-input medium-input" id="ten" name="data[ghi_chu]" value="<?php echo $_smarty_tpl->tpl_vars['loai_chuyen_muc']->value['ghi_chu'];?>
">
              </p>
              <p>
                <label class="admin_tieu_de">Mã Loại Cha</label>
				<select class="text-input small-input"  id="ma_loai_cha" name="data[ma_loai_cha]" >
                <?php if ($_smarty_tpl->tpl_vars['loai_chuyen_muc']->value['ma_loai_cha']!=0){?>
                	<option value="<?php echo $_smarty_tpl->tpl_vars['loai_chuyen_muc']->value['ma_loai_cha'];?>
"><?php echo $_smarty_tpl->tpl_vars['loai_chuyen_muc']->value['ten_loai_cha'];?>
</option>
                <?php }?>
               		<option value="0">====Không có loại cha =====</option>
                                                                                
                    <?php if (!function_exists('smarty_template_function_in_loai_chuyen_muc')) {
    function smarty_template_function_in_loai_chuyen_muc($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['in_loai_chuyen_muc']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
                    	<?php  $_smarty_tpl->tpl_vars['lcm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lcm']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ds_lcm']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lcm']->key => $_smarty_tpl->tpl_vars['lcm']->value){
$_smarty_tpl->tpl_vars['lcm']->_loop = true;
?>
                        	<?php if ($_smarty_tpl->tpl_vars['lcm']->value['ma_loai_cha']==$_smarty_tpl->tpl_vars['ma']->value){?>
                            	<option value="<?php echo $_smarty_tpl->tpl_vars['lcm']->value['ma'];?>
"><?php echo $_smarty_tpl->tpl_vars['kitu']->value;?>
<?php echo $_smarty_tpl->tpl_vars['lcm']->value['ten'];?>
</option>
                                <?php smarty_template_function_in_loai_chuyen_muc($_smarty_tpl,array('ds_lcm'=>$_smarty_tpl->tpl_vars['ds_lcm']->value,'ma'=>$_smarty_tpl->tpl_vars['lcm']->value['ma'],'kitu'=>((string)$_smarty_tpl->tpl_vars['kitu']->value).((string)$_smarty_tpl->tpl_vars['kitu']->value)));?>

                        	<?php }?>
                        <?php } ?>
                    
                    <?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

                    
                    
                    <?php smarty_template_function_in_loai_chuyen_muc($_smarty_tpl,array('ds_lcm'=>$_smarty_tpl->tpl_vars['ds_chuyen_muc']->value,'ma'=>0,'kitu'=>'='));?>

                    
                </select>			
              </p>
              <p>
                <label class="admin_tieu_de">Thứ Tự Hiển Thị</label>
                <input type="text" name="data[thu_tu_hien_thi]" id="thu_tu_hien_thi" value="<?php echo $_smarty_tpl->tpl_vars['loai_chuyen_muc']->value['thu_tu_hien_thi'];?>
" class="text-input small-input" onkeypress="return inputNumber(event)" >
              </p>
              <p style="text-align:center">
                <input type="submit" value="Lưu Và Tiếp Tục" name="save-and-continue" class="button">
                <input type="submit" value="Lưu Và Thoát" name="save-and-end" class="button">
                <input type="button" onclick="window.location.href='danh_sach.php'" value="Không Lưu" class="button">
              </p>
            </fieldset>
          <div class="clear"></div>
        </form>
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content --><?php }} ?>