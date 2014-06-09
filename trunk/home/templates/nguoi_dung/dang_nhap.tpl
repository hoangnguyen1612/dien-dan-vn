<aside class="right-side"> 
  <!-- Content Header (Page header) -->
  <section class="content-header no-margin">
    <h1> Đăng Nhập Tài Khoản </h1>
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
                <a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modal">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-facebook-square"></i> Facebook</a><br /> <br /><a class="btn btn-block btn-primary btn-warning" data-toggle="modal" data-target="#compose-modal"><i class="fa  fa-google-plus-square"></i> Google</a>
              </div>
              <!-- /.col (LEFT) -->
              <div class="col-md-9 col-sm-8">
                <div class="row pad">
                    {literal}
					<script>
						function validateEmail(email) { 
							var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>	()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
							return re.test(email);
						}

						function kiem_tra()
						{
							var email = document.getElementById("email");
							var mat_khau = document.getElementById("mat_khau");
							
							if(email.value == '')
							{
								alert('Vui lòng nhập địa chỉ email');
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
						}
                 	</script>
                    {/literal}
                    <form id="signup_form" style="text-align:left" method="post" action="dang_nhap_sm.php">
                      <table style="width:50%" align="center">
                        <tr>
                          <td><label><i class="fa fa-user"></i> &nbsp;Email</label>
                            <span class="red">*</span><br />
                            <input class="form-control" style="width:100%" name="data[email]" type="text" id="email" value="{$smarty.session.data.email|default:''}" /></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><label><i class="fa  fa-unlock-alt"></i> &nbsp;Mật Khẩu</label>
                            <span class="red">*</span><br />
                            <input class="required form-control" style="width:100%" name="data[mat_khau]" type="password" id="mat_khau" /></td>
                        </tr>
                       
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr align="right">
                          <td colspan="2"><input type="checkbox" id="remember" /><label for="remember">&nbsp;&nbsp;Ghi nhớ tôi</label></td></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="center"><input type="submit" value="Đăng Nhập" class="btn btn-info" onclick="return kiem_tra()" />
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
