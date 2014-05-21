<div class="content-box-header">
					
	<h3>Banner quảng cáo [Thêm mới]</h3>
	
	<ul class="content-box-tabs">
		<li><a href="danh_sach.php">Danh sách</a></li>
		<li><a href="#" class="default-tab">Thêm mới</a></li>
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
            <p>
              <label class="admin_tieu_de">Link<b style="color: red;"> (*)</b></label>
              <input type="text" class="text-input medium-input datepicker " id="link" name="link">
            </p>
            <p>
              <label class="admin_tieu_de">Tiêu Đề<b style="color: red;"> (*)</b></label>
              <input type="text" class="text-input medium-input datepicker " id="tieu_de" name="tieu_de">
            </p>
            <p>
              <label class="admin_tieu_de">Thứ Tự Hiển Thị</label>
              <input type="text" value="0" name="thu_tu_hien_thi" id="thu_tu_hien_thi" class="text-input small-input">
            </p>
            <p>
              <label class="admin_tieu_de">Vị trí</label>
              <select name="vi_tri">
                <option value="banner-left">Banner Trái</option>
                <option value="banner-right">Banner Phải</option>
              </select>
            </p>
            <p>
              <label class="admin_tieu_de">Hình</label>
              <input type="file" class="text-input medium-input datepicker" id="hinh" name="hinh">
              <br>
              <small class="admin_tieu_de">(*.gif , *.jpg ,*.png &lt; 200kb, max-width:163px)</small> </p>
            <p>
              <label class="admin_tieu_de">Trạng Thái</label>
              <label style="font-weight:normal" class="admin_tieu_de">
                <input type="radio" value="1" checked="checked" name="trang_thai">
                Hiển Thị</label>
              <label style="font-weight:normal" class="admin_tieu_de">
                <input type="radio" value="0" name="trang_thai">
                Không Hiển Thị</label>
            </p>
            <p style="text-align:center">
                <input type="submit" value="Lưu Và Tiếp Tục" name="save-and-continue" class="button">
                <input type="submit" value="Lưu Và Thoát" name="save-and-end" class="button">
                <input type="button" onclick="window.location.href='list.php'" value="Không Lưu" class="button">
          	</p>
          </fieldset>
          <div class="clear"></div>
        </form>
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content -->