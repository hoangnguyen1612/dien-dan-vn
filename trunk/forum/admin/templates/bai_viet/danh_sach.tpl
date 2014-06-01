<div class="content-box-header">
					
	<h3>Bài viết [Danh sách]</h3>
	
	<ul class="content-box-tabs">
		<li><a href="#" class="default-tab">Danh sách</a></li>
	</ul>
	
	<div class="clear"></div>
	
</div> <!-- End .content-box-header -->

<div class="content-box-content">

	<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

		{showMessage()}												
		<form method="get" action="danh_sach.php" name="fSearch" id="fSearch">
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
                <th>Tên chuyên mục</th>
                <th>Trạng Thái</th>
                <th>Thao Tác</th>
              </tr>
            </thead>
		  <tfoot>
			  <tr>
				<td colspan="8"><div class="bulk-actions align-left"><img src="/forum/admin/templates/images/arrow_ltr.png" /> <input name="xoa_muc_chon" class="button" type="submit" value="Xóa Các Mục Đã Chọn" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')"></div>
				 <div class="pagination">
					 <a class="number disable" title="Trang đầu">&lt;&lt;</a> <a class="number disable" title="Về trang trước">&lt;</a> <a class="number current"><b>1</b></a> <a class="number" href="/admin/thanh_vien/list.php?page=2" title="Trang 2">2</a> <a class="number" href="/admin/thanh_vien/list.php?page=2" title="Dến trang sau">&gt;</a> <a class="number" href="/admin/thanh_vien/list.php?page=2" title="Trang cuối">&gt;&gt;</a>                   </div>
				  <div class="clear"></div></td>
			  </tr>
			</tfoot>
<tbody>
			
            {foreach $ds_bai_viet as $k=>$bai_viet}    
                <tr class="alt-row">
                <td><input name="item[]" type="checkbox" value="{$bai_viet.ma}"></td>
                <td>{$bai_viet.ma}</td>
                <td>{$bai_viet.tieu_de}</td>
                <td style="text-align:left">{date('d-m-Y', strtotime($bai_viet.ngay_tao))}</td>
                <td >Công nghệ phần mềm</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="trang_thai.php?ma=16" title="Hiển Thị"><img src="/forum/admin/templates/images/trang_thai_{$bai_viet.trang_thai}.png" width="20" height="20"></a></td>
               
                <td><!-- Icons --> 
                  <a href="/{$dien_dan.ma}/bai_viet/chi_tiet?ma={$bai_viet.ma}" target="_blank" title="Xem"><img src="/forum/admin/templates/images/search.png" width="16" alt="Xem"></a>
                  <a href="delete.php?ma=16" onclick="return confirm('Bạn có chắc chắn muốn xóa mã #{$bai_viet.ma} không ?')" title="xóa"><img src="/forum/admin/templates/images/icons/cross.png" alt="Delete"></a>
                </td>
              </tr>
            {/foreach}                        
			</tbody>			
		  </table>
		</form>	
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content -->