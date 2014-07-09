
<div class="content-box-header">
					
	<h3>Thông số khác [Danh sách]</h3>
	
	<ul class="content-box-tabs">
		<li><a href="#" class="default-tab">Danh sách</a></li>
	</ul>
	
	<div class="clear"></div>
	
</div> <!-- End .content-box-header -->

<div class="content-box-content">

	<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

		{showMessage()}												
		<form action="cap_nhat_thong_so.php" method="post" id="form1" enctype="multipart/form-data">
		  <table class="table">
<thead>

              <tr>
                <th>Danh sách thông số</th>
                <th>Nội dung</th>
              </tr>
            </thead>
		
<tbody>
			<!--	<tr>
                <td>Tên diễn đàn</td>
                <td style="text-align:left"><input type="text" name="data[ten]" class="text-input small-input"  value="{$dien_dan.ten}" /><small class="admin_tieu_de" style="color:red">  (Việc thay đổi tên diễn đàn sẽ thay đổi đường link vào diễn đàn)</small></p></td>
                </tr>
                <tr> -->
                <td>Slogan</td>
                <td style="text-align:left"><textarea type="text" name="data[slogan]" class="text-input textarea">{$dien_dan.slogan}</textarea></td>
                </tr>
                <tr>
                <td>Mô tả</td>
                <td style="text-align:left"><textarea type="text" name="data[mo_ta]" class="text-input textarea">{$dien_dan.mo_ta}</textarea></td>
                </tr>
                <tr>
                <td>Hình đại diện</td>
                <td style="text-align:left"><input type="file" name="hinh_dai_dien" value="{$dien_dan.hinh_dai_dien}"  class="text-input small-input" /><img src="/home/upload/dien_dan/{$dien_dan.hinh_dai_dien}" width="100" height="100" style="margin-bottom:-30px"/><small class="admin_tieu_de" style="color:red">(*.gif , *.jpg ,*.png &lt; 200kb)</small></p></td><br>
                
              <!--  </tr>
                <td>Lĩnh vực</td>
                <td>
                	<select class="selectpicker"  id="ma_chuyen_muc" name="data[ma_linh_vuc]">
                    {*  Tuong tuong la se co 2 tham so nay: $ds_lv,  $ma, kitu *}                                                            
                    {function in_loai_linh_vuc}
                    	{foreach $ds_lv as $lv}
                        	{if $lv.ma_loai_cha == $ma}
                            	<option value="{$lv.ma}" {if $dien_dan.ma_linh_vuc == $lv.ma} selected="selected"{/if}>{$kitu}{$lv.ten}</option>
                                {in_loai_linh_vuc ds_lv=$ds_lv ma=$lv.ma kitu="$kitu$kitu"}
                        	{/if}
                        {/foreach}
                    
                    {/function}
                    
                    
                    {in_loai_linh_vuc  ds_lv=$ds_linh_vuc ma=0 kitu='='}
                    
                </select>
                
                </td> -->
           <tr><td colspan="2" align="center"><input type="submit" value="Cập nhật" class="button" style="margin-left:300px"/> </tr>                   
			</tbody>			
		  </table>
		</form>	
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content -->