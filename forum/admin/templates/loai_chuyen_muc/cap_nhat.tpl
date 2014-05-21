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
                <label class="admin_tieu_de">Tên<b style="color: red;"> (*)</b></label>
                <input type="hidden" name="data[ma]" value="{$loai_chuyen_muc.ma}" />
                <input type="text" class="text-input medium-input" id="ten" name="data[ten]" value="{$loai_chuyen_muc.ten}">
              </p>
               <p>
                <label class="admin_tieu_de">Ghi chú</label>
                <input type="text" class="text-input medium-input" id="ten" name="data[ghi_chu]" value="{$loai_chuyen_muc.ghi_chu}">
              </p>
              <p>
                <label class="admin_tieu_de">Mã Loại Cha</label>
				<select class="text-input small-input"  id="ma_loai_cha" name="data[ma_loai_cha]" >
                {if $loai_chuyen_muc.ma_loai_cha != 0}
                	<option value="{$loai_chuyen_muc.ma_loai_cha}">{$loai_chuyen_muc.ten_loai_cha}</option>
                {/if}
               		<option value="0">====Không có loại cha =====</option>
                    {*  Tuong tuong la se co 2 tham so nay: $ds_lcm,  $ma, kitu *}                                                            
                    {function in_loai_chuyen_muc}
                    	{foreach $ds_lcm as $lcm}
                        	{if $lcm.ma_loai_cha == $ma}
                            	<option value="{$lcm.ma}">{$kitu}{$lcm.ten}</option>
                                {in_loai_chuyen_muc ds_lcm=$ds_lcm ma=$lcm.ma kitu="$kitu$kitu"}
                        	{/if}
                        {/foreach}
                    
                    {/function}
                    
                    
                    {in_loai_chuyen_muc  ds_lcm=$ds_chuyen_muc ma=0 kitu='='}
                    
                </select>			
              </p>
              <p>
                <label class="admin_tieu_de">Thứ Tự Hiển Thị</label>
                <input type="text" name="data[thu_tu_hien_thi]" id="thu_tu_hien_thi" value="{$loai_chuyen_muc.thu_tu_hien_thi}" class="text-input small-input" onkeypress="return inputNumber(event)" >
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