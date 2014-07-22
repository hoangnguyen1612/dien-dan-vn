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
        {if !empty($quyen_chuyen_muc)}
        <p style="background: #fff8c4; border: 1px solid #f2c779; border-radius: 10px; padding: 10px 36px;">
        	<b style="font-size: 15px">Bạn có quyền xử lý các báo cáo vi phạm về bài viết trong các chuyên mục: <span style="text-transform:capitalize; color:#57A000">{$quyen_chuyen_muc}.</span>
            </b>
        </p><br />
        <span style="font-size: 11px;"><i>* Bạn chỉ có quyền xử lý các báo cáo sai phạm về bài viết thuộc chuyên mục mà bạn đã được cấp quyền (có biểu tượng&nbsp;&nbsp;<img src="/forum/admin/templates/images/role.png" style="vertical-align: text-bottom" title="Bạn có quyền xử lý báo cáo vi phạm này" />&nbsp;&nbsp;ở đầu dòng)</i></span>
        <br /><br />
        {/if}													
		<form method="get" action="binh_luan.php" name="fSearch" id="fSearch">
          Từ Khóa
          <input type="text" name="tu_khoa" class="text-input small-input" value="">
          <input class="button" type="submit" value="Tìm Kiếm">
          <input class="button" type="button" value="Tất cả" onclick="window.location.href='binh_luan.php'">
        </form>
		<form action="xoa_nhieu_binh_luan.php" method="post">
		  <table class="table">
<thead>
              <tr>
              	<th width="16px"></th>
                <th><input class="check-all" type="checkbox"></th>
                <th style="width: 170px">Tiêu đề bài viết</th>
                <th>Người viết bài</th>
                <th>Người báo cáo</th>
                <th style="width:150px">Lý Do Sai Phạm</th>
                <th style="width: 150px">Trạng thái xử lý</th>
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
			
            {foreach $ds_bao_cao_binh_luan as $k=>$bao_cao}   
                <tr {if $bao_cao.trang_thai == 0}style="background: #ffffff"{else if}style="background: #f1f1f1"{/if}>
                <td>{if $thanh_vien.loai_thanh_vien!=0 && tim_kiem_chuoi($qcm, $bao_cao.ma_loai_chuyen_muc)!==false}<img src="/forum/admin/templates/images/role.png" title="Bạn có quyền xử lý báo cáo vi phạm này" /> {/if}</td>
                
                <td><input name="data[]" type="checkbox" value="{post_encode($bao_cao.ma)}"></td>
                <td><a target="_blank" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/chi_tiet?ma={$bao_cao.ma_bai_viet}">{$bao_cao.tieu_de}</a></td>
                <td><a target="_blank" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={url_encode($bao_cao.ma_nguoi_dang)}">{get_ho_ten($bao_cao.ma_nguoi_dang)}</a></td>
                <td><a target="_blank" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={url_encode($bao_cao.ma_nguoi_bao_cao)}">{get_ho_ten($bao_cao.ma_nguoi_bao_cao)}</a></td>
                <td>{$bao_cao.noi_dung}</td>
                <td>{if $bao_cao.trang_thai == 0}Chưa xử lý{else if}Đã được xử lý bởi <a target="_blank" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={url_encode($bao_cao.ma_nguoi_xu_ly)}">{get_ho_ten($bao_cao.ma_nguoi_xu_ly)}</a>{/if}</td>
                <td style="text-align:left">{date('d-m-Y', strtotime($bao_cao.ngay_tao))}</td>           
                <td><!-- Icons --> 
                  <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/chi_tiet?ma={$bao_cao.ma_bai_viet}" target="_blank" title="Xem bài viết"><img src="/forum/admin/templates/images/search.png" width="16" alt="Xem"></a>
           
         {if $thanh_vien.loai_thanh_vien==0 || tim_kiem_chuoi($qcm, $bao_cao.ma_loai_chuyen_muc)!==false}         
            {if $bao_cao.trang_thai==1}      
                  <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/admin/bao_cao/xoa_binh_luan.php?ma={url_encode($bao_cao.ma)}" onclick="return confirm('Bạn có chắc chắn muốn xóa báo cáo vi phạm này không ?')" title="xóa"><img src="/forum/admin/templates/images/icons/cross.png" alt="Delete"></a>
			{/if}
         {/if}   

			{if $thanh_vien.loai_thanh_vien==0 || tim_kiem_chuoi($qcm, $bao_cao.ma_loai_chuyen_muc)!==false}	
                {if $bao_cao.trang_thai==0}
                   <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/admin/bao_cao/xu_ly_bao_cao_binh_luan.php?ma_bao_cao={url_encode($bao_cao.ma)}" title="Xử lý vi phạm"><img src="/forum/admin/templates/images/warning-icon.png" alt="Xử lý báo cáo vi phạm" width="16"></a>
                {/if}
            {/if}       
                </td>
              </tr>
            {/foreach}                        
			</tbody>			
		  </table>
		</form>	
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content -->