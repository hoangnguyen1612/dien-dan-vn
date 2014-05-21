<?php /* Smarty version Smarty-3.1.14, created on 2014-04-25 20:57:23
         compiled from "..\templates\bai_viet\danh_sach.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17096535abebee530f6-57230229%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eced0136f1b67a72e39942374d763569344f6fc4' => 
    array (
      0 => '..\\templates\\bai_viet\\danh_sach.tpl',
      1 => 1398459247,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17096535abebee530f6-57230229',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_535abebef0e928_55487654',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535abebef0e928_55487654')) {function content_535abebef0e928_55487654($_smarty_tpl) {?><div class="content-box-header">
					
	<h3>Bài viết [Danh sách]</h3>
	
	<ul class="content-box-tabs">
		<li><a href="#" class="default-tab">Danh sách</a></li>
		<li><a href="them.php">Thêm mới</a></li>
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
                <th><input class="check-all" type="checkbox"></th>
                <th>Mã</th>
                <th>Tiêu Đề</th>
                <th>Ngày Tạo</th>
                <th>Số Lần Xem</th>
                <th>Tên chuyên mục</th>
                <th>Trạng Thái</th>
                <th>Thao Tác</th>
              </tr>
            </thead>
		  <tfoot>
			  <tr>
				<td colspan="8"><div class="bulk-actions align-left"><img src="../templates/images/arrow_ltr.png" /> <input name="xoa_muc_chon" class="button" type="submit" value="Xóa Các Mục Đã Chọn" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')"></div>
				 <div class="pagination">
					 <a class="number disable" title="Trang đầu">&lt;&lt;</a> <a class="number disable" title="Về trang trước">&lt;</a> <a class="number current"><b>1</b></a> <a class="number" href="/admin/thanh_vien/list.php?page=2" title="Trang 2">2</a> <a class="number" href="/admin/thanh_vien/list.php?page=2" title="Dến trang sau">&gt;</a> <a class="number" href="/admin/thanh_vien/list.php?page=2" title="Trang cuối">&gt;&gt;</a>                   </div>
				  <div class="clear"></div></td>
			  </tr>
			</tfoot>
<tbody>
			
                            <tr class="alt-row">
                <td><input name="item[]" type="checkbox" value="16"></td>
                <td>1</td>
                <td>Lập trình PHP</td>
                <td style="text-align:left">25-3-2014</td>
                <td style="text-align:center">100</td>
                 <td style="text-align:center">Công nghệ phần mềm</td>
                <td style="text-align:center"><a href="trang_thai.php?ma=16" title="Hiển Thị"><img src="../templates/images/trang_thai_1.png" width="20" height="20"></a></td>
               
                <td><!-- Icons --> 
                  <a href="update.php?ma=16" title="Edit"><img src="../templates/images/icons/pencil.png" alt="Edit"></a>
                  <a href="delete.php?ma=16" onclick="return confirm('Bạn có chắc chắn muốn xóa mã 16 không ?')" title="Delete"><img src="../templates/images/icons/cross.png" alt="Delete"></a>
                </td>
              </tr>
                                    
                          </tbody>			
		  </table>
		</form>	
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content --><?php }} ?>