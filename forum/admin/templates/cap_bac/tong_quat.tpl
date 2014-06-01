<div class="content-box-header">
  <h3>Cấp bậc [Cấu hình]</h3>
  <ul class="content-box-tabs">
    <li><a href="#" class="default-tab">Cấp bậc</a></li>
    <li><a href="cau_hinh.php" >Cấu hình</a></li>
  </ul>
  <div class="clear"></div>
</div>
<!-- End .content-box-header -->

<div class="content-box-content">
  <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
    
    {showMessage()}
    <form method="post" action="tong_quat_sm.php" name="fthem" onsubmit="return kiemtra()">
      <fieldset>
      	<p>
        	(* * *) Để cấu hình cấp bậc cho diễn đàn của bạn, bước đầu tiên bạn hãy chọn biểu tượng và số lượng cấp bậc có trong diễn đàn. Các mục được đánh dấu <span class="required">(*)</span> bên dưới đều là những mục bắt buộc bạn phải chọn.
        </p>
        <p>
        	<label>Lựa chọn biểu tượng cấp bậc <span class="required">(*)</span></label>
            <input name="data[icon]" value="1" type="radio" checked="checked" id="icon1" onclick="document.getElementById('div-icon1').style.display = 'block';document.getElementById('div-icon2').style.display = 'none';" />&nbsp;<label for="icon1" style="width:250px; font-weight:normal; display:inline-block">Bộ biểu tượng cấp bậc 1 (<span class="required">11 cấp bậc</span>)
            </label>
    		<input type="radio" name="data[icon]" value="2" id="icon2" onclick="document.getElementById('div-icon1').style.display = 'none';document.getElementById('div-icon2').style.display = 'block';" 
            {if $cau_hinh.BIEU_TUONG_CAP_BAC == 'icon2'}checked{/if}/>&nbsp;<label for="icon2" style="width:250px; font-weight:normal; display:inline-block">Bộ biểu tượng cấp bậc 2 (<span class="required">25 cấp bậc</span>)
            </label>
            <div class="icon" id="div-icon1">
            	<img src="/forum/upload/rank/icon1/1.png" />
                <img src="/forum/upload/rank/icon1/2.png" />
                <img src="/forum/upload/rank/icon1/3.png" />
                <img src="/forum/upload/rank/icon1/4.png" />
                <img src="/forum/upload/rank/icon1/5.png" />
                <img src="/forum/upload/rank/icon1/6.png" />
                <img src="/forum/upload/rank/icon1/7.png" />
                <img src="/forum/upload/rank/icon1/8.png" />
                <img src="/forum/upload/rank/icon1/9.png" />
                <img src="/forum/upload/rank/icon1/10.png" />
                <img src="/forum/upload/rank/icon1/11.png" />
            </div>
            <div class="icon" id="div-icon2" style="display:none">
            	<img src="/forum/upload/rank/icon2/1.gif" />
                <img src="/forum/upload/rank/icon2/2.gif" />
                <img src="/forum/upload/rank/icon2/3.gif" />
                <img src="/forum/upload/rank/icon2/4.gif" />
                <img src="/forum/upload/rank/icon2/5.gif" />
                <img src="/forum/upload/rank/icon2/6.gif" />
                <img src="/forum/upload/rank/icon2/7.gif" />
                <img src="/forum/upload/rank/icon2/8.gif" />
                <img src="/forum/upload/rank/icon2/9.gif" />
                <img src="/forum/upload/rank/icon2/10.gif" />
                <img src="/forum/upload/rank/icon2/11.gif" />
                <img src="/forum/upload/rank/icon2/12.gif" />
                <img src="/forum/upload/rank/icon2/13.gif" />
                <img src="/forum/upload/rank/icon2/14.gif" />
                <img src="/forum/upload/rank/icon2/15.gif" />
                <img src="/forum/upload/rank/icon2/16.gif" />
                <img src="/forum/upload/rank/icon2/17.gif" />
                <img src="/forum/upload/rank/icon2/18.gif" />
                <img src="/forum/upload/rank/icon2/19.gif" />
                <img src="/forum/upload/rank/icon2/20.gif" />
                <img src="/forum/upload/rank/icon2/21.gif" />
                <img src="/forum/upload/rank/icon2/22.gif" />
                <img src="/forum/upload/rank/icon2/23.gif" />
                <img src="/forum/upload/rank/icon2/24.gif" />
                <img src="/forum/upload/rank/icon2/25.gif" />
            </div>
        </p>
       <p>
       		<label>Chọn số lượng cấp bậc có trong diễn đàn của bạn <span class="required">(*)</span><br />
            <span style="font-weight:normal"><span class="required" >***</span> Số lượng cấp bậc bạn chọn phải nhỏ hơn hoặc bằng tổng số lượng cấp bậc có trong bộ biểu tượng cấp bậc bạn đã chọn ở trên.</span>
            </label>
            <input type="text" class="text-input" id="ten" style="width: 50px !important; text-align:center" name="data[so_cap_bac]" value="{$cau_hinh.SO_LUONG_CAP_BAC|default: ''}" onkeypress="return inputNumber(event)">
       </p>
       <p>
       		
       </p>
        <p style="text-align:center">
          <input type="submit" value="Lưu Và Tiếp Tục" name="save-and-continue" class="button">
          <input type="button" onclick="window.location.href='../thong_ke/tong_quat.php'" value="Không Lưu" class="button">
        </p>
      </fieldset>
      <div class="clear"></div>
    </form>
  </div>
  <!-- End #tab1 --> 
  
</div>
<!-- End .content-box-content -->