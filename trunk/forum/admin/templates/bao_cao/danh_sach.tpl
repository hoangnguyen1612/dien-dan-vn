<div class="content-box-header">
					
	<h3>Báo cáo [Danh sách]</h3>
	
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
		<form action="xoa_nhieu.php" method="post">
		  <table class="table">
<thead>
              <tr>
                <th><input class="check-all" type="checkbox"></th>
                <th>Tiêu đề</th>
                <th>Lý Do Sai Phạm</th>
                <th>Người báo cáo</th>
                <th>Ngày Tạo</th>
                <th>Thao Tác</th>
              </tr>
            </thead>
		  <tfoot>
			  <tr>
				<td colspan="8"><div class="bulk-actions align-left"><img src="/forum/admin/templates/images/arrow_ltr.png" /> <input name="xoa_muc_chon" class="button" type="submit" value="Xóa Các Mục Đã Chọn" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')"></div>
				 <div class="pagination">
                 {$bo_nut}
					</div>
				  <div class="clear"></div></td>
			  </tr>
			</tfoot>
<tbody>
			
            {foreach $ds_bao_cao_bai_viet as $k=>$bai_viet}    
                <tr class="alt-row">
                <td><input name="data[]" type="checkbox" value="{$bai_viet.ma}"></td>
                <td>{$bai_viet.tieu_de}</td>
                <td>{$bai_viet.noi_dung}</td>
                <td>{$bai_viet.ten_nguoi_bao_cao}</td>
                <td style="text-align:left">{date('d-m-Y', strtotime($bai_viet.ngay_tao))}</td>           
                <td><!-- Icons --> 
                  <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/chi_tiet?ma={$bai_viet.ma_bai_viet}" target="_blank" title="Xem"><img src="/forum/admin/templates/images/search.png" width="16" alt="Xem"></a>
                  <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/admin/bao_cao/xoa.php?ma={$bai_viet.ma}" onclick="return confirm('Bạn có chắc chắn muốn xóa mã #{$bai_viet.ma} không ?')" title="xóa"><img src="/forum/admin/templates/images/icons/cross.png" alt="Delete"></a>
                  <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/admin/bao_cao/gui_thong_bao_den_nguoi_viet.php?ma_nguoi_viet={$bai_viet.ma_nguoi_dang}&ma_bai_viet={$bai_viet.ma_bai_viet}" title="Gửi thông báo cảnh cáo đến người viết bài"><img src="/forum/admin/templates/images/send_email_user_alternative.png" alt="Gửi" width="16"></a>
                   <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/admin/bao_cao/gui_thong_bao.php?ma_nguoi_bao_cao={$bai_viet.ma_nguoi_bao_cao}&ma_bai_viet={$bai_viet.ma_bai_viet}" title="Gửi thông báo đã xử lý đến người báo cáo sai phạm"><img src="/forum/admin/templates/images/mail.png" alt="Gửi" width="16"></a>
                    <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/admin/bao_cao/trang_thai_tai_khoan.php?ma={$bai_viet.ma_nguoi_dang}" {if trang_thai_tai_khoan($bai_viet.ma_nguoi_dang,$dien_dan.ma)== 1 } title="Khóa tài khoản đăng bài này" onclick="return confirm('Bạn có chắc chắn muốn khóa tài khoản thành viên của bài viết này không ?')" {else} title ="Mở lại tài khoản đăng bài này" {/if}"><img src="/forum/admin/templates/images/trang_thai_tai_khoan_{trang_thai_tai_khoan($bai_viet.ma_nguoi_dang,$dien_dan.ma)}.png" width="16" alt="Xem"></a>
                      <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/admin/bao_cao/trang_thai_bai_viet.php?ma={$bai_viet.ma_bai_viet}" {if trang_thai_bai_viet($bai_viet.ma_bai_viet,$dien_dan.ma) == 1 } title="Khóa bài viết này" onclick="confirm('Bạn có chắc muốn khóa bài viết này ?');"{else} title="Mở khóa cho bài viết" {/if}><img src="/forum/admin/templates/images/trang_thai_bai_viet_{trang_thai_bai_viet($bai_viet.ma_bai_viet,$dien_dan.ma)}.png" width="16" alt="Xem"></a>
                       
                </td>
              </tr>
            {/foreach}                        
			</tbody>			
		  </table>
		</form>	
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content -->