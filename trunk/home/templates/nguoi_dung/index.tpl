</div>
</div>
<!-- start slider -->

<div class="slider_bg">
  <div class="wrap">
    <div class="slider">
      <h2>Thông Tin Tài Khoản</h2>
      <h3 style="">Xem và cập nhật thông tin cá nhân của bạn để chúng tôi có thể hỗ trợ bạn tốt hơn</h3>
    </div>
  </div>
</div>
<!-- start main -->
<div class="main_bg">
  <div class="wrap">
    <div class="main">
      <div class="content">
        <div class="user">
          <div class="title">
            <h3><i class="fa fa-pencil-square"></i>&nbsp;&nbsp;Thông Tin Cơ Bản</h3>
          </div>
          <table>
            {nocache}
            <tr>
              <td rowspan="3">
              <div id="img" style="background: url(../upload/hinh_dai_dien/{if $nguoi_dung.hinh_dai_dien!=NULL}{$nguoi_dung.hinh_dai_dien}{else if $nguoi_dung.gioi_tinh==0}no_avatar_male.jpg{else if}no_avatar_female.jpg{/if}); position:relative" onmouseover="document.getElementById('edit-image').style.display = 'block'"
                    onmouseout="document.getElementById('edit-image').style.display = 'none'">
              	<div style="width:100%; height:100%; background: #999; opacity:0.5; position:absolute; display:none" id="edit-image">
                	<a id="change" rel="leanModal" href="#change-image" style="display: block; color: white; width:80px; padding:10px; font-size:15px; background-color:#15A285; text-align:center; margin-top:50%; margin-left:20%">Thay Đổi</a>
                    <style>
                    	#change:hover{
							box-shadow: 0 0 0 2px white,0 0 0 3px #27AE60;
						}
                    </style>
                </div>
              </div></td>
              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              <td style="vertical-align:top"><table id="info-basic" style="display:block">
                        	<tr>
                            	<td><i class="fa fa-user"></i>&nbsp;<label class="info">Họ tên</label></td>
                                <td><label>{$nguoi_dung.ho_ten}</label></td>
                            </tr>
                            <tr>
                            	<td> <i class="fa fa-{if $nguoi_dung.gioi_tinh==1}female{else if}male{/if}"></i>&nbsp;&nbsp;<label class="info">Giới tính</label></td>
                                <td><label>{($nguoi_dung.gioi_tinh==0)?'Nam':'Nữ'}</label></td>
                            </tr>
                            <tr>
                            	<td><i class="fa fa-calendar-o"></i> <label class="info">Ngày sinh</label></td>
                                <td><label>{date('d-m-Y', strtotime($nguoi_dung.ngay_sinh))}</label></td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                            	<td>
                                	<input type="button" class="action-button" value="Chỉnh Sửa" onclick="open_edit_basic()" style="margin: 0px;"/>
                                </td>
                            </tr>
                        </table>
                
                <form id="co_ban_form" style="display:none">
                  <i class="fa fa-user"></i>&nbsp;
                  <label class="info">Họ tên</label>
                  <input type="text" class="required textbox" style="width:100%" name="ho_ten" id="ho_ten" value="{$nguoi_dung.ho_ten|default:''}"><br />
                  <label for="fullname" generated="true" class="error" style="display:none" id="err-fullname"></label>
                  <br />
                  <!----> 
                  <i class="fa fa-{if $nguoi_dung.gioi_tinh==1}female{else if}male{/if}"></i>&nbsp;&nbsp;
                  <label class="info">Giới tính</label><br />
                  <input type="radio" name="gioi_tinh" id="nam1" value="0" checked="checked"/>
                  <label for="nam1" style="color:#666; margin-left:0px">Nam</label>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="gioi_tinh" id="nu1" value="1" {if $nguoi_dung.gioi_tinh==1}checked{/if} />
                  <label for="nu1" style="color:#666;margin-left: 0px">Nữ</label><br />
                  <label for="fullname" generated="true" class="error" style="display:none" id="err-gender"></label>
                  <br />
                  <i class="fa fa-calendar-o"></i>
                  <label class="info">Ngày sinh</label><br />
                  <input type="text" class="required textbox" id="datepicker1" value="{$nguoi_dung.ngay_sinh|default:''}" style="width:100%" name="ngay_sinh"/>
                  <br />
                  <label for="fullname" generated="true" class="error" style="display:none" id="err-birthday"></label><br />
                  <script>
					$(function() {
						$( "#datepicker1" ).datepicker(
							{
								changeMonth: true,
							 	changeYear: true,
								yearRange: '1950:2000',
								dateFormat: "yy-mm-dd",
								monthNamesShort: [ "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12" ],
								dayNamesMin: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN']
							}
						);
					});
                </script>
                  <input type="submit" class="action-button" value="Cập Nhật" style="margin:0px	" />
                  <input type="button" class="action-button" value="Thoát" onclick="close_edit_basic()" style="margin:0px	"/>
                </form></td>
                
            </tr>
            {/nocache}
          </table>
          
          <script>
            function open_edit_basic()
            {
			   $("#info-basic").hide();
			   $("#co_ban_form").fadeIn(1000);
            }
            function close_edit_basic()
            {
			   $("#co_ban_form").hide();
			   $("#info-basic").fadeIn(1000);
            }
            function open_edit_contact()
            {
				$("#info-contact").hide();
				$("#lien_he_form").fadeIn(1000);
            }
            function close_edit_contact()
            {
                $("#lien_he_form").hide();
			   $("#info-contact").fadeIn(1000);
            }
            </script> 
        </div>
        <div class="user">
          <div class="title">
            <h3><i class="fa fa-pencil-square"></i>&nbsp;&nbsp;Thông Tin Liên Hệ</h3>
          </div>
          <table id="info-contact" style="display:block">
            <form id="msform">
              <tr>
                <td><i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;
                  <label class="info">Địa chỉ</label></td>
                <td><label>{$nguoi_dung.dia_chi|default: 'chưa có'}</label></td>
              </tr>
              <tr>
                <td><i class="fa fa-phone"></i>&nbsp;&nbsp;
                  <label class="info">Điện Thoại</label></td>
                <td><label>{$nguoi_dung.dien_thoai|default: 'chưa có'}</label></td>
              </tr>
              <tr>
                <td><i class="fa fa-envelope"></i>&nbsp;
                  <label class="info">Email</label></td>
                <td><label>{$nguoi_dung.email|default: 'chưa có'}</label></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><input type="button" class="action-button" value="Chỉnh Sửa" onclick="open_edit_contact()" style="margin: 0px;" /></td>
              </tr>
            </form>
          </table>
          <form id="lien_he_form" style="display:none">
          		<i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;
                <label class="info" style="margin-left: 0px">Địa chỉ</label><br />
                <input type="text" class="textbox" value="{$nguoi_dung.dia_chi|default:''}" style="width:60%" name="dia_chi"><br />
                <i class="fa fa-phone"></i>&nbsp;&nbsp;
                <label class="info" style="margin-left: 0px">Điện Thoại</label><br />
                <input type="text" class="textbox" value="{$nguoi_dung.dien_thoai|default:''}" style="width:60%" name="dien_thoai"><br />

                <input type="submit" class="action-button" value="Cập Nhật" style="margin: 0px;"/>
                <input type="button" class="action-button" value="Thoát" onclick="close_edit_contact()"/>
          </form>
        </div>
        <div class="user">
          <div class="title">
            <h3><i class="fa fa-pencil-square"></i>&nbsp;&nbsp;lĩnh vực quan tâm</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="../templates/scripts/sliding.js"></script>

