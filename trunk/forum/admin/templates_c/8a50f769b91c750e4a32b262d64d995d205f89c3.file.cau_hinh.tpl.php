<?php /* Smarty version Smarty-3.1.14, created on 2014-04-26 01:21:16
         compiled from "..\templates\cau_hinh\cau_hinh.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25909535ab67cb26d99-55066399%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a50f769b91c750e4a32b262d64d995d205f89c3' => 
    array (
      0 => '..\\templates\\cau_hinh\\cau_hinh.tpl',
      1 => 1398459301,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25909535ab67cb26d99-55066399',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_535ab67cc76ce4_38417657',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535ab67cc76ce4_38417657')) {function content_535ab67cc76ce4_38417657($_smarty_tpl) {?><div class="content-box-header">
					
	<h3>Cấu hình</h3>
		
	<div class="clear"></div>
	
</div> <!-- End .content-box-header -->

<div class="content-box-content">

	<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

		<div class="notification success png_bg">
			<a href="#" class="close"><img src="../templates/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
			<div>
				Thành công! Dữ liệu đã được lưu trữ.
			</div>
		</div>													

<form method="post" action="add_sm.php" name="fthem" onsubmit="return kiemtra()">
          <fieldset>
              <p>
                <label class="admin_tieu_de">Tên Công Ty<b style="color: red;"> (*)</b></label>
                <input type="text" class="text-input medium-input  " id="ten_cty" name="ten_cty">
              </p>
              <p>
                <label class="admin_tieu_de">Địa Chỉ Công Ty<b style="color: red;"> (*)</b></label>
                <input type="text" class="text-input medium-input  " id="dc_cty" name="dc_cty">
              </p>
              <p>
                <label class="admin_tieu_de">Điện Thoại Công Ty<b style="color: red;"> (*)</b></label>
                <input type="text" class="text-input medium-input  " id="dt_cty" name="dt_cty">
              </p>
              <p>
                <label class="admin_tieu_de">Giao Diện Website</label>
                <select name="dropdown" class="small-input">
                  <option value="option0">Ngẫu Nhiên</option>
                  <option value="option1">Cam</option>
                  <option value="option2">Nâu</option>
                  <option value="option3">Xám</option>
                  <option value="option4">Tím</option>
                  <option value="option4">Xanh lá</option>
                  <option value="option4">Xanh Da trời</option>
                </select>
              </p>
              <p>
                <label class="admin_tieu_de">Nội Dung Footer</label>
				<textarea class="text-input textarea" id="textarea" name="textfield" cols="50" rows="15"></textarea>
              </p>
              <p style="text-align:center">
                <input type="submit" value="Lưu và Tiếp Tục" class="button">
              </p>
            </fieldset>
          <div class="clear"></div>
        </form>
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content --><?php }} ?>