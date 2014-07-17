<div class="content-box-header">
					
	<h3>Chuyên mục [Cập nhật]</h3>
	
	<ul class="content-box-tabs">
		<li><a href="danh_sach.php">Danh sách</a></li>
		<li><a href="#" class="default-tab">Cập nhật</a></li>
	</ul>
	
	<div class="clear"></div>
	
</div> <!-- End .content-box-header -->

<div class="content-box-content">

	<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

		{showMessage()}													

<form method="post" action="cap_nhat_sm.php" name="fthem" onsubmit="return kiemtra()">
          <fieldset>
              <p>
                <label class="admin_tieu_de">Tên<b style="color: red;"> (*)</b></label>
                <input type="hidden" name="data[ma]" value="{$loai_chuyen_muc.ma}" />
                <input type="text" class="text-input medium-input" id="ten" name="data[ten]" value="{$loai_chuyen_muc.ten}">
              </p>
               <p>
                <label class="admin_tieu_de">Ghi chú</label>
                <input type="text" class="text-input medium-input" id="ten" name="data[ghi_chu]" value="{$loai_chuyen_muc.ghi_chu}">
              </p>
             {if !empty($ds_chuyen_muc)} 
              <p>
          <label class="admin_tieu_de">Là chuyên mục con của chuyên mục:</label>
          <select class="text-input small-input"  id="ma_loai_cha" name="data[ma_loai_cha]" size="{count($ds_chuyen_muc)+2}">
            <option value="0" {if $loai_chuyen_muc.ma_loai_cha==0}selected{/if}>Không có</option>
            	{foreach $ds_chuyen_muc as $k=>$chuyen_muc}
                	{if empty($chuyen_muc.ma_loai_cha)}
                	<option value="{$chuyen_muc.ma}"  {if $loai_chuyen_muc.ma_loai_cha == $chuyen_muc.ma}selected{/if}>{$chuyen_muc.ten}</option>
                   	{$children = getChildrenFirst($chuyen_muc.ma, $ds_chuyen_muc)}
                    {if $children!=NULL}
                    	{foreach $children as $key=>$value}
                        <option value="{$key}" {if $loai_chuyen_muc.ma_loai_cha == $key}selected{/if}>&nbsp;&nbsp;&nbsp;&nbsp;{$value.ten}</option>
                        	{$child = getChildrenFirst($key, $ds_chuyen_muc)}
                            {if $child!=NULL}
                            	{foreach $child as $k1=>$v1}
                                <option disabled="disabled">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$v1.ten}</option>
                                {/foreach}
                            {/if}
                        {/foreach}
                    {/if}
                    {/if}
                {/foreach}       
          </select>
        </p>
        	{/if}
              <p>
              	<label class="admin_tieu_de">Chuyên mục riêng tư</label>
                {html_options name = "data[rieng_tu]" options = $rieng_tu selected = $loai_chuyen_muc.rieng_tu}
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