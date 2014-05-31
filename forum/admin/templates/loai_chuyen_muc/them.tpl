<script>
function inputNumber(e)
{
	// cho phep nhap so, nut backspace, delete vau dau .
	var keynum;
	if(window.event) // IE
	{
	  keynum = e.keyCode;
	}
	else if(e.which) // Netscape/Firefox/Opera
	{
	  keynum = e.which;
	}
	if ( ((keynum > 45) && (keynum <58)) || (keynum == 8) || (keynum == 9) || (keynum == 190) || (keynum == 39)|| (keynum == 37) ) return true;
	else return false;
	
	// 37 : left ; 39: right
}
</script>

<div class="content-box-header">
  <h3>Chuyên mục [Thêm mới]</h3>
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
    <form method="post" action="them_sm.php" name="fthem" onsubmit="return kiemtra()">
      <fieldset>
        <p>
          <label class="admin_tieu_de">Tên<b style="color: red;"> (*)</b></label>
          <input type="text" class="text-input medium-input" id="ten" name="data[ten]" value="{$smarty.session.data.ten|default:""}">
        </p><br />
        <p>
          <label class="admin_tieu_de">Ghi chú</label>
          <input type="text" class="text-input medium-input" id="ten" name="data[ghi_chu]" value="{$smarty.session.data.ghi_chu|default:""}">
        </p><br />
        <p>
          <label class="admin_tieu_de">Là chuyên mục con của chuyên mục:</label>
          <select class="text-input small-input"  id="ma_loai_cha" name="data[ma_loai_cha]">
            <option value="0">Không có</option>
            	{foreach $ds_chuyen_muc as $k=>$chuyen_muc}
                	{if empty($chuyen_muc.ma_loai_cha)}
                	<option value="{$chuyen_muc.ma}" 
                    {if isset($smarty.session.data.ma_loai_cha) && $smarty.session.data.ma_loai_cha==$chuyen_muc.ma}selected{/if}>{$chuyen_muc.thu_tu_hien_thi}&nbsp;&rArr;&nbsp;{$chuyen_muc.ten}</option>
                   	{$children = getChildrenFirst($chuyen_muc.ma, $ds_chuyen_muc)}
                    {if $children!=NULL}
                    	{foreach $children as $key=>$value}
                        <option value="{$key}" {if isset($smarty.session.data.ma_loai_cha) && $smarty.session.data.ma_loai_cha==$key}selected{/if}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$value.thu_tu_hien_thi}&nbsp;&rArr;&nbsp;{$value.ten}</option>
                        	{$child = getChildrenFirst($key, $ds_chuyen_muc)}
                            {if $child!=NULL}
                            	{foreach $child as $k1=>$v1}
                                <option disabled="disabled">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$v1.thu_tu_hien_thi}&nbsp;&rArr;&nbsp;{$v1.ten}</option>
                                {/foreach}
                            {/if}
                        {/foreach}
                    {/if}
                    {/if}
                {/foreach}       
          </select><br />
          <span style="color:crimson">(***)</span> Tên hiển thị trong ô chọn ở trên bao gồm: <span style="color:crimson">thứ tự hiển thị</span> và <span style="color:crimson">
          tên của chuyên mục đó</span>. <br />Ví dụ: chuyên mục có tên là: <span style="color:crimson">ABC</span> và có thứ tự hiển thị là 1 thì sẽ hiển thị trong ô 
          chọn ở trên là: 1 &rArr; ABC.
        </p><br /><br /><br />
        <p>
          <label class="admin_tieu_de">Chuyên mục Riêng Tư<br /><span style="font-weight:normal"><span style="color:crimson">(***)</span> Những chuyên mục được thiết lập riêng tư thì chỉ có thành viên của diễn đàn mới có thể thấy được.</span></label>
          <select name="data[rieng_tu]">
            <option value="1">Có</option>
            <option value="0" selected="selected">Không</option>
          </select>
        </p><br /><br /><br />
        <p style="width:700px; text-align:justify">
          <label class="admin_tieu_de">Thứ Tự Hiển Thị<br /><span style="font-weight:normal;"><span style="color:crimson">(***)</span> Thứ tự hiển thị giúp xác định trật tự sắp xếp giữa các chuyên mục khi hiển thị trên diễn đàn. Nếu chuyên mục bạn chuẩn bị thêm mới là con của bất kỳ một chuyên mục nào đã có trước đó trong diễn đàn, bạn vui lòng xem thứ tự hiển thị ở bảng ô chọn phía trên để chọn thứ tự hiển thị cho chuyên mục chuẩn bị thêm mới không trùng với thứ tự hiển thị của bất kỳ một chuyên mục nào đã có trong danh sách các chuyên mục con của chuyên mục lớn.</span></label>
          <input type="text" value="{$smarty.session.data.thu_tu_hien_thi|default:""}" name="data[thu_tu_hien_thi]" id="thu_tu_hien_thi" class="text-input small-input" onkeypress="return inputNumber(event)">
        </p><br /><br />
        <p style="text-align:center">
          <input type="submit" value="Lưu Và Tiếp Tục" name="save-and-continue" class="button">
          <input type="submit" value="Lưu Và Thoát" name="save-and-exit" class="button">
          <input type="button" onclick="window.location.href='danh_sach.php'" value="Không Lưu" class="button">
        </p>
      </fieldset>
      <div class="clear"></div>
    </form>
  </div>
  <!-- End #tab1 --> 
  
</div>
<!-- End .content-box-content -->