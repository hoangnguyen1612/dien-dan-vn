
<div class="content-box-header">
					
	<h3>Màu sắc Menu [Danh sách]</h3>
	
	<ul class="content-box-tabs">
		<li><a href="#" class="default-tab">Danh sách</a></li>
	</ul>
	
	<div class="clear"></div>
	
</div> <!-- End .content-box-header -->

<div class="content-box-content">

	<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

		{showMessage()}												
		<form action="cap_nhat.php" method="post" id="form1">
		  <table class="table">
<thead>
	<span style="color:red">*Vui lòng nhấp để chọn màu sắc cần cập nhật*</span>
              <tr>
                <th>Tiêu Đề</th>
                <th>Màu sắc</th>
              </tr>
            </thead>
		
<tbody>
				<tr>
                <td>Trang chủ</td>
                <td style="text-align:left"><input type="color" id="c1" style="cursor:pointer" value="{$mang_mau_sac[0]}" />
                	&nbsp;&nbsp;<input type="text" name="trang_chu" class="text-input" style="width: 70px; margin-top: -2px;" id="trang_chu" value="{$mang_mau_sac[0]}" />
                </td>
                </tr>
                <tr>
                <td>Thành viên</td>
                <td style="text-align:left"><input type="color" id="c2" style="cursor:pointer" value="{$mang_mau_sac[1]}" />
                &nbsp;&nbsp;<input type="text" name="thanh_vien" class="text-input" style="width: 70px; margin-top: -2px;" id="thanh_vien" value="{$mang_mau_sac[1]}" />
                </td>
                </tr>
                <tr>
                <td>Phản hồi</td>
                <td style="text-align:left"><input type="color"  id="c3" style="cursor:pointer" value="{$mang_mau_sac[2]}" />
                &nbsp;&nbsp;<input type="text" name="phan_hoi" class="text-input" style="width: 70px; margin-top: -2px;" id="phan_hoi" value="{$mang_mau_sac[2]}" />
                <script>
                $(document).ready(function(e) {
                    $("#c1").change(function(){
						document.getElementById("trang_chu").value = document.getElementById("c1").value;
					});
					 $("#c2").change(function(){
						document.getElementById("thanh_vien").value = document.getElementById("c2").value;
					});
					 $("#c3").change(function(){
						document.getElementById("phan_hoi").value = document.getElementById("c3").value;
					});
                });
                </script>
                </td>
                </tr>
           <tr><td colspan="2" align="center"><input type="submit" value="Cập nhật" class="button" style="margin-left:300px"/> </tr>                   
			</tbody>			
		  </table>
		</form>	
								
	</div> <!-- End #tab1 -->
						
</div> <!-- End .content-box-content -->