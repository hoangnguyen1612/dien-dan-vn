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