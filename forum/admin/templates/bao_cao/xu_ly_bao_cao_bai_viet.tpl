
<div class="content-box-header">
  <h3>Báo cáo vi phạm [Bài viết]</h3>
  <ul class="content-box-tabs">
    <li><a href="bai_viet.php">Danh sách</a></li>
    <li><a href="#" class="default-tab">Xử lý bài viết vi phạm</a></li>
  </ul>
  <div class="clear"></div>
</div>
<!-- End .content-box-header -->

<div class="content-box-content">
  <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
    
    {showMessage()}
    <form method="post" action="xu_ly_bao_cao_bai_viet_sm.php" name="fthem" onsubmit="return kiemtra()">
      <fieldset>
		<p>
        	<b>Tiêu đề bài viết</b>: <span><a target="_blank" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/chi_tiet?ma={$bao_cao.ma_bai_viet}">{$bao_cao.tieu_de}</a></span>
        </p>
        <p>
        	<b>Người đăng bài viết</b>: <span><a target="_blank" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={url_encode($bao_cao.ma_nguoi_dang)}">{get_ho_ten($bao_cao.ma_nguoi_dang)}</a></span>
        </p>
        <p>
        	<b>Người báo cáo bài viết vi phạm</b>: <span><a target="_blank" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={url_encode($bao_cao.ma_nguoi_bao_cao)}">{get_ho_ten($bao_cao.ma_nguoi_bao_cao)}</a></span>
        </p>
        <p>
        	<label>Nội dung vi phạm</label>
            <textarea readonly="readonly" class="text-input small-input">{nl2br($bao_cao.noi_dung)}</textarea>
        </p>
        <p>
        	<label>Chọn hình thức xử lý <b style="color: red;"> (*)</b></label>
            <select id="loai_xl" name="data[loai_xu_ly]" class="text-input">{foreach $ds_xl as $key=>$value}<option value="{$key}">{$value}</option>{/foreach}}</select>
        </p>
        <p>
        	<label>Gửi thông báo cho {get_ho_ten($bao_cao.ma_nguoi_bao_cao)}</label>
            <input type="checkbox" name="data[tb_nguoi_bao_cao]" value="0" id="co" style="float:left" checked="checked" /><label for="co" style="font-weight: normal; width:50px; float:left">Có</label>&nbsp;
            <input type="checkbox" value="1" id="khong" name="data[tb_nguoi_bao_cao]" style="float:left" /><label for="khong"  style="font-weight: normal; width:50px; float:left">Không</label>
        </p>
        <p style="width:700px; text-align:justify; display:none;" id="tb">
          <label class="admin_tieu_de">Gửi thông báo về lý do xử lý vi phạm đến người viết bài<b style="color: red;"> (*)</b></label>
          <textarea name="data[noi_dung]" class="text-input textarea" cols="79" rows="15" placeholder="Nội dung cần gửi đến người vi phạm"></textarea>
        </p><br /><br />
        <p style="text-align:center">
        	<input type="hidden" value="{post_encode($bao_cao.ma)}" name="data[ma_bao_cao]" />
          <input type="submit" value="Hoàn tất" name="save-and-continue" class="button">
          <input type="button" onclick="window.location.href='danh_sach.php'" value="Không Lưu" class="button">
        </p>
      </fieldset>
      <div class="clear"></div>
    </form>
  </div>
  <!-- End #tab1 --> 
  <script>
  	$("#loai_xl").change(function(){
		if($("#loai_xl").val()==1)
		{
			$("#tb").hide();
		}
		else
		{
			$("#tb").show();
		}
	});
  </script>
</div>
<!-- End .content-box-content -->