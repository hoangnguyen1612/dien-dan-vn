<aside class="right-side"> 
  <!-- Content Header (Page header) -->
  <section class="content-header no-margin">
    <h1>
   		Liên hệ
   </h1>
  </section>
  {showMessage()} 
  <!-- Main content -->
  <section class="content"> 
    <!-- MAILBOX BEGIN -->
    <div class="row">
      <div class="col-xs-9"> 
		<div class="box box-solid">
          <div class="box-body">
            <div class="row" style="margin-left: 30px; margin-right:30px;">
				<form action="them_sm.php" method="post" name="Form">
                	<div class="form-group">
                        <input type="text" class="form-control" id="ho_ten" name="data[ho_ten]" placeholder="Họ tên:" value="{$smarty.session.data.ho_ten|default:''}"/>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="data[email]" placeholder="Địa chỉ email:" value="{$smarty.session.data.email|default:''}"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tieu_de" name="data[tieu_de]" placeholder="Tiêu đề:" value="{$smarty.session.data.tieu_de|default:''}"/>
                    </div>
                    <div>
                        <textarea class="textarea form-control" placeholder="Nội dung:" id="noi_dung" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="data[noi_dung]">{$smarty.session.data.noi_dung|default:''}</textarea>
                    </div>
                    <div class="form-group" style="margin-top:15px;">
                        <input type="text" class="form-control" id="tieu_de" name="captcha" placeholder="Mã bảo vệ:" style="width: 200px; float:left;"/>
                        <img src="/libraries/captcha/html-contact-form-captcha/captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' style="float:left; margin-left: 10px;"><a href='javascript: refreshCaptcha();' style="display:block; float:left; margin-top: 10px; margin-left: 10px">(Thay đổi mã bảo vệ)</a>
                    </div>
                    <script language='JavaScript' type='text/javascript'>
						function refreshCaptcha()
						{
							var img = document.images['captchaimg'];
							img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
						}
					</script>
                    <div style="clear:both"></div>
                    <div style="margin-top:10px;">
                    	<input type="submit" value="Gửi liên hệ" class="btn btn-info" onclick="return kt_lien_he()" />&nbsp;&nbsp;
                        <input type="button" id="reset" value="Nhập lại" class="btn btn-info" />
                    </div>
                </form>
                <script>
                	$("#reset").click(function(){ 
						$(".form-control").val("");
					});
                </script>
                <script>
                	function kt_lien_he()
					{
						var a=document.forms["Form"]["data[ho_ten]"].value;
						var b=document.forms["Form"]["data[email]"].value;
						var c=document.forms["Form"]["data[tieu_de]"].value;
						var d=document.forms["Form"]["data[noi_dung]"].value;
						var e=document.forms["Form"]["captcha"].value;
						if (a==null || a=="",b==null || b=="",c==null || c=="",d==null || d=="" ,e==null || e=="" )
						{
							alert("Vui lòng điền đầy đủ thông tin được yêu cầu");
							return false;
						}
					}
                </script>
            </div>
          </div>
         </div>  
      </div>
      <!-- /.col (MAIN) --> 
    </div>
    <!-- MAILBOX END --> 
    
  </section>
  <!-- /.content --> 
</aside>