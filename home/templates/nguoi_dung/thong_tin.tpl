<aside class="right-side"> 
  <!-- Content Header (Page header) -->
  <section class="content-header no-margin">
    <h1> Trang cá nhân </h1>
  </section>
  {showMessage()} 
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-9" style="width: 722px">
        <div class="box box-solid">
          <div class="box-body">
            <div class="row" id="content-user">
              <div id="userphoto" onmouseover="document.getElementById('edit-image').style.display = 'block'"
                    onmouseout="document.getElementById('edit-image').style.display = 'none'"><img src="/home/upload/nguoi_dung/{$nguoi_dung.hinh_dai_dien}" alt="default avatar"> {if $login.ma = $nguoi_dung.ma}
                <div id="edit-image" style="width:154px; display:none;height: 40px; position:absolute; top: 125px;">
                  <center>
                    <a style="line-height: 40px; color:#3c8dbc" id="change" class="topopup" href="#change-image">Cập nhật</a> 
                  </center>
                </div>
                {/if} </div>
              <h1 class="user-name"><i class="fa fa-star-o"></i>&nbsp;&nbsp;{$nguoi_dung.ho} {$nguoi_dung.ten}&nbsp;&nbsp;<i class="fa fa-star-o"></i></h1>
              <nav id="profiletabs">
                <ul class="clearfix" style="padding-left: 10px;">
                  <li><a href="#thong_tin" class="sel">Thông tin</a></li>
                  <li><a href="#ban_be">Bạn bè</a></li>
                  <li><a href="#dien_dan">Diễn đàn</a></li>
                  {if $co==0}
                  <style>
                  	.edit_link{
						display: none;
					}
                  </style>
                  {/if}
                </ul>
              </nav>
              <section id="thong_tin">
                <div class="user-info">
                  <h4>Thông tin cơ bản</h4>
                  <table width="100%" id="mytable" cellpadding="5">
                    <tr>
                      <td width="5%"><i class="fa fa-gift"></i></td>
                      <td class="field" width="30%">Ngày sinh</td>
                      <script>
						$(function() {
							$( "#editbox_ngay_sinh" ).datepicker(
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
                      <td><span class="text_wrapper" id="ngay_sinh_info">{ngay_thang_nam($nguoi_dung.ngay_sinh)|default:'chưa có'}</span>&nbsp;&nbsp;&nbsp;<a href="#" id="ngay_sinh" class="edit_link" title="chỉnh sửa">(chỉnh sửa)</a>
                        <div class="edit_ngay_sinh edit" style="display:none">
                          <input type="text" name="data[ngay_sinh]" id="editbox_ngay_sinh" class="editbox form-control" style="width:300px" value="{$nguoi_dung.ngay_sinh|default:''}"/>
                        </div></td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-{if $nguoi_dung.gioi_tinh==0}male{else if}female{/if}"></i></td>
                      <td class="field">Giới tính</td>
                      <td><span class="text_wrapper" id="gioi_tinh_info">{if $nguoi_dung.gioi_tinh==0}Nam{else if}Nữ{/if} </span>&nbsp;&nbsp;&nbsp;<a href="#" id="gioi_tinh" class="edit_link" title="chỉnh sửa">(chỉnh sửa)</a>
                        <div class="edit_gioi_tinh edit" style="display:none; margin-top: -17px"> {foreach $gt as $key=>$value}
                          <input type="radio" id="{$key}" name="gioi_tinh" class="gt" value="{$key}" {if $key==$nguoi_dung.gioi_tinh}checked{/if} />
                          <label for="{$key}">{$value}</label>
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          {/foreach} </div></td>
                    </tr>
                  </table>
                </div>
                <div class="user-info">
                  <h4>Thông tin liên hệ</h4>
                  <table width="100%" id="mytable" cellpadding="5">
                    <tr>
                      <td width="5%"><i class="fa fa-map-marker"></i></td>
                      <td class="field" width="30%">Địa chỉ</td>
                      <td><span class="text_wrapper" id="dia_chi_info">{$nguoi_dung.dia_chi|default:'chưa có'}</span>&nbsp;&nbsp;&nbsp;<a href="#" id="dia_chi" class="edit_link" title="chỉnh sửa">(chỉnh sửa)</a>
                        <div class="edit_dia_chi edit" style="display:none">
                          <input type="text" name="data[dia_chi]" id="editbox_dia_chi" class="editbox form-control" style="width:300px" value="{$nguoi_dung.dia_chi|default:''}"/>
                        </div>
                        {if $co ==1} 
                        <script type="text/javascript">
							$(document).ready(function()
							{
							
								//Edit link action
								$('.edit_link').click(function()
								{
									var id = $(this).attr('id');
									
									
									$('#'+id+'_info').hide();
									
									var data=$('#'+id+'_info').html();
									$('.edit_'+id).show();
									$("#"+id).hide();
									$('#editbox_'+id).focus(); 
								});
								
								//Mouseup textarea false
								$(".editbox").mouseup(function() 
								{
									return false
								});
							
								//Textarea content editing
								$(".editbox").change(function() 
								{
									var de_id = $(this).attr('id');
									var arr = de_id.split("_");
									var id = arr[1]+"_"+arr[2];
									$('.edit_'+id).hide();
									
									var boxval = $("#"+de_id).val();
									
									$.ajax({
										type: "POST",
										url: "cap_nhat_sm.php",
										data: {
												'data':boxval,'id':id,'ma':"{$nguoi_dung.ma}"
											  },
										cache: false,
										success: function(html)
										{
											var json = JSON.parse(html);
											if(json.message!='success')
											{
												alert(json.message);
											}
											
											$("#"+id+"_info").html(json.data);
											$("#"+id+"_info").show();
											$("#"+id).show();
										}
									});
								});
								
								$(".gt").click(function(){
									var data = $(this).val();
									$.ajax({
										type: "POST",
										url: "cap_nhat_sm.php",
										data: {
												'data':data,'id':'gioi_tinh','ma':"{$nguoi_dung.ma}"
											  },
										cache: false,
										success: function(html)
										{
											
											var json = JSON.parse(html);
											if(json.message!='success')
											{
												alert(json.message);
											}
											
											$("#gioi_tinh_info").html(json.data);
											$("#gioi_tinh_info").show();
											$("#gioi_tinh").show();
										}
									});
								})
								
								//Textarea without editing.
								$(document).mouseup(function()
								{
									$('.edit').hide();
									$(".text_wrapper").show();
									$(".edit_link").show();
								});
														
							});
							</script>{/if} </td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-phone"></i></td>
                      <td class="field">Điện thoại</td>
                      <td><span class="text_wrapper" id="dien_thoai_info">{$nguoi_dung.dien_thoai|default:'chưa có'}</span>&nbsp;&nbsp;&nbsp;<a href="#" id="dien_thoai" class="edit_link" title="chỉnh sửa">(chỉnh sửa)</a>
                        <div class="edit_dien_thoai edit" style="display:none">
                          <input type="text" name="data[dien_thoai]" id="editbox_dien_thoai" class="editbox form-control" style="width:300px" value="{$nguoi_dung.dien_thoai|default:''}"/>
                        </div></td>
                    </tr>
                  </table>
                </div>
              </section>
              <section id="ban_be" class="hidden"> </section>
              <section id="dien_dan" class="hidden">
                <p style="font-weight:bold">Các diễn đàn đã tham gia</p>
                {foreach $ds_dien_dan as $dien_dan} <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}"><img style="padding:2px; border: 1px solid #f1f1f1; border-radius:3px" src="/home/upload/dien_dan/{$dien_dan.hinh_dai_dien}" width="30px" height="30px"/> {$dien_dan.ten}</a><br />
                {/foreach} </section>
              {if $login.ma = $nguoi_dung.ma}
              <section id="chinh_sua" class="hidden">
                <form name="form-info" id="form-info">
                  <table width="100%" id="mytable" cellpadding="5">
                    <tr>
                      <td width="5%"><i class="fa fa-gift"></i></td>
                      <td class="field" width="30%">Ngày sinh</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-{if $nguoi_dung.gioi_tinh==0}male{else if}female{/if}"></i></td>
                      <td class="field">Giới tính</td>
                      <td> {foreach $gt as $key=>$value}
                        <input type="radio" id="{$key}" name="data[gioi_tinh]" {if $key==$nguoi_dung.gioi_tinh}checked{/if} />
                        <label for="{$key}">{$value}</label>
                        &nbsp;&nbsp;&nbsp;
                        {/foreach} </td>
                    </tr>
                  </table>
                  <table width="100%" id="mytable" cellpadding="5">
                    <tr>
                      <td width="5%"><i class="fa fa-map-marker"></i></td>
                      <td class="field" width="30%">Địa chỉ</td>
                      <td><input type="text" name="data[dia_chi]" style="width:300px" value="{$nguoi_dung.dia_chi|default:''}" class="form-control"/></td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-phone"></i></td>
                      <td class="field">Điện thoại</td>
                      <td><input type="text" name="data[dien_thoai]" style="width:300px" value="{$nguoi_dung.dien_thoai|default:''}"  class="form-control"/></td>
                    </tr>
                    <tr>
                      <td colspan="3" align="right"><input class="btn btn-info" style="margin-right: 88px" type="submit" value="Cập nhật" /></td>
                    </tr>
                  </table>
                </form>
              </section>
              {/if} </div>
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

<!--
<div id="loading" style="display: block; opacity: 0.5; position: fixed;
z-index: 600;
top: 0px;
left: 0px;
height: 100%;
width: 100%;
background: #000;">
	<img src="/home/templates/images/loading.gif" style="position: fixed;
left: 50%;
top: 38%;" width="30" />
</div>
-->
<style>
.mine{
	display:block;
}
.edit_gioi_tinh label{
	font-weight: normal !important;
}
</style>

<script type="text/javascript" src="/home/templates/js/script.js"></script>
<script type="text/javascript" src="/home/templates/js/jquery.form.min.js"></script>
<link href="/home/templates/css/popup.css" rel="stylesheet" type="text/css">
<div id="toPopup" style="z-index:999999; width: 50%; left: 55%">
<div class="close" style="opacity: 1"></div>
<span class="ecs_tooltip" style="height: 24px">Đóng<span class="arrow"></span></span>
<div id="popup_content"> <!--your content start-->
<div id="change-image" class="form" style="width:100%;box-shadow: 1px 1px 1px #f1f1f1; top: 15% !important; background-color:#f1f1f1">
  <div class="form-header" style="color:#3c8dbc; font-size: 18px; margin: auto; width:192px"> <i class="fa fa-picture-o"></i>&nbsp;&nbsp;Chỉnh Sửa Hình Ảnh</div>
  <div id="content" style="padding: 10px">
	<div id="upload-wrapper">
	  <div align="center"> <span class="" style="font-size:15px">Các File hình ảnh: <span style="color:crimson">JPEG, JPG, PNG</span> và <span style="color:crimson">GIF</span>. <br />
		Kích thước tối đa <span style="color:crimson">2 MB</span></span><br /><br />
		<form action="/home/tai_khoan/upload.php" onSubmit="return false" method="post" enctype="multipart/form-data" id="MyUploadForm">
		  <input name="ImageFile" id="imageInput" type="file" />
		  <br />
		  <input type="submit"  id="submit-btn" value="Tải Lên" class="btn btn-info" /><br />
		  <img src="/home/templates/images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Vui lòng đợi"/>
		</form>
		<div id="progressbox">
		  <div id="progressbar"></div >
		  <div id="statustxt" style="display:none;">0%</div>
		</div>
		<div id="output"></div>
	  </div>
	</div>
  </div>
</div>
</div>
<!--your content end--> 

</div>
<div class="loader"></div>
<div id="backgroundPopup" style="z-index: 99999"></div>

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
