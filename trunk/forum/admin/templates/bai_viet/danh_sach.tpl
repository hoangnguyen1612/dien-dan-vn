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
        {if !empty($quyen_chuyen_muc)}
        <p style="background: #fff8c4; border: 1px solid #f2c779; border-radius: 10px; padding: 10px 36px;">
        	<b style="font-size: 15px">Bạn có quyền chỉnh sửa bài viết trong các chuyên mục: <span style="text-transform:capitalize; color:#57A000">{$quyen_chuyen_muc}.</span>
            </b>
        </p><br />
        <span style="font-size: 11px;"><i>* Bạn chỉ có quyền chỉnh sửa những bài viết thuộc chuyên mục mà bạn đã được cấp quyền (màu nền là màu trắng)</i></span>
        <br /><br />
        {/if}												
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
               		<option value="0" selected="selected">Chọn chuyên mục để hiển thị bài viết</option>
                    {foreach $ds_chuyen_muc as $k=>$chuyen_muc}
                        {if empty($chuyen_muc.ma_loai_cha)}
                        <option value="{url_encode($chuyen_muc.ma)}" {if isset($smarty.get.ma_chuyen_muc) && url_decode($smarty.get.ma_chuyen_muc)==$chuyen_muc.ma}selected{/if}
                        {if isset($smarty.session.data.ma_loai_cha) && $smarty.session.data.ma_loai_cha==$chuyen_muc.ma}selected{/if}>{$chuyen_muc.ten}</option>
                        {$children = getChildrenFirst($chuyen_muc.ma, $ds_chuyen_muc)}
                        {if $children!=NULL}
                            {foreach $children as $key=>$value}
                            <option value="{url_encode($key)}" {if isset($smarty.session.data.ma_loai_cha) && $smarty.session.data.ma_loai_cha==$key}selected{/if} {if isset($smarty.get.ma_chuyen_muc) && url_decode($smarty.get.ma_chuyen_muc)==$key}selected{/if}>&nbsp;&nbsp;&nbsp;&nbsp;{$value.ten}</option>
                                {$child = getChildrenFirst($key, $ds_chuyen_muc)}
                                {if $child!=NULL}
                                    {foreach $child as $k1=>$v1}
                                    <option value="{url_encode($k1)}" {if isset($smarty.get.ma_chuyen_muc) && url_decode($smarty.get.ma_chuyen_muc)==$k1}selected{/if}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$v1.ten}</option>
                                    {/foreach}
                                {/if}
                            {/foreach}
                        {/if}
                        {/if}
                    {/foreach} 
                    
                </select>
              
                
                </div>
               
				 <div class="pagination">
					 {$bo_nut}               </div>
				  <div class="clear"></div></td>
			  </tr>
			</tfoot>
<tbody>
			
            {foreach $ds_bai_viet as $k=>$bai_viet}    
                <tr 
                {if $thanh_vien.loai_thanh_vien==0}
                 style="background: #fff"
                {else if}
                {if  tim_kiem_chuoi($qcm, $bai_viet.ma_loai_chuyen_muc)===false}style="background: #f1f1f1"{else if} style="background: #fff"{/if}{/if}>
                <td><input name="data[]" type="checkbox" value="{post_encode($bai_viet.ma)}"></td>
                <td>{$bai_viet.tieu_de}</td>
                <td style="text-align:left">{date('d-m-Y', strtotime($bai_viet.ngay_tao))}</td>
                <td style="text-transform:capitalize">{ten_chuyen_muc($bai_viet.ma_loai_chuyen_muc,$dien_dan.ma)}</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                {if $thanh_vien.loai_thanh_vien==0 || tim_kiem_chuoi($qcm, $bai_viet.ma_loai_chuyen_muc)!==false}
                	<a href="trang_thai_bai_viet.php?ma={url_encode($bai_viet.ma)}" title="Hiển Thị"><img src="/forum/admin/templates/images/trang_thai_{$bai_viet.trang_thai}.png" width="20" height="20"></a>
                {else if}
                	<img src="/forum/admin/templates/images/trang_thai_{$bai_viet.trang_thai}.png" width="20" height="20" style="cursor: not-allowed">
                {/if}
                </td>
               
                <td><!-- Icons --> 
                  <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/chi_tiet?ma={($bai_viet.ma)}" target="_blank" title="Xem"><img src="/forum/admin/templates/images/search.png" width="16" alt="Xem"></a>
                  {if $thanh_vien.loai_thanh_vien==0 || tim_kiem_chuoi($qcm, $bai_viet.ma_loai_chuyen_muc)!==false}
                  	<a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/admin/bai_viet/xoa.php?ma={url_encode($bai_viet.ma)}" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này không ?')" title="xóa"><img src="/forum/admin/templates/images/icons/cross.png" alt="Delete"></a>
                  {/if} 
                </td>
              </tr>
            {/foreach}                        
			</tbody>			
		  </table>
		</form>	
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content -->