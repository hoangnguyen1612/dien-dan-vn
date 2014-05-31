<div class="content-box-header">
  <h3>Thành viên [Phân quyền]</h3>
  <ul class="content-box-tabs">
    <li><a href="danh_sach.php">Danh sách</a></li>
    <li><a href="#" class="default-tab">Phân quyền</a></li>
  </ul>
  <div class="clear"></div>
</div>
<!-- End .content-box-header -->

<div class="content-box-content">
  <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
    {showMessage()}
    <form action="phan_quyen_sm.php" method="post">
      <table class="table">
        <thead>
          <tr>
            <th></th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <td colspan="8"><div class="pagination"></div>
              <div class="clear"></div></td>
          </tr>
        </tfoot>
        <tbody>
        {foreach $thu_muc as $key=>$value}
          <tr>
        
        <td colspan='2'><p style='font-weight:bold; font-size:15px; color:#999'>{$value}</p>
           <table>
            {foreach $thao_tac.$key as $k=>$v}
            	 {$file = noi_chuoi($key, $k, '_')}
           		 {$chon = ''}
                 {if tim_kiem_chuoi($quyen, $file)!==false}
                 	{$chon = 'checked'}
                 {/if}
                 <tr>
                    <td width="200px"><label for='{$file}'>{$v}</label></td>
                    <td><input type='checkbox' value='{$file}' id='{$file}' name='item[]' {$chon} />
                </tr> 
            {/foreach}
           </table>
          </td>
         </tr>
            
            {/foreach}
            <tr>
              <td>
              	<input type="hidden" name="ma_nguoi_dung" value="{$smarty.get.ma}" />
              	<input type="submit" value="Lưu Và Tiếp Tục" name="save-and-continue" class="button">
                <input type="submit" value="Lưu Và Thoát" name="save-and-end" class="button">
                <input type="button" onclick="window.location.href='danh_sach.php'" value="Không Lưu" class="button"></td>
            </tr>
          </table>
          </tbody>
      </table>
    </form>
  </div>
  <!-- End #tab1 --> 
  
</div>
<!-- End .content-box-content -->