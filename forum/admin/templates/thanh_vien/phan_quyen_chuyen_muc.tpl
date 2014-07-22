<div class="content-box-header">
  <h3>Thành viên [Phân quyền chuyên mục]</h3>
  <ul class="content-box-tabs">
    <li><a href="danh_sach.php">Danh sách</a></li>
    <li><a href="#" class="default-tab">Phân quyền</a></li>
  </ul>
  <div class="clear"></div>
</div>
<!-- End .content-box-header -->

<div class="content-box-content">
  <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
    {showMessage()}
    <p>
    	<label>Thành viên: <b>{$thanh_vien.ho_ten}</b></label>
    </p>
    <form action="phan_quyen_chuyen_muc_sm.php" method="post">
      <table class="table">
        <thead>
          <tr>
            <th></th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <td colspan="8"><div class="pagination"></div>
              <div class="clear"></div></td>
          </tr>
        </tfoot>
        <tbody>
        	<tr>
            	<td>
                <p>
            	{foreach $ds_chuyen_muc as $k=>$chuyen_muc}
                	{if empty($chuyen_muc.ma_loai_cha)}
                	<input type="checkbox" {if tim_kiem_chuoi($quyen, $chuyen_muc.ma)!==false}checked{/if}  name="item[]" style="float:left" value="{$chuyen_muc.ma}" id="{$chuyen_muc.ma}" /><label for="{$chuyen_muc.ma}" style="width:300px; float:left; text-transform:capitalize">{$chuyen_muc.ten}</label><div class="clear"></div>
                   	{$children = getChildrenFirst($chuyen_muc.ma, $ds_chuyen_muc)}
                    {if $children!=NULL}
                    	{foreach $children as $key=>$value}
                        <input type="checkbox" {if tim_kiem_chuoi($quyen, $key)!==false}checked{/if}  name="item[]" style="float:left; margin-left: 70px;" value="{$key}" id="{$key}" /><label for="{$key}" style="width:300px; float:left; text-transform:capitalize; font-weight:normal; font-style:italic">{$value.ten}</label><div class="clear"></div>
                        	{$child = getChildrenFirst($key, $ds_chuyen_muc)}
                            {if $child!=NULL}
                            	{foreach $child as $k1=>$v1}
                                <input type="checkbox" {if tim_kiem_chuoi($quyen, $k1)!==false}checked{/if}  name="item[]" style="float:left; margin-left: 140px;" value="{$k1}" id="{$k1}" /><label for="{$k1}" style="width:300px; float:left; text-transform:capitalize; font-weight:normal">{$v1.ten}</label><div class="clear"></div>
                                {/foreach}
                            {/if}
                        {/foreach}
                    {/if}
                    {/if}
                {/foreach}   
                <input type="hidden" name="ma_nguoi_dung" value="{urlencode(base64_encode($thanh_vien.ma_nguoi_dung))}"  />    
        </p>
                </td>
            </tr>
            <tr>
              <td>
              	<input type="submit" value="Lưu Và Tiếp Tục" name="save-and-continue" class="button">
                <input type="submit" value="Lưu Và Thoát" name="save-and-end" class="button">
                <input type="button" onclick="window.location.href='danh_sach.php'" value="Không Lưu" class="button"></td>
            </tr>
          </table>
          </tbody>
      </table>
    </form>
  </div>
  <!-- End #tab1 --> 
  
</div>
<!-- End .content-box-content -->