<aside class="right-side"> 
  <!-- Content Header (Page header) -->
  <section class="content-header no-margin">
    <h1> Trang cá nhân </h1>
  </section>
  {showMessage()} 
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-9" style="">
        <div class="box box-solid">
          <div class="box-body">
            <div class="row" id="content-user">
              <div id="userphoto" onmouseover="document.getElementById('edit-image').style.display = 'block'"
                    onmouseout="document.getElementById('edit-image').style.display = 'none'"><img src="/home/upload/nguoi_dung/{$login.hinh_dai_dien}" alt="default avatar">
               {if $login.ma = $nguoi_dung.ma} <div id="edit-image" style="width:154px; display:none; background-color:#f1f1f1;height: 40px; position:absolute; top: 125px; opacity: 0.5">
                  <center>
                    <a style="line-height: 40px; color:black" id="change" rel="leanModal" href="#change-image">Cập nhật</a>
                  </center>
                </div> {/if}
              </div>
              <h1 class="user-name"><i class="fa fa-star-o"></i>&nbsp;&nbsp;{$nguoi_dung.ho} {$nguoi_dung.ten}&nbsp;&nbsp;<i class="fa fa-star-o"></i></h1>
              <nav id="profiletabs">
                <ul class="clearfix" style="padding-left: 10px;">
                  <li><a href="#thong_tin" class="sel">Thông tin</a></li>
                  <li><a href="#ban_be">Bạn bè</a></li>
                  <li><a href="#dien_dan">Diễn đàn</a></li>
                </ul>
              </nav>
              <section id="thong_tin">
                <div class="user-info">
                  <h4>Thông tin cơ bản</h4>
                  <table width="100%" id="mytable">
                    <tr>
                      <td width="5%"><i class="fa fa-gift"></i></td>
                      <td class="field" width="30%">Ngày sinh</td>
<<<<<<< .mine
                      
                      <script src="/home/templates/js/jquery-1.10.2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/home/templates/js/jquery.form.min.js"></script> 

                      
=======
                     
>>>>>>> .r70
                      <td><span id="ngay_sinh" class="datainfo">{ngay_thang_nam($nguoi_dung.ngay_sinh)}</span></td>
<<<<<<< .mine

=======
>>>>>>> .r70
                    </tr>
                    <tr>
                      <td><i class="fa fa-{if $nguoi_dung.gioi_tinh==0}male{else if}female{/if}"></i></td>
                      <td class="field">Giới tính</td>
                      <td>{if $nguoi_dung.gioi_tinh==0}Nam{else if}Nữ{/if}</td>
                    </tr>
                  </table>
                </div>
                <div class="user-info">
                  <h4>Thông tin liên hệ</h4>
                  <table width="100%" id="mytable">
                    <tr>
                      <td width="5%"><i class="fa fa-map-marker"></i></td>
                      <td class="field" width="30%">Địa chỉ</td>
                      <td>{$nguoi_dung.dia_chi|default:'chưa có'}</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-phone"></i></td>
                      <td class="field">Điện thoại</td>
                      <td>{$nguoi_dung.dien_thoai|default:'chưa có'}</td>
        
                    </tr>
                  </table>
                </div>
              </section>
              <section id="ban_be" class="hidden"> </section>
              <section id="dien_dan" class="hidden">
                <p style="font-weight:bold">Các diễn đàn đã tham gia</p>
                {foreach $ds_dien_dan as $dien_dan} <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}"><img style="padding:2px; border: 1px solid #f1f1f1; border-radius:3px" src="/home/upload/dien_dan/{$dien_dan.hinh_dai_dien}" width="30px" height="30px"/> {$dien_dan.ten}</a><br />
                {/foreach} </section>
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.box-body --> 
        </div>
        <!-- /.box --> 
      </div>
    </div>
  </section>
  <!-- /.content --> 
</aside>
<script type="text/javascript">
$(function(){
  $('#profiletabs ul li a').on('click', function(e){
    e.preventDefault();
    var newcontent = $(this).attr('href');
    
    $('#profiletabs ul li a').removeClass('sel');
    $(this).addClass('sel');
    
    $('#content-user section').each(function(){
      if(!$(this).hasClass('hidden')) { $(this).addClass('hidden'); }
    });
    
    $(newcontent).removeClass('hidden');
  });
});
</script> 

<div id="change-image" class="form" style="width:45%; display: none; box-shadow: 1px 1px 1px #f1f1f1; top: 15% !important; background-color:#f1f1f1">
  <div class="form-header"> <i class="fa fa-picture-o"></i>&nbsp;&nbsp;Chỉnh Sửa Hình Ảnh <a class="modal_close" href="#"></a> </div>
  <div id="content" style="padding: 10px">
    <div id="upload-wrapper">
      <div align="center"> <span class="" style="font-size:15px">Các File hình ảnh: JPEG, JPG, PNG and GIF. <br />
        Kích thước tối đa 2 MB</span>
        <form action="/home/tai_khoan/upload.php" onSubmit="return false" method="post" enctype="multipart/form-data" id="MyUploadForm">
          <input name="ImageFile" id="imageInput" type="file" />
          <br />
          <input type="submit"  id="submit-btn" value="Tải Lên" class="btn btn-info" />
          <img src="/home/templates/images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Vui lòng đợi"/>
        </form>
        <div id="progressbox" style="display:none;">
          <div id="progressbar"></div >
          <div id="statustxt">0%</div>
        </div>
        <div id="output"></div>
      </div>
    </div><br />
    <input type="button" onclick="location.reload()" value="Thoát" class="modal_close btn btn-info" style="margin-right: 40px; float:right" />
  </div>
</div>


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
<link href="/home/templates/css/upload.css" rel="stylesheet" type="text/css">
<style>
.mine{
	display:block;
}

</style>
