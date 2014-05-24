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
    <h2><a href="./viewtopic.php?f=2&amp;t=15" data-original-title="" title="">{$bai_viet.tieu_de}</a></h2>
    <form id="postform" method="post" action="them_sm" enctype="multipart/form-data" onsubmit="return checkValidation()">
      <div class="well well-sm" id="preview" style="display:none">
        <h3 id="preview-title"></h3>
        <div id="content"></div>
      </div>
      <div class="row-fluid" id="postingbox">
        <div class="well">
          <div class="side-segment">
            <h3>Đăng bình luận</h3>
          </div>
          <script>
onload_functions.push('apply_onkeypress_event()');
</script>
          <fieldset>
            <label class="control-label" for="subject">Tiêu Đề:</label>
            <div class="controls controls-row">
            <input type="text" class="span6" placeholder="Tiêu đề" name="data[tieu_de]" id="tieu_de" maxlength="64" tabindex="2" value="Re:{$bai_viet.tieu_de}">
            <input type="hidden" name = "data[ma_loai_cha]"  value="0"/>
            <input type="hidden" name = "data[ma_bai_viet]" value="{$bai_viet.ma}"/>
            <div class="space10"></div>
            <div class="row-fluid">
              <div class="span8" style="width:100%">
                <textarea rows="10" name="data[noi_dung]" id="noi_dung" tabindex="4" onselect="storeCaret(this);" onclick="storeCaret(this);" onkeyup="storeCaret(this);" onfocus="initInsertions();" placeholder="Post it up!" class="span12 ckeditor"></textarea>
              </div>
            </div>
          </fieldset>
        </div>
        <div class="row-fluid">
          <fieldset class="form-actions no-margin-top">
            <input type="hidden" name="topic_cur_post_id" value="26">
            <input type="hidden" name="lastclick" value="1399025502">
            <button type="button" class="btn start" data-loading-text="Chờ xử lý...<i class='icon-spin icon-spinner icon-large icon-white'></i>" tabindex="5" name="preview" value="Preview" onclick="document.getElementById('preview').style.display='block';document.getElementById('preview-title').innerHTML=document.getElementById('tieu_de').value;document.getElementById('content').innerHTML=CKEDITOR.instances.noi_dung.getData();">Xem trước</button>
            <button type="submit" class="btn start" data-loading-text="Chờ xử lý...<i class='icon-spin icon-spinner icon-large icon-white'></i>" accesskey="s" tabindex="6" name="post" value="Submit">Đăng</button>
          </fieldset>
        </div>
        <div class="space10"></div>
        <div class="tabbable tabbable-custom">
          <ul class="nav nav-tabs">
            <li class=""><a data-toggle="tab" href="#posting-attach-body-html" data-original-title="" title=""><span>Thêm tệp</span></a></li>
          </ul>
        </div>
     
          <div class="widget-body tab-pane" id="posting-attach-body-html">
            <p>Nếu bạn muốn thêm 1 hay nhiều tập tin vào bài đăng.</p>
            <fieldset>
              <div class="control-group">
                <label class="control-label" for="fileupload">Tên tập tin:</label>
                <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="input-append">
                    <div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div>
                    <span class="btn btn-file"><span class="fileupload-new">Tìm kiếm</span> <span class="fileupload-exists">Change</span>
                    <input type="file" name="fileupload" id="fileupload" maxlength="262144" value="">
                    </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload" data-original-title="" title="">Remove</a>
                    <button type="submit" name="add_file" value="Add the file" class="btn" onclick="upload = true;">Thêm tập tin</button>
                  </div>
                </div>
                <span class="help-inline"></span> </div>
              <div class="control-group">
                <label class="control-label" for="filecomment">Ghi chú cho tập tin:</label>
                <div class="controls controls-row">
                  <textarea placeholder="Ghi chú cho tập tin ........" rows="1" name="filecomment" id="filecomment" class="span5"></textarea>
                </div>
              </div>
            </fieldset>
          </div>
     
        <div class="space10"></div>
      </div>
    </form>
  </main>
</div>
