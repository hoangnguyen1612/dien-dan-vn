<?php /* Smarty version Smarty-3.1.14, created on 2014-05-23 08:25:25
         compiled from "..\templates\lien_he\danh_sach.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16199535ac407cc2343-17381886%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99afb17da871413cef9d2ce7a3c9958dfd873d6a' => 
    array (
      0 => '..\\templates\\lien_he\\danh_sach.tpl',
      1 => 1400769847,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16199535ac407cc2343-17381886',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_535ac407d8d575_28965781',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535ac407d8d575_28965781')) {function content_535ac407d8d575_28965781($_smarty_tpl) {?><div class="content-box-header">
  <h3>Liên hệ [Danh sách]</h3>
  <ul class="content-box-tabs">
    <li><a href="#" class="default-tab">Danh sách</a></li>
    <li><a href="thong_tin_lien_he.php">Thông tin liên hệ</a></li>
  </ul>
  <div class="clear"></div>
</div>
<!-- End .content-box-header -->

<div class="content-box-content">
  <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
    
    <div class="notification success png_bg">
			<a href="#" class="close"><img src="../templates/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
			<div>
				Thành công! Dữ liệu đã được lưu trữ.
			</div>
		</div>
    <form method="get" action="list.php" name="fSearch" id="fSearch">
      Từ Khóa
      <input type="text" name="tu_khoa" class="text-input small-input" value="">
      <input class="button" type="submit" value="Tìm Kiếm">
      <input class="button" type="button" value="Tất cả" onclick="window.location.href='danh_sach.php'">
    </form>
    <form action="delete_all.php" method="post">
      <table class="table">
        <thead>
          <tr>
            <th><input type="checkbox" class="check-all" id="phatlhjs-check-all"></th>
            <th class="admin_tieu_de">Mã</th>
            <th style="text-align:left" class="admin_tieu_de">Email</th>
            <th style="text-align:left" class="admin_tieu_de">Tiêu Đề</th>
            <th style="text-align:left" class="admin_tieu_de">Gửi Đến</th>
            <th class="admin_tieu_de">Ngày Tạo</th>
            <th class="admin_tieu_de">Trạng Thái</th>
            <th class="admin_tieu_de">Tác Vụ</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <td colspan="8"><div class="bulk-actions align-left"><img src="../templates/images/arrow_ltr.png" />
                <input name="xoa_muc_chon" class="button" type="submit" value="Xóa Các Mục Đã Chọn" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')">
              </div>
             <div class="pagination">
					 <a class="number disable" title="Trang đầu">&lt;&lt;</a> <a class="number disable" title="Về trang trước">&lt;</a> <a class="number current"><b>1</b></a> <a class="number" href="/admin/thanh_vien/list.php?page=2" title="Trang 2">2</a> <a class="number" href="/admin/thanh_vien/list.php?page=2" title="Dến trang sau">&gt;</a> <a class="number" href="/admin/thanh_vien/list.php?page=2" title="Trang cuối">&gt;&gt;</a>                   </div>
              <div class="clear"></div></td>
          </tr>
        </tfoot>
        <tbody>
        
    
        <tr class="alt-row">
          <td><input name="item[]" type="checkbox" value="3"></td>
          <td class="admin_tieu_de">1</td>
          <td class="admin_tieu_de" style="text-align:left">lamquochung1992@gmail.com</td>
          <td class="admin_tieu_de" style="text-align:left">Báo cáo sai phạm trong việc đăng bài viết</td>
          <td class="admin_tieu_de" style="text-align:left">Hutech</td>
          <td class="admin_tieu_de">26-4-2014</td>
          <td><a href="trang_thai.php?ma=1" title="Hiển Thị"><img src="../templates/images/trang_thai_1.png" width="20" height="20"></a></td>
          <td><!-- Icons --> 
            <a title="View" href="view.php?ma=3"><img width="16" alt="View" src="../templates/images/search.png"></a> <a href="delete.php?ma=3" onclick="return confirm('Bạn có chắc chắn muốn xóa mã 3 không ?')" title="Delete"><img style="cursor:pointer" alt="Xóa" src="../templates/images/icons/cross.png"> </a></td>
        </tr>
      
          </tbody>
        
      </table>
    </form>
  </div>
  <!-- End #tab1 --> 
  
</div>
<!-- End .content-box-content --><?php }} ?>