<script type="text/javascript">
function change(){
	document.getElementById("form1").action = "danh_sach.php";
	document.getElementById("form1").method = "GET";
	document.getElementById("form1").submit();	
}
</script>


<div class="content-box-header">
					
	<h3>Bài viết [Danh sách]</h3>
	
	<ul class="content-box-tabs">
		<li><a href="#" class="default-tab">Danh sách</a></li>
	</ul>
	
	<div class="clear"></div>
	
</div> <!-- End .content-box-header -->

<div class="content-box-content">

	<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

		{showMessage()}												
		<form method="get" action="danh_sach.php" name="fSearch" id="fSearch">
          Từ Khóa
          <input type="text" name="tu_khoa" class="text-input small-input" value="">
          <input class="button" type="submit" value="Tìm Kiếm">
          <input class="button" type="button" value="Tất cả" onclick="window.location.href='danh_sach.php'">
        </form>
		<form action="xoa_nhieu.php" method="post" id="form1">
		  <table class="table">
<thead>
              <tr>
                <th><input class="check-all" type="checkbox"></th>
                <th>Mã</th>
                <th>Tiêu Đề</th>
                <th>Ngày Tạo</th>
                <th>Tên chuyên mục</th>
                <th>Trạng Thái</th>
                <th>Thao Tác</th>
              </tr>
            </thead>
		  <tfoot>
			  <tr>
				<td colspan="7"><div class="bulk-actions align-left"><img src="/forum/admin/templates/images/arrow_ltr.png" /> <input name="xoa_muc_chon" class="button" type="submit" value="Xóa Các Mục Đã Chọn" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')">
              
                 <select class="selectpicker"  id="ma_chuyen_muc" onchange="change()" name="ma_chuyen_muc">
               		<option value="0">Các bài viết trong chuyên mục</option>
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
              
                
                </div>
               
				 <div class="pagination">
					 {$bo_nut}               </div>
				  <div class="clear"></div></td>
			  </tr>
			</tfoot>
<tbody>
			
            {foreach $ds_bai_viet as $k=>$bai_viet}    
                <tr>
                <td><input name="data[]" type="checkbox" value="{$bai_viet.ma}"></td>
                <td>{$bai_viet.ma}</td>
                <td>{$bai_viet.tieu_de}</td>
                <td style="text-align:left">{date('d-m-Y', strtotime($bai_viet.ngay_tao))}</td>
                <td >{ten_chuyen_muc($bai_viet.ma_loai_chuyen_muc,$dien_dan.ma)}</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="trang_thai_bai_viet.php?ma={$bai_viet.ma}" title="Hiển Thị"><img src="/forum/admin/templates/images/trang_thai_{$bai_viet.trang_thai}.png" width="20" height="20"></a></td>
               
                <td><!-- Icons --> 
                  <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/chi_tiet?ma={$bai_viet.ma}" target="_blank" title="Xem"><img src="/forum/admin/templates/images/search.png" width="16" alt="Xem"></a>
                  <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/admin/bai_viet/xoa.php?ma={$bai_viet.ma}" onclick="return confirm('Bạn có chắc chắn muốn xóa mã #{$bai_viet.ma} không ?')" title="xóa"><img src="/forum/admin/templates/images/icons/cross.png" alt="Delete"></a>
                </td>
              </tr>
            {/foreach}                        
			</tbody>			
		  </table>
		</form>	
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content -->