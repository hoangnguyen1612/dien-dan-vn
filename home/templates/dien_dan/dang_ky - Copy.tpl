<aside class="right-side"> 
  <!-- Content Header (Page header) -->
  <section class="content-header no-margin">
    <h1> Đăng Ký Diễn Đàn </h1>
  </section>
  {showMessage()} 
  <!-- Main content -->
  <section class="content"> 
    <!-- MAILBOX BEGIN -->
    <div class="row">
      <div class="col-xs-9"> 
		<div class="box box-solid">
          <div class="box-body">
            <div class="row" style="margin-left: 50px">
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
            <link rel="stylesheet" type="text/css" href="/home/templates/css/formwizard.css" />
            <script src="/home/templates/js/formwizard.js" type="text/javascript"> </script>
            <form id="staff_feedbackform" action="them_sm.php" method="post" enctype="multipart/form-data">
              <fieldset class="sectionwrap">
                <legend>Chọn lĩnh vực</legend>
                <p style="width:85%; color:#3c8dbc">Hãy chọn lĩnh vực cho diễn đàn của bạn!</p>
                <table>
                  <tr>
                        <td style="padding-left: 20px" align="center"><p>
                      </p>
                      <label>Chọn một mục</label><br />
                      <select class="btn" name="data[chon_linh_vuc]" onchange="document.getElementById('lv').value = document.getElementById('ma_linh_vuc').value" id="ma_linh_vuc" style="border: 1px solid #ccc">
                        {foreach $mac_dinh as $value}
                          {$x=$value.ma}
                          <option value="{$value.ma}">{$value.ten}</option>
                        {/foreach}
                      </select>
                      <input type="hidden" name="data[chon_linh_vuc]" id="lv" />
                      <script>
                        window.onload = function()
                        {
                            document.getElementById("lv").value = document.getElementById("ma_linh_vuc").value;
                        }
                        
                        function change()
                        {
                            document.getElementById("lv").value = document.getElementById("ma_linh_vuc").value;
                        }
                      </script>
                      </td>
                  </tr>
                  <tr><td>&nbsp;</td></tr>
                  <tr>
                    <td width="100%" align="center"><div class="radios"> {$i=0}
                        {foreach $linh_vuc as $value}
                        <input type="radio" class="btn-radio" name="rGroup" value="{$value.ma}" id="{$value.ma}" 
                        {if isset($smarty.session.data.rGroup) && $smarty.session.data.rGroup==$value.ma}
                            checked
                        {else if $value.ma==1}
                            checked
                        {/if}/>
                        <label class="radio1 bg-{$mau.$i}" for="{$value.ma}">
                        <p style="text-align:center">{$value.ten}</p>
                        </label>
                        
                        {$i = $i+1}
                        {/foreach} </div></td>
                  </tr>
                </table>
                {literal}
                <script>
                    $(".btn-radio").click(function(){
                        var lv = $("input:radio[name='rGroup']:checked").val();
                        jQuery.ajax({
                            type:"POST",
                            url:"get_linh_vuc.php",
                            data: {'linh_vuc':lv},
                            success: function(result) {
                                $("#ma_linh_vuc").find('option').remove();
                                $("#ma_linh_vuc").append(result);
                                change();
                            }
                        });
                    });
                </script>
                {/literal}
              </fieldset>
              <fieldset class="sectionwrap">
                <legend>Thông tin cơ bản</legend>
                <p style="width:85%; color:#3c8dbc">Hãy điền những thông tin cơ bản cho diễn đàn của bạn vào mẫu dưới đây. Những mục được đánh dấu <span class="red">*</span> là những mục bạn cần phải nhập!</p>
                <table>
                  <tr>
                    <td><label>Tên diễn đàn</label>
                      <span class="red">*</span><br />
                      <input class="required form-control" id="ten_dien_dan" name="data[ten_dien_dan]" type="text" value="{$smarty.session.data.ten_dien_dan|default:''}"/></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><label>Câu khẩu hiệu (slogan)</label>
                      <span class="red">*</span><br />
                      <input class="required form-control" name="data[slogan]" type="text" id="slogan" value="{$smarty.session.data.slogan|default:''}"/></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><label>Mô tả về diễn đàn</label>
                      <span class="red">*</span><br />
                      <textarea class="form-control" name="data[mo_ta]" id="mo_ta" value="{$smarty.session.data.mo_ta|default:''}"></textarea></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><label>Hình đại diện</label>
                      <input class="required form-control" name="image" type="file" id="hinh_dai_dien" /></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table>
              </fieldset>
              <fieldset class="sectionwrap">
                <legend>Chọn màu sắc</legend>
                <p style="width:95%; color:#3c8dbc">Bước cuối cùng hãy chọn màu sắc cho diễn đàn của bạn. Click vào <a target="_blank" style="color:crimson; text-decoration:underline" href="http://diendan.vn/home/demo.html">đây</a> để xem mẫu thử màu. Nếu bạn bỏ qua bước này thì diễn đàn của bạn sẽ được hệ thống chọn màu mặc định!</p>
               
                <div class="radios" style="width: 590px;">
                    {foreach $ds_mau as $key=>$value}
                        <input type="radio" class="btn-radio" name="data[css]" value="{$key}" id="{$key}"
                        {if isset($smarty.session.data.css) && $smarty.session.data.css==$key}
                            checked
                        {else if $value=='color-1'} 
                            checked
                         {/if}/>
                        <label class="radio2 bg-{$value}" for="{$key}"></label>
                        {if $value=='color-10'}<br /><br />{/if}
                    {/foreach}<br /><br />
                </div>
                <br /><br />
                <div style="width:auto; float:right; top: 191px; right: 100px; position:absolute"><input type="submit" value="Hoàn tất" class="btn btn-warning"/></div>
              </fieldset>
            </form>
            <script type="text/javascript">
                    var myform3=new formtowizard({
                    formid: 'staff_feedbackform',
                    validate: ['ten_dien_dan', 'slogan', 'mo_ta'],
                    revealfx: ['slide', 500] //<--no comma after last setting
                    })
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