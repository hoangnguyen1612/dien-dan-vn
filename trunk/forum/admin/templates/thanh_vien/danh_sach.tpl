<div class="content-box-header">
					
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
			{$thong_bao}
		</div>	
														
		<form method="get" action="danh_sach.php" name="fSearch" id="fSearch">
          Từ Khóa
          <input type="text" name="tu_khoa" class="text-input small-input" value="">
          <input class="button" type="submit" value="Tìm Kiếm">
          <input class="button" type="button" value="Tất cả" onclick="window.location.href='danh_sach.php'">
        </form>
		<form action="cap_nhat_nhieu.php" method="post">
		  <table class="table">
			<thead>
              <tr>
                <th><input type="checkbox" class="check-all"></th>
                <th >Tên Thành Viên</th>
                <th >Loại thành viên</th>
                <th >Trạng thái</th>
                <th >Tác Vụ</th>
              </tr>
            </thead>
			<tfoot>
			  <tr>
             	
				<td colspan="8">
             
                <div class="bulk-actions align-left"><img src="/forum/admin/templates/images/arrow_ltr.png" />
                 {html_options name=loai_thanh_vien options= $cap_nhat_thanh_vien}
                 <input name="xoa_muc_chon" class="button" type="submit" value="Cập Nhật Các Mục Đã Chọn" onclick="return confirm('Bạn có chắc chắn muốn cập nhật không ?')"></div>
				  <div class="pagination">
                  {$bo_nut}
				</div></td>
			  </tr>
			</tfoot>
			<tbody>       
               {foreach $ds_thanh_vien as $thanh_vien}   
                <tr>
                <td><input name="data[{$thanh_vien.ma_nguoi_dung}]" type="checkbox" value="{$thanh_vien.ma_nguoi_dung}"></td>
                <td >{$thanh_vien.ten_thanh_vien}</td>
                <td >{$loai_thanh_vien[$thanh_vien.loai_thanh_vien]}</td>
                <td ><a href="cap_nhat_trang_thai.php?ma={$thanh_vien.ma_nguoi_dung}" title="Gia nhập"><img src="/forum/admin/templates/images/trang_thai_{$thanh_vien.trang_thai}.png" width="20" height="20"> </a></td>
                <td><!-- Icons --> 
                 <a href="cap_nhat.php?ma={$thanh_vien.ma_nguoi_dung}" title="Edit"><img alt="Edit" src="/forum/admin/templates/images/icons/pencil.png"></a>
                 
                 <a href="xoa.php?ma={$thanh_vien.ma_nguoi_dung}" onclick="return confirm('Bạn có chắc chắn muốn xóa {$thanh_vien.ten_thanh_vien} không ?')" title="Delete"><img style="cursor:pointer" alt="Xóa" src="/forum/admin/templates/images/icons/cross.png"> </a></td>
              </tr>      
 				{/foreach} 
              
                                            
                  </tbody>
		  </table>
		</form>	
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content -->