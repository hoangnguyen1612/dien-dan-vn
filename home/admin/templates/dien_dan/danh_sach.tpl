<div class="content-box-header">
					
	<h3>Diễn đàn [Danh sách]</h3>
	
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
          <input type="text" name="tu_khoa" class="text-input small-input" value="{$smarty.get.tu_khoa|default:''}">
          <input class="button" type="submit" value="Tìm Kiếm">
          <input class="button" type="button" value="Tất cả" onclick="window.location.href='danh_sach.php'">
        </form>
		<form action="delete_all.php" method="post">
		  <table class="table">
<thead>
              <tr>
                <th>Mã</th>
                <th>Domain</th>
                <th>Tên</th>
                <th>Ngày tạo</th>
                <th>Trạng Thái</th>
                <th>Thao Tác</th>
              </tr>
            </thead>
		  <tfoot>
			  <tr>
				<td colspan="8">
				 <div class="pagination">
				 	{$phan_trang}
                 </div>
				  <div class="clear"></div></td>
			  </tr>
			</tfoot>
<tbody>
			
            {foreach $danh_sach as $dien_dan}    
                <tr>
                <td>{$dien_dan.ma}</td>
                <td>{$dien_dan.domain}</td>
                <td style="text-align:left">{$dien_dan.ten}</td>
                <td >{dmy($dien_dan.ngay_tao)}</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="trang_thai.php?ma={$dien_dan.ma}" title="Hiển Thị"><img src="/home/admin/templates/images/trang_thai_{$dien_dan.trang_thai}.png" width="20" height="20"></a></td>
               
                <td><!-- Icons --> 
                  <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}" target="_blank" title="Xem"><img src="/forum/admin/templates/images/search.png" width="16" alt="Xem"></a>
                  <a href="xoa.php?ma={$dien_dan.ma}" onclick="return confirm('Bạn có chắc chắn muốn xóa mã #{$dien_dan.ma} không ?')" title="xóa"><img src="/forum/admin/templates/images/icons/cross.png" alt="Delete"></a>
                </td>
              </tr>
            {/foreach}                        
			</tbody>			
		  </table>
		</form>	
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content -->