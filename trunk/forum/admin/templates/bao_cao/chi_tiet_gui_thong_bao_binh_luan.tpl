
<div class="content-box-header">
  <h3>Gửi báo cáo đến người vi phạm</h3>
  <ul class="content-box-tabs">
    <li><a href="danh_sach.php">Danh sách</a></li>
    <li><a href="#" class="default-tab">Thêm mới</a></li>
  </ul>
  <div class="clear"></div>
</div>
<!-- End .content-box-header -->

<div class="content-box-content">
  <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
    
    {showMessage()}
    <form method="post" action="them_sm_binh_luan.php" name="fthem" onsubmit="return kiemtra()">
      <fieldset>
        <p>
          <label class="admin_tieu_de">Tên bài viết : {$binh_luan.tieu_de}</b></label>
          <input type="hidden" class="text-input medium-input" id="ten" name="data[ma_binh_luan]" value="{$binh_luan.ma}">
        </p><br />
        <p>
          <label class="admin_tieu_de">Tên người viết bình luận : {$binh_luan.ho_nguoi_dang} {$binh_luan.ten_nguoi_dang}</label>
          <input type="hidden" class="text-input medium-input" id="ten" name="data[ma_nguoi_dang]" value="{$binh_luan.ma_nguoi_dung}">
        </p><br />
        <p style="width:700px; text-align:justify">
          <label class="admin_tieu_de">Nội dung<b style="color: red;"> (*)</b></label>
          <textarea name="data[noi_dung]" class="text-input textarea" cols="79" rows="15" placeholder="Nội dung cần gửi đến người vi phạm"></textarea>
        </p><br /><br />
        <p style="text-align:center">
          <input type="submit" value="Gửi" name="save-and-continue" class="button">
          <input type="button" onclick="window.location.href='danh_sach.php'" value="Không Lưu" class="button">
        </p>
      </fieldset>
      <div class="clear"></div>
    </form>
  </div>
  <!-- End #tab1 --> 
  
</div>
<!-- End .content-box-content -->