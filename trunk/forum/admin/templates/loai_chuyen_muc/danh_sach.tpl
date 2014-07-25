<div class="content-box-header">
					
	<h3>Chuyên mục [Danh sách]</h3>
	
	<ul class="content-box-tabs">
		<li><a href="#" class="default-tab">Danh sách</a></li>
		<li><a href="them.php">Thêm mới</a></li>
	</ul>
	
	<div class="clear"></div>
	
</div> <!-- End .content-box-header -->

<div class="content-box-content">

	<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
		{showMessage()}											
		<form method="get" action="danh_sach.php" name="fSearch" id="fSearch">
          Từ Khóa
          <input type="text" name="tu_khoa" class="text-input small-input" value="{$smarty.session.data.tu_khoa|default: ''}">
          <input class="button" type="submit" value="Tìm Kiếm">
          <input class="button" type="button" value="Tất cả" onclick="window.location.href='danh_sach.php'">
          <input type="hidden" name="ma_loai_cha" value="" id="ma_loai_cha" />
        </form>
		  <table class="table">
			<thead>
              <tr>
                <th >Mã</th>
                <th width="200px">Tên</th>
                <th width="200px">Tên Loại Cha</th>
                <th width="150px" >&nbsp;&nbsp;Thứ Tự Hiển Thị</th>
                <th width="100px">&nbsp;&nbsp;&nbsp;&nbsp;Riêng tư</th>
                <th class="r">Tác Vụ</th>
              </tr>
            </thead>
			<tfoot>
			  <tr>
				<td colspan="8">
                 <div class="bulk-actions align-left">
                   Hiển thị các chuyên mục con của chuyên mục: <select id="loai_cha" onchange="change()">
                <option value="">Tất cả</option>
            	{foreach $ds as $k=>$chuyen_muc}
                	{if empty($chuyen_muc.ma_loai_cha)}
                	<option value="{$chuyen_muc.ma}" 
                    {if isset($smarty.session.data.ma_loai_cha) && $smarty.session.data.ma_loai_cha==$chuyen_muc.ma}selected{/if}>&nbsp;{$chuyen_muc.ten}</option>
                   	{$children = getChildrenFirst($chuyen_muc.ma, $ds)}
                    {if $children!=NULL}
                    	{foreach $children as $key=>$value}
                        <option value="{$key}" {if isset($smarty.session.data.ma_loai_cha) && $smarty.session.data.ma_loai_cha==$key}selected{/if}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rArr;&nbsp;{$value.ten}</option>
                        {/foreach}
                    {/if}
                    {/if}
                {/foreach}       
          		</select>
                <script type="text/javascript">
                	function change()
					{
						document.getElementById("ma_loai_cha").value = document.getElementById("loai_cha").value;
						document.getElementById("fSearch").submit();
					}
                </script>
          		 </div>
				  <div class="pagination">
                  {$bo_nut}
				</div></td>
			  </tr>
			</tfoot>
			<tbody>       
               {foreach $ds_chuyen_muc as $chuyen_muc}   
                <tr>
                <td >{$chuyen_muc.ma}</td>
                <td >{$chuyen_muc.ten}</td>
                <td >{if empty($chuyen_muc.ma_loai_cha)}<span style="font-weight:bold; text-transform:capitalize">Chuyên Mục Lớn</span>
                {else if}{$chuyen_muc.ten_loai_cha}{/if}
                </td>
                <td class="c" >{$chuyen_muc.thu_tu_hien_thi}</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="cap_nhat_trang_thai.php?ma={$chuyen_muc.ma}" title=""><img src="/forum/admin/templates/images/trang_thai_{$chuyen_muc.rieng_tu}.png" width="20" height="20"> </a></td>
                <td class="r"><!-- Icons --> 
                 <a href="cap_nhat_ttht.php?ma={$chuyen_muc.ma}" title="Chỉnh sửa thứ tự hiển thị"><img alt="Chỉnh sửa thứ tự hiển thị" src="/forum/admin/templates/images/icons/order-icon.png"></a>
                 <a href="cap_nhat.php?ma={$chuyen_muc.ma}" title="Chỉnh sửa"><img alt="Chỉnh sửa" src="/forum/admin/templates/images/icons/pencil.png"></a>
                 
                 <a href="xoa.php?ma={$chuyen_muc.ma}" onclick="return confirm('Khi xóa chuyên mục, tất cả những dữ liệu về chuyên mục cũng sẽ được xóa. Bạn vẫn muốn tiếp tục xóa {$chuyen_muc.ten}?')" title="Xóa"><img style="cursor:pointer" alt="Xóa" src="/forum/admin/templates/images/icons/cross.png"> </a></td>
              </tr>      
 				{/foreach} 
              
                                            
                  </tbody>
		  </table>
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content -->