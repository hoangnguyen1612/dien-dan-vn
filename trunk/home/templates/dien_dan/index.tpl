{if isset($smarty.session.message) && $smarty.session.message.type=='error'}
<script>
	window.onload = function()
	{
		//alert('{$smarty.session.message.content}');
	}
</script>
{/if}
<!--<link rel="stylesheet" type="text/css" href="/home/templates/css/sliding.css" />-->
</div>
</div>
<!-- start slider -->
<div class="slider_bg">
  <div class="wrap">
    <div class="slider">
      <h2>Tạo diễn đàn</h2>
      <h3>Hiện thực những ý tưởng của bạn</h3>
    </div>
  </div>
</div>
<!-- start main -->
<div class="main_bg">
  <div class="wrap">
    <div class="main">
      <div class="content"> 
         <div id="msform">
            <!-- Progressbar -->
            <ul id="progressbar" style="width:100%; background: none">
                <li class="active">Account Setup</li>
                <li>Social Profiles</li>
                <li>Personal Details</li>
            </ul>
			<form id="forum_form" action="them_sm.php" method="post" enctype="multipart/form-data">
			<fieldset>
            <h2 class="fs-title">Bước 1</h2>
            <h3 class="fs-subtitle">Bạn hãy nhập những thông tin cơ bản về diễn đàn của bạn vào mẫu đính kèm bên dưới.<br />
            <span style="color: crimson">* * *</span> Những thông tin kèm theo dấu <span style="color: crimson">*</span> là những thông tin <span style="color: crimson">bắt buộc</span>.
            </h3>
            <input type="text" name="ten_dien_dan" value="{$smarty.session.data.ten_dien_dan|default: ''}" placeholder="Tên diễn đàn" id="ten_dien_dan" style="width:70%"/>&nbsp;&nbsp;<span style="color: crimson">*</span><br />
            <textarea rows="5" name="mo_ta" placeholder="Mô tả về diễn đàn của bạn với mọi người" style="margin-right: 10px">{$smarty.session.data.mo_ta|default: ''}</textarea><span style="color: crimson; vertical-align:top">*</span><br />
            <input type="text" name="slogan" value="{$smarty.session.data.slogan|default: ''}" placeholder="Câu khẩu hiệu (slogan) cho diễn đàn" id="ten" style="width:70%"/>&nbsp;&nbsp;<span style="color: crimson">*</span><br />
            <input type="text" name="dien_thoai" placeholder="Điện thoại" style="width:70%; margin-right: 15px" /><br />
            <input type="email" name="email" placeholder="Email" style="margin-right: 15px"  /><br />
                <div class="clear"></div>
            <br />
            <input type="button" name="next" class="next action-button" value="Kế Tiếp"  />
            </fieldset>
            
            
            <fieldset>
            <h2 class="fs-title">Bước 2</h2>
            <h3 class="fs-subtitle">Chọn Logo cho diễn đàn của bạn</h3>
            <div id="upload-wrapper">
                <div align="center">
                <span class="" style="font-size:15px">Các File hình ảnh: JPEG, JPG, PNG and GIF. <br /> Kích thước tối đa 2 MB</span><br />
                <input name="image" id="imageInput" type="file" />
                
                
                </div>
                </div>
<link href="/home/templates/css/upload.css" rel="stylesheet" type="text/css"><br />
            <input type="button" name="previous" class="previous action-button" value="Về Trước" />
            <input type="button" name="next" class="next action-button" value="Kế Tiếp"/>
            </fieldset>
            
            
            <fieldset>
            <h2 class="fs-title">Bước 3</h2>
            <h3 class="fs-subtitle">Chọn màu sắc cho diễn đàn của bạn.<br />
            Dưới đây là mẫu thử để bạn chọn màu sắc, màu sắc bạn chọn trong mẫu thử này sẽ hiện thực trong diễn đàn của bạn.</h3>
            <iframe name="select_frame" id="demo-color" src="http://diendan.vn/home/demo.html" style="width:100%; height:700px;"></iframe>
            <input type="hidden" name="color" id="color" value="color-1" />
            <div class="clear"></div>
            <br />
            <input type="button" name="previous" class="previous action-button" value="Về Trước" />
            <input type="submit" name="next" class="submit action-button" id="get-color" onclick="return get_css()" value="Hoàn Tất"/>
            </fieldset>
</form>
	
<script>
	function get_css()
	{
		var name = $('iframe[name=select_frame]').contents().find('#css').val();
		$('input[name="color"]').val(name);
		return true;
	}
</script>
		</div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript" src="/home/templates/scripts/sliding.js"></script>

