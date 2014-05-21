<div class="content-box-header">
					
	<h3>Quản trị [Thêm mới]</h3>
	
	<ul class="content-box-tabs">
		<li><a href="danh_sach.php">Danh sách</a></li>
		<li><a href="#" class="default-tab">Thêm mới</a></li>
	</ul>
	
	<div class="clear"></div>
	
</div> <!-- End .content-box-header -->

<div class="content-box-content">

	<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

		{$thong_bao}													

<form method="post" action="them_sm.php" name="fthem" onsubmit="return kiemtra()">
          <fieldset>
            <p>
              <label>Tên Đăng Nhập<b style="color: red;"> (*)</b></label>
              <input type="text" class="text-input small-input datepicker" id="username" name="data[ten_dang_nhap]">
            </p>
            <p>
              <label>Mật Khẩu<b style="color: red;"> (*)</b></label>
              <input type="password" class="text-input small-input" id="mat_khau" name="data[mat_khau]">
            </p>
            <p>
              <label>Họ Và Tên<b style="color: red;"> (*)</b></label>
              <input type="text" class="text-input medium-input datepicker" id="ho_ten" name="data[ho_ten]">
            </p>
            <p>
              <label>Email<b style="color: red;"> (*)</b></label>
              <input type="text" class="text-input medium-input datepicker" id="email" name="data[email]">
              <br>
              <small>ex: abc@gmail.com</small> </p>
            <p>
              <label>Trạng Thái</label>
              <label style="font-weight:normal">
                <input type="radio" value="1" checked="checked" name="data[trang_thai]">
                Hoạt động</label>
              <label style="font-weight:normal">
                <input type="radio" value="0" name="data[trang_thai]">
                Ngừng hoạt động</label>
            </p>
            <p style="text-align:center">
                <input type="submit" value="Lưu Và Tiếp Tục" name="save-and-continue" class="button">
                <input type="submit" value="Lưu Và Thoát" name="save-and-exit" class="button">
                <input type="button" onclick="window.location.href='list.php'" value="Không Lưu" class="button">
            </p>
          </fieldset>
          <div class="clear"></div>
        </form>
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content -->