<div class="content-box-header">
					
	<h3>Loại bài viết [Cập nhật]</h3>
	
	<ul class="content-box-tabs">
		<li><a href="danh_sach.php">Danh sách</a></li>
		<li><a href="#" class="default-tab">Thêm mới</a></li>
	</ul>
	
	<div class="clear"></div>
	
</div> <!-- End .content-box-header -->

<div class="content-box-content">

	<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

		<div>		
			{$thong_bao}
		</div>													

<form method="post" action="cap_nhat_sm.php" name="fthem" onsubmit="return kiemtra()">
          <fieldset>
              <p>
              	<input type="hidden" value="{$thanh_vien.ma_nguoi_dung}" name="data[ma_nguoi_dung]"/>
                <label class="admin_tieu_de">Tên : {$thanh_vien.ten_thanh_vien}</label>
              </p>
              <p>
                <label class="admin_tieu_de">Loại thành viên</label>	
                {html_options name = "data[loai_thanh_vien]" options = $loai_thanh_vien selected = $thanh_vien.loai_thanh_vien} 		
              </p>
              <p>
              	<label class="admin_tieu_de">Trạng thái</label>
                {html_options name = "data[trang_thai]" options = $trang_thai selected = $thanh_vien.trang_thai} 	
              </p>
              <p style="text-align:center">
                <input type="submit" value="Lưu Và Tiếp Tục" name="save-and-continue" class="button">
                <input type="submit" value="Lưu Và Thoát" name="save-and-end" class="button">
                <input type="button" onclick="window.location.href='danh_sach.php'" value="Không Lưu" class="button">
              </p>
            </fieldset>
          <div class="clear"></div>
        </form>
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content -->