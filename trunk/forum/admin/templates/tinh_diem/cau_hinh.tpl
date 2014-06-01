<div class="content-box-header">
  <h3>Tính điểm [Cấu hình]</h3>
  <ul class="content-box-tabs">
    <li><a href="#" class="default-tab">Cấu hình</a></li>
  </ul>
  <div class="clear"></div>
</div>
<!-- End .content-box-header -->

<div class="content-box-content">
  <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
    
    {showMessage()}
    <form method="post" action="cau_hinh_sm.php" name="fthem" onsubmit="return kiemtra()">
      <fieldset>
      	<p>
        	(* * *) Hệ thống quy định cách tính điểm cho mỗi thành viên trong diễn đàn dựa trên <span style="color:crimson">số bài viết</span>, <span style="color:crimson">số lượt yêu thích bình luận</span> và <span style="color:crimson">bình luận được bình chọn đúng</span>. Bạn có thể sử dụng giá trị mặc định hoặc thay đổi các giá trị bên dưới cho phù hợp với diễn đàn của bạn.
        </p>
        <p>
          <label class="admin_tieu_de">Tạo bài viết<b style="color: red;"> (*)</b></label>
          + <input type="text" class="text-input small-input" style="width: 50px !important; text-align:center" id="ten" name="data[bai_viet]" value="{$tinh_diem.bai_viet}" onkeypress="return inputNumber(event)">
        </p>
        <p>
          <label class="admin_tieu_de">Bình luận<b style="color: red;"> (*)</b></label>
          + <input type="text" class="text-input medium-input" id="ten" style="width: 50px !important; text-align:center" name="data[binh_luan]" value="{$tinh_diem.binh_luan}" onkeypress="return inputNumber(event)">
        </p>
        <p>
          <label class="admin_tieu_de">Bình luận đúng<b style="color: red;"> (*)</b></label>
          + <input type="text" class="text-input medium-input" id="ten" style="width: 50px !important; text-align:center" name="data[binh_luan_dung]" value="{$tinh_diem.binh_luan_dung}" onkeypress="return inputNumber(event)">
        </p>
        <p style="text-align:center">
          <input type="submit" value="Lưu" name="save-and-continue" class="button">
        </p>
      </fieldset>
      <div class="clear"></div>
    </form>
  </div>
  <!-- End #tab1 --> 
  
</div>
<!-- End .content-box-content -->