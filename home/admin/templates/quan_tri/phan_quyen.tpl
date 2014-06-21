<div class="content-box-header">
  <h3>Phân quyền</h3>

  <div class="clear"></div>
</div>
<!-- End .content-box-header -->

<div class="content-box-content">
  <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
    
    <div></div>
    <form method="post" action="phan_quyen_sm.php" name="fthem" onsubmit="return kiemtra()">
      <fieldset>
        <table class="table">
          <thead>
            <tr>
              <td colspan="3"><div>  </div>
                <div class="clear"></div></td>
            </tr>
          </thead>
          <tbody>
          	<tr style="">
        <td colspan="3"><span style="font-weight:bold; font-size:17px"> Chọn nhân viên quản trị </span> &nbsp; &nbsp; &nbsp; 
      <select name="ma" id="ma" onchange="reload()">
        <option value="">Chọn quản trị</option>
             
                {foreach $ds_quan_tri as $quan_tri} 			
                	
        <option value="{$quan_tri['ma']}" {if isset($ma) && $ma == $quan_tri['ma']}selected{/if}>{$quan_tri['ho_ten']}</option>
        
            	{/foreach}
              
      </select>
        </td>
    		</tr>
            <tr>
              <td><h4>Bài viết</h4>
                <p>
                  <input  type="checkbox" name="item[]" id="bai_viet/danh_sach.php" value="bai_viet/danh_sach.php" />
                  Danh sách</p>
                <p>
                  <input  type="checkbox" name="item[]" id="bai_viet/them.php" value="bai_viet/them.php"/>
                  Thêm</p>
                <p>
                  <input  type="checkbox" name = "item[]" id= "bai_viet/xoa.php" value="bai_viet/xoa.php"/>
                  Xóa</p>
                <p>
                  <input  type="checkbox" name = "item[]"  id="bai_viet/cap_nhat.php" value="bai_viet/cap_nhat.php" />
                  Cập nhật </p></td>
                  
                  
              <td><h4>Sản phẩm</h4>
                <p>
                  <input type="checkbox" name = "item[]" id="san_pham/danh_sach.php" value="san_pham/danh_sach.php" />
                  Danh sách</p>
                <p>
                  <input  type="checkbox" name = "item[]" id="san_pham/them.php" value="san_pham/them.php" />
                  Thêm</p>
                <p>
                  <input  type="checkbox"  name = "item[]" id= "san_pham/xoa.php" value="san_pham/xoa.php"/>
                  Xóa</p>
                <p>
                  <input  type="checkbox"  name = "item[]"  id="san_pham/cap_nhat.php" value="san_pham/cap_nhat.php" />
                  Cập nhật </p></td>
                  
                <td><h4>Hỗ trợ trực tuyến</h4>
                <p>
                  <input  type="checkbox" name = "item[]" id="ho_tro_truc_tuyen/danh_sach.php" value="ho_tro_truc_tuyen/danh_sach.php" />
                  Danh sách</p>
                <p>
                  <input  type="checkbox" name = "item[]" id="ho_tro_truc_tuyen/them.php" value="ho_tro_truc_tuyen/them.php" />
                  Thêm</p>
                <p>
                  <input type="checkbox" name = "item[]"  id= "ho_tro_truc_tuyen/xoa.php" value="ho_tro_truc_tuyen/xoa.php" />
                  Xóa</p>
                <p>
                  <input type="checkbox" name = "item[]"  id="ho_tro_truc_tuyen/cap_nhat.php" value="ho_tro_truc_tuyen/cap_nhat.php" />
                  Cập nhật </p></td>   
                  
                  
            </tr>
            
            
            <tr>
              <td><h4>Loại bài viết</h4>
                <p>
                  <input  type="checkbox" name = "item[]" id="loai_bai_viet/danh_sach.php" value="loai_bai_viet/danh_sach.php"/>
                  Danh sách</p>
                <p>
                  <input  type="checkbox" name = "item[]" id="loai_bai_viet/them.php" value="loai_bai_viet/them.php"/>
                  Thêm</p>
                <p>
                  <input  type="checkbox" name = "item[]" id= "loai_bai_viet/xoa.php" value="loai_bai_viet/xoa.php"/>
                  Xóa</p>
                <p>
                  <input  type="checkbox" name = "item[]"  id="loai_bai_viet/cap_nhat.php" value="loai_bai_viet/cap_nhat.php"  />
                  Cập nhật </p></td>
                  
                  
              <td><h4>Loại sản phẩm</h4>
                <p>
                  <input  type="checkbox" name = "item[]" id="loai_san_pham/danh_sach.php" value="loai_san_pham/danh_sach.php"/>
                  Danh sách</p>
                <p>
                  <input  type="checkbox" name = "item[]" id="loai_san_pham/them.php" value="loai_san_pham/them.php"/>
                  Thêm</p>
                <p>
                  <input  type="checkbox" name = "item[]" id="loai_san_pham/xoa.php" value="loai_san_pham/xoa.php"/>
                 Xóa</p>                 
                <p>
                  <input  type="checkbox" name = "item[]"  id="loai_san_pham/cap_nhat.php" value="loai_san_pham/cap_nhat.php"  />
                  Cập nhật </p></td>
                  
                  
               <td><h4>Banner</h4>
                <p>
                  <input  type="checkbox" name = "item[]" id="banner_quang_cao/danh_sach.php" value="banner_quang_cao/danh_sach.php" />
                  Danh sách</p>
                <p>
                  <input  type="checkbox" name = "item[]"   id="banner_quang_cao/them.php" value="banner_quang_cao/them.php"/>
                  Thêm</p>
                <p>
                  <input type="checkbox"  name = "item[]" id= "banner_quang_cao/xoa.php" value="banner_quang_cao/xoa.php"/>
                  Xóa</p>
                <p>
                  <input  type="checkbox" name = "item[]"  id="banner_quang_cao/cap_nhat.php" value="banner_quang_cao/cap_nhat.php" />
                  Cập nhật </p></td>
            </tr>            
            
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3"><p style="text-align:center">
          <input type="submit" value="Cấp quyền" name="button[save]" class="button" onclick="return kiem_tra()" >
          <input type="button" onclick="window.location.href='danh_sach.php'" value="Bỏ qua" class="button">
        </p></td>
            </tr>
          </tfoot>
        </table>
        
      </fieldset>
      <div class="clear"></div>
    </form>
  </div>
  <!-- End #tab1 --> 
  
</div>
<!-- End .content-box-content -->