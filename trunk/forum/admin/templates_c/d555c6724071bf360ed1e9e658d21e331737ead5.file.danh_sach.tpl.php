<?php /* Smarty version Smarty-3.1.14, created on 2014-04-25 19:37:58
         compiled from "..\templates\tuyen_dung\danh_sach.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27310535ab996a17037-73933651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd555c6724071bf360ed1e9e658d21e331737ead5' => 
    array (
      0 => '..\\templates\\tuyen_dung\\danh_sach.tpl',
      1 => 1377748034,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27310535ab996a17037-73933651',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_535ab996b30473_99345018',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_535ab996b30473_99345018')) {function content_535ab996b30473_99345018($_smarty_tpl) {?><div class="content-box-header">
					
	<h3>Tuyển dụng [Danh sách]</h3>
	
	<ul class="content-box-tabs">
		<li><a href="#" class="default-tab">Danh sách</a></li>
		<li><a href="thong_tin_tuyen_dung.php">Thông tin tuyển dụng</a></li>
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
                <th><input type="checkbox" class="check-all"></th>
                <th >Mã</th>
                <th >Họ Tên</th>
                <th >Ngày Sinh</th>
                <th >Giới Tính</th>
                <th >Vị Trí Ứng Tuyển</th>
                <th >Trạng Thái</th>
                <th >Tác Vụ</th>
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
                <td><input name="item[]" type="checkbox" value="1"></td>
                <td >1</td>
                <td >aaaaaaaaaaaaaaa</td>
                <td >2011-10-10</td>
                <td><a href="gioi_tinh.php?ma=1"><img src="../templates/images/gioi_tinh_1.png" width="20" height="20"></a></td>
                <td  style="text-align:left">ffffffffffff</td>
                <td><a href="trang_thai.php?ma=1" title="Hiển Thị"><img src="../templates/images/trang_thai_0.png" width="20" height="20"></a></td>
                <td><!-- Icons --> 
                  <a href="view.php?ma=1" title="Edit"><img alt="Edit" src="../templates/images/search.png" width="16"></a>
                  <a href="delete.php?ma=1" onclick="return confirm('Bạn có chắc chắn muốn xóa mã 1 không ?')" title="Delete"><img style="cursor:pointer" alt="Xóa" src="../templates/images/icons/cross.png"> </a></td>
              </tr>
                            <tr>
                <td><input name="item[]" type="checkbox" value="2"></td>
                <td >2</td>
                <td >a</td>
                <td >2011-10-10</td>
                <td><a href="gioi_tinh.php?ma=2"><img src="../templates/images/gioi_tinh_1.png" width="20" height="20"></a></td>
                <td  style="text-align:left">ffffffffffff</td>
                <td><a href="trang_thai.php?ma=2" title="Hiển Thị"><img src="../templates/images/trang_thai_1.png" width="20" height="20"></a></td>
                <td><!-- Icons --> 
                  <a href="view.php?ma=2" title="Edit"><img alt="Edit" src="../templates/images/search.png" width="16"></a>
                  <a href="delete.php?ma=2" onclick="return confirm('Bạn có chắc chắn muốn xóa mã 2 không ?')" title="Delete"><img style="cursor:pointer" alt="Xóa" src="../templates/images/icons/cross.png"> </a></td>
              </tr>
                            <tr class="alt-row">
                <td><input name="item[]" type="checkbox" value="8"></td>
                <td >8</td>
                <td >Hoàng Thị Phương Thảo</td>
                <td >2011-10-10</td>
                <td><a href="gioi_tinh.php?ma=8"><img src="../templates/images/gioi_tinh_1.png" width="20" height="20"></a></td>
                <td  style="text-align:left">Kỹ thuật phần mềm, lập trình PHP &amp; mySQL</td>
                <td><a href="trang_thai.php?ma=8" title="Hiển Thị"><img src="../templates/images/trang_thai_1.png" width="20" height="20"></a></td>
                <td><!-- Icons --> 
                  <a href="view.php?ma=8" title="Edit"><img alt="Edit" src="../templates/images/search.png" width="16"></a>
                  <a href="delete.php?ma=8" onclick="return confirm('Bạn có chắc chắn muốn xóa mã 8 không ?')" title="Delete"><img style="cursor:pointer" alt="Xóa" src="../templates/images/icons/cross.png"> </a></td>
              </tr>
                            <tr>
                <td><input name="item[]" type="checkbox" value="9"></td>
                <td >9</td>
                <td >Hoàng Thị Phương Thảo</td>
                <td >2011-10-10</td>
                <td><a href="gioi_tinh.php?ma=9"><img src="../templates/images/gioi_tinh_1.png" width="20" height="20"></a></td>
                <td  style="text-align:left">Kỹ thuật phần mềm, lập trình PHP &amp; mySQL</td>
                <td><a href="trang_thai.php?ma=9" title="Hiển Thị"><img src="../templates/images/trang_thai_1.png" width="20" height="20"></a></td>
                <td><!-- Icons --> 
                  <a href="view.php?ma=9" title="Edit"><img alt="Edit" src="../templates/images/search.png" width="16"></a>
                  <a href="delete.php?ma=9" onclick="return confirm('Bạn có chắc chắn muốn xóa mã 9 không ?')" title="Delete"><img style="cursor:pointer" alt="Xóa" src="../templates/images/icons/cross.png"> </a></td>
              </tr>
                            <tr class="alt-row">
                <td><input name="item[]" type="checkbox" value="10"></td>
                <td >10</td>
                <td >asdasd</td>
                <td >0000-00-00</td>
                <td><a href="gioi_tinh.php?ma=10"><img src="../templates/images/gioi_tinh_0.png" width="20" height="20"></a></td>
                <td  style="text-align:left">Kỹ thuật phần mềm, lập trình PHP &amp; mySQL</td>
                <td><a href="trang_thai.php?ma=10" title="Hiển Thị"><img src="../templates/images/trang_thai_0.png" width="20" height="20"></a></td>
                <td><!-- Icons --> 
                  <a href="view.php?ma=10" title="Edit"><img alt="Edit" src="../templates/images/search.png" width="16"></a>
                  <a href="delete.php?ma=10" onclick="return confirm('Bạn có chắc chắn muốn xóa mã 10 không ?')" title="Delete"><img style="cursor:pointer" alt="Xóa" src="../templates/images/icons/cross.png"> </a></td>
              </tr>
                            <tr>
                <td><input name="item[]" type="checkbox" value="11"></td>
                <td >11</td>
                <td >Hoàng Vũ Kha</td>
                <td >0000-00-00</td>
                <td><a href="gioi_tinh.php?ma=11"><img src="../templates/images/gioi_tinh_0.png" width="20" height="20"></a></td>
                <td  style="text-align:left">Giám đốc công ty</td>
                <td><a href="trang_thai.php?ma=11" title="Hiển Thị"><img src="../templates/images/trang_thai_0.png" width="20" height="20"></a></td>
                <td><!-- Icons --> 
                  <a href="view.php?ma=11" title="Edit"><img alt="Edit" src="../templates/images/search.png" width="16"></a>
                  <a href="delete.php?ma=11" onclick="return confirm('Bạn có chắc chắn muốn xóa mã 11 không ?')" title="Delete"><img style="cursor:pointer" alt="Xóa" src="../templates/images/icons/cross.png"> </a></td>
              </tr>
                            <tr class="alt-row">
                <td><input name="item[]" type="checkbox" value="12"></td>
                <td >12</td>
                <td >xsdasd</td>
                <td >0000-00-00</td>
                <td><a href="gioi_tinh.php?ma=12"><img src="../templates/images/gioi_tinh_0.png" width="20" height="20"></a></td>
                <td  style="text-align:left">asdasd</td>
                <td><a href="trang_thai.php?ma=12" title="Hiển Thị"><img src="../templates/images/trang_thai_1.png" width="20" height="20"></a></td>
                <td><!-- Icons --> 
                  <a href="view.php?ma=12" title="Edit"><img alt="Edit" src="../templates/images/search.png" width="16"></a>
                  <a href="delete.php?ma=12" onclick="return confirm('Bạn có chắc chắn muốn xóa mã 12 không ?')" title="Delete"><img style="cursor:pointer" alt="Xóa" src="../templates/images/icons/cross.png"> </a></td>
              </tr>
                            <tr>
                <td><input name="item[]" type="checkbox" value="13"></td>
                <td >13</td>
                <td >Điền Hiền Minh</td>
                <td >0000-00-00</td>
                <td><a href="gioi_tinh.php?ma=13"><img src="../templates/images/gioi_tinh_0.png" width="20" height="20"></a></td>
                <td  style="text-align:left">Kỹ thuật phần mềm, lập trình PHP &amp; mySQL</td>
                <td><a href="trang_thai.php?ma=13" title="Hiển Thị"><img src="../templates/images/trang_thai_1.png" width="20" height="20"></a></td>
                <td><!-- Icons --> 
                  <a href="view.php?ma=13" title="Edit"><img alt="Edit" src="../templates/images/search.png" width="16"></a>
                  <a href="delete.php?ma=13" onclick="return confirm('Bạn có chắc chắn muốn xóa mã 13 không ?')" title="Delete"><img style="cursor:pointer" alt="Xóa" src="../templates/images/icons/cross.png"> </a></td>
              </tr>
                            <tr class="alt-row">
                <td><input name="item[]" type="checkbox" value="14"></td>
                <td >14</td>
                <td >Cao Thành Luân</td>
                <td >2012-07-10</td>
                <td><a href="gioi_tinh.php?ma=14"><img src="../templates/images/gioi_tinh_0.png" width="20" height="20"></a></td>
                <td  style="text-align:left">NV</td>
                <td><a href="trang_thai.php?ma=14" title="Hiển Thị"><img src="../templates/images/trang_thai_0.png" width="20" height="20"></a></td>
                <td><!-- Icons --> 
                  <a href="view.php?ma=14" title="Edit"><img alt="Edit" src="../templates/images/search.png" width="16"></a>
                  <a href="delete.php?ma=14" onclick="return confirm('Bạn có chắc chắn muốn xóa mã 14 không ?')" title="Delete"><img style="cursor:pointer" alt="Xóa" src="../templates/images/icons/cross.png"> </a></td>
              </tr>
                          </tbody>
		  </table>
		</form>	
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content --><?php }} ?>