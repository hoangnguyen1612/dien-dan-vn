<div class="content-box-header">
					
	<h3>Thành viên [Danh sách]</h3>
	
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
		<form action="cap_nhat_nhieu.php" method="post">
		  <table class="table">
			<thead>
              <tr>
                <th width="200">Tên người dùng</th>
                <th width="50">Giới tính</th>
                <th width="150" class="c">Ngày gia nhập</th>
                <th width="80">Trạng thái</th>
                <th width="100" class="c">Hình đại diện</th>
                <th width="100" class="r">Tác Vụ</th>
              </tr>
            </thead>
			<tfoot>
			  <tr>
             	
				<td colspan="8">
				  <div class="pagination">
                  {$phan_trang}
				</div></td>
			  </tr>
			</tfoot>
			<tbody>       
               {foreach $danh_sach as $nguoi_dung}   
                <tr>
                <td >{$nguoi_dung.ho} {$nguoi_dung.ten}</td>
                <td class="c"><img src="/home/admin/templates/images/gioi_tinh_{$nguoi_dung.gioi_tinh}.png" /></td>
                <td class="c">{_date($nguoi_dung.ngay_tham_gia)}</td>
                <td class="c"><a href="cap_nhat_trang_thai.php?ma={($nguoi_dung.ma)}" title="{if $nguoi_dung.trang_thai==0}Đã khóa tài khoản{else if}Đang được kích hoạt{/if}"><img src="/forum/admin/templates/images/trang_thai_{$nguoi_dung.trang_thai}.png" width="20" height="20"> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td class="c"><img src="/home/upload/nguoi_dung/{$nguoi_dung.hinh_dai_dien}" width="50" /></td>
                <td class="r">         
                 <a target="_blank" href="/tai_khoan/{$nguoi_dung.ma}-{convert_to_dot(noi_chuoi($nguoi_dung.ho, $nguoi_dung.ten, ' '))}" title="Xem chi tiết"><img style="cursor:pointer" alt="Xóa" src="/forum/admin/templates/images/search.png" width="16px"></a>&nbsp;&nbsp;
                 <a href="xoa.php?ma={$nguoi_dung.ma}" onclick="return confirm('Bạn có chắc chắn muốn xóa {$nguoi_dung.ten} không ?')" title="Xóa"><img style="cursor:pointer" alt="Xóa" src="/forum/admin/templates/images/icons/cross.png"> </a></td>
              </tr>      
 				{/foreach} 
              
                                            
                  </tbody>
		  </table>
		</form>	
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content -->