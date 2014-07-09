<aside class="right-side"> 
  <!-- Content Header (Page header) -->
  <section class="content-header no-margin">
    <h1> Đăng Ký Tài Khoản </h1>
  </section>
  {showMessage()} 
  <!-- Main content -->
  <section class="content"> 
    <!-- MAILBOX BEGIN -->
    <div class="mailbox row">
      <div class="col-xs-9">
        <div class="box box-solid">
          <div class="box-body">
            <div class="row" style="margin-left: 50px">
              <!-- /.col (LEFT) -->
                <div class="row pad">
                  <script>
                  	$(document).ready(function(e) {
                        var validator = $("#signup_form").validate({
							 rules: { 
									ho: {
										required: true
									},
									ten: {
										required: true
									},
									ngay_sinh: {
										required: true
									},
									'data[email]': {
										required: true,
										email: true,
										remote:{   //gọi AJAX tương tự $.ajax của jquery
											url: "/home/tai_khoan/kiem_tra_email.php",// gọi đến trang kiểm tra username
											type: "post",
										}
									},
									'data[mat_khau]': {
										required: true,
										minlength: 6
									},
									'data[nhap_lai_mat_khau]': {
										required: true,
										equalTo: "#mat_khau" 
									},
								}, 
								messages: { 
									'data[ho]':{
										required:" Vui lòng nhập họ",
									},
									'data[ten]':{
										required:" Vui lòng nhập tên",
									},
									'data[ngay_sinh]':{
										required:" Vui lòng nhập ngày sinh",
									},
									'data[email]':{
										required:" Vui lòng nhập địa chỉ email",
										email:" Địa chỉ email không hợp lệ",
										remote:' Địa chỉ email này đã tồn tại, vui lòng chọn địa chỉ email khác'
									},
									'data[mat_khau]':{
										required:" Vui lòng nhập mật khẩu",
										minlength: " Mật khẩu phải có ít nhất 6 ký tự"
									},
									'data[nhap_lai_mat_khau]':{
										required:" Vui lòng nhập mật khẩu xác nhận",
										equalTo: ' Mật khẩu xác nhận không trùng khớp'
									},
								},
								
						})	
                    });
                  </script>
                  <form id="signup_form" style="text-align:left" method="post" action="dang_ky_sm.php" autocomplete="off">
                    <table style="width:100%">
                      <tr>
                        <td><label>Họ và Tên</label>
                          <span class="red">*</span><br />
                          <input class="required form-control" id="ho" style="width:50%; float:left; margin-right:1%" name="data[ho]" type="text" autofocus="autofocus" value="{$smarty.session.data.ho|default:''}" placeholder="Họ" />
                          <input class="required form-control" id="ten" style="width:29%; float:left" name="data[ten]" type="text" autofocus="autofocus" value="{$smarty.session.data.ten|default:''}" placeholder="Tên" /><div class="clear"></div>
                          <label for="ho" generated="true" class="error" style="display:none"></label>
                          <label for="ten" generated="true" class="error" style="display:none"></label>
                          </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><label>Giới Tính</label>
                          <span class="red">*</span><br />
                          <div style="margin-top:8px;">
                            <input type="radio" class="radio" name="data[gioi_tinh]" id="nam" value="0" checked="checked"/>
                            <label for="nam" id="lbl-nam" style="color:#666">Nam</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio"  class="radio" name="data[gioi_tinh]" id="nu" value="1" />
                            <label for="nu" id="lbl-nu" style="color:#666">Nữ</label>
                          </div></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><label>Ngày Sinh</label>
                          <span class="red">*</span><br />
                          <input class="required form-control" name="data[ngay_sinh]" type="text" id="ngay_sinh" value="{$smarty.session.data.ngay_sinh|default:''}"/>
                          <label for="ngay_sinh" generated="true" class="error" style="display:none"></label>
                          </td>
                          <script>
						$(function() {
							$( "#ngay_sinh" ).datepicker(
								{
									changeMonth: true,
									changeYear: true,
									yearRange: '1950:2000',
									dateFormat: "yy-mm-dd",
									monthNamesShort: [ "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12" ],
									dayNamesMin: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN'],
									defaultDate: '1990-01-01'
								}
							);
						});
					</script>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><label>Email</label>
                          <span class="red">*</span><br />
                          <input style="float:left" class="required form-control" name="data[email]" type="text" id="email" value="{$smarty.session.data.email|default:''}" />
                          <label for="email" generated="true" class="error" style="display:none"></label>
                          </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><label>Mật Khẩu</label>
                          <span class="red">*</span><br />
                          <input id="mat_khau" class="required form-control" name="data[mat_khau]" type="password" />
                          <label for="mat_khau" generated="true" class="error" style="display:none"></label>
                          </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><label>Nhập Lại Mật Khẩu</label>
                          <span class="red">*</span><br />
                          <input class="form-control" name="data[nhap_lai_mat_khau]" type="password" id="re_mat_khau" />
                          <input id="check" value="0" type="hidden" />
                          <label for="re_mat_khau" generated="true" class="error" style="display:none"></label>
                          </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><label>Nghề nghiệp</label>
                          <span class="red">*</span><br />
                          {foreach $nghe_nghiep as $key=>$value}
                          <input type="radio" name="data[nghe_nghiep]" id="{$key}" value="{$key}" {if isset($smarty.session.data.nghe_nghiep) && $smarty.session.data.nghe_nghiep == $key}checked{else if $key==3}checked{/if}/>
                          <label for="{$key}" id="lbl-nam" style="color:#666">{$value}</label>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          {/foreach} </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center"><input type="submit" value="Đăng Ký" class="btn custom warning" />
                          &nbsp;&nbsp;&nbsp;
                          <input type="button" value="Thoát" class="btn custom" onclick="window.location.href='/'" /></td>
                      </tr>
                    </table>
                  </form>
                  <div class="col-sm-6 search-form"> </div>
                </div>
                <!-- /.row -->
              <!-- /.col (RIGHT) --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.box-body --> 
        </div>
        <!-- /.box --> 
      </div>
      <!-- /.col (MAIN) --> 
    </div>
    <!-- MAILBOX END --> 
    
  </section>
  <!-- /.content --> 
</aside>