<div id="change-image" class="form" style="width:45%;">
  <div class="form-header">
  	<i class="fa fa-picture-o"></i>&nbsp;&nbsp;Chỉnh Sửa Hình Ảnh
    <a class="modal_close" href="#"></a> 
  </div>
  <div id="content" style="padding: 10px">
<div id="upload-wrapper">
<div align="center">
<span class="" style="font-size:15px">Các File hình ảnh: JPEG, JPG, PNG and GIF. <br /> Kích thước tối đa 2 MB</span>
<form action="upload.php" onSubmit="return false" method="post" enctype="multipart/form-data" id="MyUploadForm">
<input name="ImageFile" id="imageInput" type="file" />
<input type="submit"  id="submit-btn" value="Tải Lên" class="action-button" />
<img src="../templates/images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Vui lòng đợi"/>
</form>
<div id="progressbox" style="display:none;"><div id="progressbar"></div ><div id="statustxt">0%</div></div>
<div id="output"></div>
</div>
</div>
<input type="button" onclick="location.reload()" value="Thoát" class="action-button" style="margin-right: 40px; float:right" />
<script type="text/javascript">
$(document).ready(function() { 

	var progressbox     = $('#progressbox');
	var progressbar     = $('#progressbar');
	var statustxt       = $('#statustxt');
	var completed       = '0%';
	
	var options = { 
			target:   '#output',   // target element(s) to be updated with server response 
			beforeSubmit:  beforeSubmit,  // pre-submit callback 
			uploadProgress: OnProgress,
			success:       afterSuccess,  // post-submit callback 
			resetForm: true        // reset the form after successful submit 
		}; 
		
	 $('#MyUploadForm').submit(function() { 
			$(this).ajaxSubmit(options);  			
			// return false to prevent standard browser submit and page navigation 
			return false; 
		});
	
//when upload progresses	
function OnProgress(event, position, total, percentComplete)
{
	//Progress bar
	progressbar.width(percentComplete + '%') //update progressbar percent complete
	statustxt.html(percentComplete + '%'); //update status text
	if(percentComplete>50)
		{
			statustxt.css('color','#fff'); //change status text to white after 50%
		}
}

//after succesful upload
function afterSuccess()
{
	$('#submit-btn').show(); //hide submit button
	$('#loading-img').hide(); //hide submit button

}

//function to check file size before uploading.
function beforeSubmit(){
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{

		if( !$('#imageInput').val()) //check empty input filed
		{
			$("#output").html("<span style='color:crimson'>Vui lòng chọn hình ảnh để tải lên!</span>");
			return false
		}
		
		var fsize = $('#imageInput')[0].files[0].size; //get file size
		var ftype = $('#imageInput')[0].files[0].type; // get file type
		
		//allow only valid image file types 
		switch(ftype)
        {
            case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
                break;
            default:
                $("#output").html("<b>"+ftype+"</b> File không hợp lệ!");
				return false
        }
		
		//Allowed file size is less than 1 MB (1048576)
		if(fsize>2048576) 
		{
			$("#output").html("<b>"+bytesToSize(fsize) +"</b> File có kích thước trên 2Mb! <br />Vui lòng chọn File khác.");
			return false
		}
		
		//Progress bar
		progressbox.show(); //show progressbar
		progressbar.width(completed); //initial value 0% of progressbar
		statustxt.html(completed); //set status text
		statustxt.css('color','#000'); //initial color of status text

				
		$('#submit-btn').hide(); //hide submit button
		$('#loading-img').show(); //hide submit button
		$("#output").html("");  
	}
	else
	{
		//Output error to older unsupported browsers that doesn't support HTML5 File API
		$("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
		return false;
	}
}

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

}); 

</script>
<link href="../templates/css/upload.css" rel="stylesheet" type="text/css">

  </div>
</div>