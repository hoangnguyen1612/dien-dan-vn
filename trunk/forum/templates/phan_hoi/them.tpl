<script>
	function checkValidation(){
		var noi_dung = document.getElementById('noi_dung');
		var ma_bao_ve = document.getElementById('ma_bao_ve');
		if(noi_dung.value == ''){
			alert('Vui lòng nhập nội dung phản hồi');
			noi_dung.focus();
			return false;
		}
		if(ma_bao_ve.value == ''){
			alert('Vui lòng nhập mã bảo vệ');
			ma_bao_ve.focus();
			return false;
		}
		return true;
	}
	
</script>

<div id="page-body">
  <main role="main">
    <h2><a href="./viewtopic.php?f=2&amp;t=15" data-original-title="" title=""></a></h2>
      <div class="well well-sm" id="preview" style="display:none">
        <h3 id="preview-title"></h3>
        <div id="content"></div>
      </div>
      <div class="row-fluid" id="postingbox">
        <div class="well">
          <div class="side-segment">
            <span style="font-size: 18px; color:#8C8C8C; text-transform: uppercase">Tỉ lệ bình chọn cho diễn đàn {$dien_dan.ten}: <span class="badge badge-info" id="tbm1" style="font-size:16.844px; padding: 8px 6px">{$dien_dan.feedback}%</span> </span>
          </div>
          <div class="space10"></div>
        
          <div class="side-segment">
            <h3>Phản hồi của người dùng</h311>
          </div>
          <style>
          .feedback .image, .feedback .content{
		  	float:left;
			margin-top: 5px;
		  }
		  .feedback .content{
		    margin-left: 40px;
			border-bottom: 1px solid #ddd;
			background-color: #f1f1f1;
			padding: 5px 10px 10px 10px;
			font-size: 16px;
			font-family: Arial, Helvetica, sans-serif;
			width: 80%;
			margin-bottom: 30px;
		  }
		  .content .logo span{
		  	text-shadow: none;
		  }
          </style>
		  <div style="float:right">
          <form method="get" action="them" id="form_bo_loc">
           <span style="font-weight:bold; font-size: 15px">Lọc theo:</span> <select style="width: 120px;" name="bo_loc" id="bo_loc">
             <option value="2">Tất cả</option>
             {foreach $bo_loc as $key=>$value}
             <option value="{$key}" {if isset($smarty.get.bo_loc) && $smarty.get.bo_loc == $key}selected{/if}>{$value}</option>
             {/foreach}
            </select>
          </form>
     
          <script>
          $("#bo_loc").change(function(){
		  	var bo_loc = $("#bo_loc").val();
			if(bo_loc==2)
			{
				window.location.href = '/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/phan_hoi/them';
			}
			else
			{
				$("#form_bo_loc").submit();
			}
		  });
          </script>  
          </div>
          <div class="clear"></div>  
          {if !empty($danh_sach)}   
          {foreach $danh_sach as $feedback}
          	<div class="feedback">
          	<div class="image">
             <img src="/home/upload/nguoi_dung/{$feedback.hinh_dai_dien}" width="70" />
            </div>
            <div class="content">
             <p class="logo">
              <strong><span>{$feedback.ho_ten}</span></strong> vào lúc {date('H:i', strtotime($feedback.ngay_tao))} ngày {date('d-m-Y', strtotime($feedback.ngay_tao))}
             </p>
             <p>{nl2br($feedback.noi_dung)}</p>
            </div>
            <div style="clear:both"></div>
          </div>
          {/foreach}
          {/if} 
          <div class="row-fluid">
      <div class="pull-right">
        <div class="pagination pagination-small hidden-phone">
          <ul>
            <li><a data-original-title="" title="">Trang <strong>{$trang_hien_tai}</strong> trên <strong>{$tong_so_trang}</strong></a></li>
            <li>{$phan_trang}</li>
          </ul>
        </div>
      </div>
    </div>
          <div style="clear:both"></div>
          <div class="space10"></div>
          <div class="space10"></div>
         
          <div class="side-segment">
            <h3>Viết phản hồi</h311>
          </div>
          <script>
			onload_functions.push('apply_onkeypress_event()');
		  </script>
          <form id="postform" method="post" action="them_sm" onsubmit="return checkValidation()">
          <fieldset>
            <label class="control-label" for="subject">Bình chọn:</label>
            <div class="controls controls-row">
                <div class="radio">
                    <input type="radio" name="data[loai]" id="icon-1" value="1" tabindex="1" title="Thích" checked="checked">
                    <label for="icon-1" class="logo"><span><i class="icon-thumbs-up" style="font-size: 20px; text-shadow:none"></i></span></label>
                </div>
                 <div class="radio">
                    <input type="radio" name="data[loai]" id="icon-2" value="0" tabindex="1" title="Không thích"
                    {if isset($smarty.session.data.loai) && $smarty.session.data.loai==0}checked{/if}
                    >
                    <label for="icon-2" class="logo"><span><i class="icon-thumbs-down" style="font-size: 20px; text-shadow:none; vertical-align:-webkit-baseline-middle"></i></span></label>
                </div>
           	  
            <div class="space10"></div>
            <div class="row-fluid">
              <div class="span8" style="width:100%">
                <label class="control-label" for="subject">Nội dung:</label>
                <textarea rows="10" name="data[noi_dung]" id="noi_dung" tabindex="4" class="span8 reset">{$smarty.session.data.noi_dung|default:''}</textarea>
              </div>
            </div>
            <script language='JavaScript' type='text/javascript'>
						function refreshCaptcha()
						{
							var img = document.images['captchaimg'];
							img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
						}
					</script>
            <label class="control-label" for="subject">Mã bảo vệ:</label>
            <input type="text" class="span3 reset" name="captcha" id="ma_bao_ve" maxlength="64" tabindex="2" value="{$smarty.session.data.ma_bao_ve|default:''}">
            <img src="/libraries/captcha/html-contact-form-captcha/captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' style="float:left; margin-left: 10px; margin-top: -5px"><a href='javascript: refreshCaptcha();' style="display:block; float:left; margin-top: 5px; margin-left: 10px">(Thay đổi mã bảo vệ)</a>
            <div class="space10"></div>
            <div style="clear:both"></div>
            <button type="submit" class="btn start" data-loading-text="Chờ xử lý...<i class='icon-spin icon-spinner icon-large icon-white'></i>" accesskey="s" tabindex="6" name="post" value="Submit">Đăng</button>&nbsp;&nbsp;
            <button type="button" id="btn-reset" class="btn start" accesskey="s" tabindex="6" name="post" value="Submit">Nhập lại</button>
           </div>
          </fieldset>
        </div>
        <script>
        	$("#btn-reset").click(function(){
				$(".reset").val("");
			});
        </script>
        <div class="space10"></div>
      </div>
    </form>
  </main>
</div>
