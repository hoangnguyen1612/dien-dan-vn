<?php /* Smarty version Smarty-3.1.14, created on 2014-04-25 23:56:56
         compiled from "..\templates\lien_he\thong_tin_lien_he.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2334535ac1aa3da5f9-25982682%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d7367dfbc85b8064d5a13c21b40d424570bfb3e' => 
    array (
      0 => '..\\templates\\lien_he\\thong_tin_lien_he.tpl',
      1 => 1398459247,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2334535ac1aa3da5f9-25982682',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_535ac1aa4ff5b5_63463150',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535ac1aa4ff5b5_63463150')) {function content_535ac1aa4ff5b5_63463150($_smarty_tpl) {?><div class="content-box-header">
					
	<h3>Liên hệ [Thông tin liên hệ]</h3>
	
	<ul class="content-box-tabs">
		<li><a href="danh_sach.php">Danh sách</a></li>
		<li><a href="#" class="default-tab">Thông tin liên hệ</a></li>
	</ul>
	
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
              <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
              <p>
                <label class="admin_tieu_de">Hoành Độ Google Map</label>
                <input class="text-input medium-input datepicker" type="text" id="hoanh_do" name="hoanh_do" value="10.82132446044144">
              </p>              
              <p>
                <label class="admin_tieu_de">Tung Độ Google Map</label>
                <input name="tung_do" type="text" class="text-input medium-input datepicker" id="tung_do" value="106.70238375663757">
              </p>
              <p>
                <label class="admin_tieu_de">Nội Dung Chi Tiết</label>
                <textarea class="text-input textarea" id="noi_dung_chi_tiet" name="noi_dung_chi_tiet" cols="79" rows="15"></textarea>
              </p>
              <p align="center">
                <input class="button" type="submit" value="Cập Nhật" name="save" id="save">
              </p>
            </fieldset>
          <div class="clear"></div>
        </form>
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content --><?php }} ?>