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
          <input type="text" name="tu_khoa" class="text-input small-input" value="">
          <input class="button" type="submit" value="Tìm Kiếm">
          <input class="button" type="button" value="Tất cả" onclick="window.location.href='danh_sach.php'">
        </form>
		<form action="cap_nhat_nhieu.php" method="post">
		  <table class="table">
			<thead>
              <tr>
                <th width="50"><input type="checkbox" class="check-all"></th>
                <th width="200">Tên Thành Viên</th>
                <th width="150">Loại thành viên</th>
                <th width="80">Trạng thái</th>
                <th width="150" class="c">Ngày gia nhập</th>
                <th width="100" class="r">Tác Vụ</th>
              </tr>
            </thead>
			<tfoot>
			  <tr>
             	
				<td colspan="8">
             
                <div class="bulk-actions align-left"><img src="/forum/admin/templates/images/arrow_ltr.png" />
                 {html_options name=loai_thanh_vien options= $cap_nhat_thanh_vien}
                 <input name="xoa_muc_chon" class="button" type="submit" value="Cập Nhật Các Mục Đã Chọn"></div>
				  <div class="pagination">
                  {$bo_nut}
				</div></td>
			  </tr>
			</tfoot>
			<tbody>
              
               {foreach $ds_thanh_vien as $tv} 
               {if $tv.ma_nguoi_dung==$thanh_vien.ma_nguoi_dung}{continue}{/if}  
                <tr>
                <td><input name="item[]" type="checkbox" value="{post_encode($tv.ma_nguoi_dung)}"></td>
                <td >{$tv.ho_thanh_vien} {$tv.ten_thanh_vien}</td>
                <td >{$loai_thanh_vien[$tv.loai_thanh_vien]}</td>
                <td class="c"><a href="cap_nhat_trang_thai.php?ma={url_encode($tv.ma_nguoi_dung)}" title="Gia nhập"><img src="/forum/admin/templates/images/trang_thai_{$tv.trang_thai}.png" width="20" height="20"> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td class="c">{_date($tv.ngay_gia_nhap)}</td>
                <td class="r"><!-- Icons -->
                
               	{if ($owner==1 || tim_kiem_chuoi($quyen, 'thanh_vien_phan_quyen')!==false) && $tv.loai_thanh_vien==1}
                 <a href="phan_quyen.php?ma={url_encode($tv.ma_nguoi_dung)}" title="Phân Quyền Chức Năng"><img alt="Phân Quyền" src="/forum/admin/templates/images/role.png"></a>&nbsp;&nbsp;&nbsp;
                 {/if}
                 {if ($owner==1 || tim_kiem_chuoi($quyen, 'thanh_vien_phan_quyen_chuyen_muc')!==false) && $tv.loai_thanh_vien==1}
                 <a href="phan_quyen_chuyen_muc.php?ma={url_encode($tv.ma_nguoi_dung)}" title="Phân Quyền Chuyên Mục"><img alt="Phân Quyền" src="/forum/admin/templates/images/role_1.png" ></a>&nbsp;&nbsp;&nbsp;
                 {/if}
          		{if $owner==1 || tim_kiem_chuoi($quyen, 'thanh_vien_xoa')!==false}
                 <a href="xoa.php?ma={$tv.ma_nguoi_dung}" onclick="return confirm('Bạn có chắc chắn muốn xóa {$tv.ten_thanh_vien} không ?')" title="Delete"><img style="cursor:pointer" alt="Xóa" src="/forum/admin/templates/images/icons/cross.png"> </a>
                 {/if}
                 </td>
              </tr>      
 				{/foreach} 
              
                                            
                  </tbody>
		  </table>
		</form>	
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content -->