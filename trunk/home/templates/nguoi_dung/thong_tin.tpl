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
                <div id="edit-image" style="width:154px; display:none; background-color:#f1f1f1;height: 40px; position:absolute; top: 125px; opacity: 0.5">
                  <center>
                    <a style="line-height: 40px; color:black" id="change" class="topopup" href="#change-image">Cập nhật</a> 
                    <script type="text/javascript" src="/home/templates/js/script.js"></script>
                    <link href="/home/templates/css/popup.css" rel="stylesheet" type="text/css">
                    <div id="toPopup">
                      <div class="close"></div>
                      <span class="ecs_tooltip">Press Esc to close <span class="arrow"></span></span>
                      <div id="popup_content"> <!--your content start-->
                        <p> Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, 
                          feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi 
                          vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
                          commodo Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique 
                          senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, 
                          feugiat vitae, ultricies eget, tempor sit amet, ante. </p>
                        <br />
                        <p> Donec eu libero sit amet quam egestas semper. Aenean ultricies mi 
                          vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, 
                          commodo Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. </p>
                        <p align="center"><a href="#" class="livebox">Click Here Trigger</a></p>
                      </div>
                      <!--your content end--> 
                      
                    </div>
                    <div class="loader"></div>
                    <div id="backgroundPopup"></div>
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
                      <link rel="stylesheet" type="text/css" href="/home/templates/js/ui-lightness/jquery-ui.css" />
                      <script type="text/javascript" src="/home/templates/js/ui/jquery-ui.custom.js"></script> 
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
