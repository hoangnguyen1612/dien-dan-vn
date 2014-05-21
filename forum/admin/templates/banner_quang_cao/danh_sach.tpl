<div class="content-box-header">
					
	<h3>Banner quảng cáo [Danh sách]</h3>
	
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
              <th><input type="checkbox" class="check-all"></th>
              <th>Mã</th>
              <th>Link</th>
              <th>Tiêu Đề</th>
              <th>Hình</th>
              <th>Trạng Thái</th>
              <th>Tác Vụ</th>
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
                <td>1</td>
                <td>www.google.com</td>
                <td>test</td>
                <td>1345297776_image011.png</td>
                <td style="text-align:center"><a href="trang_thai.php?ma=1" title="Hiển Thị"><img src="../templates/images/trang_thai_1.png" width="20" height="20"></a></td>
                <td><!-- Icons --> 
                  <a href="update.php?ma=1" title="Edit"><img alt="Edit" src="../templates/images/icons/pencil.png"></a>
                  <a href="delete.php?ma=1" onclick="return confirm('Bạn có chắc chắn muốn xóa mã 1 không ?')" title="Delete"><img style="cursor:pointer" alt="Xóa" src="../templates/images/icons/cross.png"> </a></td>
              </tr>
                            <tr>
                <td><input name="item[]" type="checkbox" value="2"></td>
                <td>2</td>
                <td>dantri.com2</td>
                <td>2</td>
                <td>1355679426_save.png</td>
                <td style="text-align:center"><a href="trang_thai.php?ma=2" title="Hiển Thị"><img src="../templates/images/trang_thai_0.png" width="20" height="20"></a></td>
                <td><!-- Icons --> 
                  <a href="update.php?ma=2" title="Edit"><img alt="Edit" src="../templates/images/icons/pencil.png"></a>
                  <a href="delete.php?ma=2" onclick="return confirm('Bạn có chắc chắn muốn xóa mã 2 không ?')" title="Delete"><img style="cursor:pointer" alt="Xóa" src="../templates/images/icons/cross.png"> </a></td>
              </tr>
                          </tbody>
		  </table>
		</form>	
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content -->