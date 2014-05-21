<div class="content-box-header">
					
	<h3>Quản trị [Danh sách]</h3>
	
	<ul class="content-box-tabs">
		<li><a href="#" class="default-tab">Danh sách</a></li>
		<li><a href="them.php">Thêm mới</a></li>
	</ul>
	
	<div class="clear"></div>
	
</div> <!-- End .content-box-header -->

<div class="content-box-content">

	<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

		{$thong_bao}												
		<form method="get" action="danh_sach.php" name="fSearch" id="fSearch">
          Từ Khóa
          <input type="text" name="tu_khoa" class="text-input small-input" value="{$tu_khoa}">
          <input class="button" type="submit" value="Tìm Kiếm">
          <input class="button" type="button" value="Tất cả" onclick="window.location.href='danh_sach.php'">
        </form>
		<form action="xoa_nhieu.php" method="post">
		  <table class="table">
			<thead>
			  <tr>
				<th><input type="checkbox" class="check-all"></th>
				<th>Mã</th>
				<th>Tên Đăng Nhập</th>							
				<th>Họ Tên</th>
				<th>Email</th>
				<th>Trạng Thái</th>
				<th>Tác Vụ</th>
			  </tr>
			</thead>
			<tfoot>
			  <tr>
				<td colspan="8"><div class="bulk-actions align-left"><img src="../templates/images/arrow_ltr.png" /> <input name="xoa_muc_chon" class="button" type="submit" value="Xóa Các Mục Đã Chọn" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')"></div>
				  <div class="pagination">
                  {$bo_nut}
				               </div>
				  <div class="clear"></div></td>
			  </tr>
			</tfoot>
			<tbody>
            	{foreach $ds_quan_tri as $row }
							<tr>
				<td><input name="data[{$row['ma']}]" type="checkbox" value="{$row['ma']}"></td>
				<td>{$row['ma']}</td>
				<td>{$row['ten_dang_nhap']}</td>							
				<td>{$row['ho_ten']}</td>
				<td>{$row['email']}</td>
				<td style="text-align:center"><a href="cap_nhat_trang_thai.php?ma={$row['ma']}" title="Hiển Thị"><img src="../templates/images/trang_thai_{$row['trang_thai']}.png" width="20" height="20"></a></td>
				<td style="text-align:center"><!-- Icons --> 
                  <a href="phan_quyen.php?ma={$row['ma']}" title="Phan quyen"><img alt="Edit" src="../templates/images/icons/quyen.png"></a>
				  <a href="cap_nhat.php?ma={$row['ma']}" title="Edit"><img alt="Edit" src="../templates/images/icons/pencil.png"></a>
				  <a href="xoa.php?ma={$row['ma']}" onclick="return confirm('Bạn có chắc chắn muốn xóa mã {$row['ma']} không ?')" title="Delete"><img style="cursor:pointer" alt="Xóa" src="../templates/images/icons/cross.png"> </a></td>
			  </tr>
				{/foreach}	
			</tbody>
		  </table>
		</form>	
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content -->