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
		<form action="xoa_nhieu.php" method="post">
		  <table class="table">
			<thead>
              <tr>
                <th><input type="checkbox" class="check-all"></th>
                <th >Mã</th>
                <th >Tên</th>
                <th >Tên Loại Cha</th>
                <th >Thứ Tự Hiển Thị</th>
                <th >Riêng tư</th>
                <th >Tác Vụ</th>
              </tr>
            </thead>
			<tfoot>
			  <tr>
				<td colspan="8"><div class="bulk-actions align-left"><img src="/forum/admin/templates/images/arrow_ltr.png" /> <input name="xoa_muc_chon" class="button" type="submit" value="Xóa Các Mục Đã Chọn" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')"></div>
				  <div class="pagination">
                  {$bo_nut}
				</div></td>
			  </tr>
			</tfoot>
			<tbody>       
               {foreach $ds_chuyen_muc as $chuyen_muc}   
                <tr>
                <td><input name="data[{$chuyen_muc.ma}]" type="checkbox" value="{$chuyen_muc.ma}"></td>
                <td >{$chuyen_muc.ma}</td>
                <td >{$chuyen_muc.ten}</td>
                <td >{$chuyen_muc.ten_loai_cha}</td>
                <td >{$chuyen_muc.thu_tu_hien_thi}</td>
                <td ><a href="cap_nhat_trang_thai.php?ma={$chuyen_muc.ma}" title="Hiển Thị"><img src="/forum/admin/templates/images/trang_thai_{$chuyen_muc.rieng_tu}.png" width="20" height="20"> </a></td>
                <td><!-- Icons --> 
                 <a href="cap_nhat.php?ma={$chuyen_muc.ma}" title="Edit"><img alt="Edit" src="/forum/admin/templates/images/icons/pencil.png"></a>
                 
                 <a href="xoa.php?ma={$chuyen_muc.ma}" onclick="return confirm('Bạn có chắc chắn muốn xóa {$chuyen_muc.ten} không ?')" title="Delete"><img style="cursor:pointer" alt="Xóa" src="/forum/admin/templates/images/icons/cross.png"> </a></td>
              </tr>      
 				{/foreach} 
              
                                            
                  </tbody>
		  </table>
		</form>	
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content -->