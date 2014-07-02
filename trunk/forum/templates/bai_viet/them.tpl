<script>
	function checkValidation(){
		var tieu_de = document.getElementById('tieu_de').value;
		var noi_dung = CKEDITOR.instances.noi_dung.getData();
		if(tieu_de == ''){
			alert('Vui lòng nhập tiêu đề cho bài viết');
			return false;
		}
		if(noi_dung == ''){
			alert('Vui lòng nhập nội dung cho bài viết');
			return false;
		}
		return true;
	}
	
</script>

<div id="page-body">
<main role="main">
  <h2><a href="./viewforum.php?f=2" data-original-title="" title="">{$chuyen_muc.ten}</a></h2>
  <form id="postform" method="post" action="them_sm" enctype="multipart/form-data" onsubmit="return checkValidation()">
    <div class="well well-sm" id="preview" style="display:none">
      <h3 id="preview-title"></h3>
      <div id="content"></div>
    </div>
    <div class="row-fluid" id="postingbox">
      <div class="well">
        <div class="side-segment">
          <h3>Đăng bài viết mới</h3>
        </div>
        <script>
onload_functions.push('apply_onkeypress_event()'); 
</script>
        <fieldset>
          <div class="control-group">
            <input type="hidden" name = "data[ma_loai_chuyen_muc]" value="{$smarty.get.loai}" />
            <label class="control-label" for="icon">Icon bài viết:</label>
            <div class="controls controls-row">
              <div class="radio">
                <input type="radio" name="data[icon]" id="icon" value="0" checked="checked" tabindex="1">
                <label for="icon">Không</label>
              </div>
              <div class="radio">
                <input type="radio" name="data[icon]" id="icon-1" value="fire" tabindex="1">
                <label for="icon-1"><img src="/forum/templates/images/icons/misc/fire.gif" width="16" height="16" alt="" title=""></label>
              </div>
              <div class="radio">
                <input type="radio" name="data[icon]" id="icon-5" value="star" tabindex="1">
                <label for="icon-5"><img src="/forum/templates/images/icons/misc/star.gif" width="16" height="16" alt="" title=""></label>
              </div>
              <div class="radio">
                <input type="radio" name="data[icon]" id="icon-6" value="radioactive" tabindex="1">
                <label for="icon-6"><img src="/forum/templates/images/icons/misc/radioactive.gif" width="16" height="16" alt="" title=""></label>
              </div>
              <div class="radio">
                <input type="radio" name="data[icon]" id="icon-4" value="heart" tabindex="1">
                <label for="icon-4"><img src="/forum/templates/images/icons/misc/heart.gif" width="16" height="16" alt="" title=""></label>
              </div>
              <div class="radio">
                <input type="radio" name="data[icon]" id="icon-7" value="thinking" tabindex="1">
                <label for="icon-7"><img src="/forum/templates/images/icons/misc/thinking.gif" width="16" height="16" alt="" title=""></label>
              </div>
              <div class="radio">
                <input type="radio" name="data[icon]" id="icon-9" value="question" tabindex="1">
                <label for="icon-9"><img src="/forum/templates/images/icons/misc/question.gif" width="16" height="16" alt="" title=""></label>
              </div>
              <div class="radio">
                <input type="radio" name="data[icon]" id="icon-10" value="alert" tabindex="1">
                <label for="icon-10"><img src="/forum/templates/images/icons/misc/alert.gif" width="16" height="16" alt="" title=""></label>
              </div>
              <div class="radio">
                <input type="radio" name="data[icon]" id="icon-8" value="info" tabindex="1">
                <label for="icon-8"><img src="/forum/templates/images/icons/misc/info.gif" width="16" height="16" alt="" title=""></label>
              </div>
              <div class="radio">
                <input type="radio" name="data[icon]" id="icon-2" value="redface" tabindex="1">
                <label for="icon-2"><img src="/forum/templates/images/icons/misc/redface.gif" width="16" height="16" alt="" title=""></label>
              </div>
              <div class="radio">
                <input type="radio" name="data[icon]" id="icon-3" value="mrgreen" tabindex="1">
                <label for="icon-3"><img src="/forum/templates/images/icons/misc/mrgreen.gif" width="16" height="16" alt="" title=""></label>
              </div>
            </div>
          </div>
          <label class="control-label" for="subject">Tiêu đề bài viết:</label>
          <div class="controls controls-row">
            <input type="text" class="span6" placeholder="Tiêu đề bài viết" name="data[tieu_de]" id="tieu_de" maxlength="60" tabindex="2" value="">
          </div>
          <script src="./styles/BBOOTS/template/editor.js"></script>
          <div class="space10"></div>
          <div class="row-fluid">
            <div class="span8" style="width:100%">
              <textarea rows="10" name="data[noi_dung]" id="noi_dung" tabindex="4" onselect="storeCaret(this);" onclick="storeCaret(this);" onkeyup="storeCaret(this);" onfocus="initInsertions();" placeholder="Post it up!" class="span12 ckeditor" ></textarea>
            </div>
          </div>
          <div class="space10"></div>
            <div class="control-group">
           <label class="control-label" for="icon">Bài viết riêng tư:</label>
           <div class="controls controls-row">
           
              <div class="radio">
                <input type="radio" name="data[rieng_tu]" id="khong" value="0" checked="checked" tabindex="2">
                <label for="khong">Không</label>
              </div>
              <div class="radio">
                <input type="radio" name="data[rieng_tu]" id="co" value="1" tabindex="2">
                <label for="co">Có</label>
              </div>
          </div>
          </div>
        </fieldset>
      </div>
      <div class="row-fluid">
        <fieldset class="form-actions no-margin-top">
          <input type="hidden" name="lastclick" value="1398931117">
          <button type="button" class="btn start" data-loading-text="Chờ xử lý...<i class='icon-spin icon-spinner icon-large icon-white'></i>" tabindex="5" name="preview" id="preview" onclick="document.getElementById('preview').style.display='block';document.getElementById('preview-title').innerHTML=document.getElementById('tieu_de').value;document.getElementById('content').innerHTML=CKEDITOR.instances.noi_dung.getData();">Xem trước</button>
          <button type="submit" class="btn start" data-loading-text="Chờ xử lý...<i class='icon-spin icon-spinner icon-large icon-white'></i>" accesskey="s" tabindex="6" name="post" value="Submit">Đăng bài</button>
        </fieldset>
      </div>
      <div class="space10"></div>
      <div class="tabbable tabbable-custom">
        <ul class="nav nav-tabs">
          <li class=""><a data-toggle="tab" href="#posting-attach-body-html" data-original-title="" title=""><span>Thêm tệp</span></a></li>
        </ul>
      </div>
      <div class="widget-body tab-pane" id="posting-attach-body-html">
        <p>Thêm tập tin.</p>
        <fieldset>
          <div class="control-group">
            <label class="control-label" for="fileupload">Tên file:</label>   
                <input type="file" value="" name="file"> <span style="color:red">*File upload không quá 5MB*</span>
             
         </div>
          <div class="control-group">
            <label class="control-label" for="filecomment">Chú thích cho tập tin:</label>
            <div class="controls controls-row">
              <textarea placeholder="Chú thích" rows="1" name="filecomment" id="filecomment" class="span5"></textarea>
            </div>
          </div>
        </fieldset>
      </div>
    </div>
    <div class="space10"></div>
    </div>
  </form>
</main>
</div>
