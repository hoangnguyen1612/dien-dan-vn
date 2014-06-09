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
      <div class="col-xs-12">
        <div class="box box-solid">
          <div class="box-body">
            <div class="row">
              <div class="col-md-3 col-sm-4"> 
                <!-- BOXES are complex enough to move the .box-header around.
                                                 This is an example of having the box header within the box body -->
                <div class="box-header"> <i class="fa fa-refresh"></i>
                  <h4 class="box-title">SỬ DỤNG TÀI KHOẢN</h4>
                </div>
                <!-- compose message btn --> 
                <a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-facebook-square"></i> Facebook</a><br />
                <br />
                <a class="btn btn-block btn-primary btn-warning" data-toggle="modal" data-target="#compose-modal"><i class="fa  fa-google-plus-square"></i> Google</a> </div>
              <!-- /.col (LEFT) -->
              <div class="col-md-9 col-sm-8">
                <div class="row pad"> {literal} 
                  <script>
						function validateEmail(email) { 
							var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>	()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
							return re.test(email);
						}

						function kiem_tra()
						{
							var ho = document.getElementById("ho");
							var ten = document.getElementById("ten");
							var ngay_sinh = document.getElementById("ngay_sinh");
							var email = document.getElementById("email");
							var mat_khau = document.getElementById("mat_khau");
							var re_mat_khau = document.getElementById("re_mat_khau");
							
							if(ho.value == '')
							{
								alert('Vui lòng nhập đầy đủ họ tên');
								ho.focus();
								return false;
							}
							if(ten.value == '')
							{
								alert('Vui lòng nhập đầy đủ họ tên');
								ten.focus();
								return false;
							}
							if(ngay_sinh.value == '')
							{
								alert('Vui lòng chọn ngày sinh');
								ngay_sinh.focus();
								return false;
							}
							if(email.value == '')
							{
								alert('Vui lòng nhập email');
								email.focus();
								return false;
							}
							if(validateEmail(email.value)==false)
							{
								alert('Địa chỉ email không hợp lệ');
								email.select();
								return false;
							}
							if(mat_khau.value == '')
							{
								alert('Vui lòng nhập mật khẩu');
								mat_khau.focus();
								return false;
							}
							if(re_mat_khau.value == '')
							{
								alert('Vui lòng nhập mật khẩu xác nhận');
								re_mat_khau.focus();
								return false;
							}
							if(re_mat_khau.value != mat_khau.value)
							{
								alert('Mật khẩu xác nhận và mật khẩu không trùng khớp');
								re_mat_khau.select();
								return false;
							}
							if(document.getElementById("check").value == 1)
							{
								alert('Địa chỉ Email này đã được sử dụng, vui lòng chọn một địa chỉ Email khác');
								email.select();
								return false;
							}
						}
                 	</script> 
                  {/literal}
                  <form id="signup_form" style="text-align:left" method="post" action="dang_ky_sm.php">
                    <table style="width:100%">
                      <tr>
                        <td><label>Họ và Tên</label>
                          <span class="red">*</span><br />
                          <input class="required form-control" id="ho" style="width:50%; float:left; margin-right:1%" name="data[ho]" type="text" autofocus="autofocus" value="{$smarty.session.data.ho|default:''}" placeholder="Họ" />
                          <input class="required form-control" id="ten" style="width:29%; float:left" name="data[ten]" type="text" autofocus="autofocus" value="{$smarty.session.data.ten|default:''}" placeholder="Tên" /></td>
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
                          <input class="required form-control" name="data[ngay_sinh]" type="text" id="ngay_sinh" value="{$smarty.session.data.ngay_sinh|default:''}"/></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><label>Email</label>
                          <span class="red">*</span><br />
                          <input  style="float:left" class="form-control" name="data[email]" type="text" id="email" value="{$smarty.session.data.email|default:''}" />
                          <div id="loading" style="float:left; margin-left: 10px; margin-top: 4px; width: 25px; height: 25px"></div>
                          <script>
						  $("#email").change(function(){
						  	if($("#email").val()!='')
							{
								$('#loading').html('<img src="/home/templates/images/loading.gif" width="25" height="25"/>');
								$.get('kiem_tra_email.php?email=' + $('#email').val(), function(data){
									if (data == 'yes') {
										$('#loading').html('<img src="/home/templates/images/warning-icon.png"/>');
										alert('Địa chỉ Email này đã được sử dụng, vui lòng chọn một địa chỉ Email khác');
										document.getElementById("check").value = 1;
									} else if (data == 'no') {
										$('#loading').html('<img src="/home/templates/images/ok.png"/>');
										document.getElementById("check").value = 0;
									}
								})
							}
							else
							{
								$('#loading').html('');
							}
						  });
							</script></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><label>Mật Khẩu</label>
                          <span class="red">*</span><br />
                          <input class="required form-control" name="data[mat_khau]" type="password" id="mat_khau" /></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><label>Nhập Lại Mật Khẩu</label>
                          <span class="red">*</span><br />
                          <input class="form-control" name="data[nhap_lai_mat_khau]" type="password" id="re_mat_khau" />
                          <input id="check" value="0" type="hidden" />
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
                        <td align="center"><input type="submit" value="Đăng Ký" class="btn btn-info" onclick="return kiem_tra()" />
                          &nbsp;&nbsp;&nbsp;
                          <input type="button" value="Thoát" class="btn btn-info" onclick="window.location.href='/'" /></td>
                      </tr>
                    </table>
                  </form>
                  <div class="col-sm-6 search-form"> </div>
                </div>
                <!-- /.row -->
                
                <div class="table-responsive"> </div>
                <!-- /.table-responsive --> 
              </div>
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
