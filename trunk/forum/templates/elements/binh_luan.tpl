{foreach $ds_binh_luan_cha as $binh_luan_cha}
<script>
$(document).ready(function(){
  $(".like-binh-luan{$binh_luan_cha.ma}").click(function(){
    $.get("/{$ma_dien_dan}/binh_luan/feedback",{ ma_binh_luan : "{$binh_luan_cha.ma}" },function(data,status){
	
	  var arr = data.split("~");	
	  if(arr[0] == 'like'){
		  	$(".so_luong_thich_binh_luan{$binh_luan_cha.ma}").html(arr[1]);
		 	$(".thich-binh-luan{$binh_luan_cha.ma}").css('color','crimson');
			  
	  }
	  if(arr[0] == 'dislike'){
		  	$(".so_luong_thich_binh_luan{$binh_luan_cha.ma}").html(arr[1]);
		    $(".thich-binh-luan{$binh_luan_cha.ma}").css('color','#CCC');
	  }
    });
  });
});
</script> 
    <div id="p26" class="row-fluid ">
      <article role="article">
        <div class="well well-small ">
          <div class="span3 hidden-phone" id="profile26">
                <div class="user-profile-tab">
                  <div class="user-profile-avatar">
                    <div class="avatar-frame"> <a href="/{$ma_dien_dan}/thanh_vien/thong_tin?ma_thanh_vien={$binh_luan_cha.ma_nguoi_dung}" data-original-title="" title=""><img src="/home/upload/nguoi_dung/{if $binh_luan_cha.thumbnail!=NULL}{$binh_luan_cha.thumbnail}{else if $binh_luan_cha.gioi_tinh==0}no_avatar_male.jpg{else if}no_avatar_female.jpg{/if}" width="100" height="100" title="Random avatar" alt="Random avatar"></a> </div>
                  </div>
                  <div class="user-profile-row">
                    <div class="user-profile-tag">Tên</div>
                    <div class="user-profile-output"> <a href="/{$ma_dien_dan}/thanh_vien/thong_tin?ma_thanh_vien={$binh_luan_cha.ma_nguoi_dung}" data-original-title="" title="">{$binh_luan_cha.ten_nguoi_dung}</a> </div>
                  </div>
                  <div class="user-profile-row">
                    <div class="user-profile-tag">Tham gia</div>
                    <div class="user-profile-output"> {date('d-m-Y', strtotime($binh_luan_cha.ngay_gia_nhap))} </div>
                  </div>
                </div>
              </div>
           <!--===================================================FEDDBACK COMMENTS================================================================== -->                
          <div class="feedback-comment">
            {if $binh_luan_cha.dung == 1}<i class="icon-ok-sign" style="color:green;font-size:2em"></i><br /><br />{/if}
                
                
                 
               
              
          </div>
      
      
    <!--=======================================================COMMENTS PARENT============================================================== -->         
              
          <div class="postbody span9">
            <div class="row-fluid">    
              <ul class="inline pull-right visible-phone">
             
                <li><a class="btn btn-small" href="/{$ma_dien_dan}/bao_cao/them?ma={$binh_luan_cha.ma}&loai=1" title="" data-original-title="Báo cáo bình luận"><i class="icon-exclamation-sign"></i></a></li>
                <li><a class="btn btn-small" href="javascript:void(0);" title="" data-original-title="Trả lời bài viết"><i class="icon-comment" id="target-shown"></i></a></li>
              </ul>
              <div class="pull-left">
             
                <h3> 	
                <a href="#p26" data-original-title="" title="">{$binh_luan_cha.tieu_de}</a>
                </h3>
              </div>
            </div>
            <div class="row-fluid">
              <div class="pull-left timepost"> <a href="./viewtopic.php?p=26#p26" title="" data-original-title="Post"></a> bởi <strong><a href="./memberlist.php?mode=viewprofile&amp;u=104" data-original-title="" title="">{$binh_luan_cha.ten_nguoi_dung}</a></strong> <i class="icon-time"></i> {date('h:i d/m/Y',strtotime($binh_luan_cha.ngay_tao))} </div>
            </div>
            <div class="space10"></div>
            <div class="content">{$binh_luan_cha.noi_dung}</div>
            <ul class="inline pull-right hidden-phone">
                  {if $login!='' && $login.ma == $bai_viet.ma_nguoi_dang}
                <li><a class="btn btn-mini" href="../binh_luan/cap_nhat_binh_luan_dung?ma={$binh_luan_cha.ma}" title="" data-original-title="Bình luận đúng" style="color:green"><i class="icon-ok"></i></a></li>
                  {/if}
                   {if $login != '' && $thanh_vien != '' && $thanh_vien.loai_thanh_vien != 3}
                  <li><span class="so_luong_thich_binh_luan{$binh_luan_cha.ma}">{$binh_luan_cha.thich}</span> <a  title="" data-original-title="Thích" style="color:crimson" class="like-binh-luan{$binh_luan_cha.ma} btn btn-mini"><i class="icon-thumbs-up-alt thich-binh-luan{$binh_luan_cha.ma}" {if trang_thai_thich_binh_luan($binh_luan_cha.ma,$ma_nguoi_dung) == NULL } style="color:#CCC;font-size:1.2em;cursor:pointer"{else}style="color:crimson;font-size:1.2em;cursor:pointer" {/if}></i></a> <li>
                    <li><a class="btn btn-mini" href="/{$ma_dien_dan}/bao_cao/them?ma={$binh_luan_cha.ma}&loai=1" title="" data-original-title="Báo cáo bình luận"{if trang_thai_bao_cao_binh_luan($binh_luan_cha.ma,$ma_nguoi_dung,$ma_dien_dan)!=NULL} onclick ="return false" {/if}><i class="icon-exclamation-sign" {if trang_thai_bao_cao_binh_luan($binh_luan_cha.ma,$ma_nguoi_dung,$ma_dien_dan)==NULL} style="color:#CCC"{else}style="color:crimson"  {/if} ></i></a></li>
                    <li><a class="btn btn-mini" data-toggle="collapse" data-target="#{$binh_luan_cha.ma}{$binh_luan_cha.ma_nguoi_dung}" data-original-title="Trả lời bài viết"><i class="icon-comment"></i></a></li>
                     {else}
                        	<li><span class="so_luong_thich_bai_viet">{$binh_luan_cha.thich}</span> <a class="like btn btn-mini" data- data-original-title="Lượt thích" onclick="return false"><i class="icon-thumbs-up-alt thich-bai-viet" style="color:#CCC;font-size:1.2em;cursor:pointer"></i></a></li>
                      {/if}
                     <li><a class="btn btn-mini" data-toggle="collapse" data-target="#{$binh_luan_cha.ma}" data-original-title="Xem các trả lời"><i class="icon-comment"> <span class="badge badge-info">
                        {foreach $ds_binh_luan_con as $binh_luan_con}
                            {if $binh_luan_con.ma_loai_cha == $binh_luan_cha.ma}
                                {$dem = $dem + 1}
                            {/if}                   
                        {/foreach}   
                            {$dem} 
                      {$dem = 0}
                     </span></i></a></li>
                       
                  </ul>
          </div>
          
          <div class="space10"></div>
 <!-- ================================================================GUI BINH LUAN CHA===================================================================== -->
         <form  method="post"  action="../binh_luan/them_sm" onsubmit="return checkValidation()" ><!-- -->
        <div id="{$binh_luan_cha.ma}{$binh_luan_cha.ma_nguoi_dung}" class="widget-content collapse" style="height: 0px; border-top: 1px solid #CCC;width:80%;margin-left:20%">
          <div class="widget-content">
            <div class="space10"></div>
            <label class="control-label" for="subject">Tiêu đề:</label>
            <div class="controls">
              <input class="span11" type="text" id="tieu_de_con" name="data[tieu_de]" value="Re:{$bai_viet.tieu_de}">
            </div>
            <label class="control-label" for="Message">Nội dung:</label>
            <div class="controls">
              <textarea class="span11" name="data[noi_dung]" id="noi_dung_con" rows="3" placeholder="Viết nội dung..."></textarea>
            </div>
          </div>
          <div class="widget-footer">
            <div class="btn-toolbar padding-side">
              <input type="hidden" name="data[ma_bai_viet]" value="{$bai_viet.ma}">
              <input type="hidden" name="data[ma_loai_cha]" value="{$binh_luan_cha.ma}">
              <button type="submit" class="btn start" id="dang_bai" name="post" autocomplete="off"
              data-loading-text="Chờ xử lý...<i class='icon-spin icon-spinner icon-large icon-white'></i>">Đăng</button>
            </form>
            
            
            
            
            
            
  <!-- ======================================================================================================================================= -->          
            </div>
          </div>
        </div>  
        <div id="{$binh_luan_cha.ma}"  class="widget-content collapse">
        
  
        {foreach $ds_binh_luan_con as $binh_luan_con}
        {if $binh_luan_con.ma_loai_cha == $binh_luan_cha.ma}
<script>
$(document).ready(function(){
  $(".like-binh-luan{$binh_luan_con.ma}").click(function(){
    $.get("/{$ma_dien_dan}/binh_luan/feedback",{ ma_binh_luan : "{$binh_luan_con.ma}" },function(data,status){

	  var arr = data.split("~");	
	  if(arr[0] == 'like'){
		  	$(".so_luong_thich_binh_luan{$binh_luan_con.ma}").html(arr[1]);
		 	$(".thich-binh-luan{$binh_luan_con.ma}").css('color','crimson');
			  
	  }
	  if(arr[0] == 'dislike'){
		  	$(".so_luong_thich_binh_luan{$binh_luan_con.ma}").html(arr[1]);
		    $(".thich-binh-luan{$binh_luan_con.ma}").css('color','#CCC');
	  }
    });
  });
});
</script> 
        <article role="article" style="width:98%;margin-left:2%;">
        <div  class="well well-small" style="background-color: white;margin-bottom:0px;border-radius:0px">
          <div class="span3 hidden-phone" id="profile26">
                <div class="user-profile-tab">
                  <div class="user-profile-avatar">
                    <div class="avatar-frame"> <a href="/{$ma_dien_dan}/thanh_vien/thong_tin?ma_thanh_vien={$binh_luan_con.ma_nguoi_dung}" data-original-title="" title=""><img src="/home/upload/nguoi_dung/{if $binh_luan_con.thumbnail!=NULL}{$binh_luan_con.thumbnail}{else if $binh_luan_con.gioi_tinh==0}no_avatar_male.jpg{else if}no_avatar_female.jpg{/if}" width="100" height="100" title="Random avatar" alt="Random avatar"></a> </div>
                  </div>
                  <div class="user-profile-row">
                    <div class="user-profile-tag">Tên</div>
                    <div class="user-profile-output"> <a href="/{$ma_dien_dan}/thanh_vien/thong_tin?ma_thanh_vien={$binh_luan_con.ma_nguoi_dung}" data-original-title="" title="">{$binh_luan_con.ten_nguoi_dung}</a> </div>
                  </div>
                  <div class="user-profile-row">
                    <div class="user-profile-tag">Tham gia</div>
                    <div class="user-profile-output"> {date('d-m-Y', strtotime($binh_luan_con.ngay_gia_nhap))} </div>
                  </div>
                </div>
              </div>
          <div class="feedback-comment">
                {if $binh_luan_con.dung == 1}<i class="icon-ok-sign" style="color:green;font-size:2em"></i><br /><br />{/if}
              </div>
          <div class="postbody span9">
                <div class="row-fluid">
                  <ul class="inline pull-right visible-phone">
                    <li><a class="btn btn-small" href="../bao_cao/index.php" title="" data-original-title="Báo cáo bài viết"><i class="icon-exclamation-sign"></i></a></li>
                   
                  </ul>
                  <div class="pull-left">
                    <h3>
                    <a href="#p26" data-original-title="" title="">{$binh_luan_con.tieu_de}</a>
                    </h3>
                  </div>
                </div>
                <div class="row-fluid">
                  <div class="pull-left timepost"> <a href="./viewtopic.php?p=26#p26" title="" data-original-title="Post"></a> bởi <strong><a href="./memberlist.php?mode=viewprofile&amp;u=104" data-original-title="" title="">{$binh_luan_con.ten_nguoi_dung}</a></strong>&nbsp; <i class="icon-time"></i>{date('h:i d/m/Y',strtotime($binh_luan_con.ngay_tao))}</div>
                </div>
                <div class="space18"></div>
                <div class="content">{$binh_luan_con.noi_dung}</div>
                <ul class="inline pull-right hidden-phone">
                   {if $login!='' && $login.ma == $bai_viet.ma_nguoi_dang}
                <li><a class="btn btn-mini" href="../binh_luan/cap_nhat_binh_luan_dung?ma={$binh_luan_con.ma}" title="" data-original-title="Bình luận đúng" style="color:green"><i class="icon-ok"></i></a></li>
                  {/if}
                   {if $login != '' && $thanh_vien != '' && $thanh_vien.loai_thanh_vien != 3}
                  <li><span class="so_luong_thich_binh_luan{$binh_luan_con.ma}">{$binh_luan_con.thich}</span> <a title="" data-original-title="Thích" style="color:crimson" class="like-binh-luan{$binh_luan_con.ma} btn btn-mini"><i class="icon-thumbs-up-alt thich-binh-luan{$binh_luan_con.ma}" {if trang_thai_thich_binh_luan($binh_luan_con.ma,$ma_nguoi_dung) == NULL } style="color:#CCC;font-size:1.2em;cursor:pointer"{else}style="color:crimson;font-size:1.2em;cursor:pointer" {/if}></i></a> <li>
               
                    <li><a class="btn btn-mini" href="/{$ma_dien_dan}/bao_cao/them?ma={$binh_luan_con.ma}&loai=1" title="" data-original-title="Báo cáo bình luận" {if trang_thai_bao_cao_binh_luan($binh_luan_con.ma,$ma_nguoi_dung,$ma_dien_dan)!=NULL} onclick ="return false" {/if}><i class="icon-exclamation-sign"  {if trang_thai_bao_cao_binh_luan($binh_luan_con.ma,$ma_nguoi_dung,$ma_dien_dan)==NULL} style="color:#CCC"{else}style="color:crimson"  {/if} ></i></a></li>
                   {else}
                 		<li><span class="so_luong_thich_bai_viet">{$binh_luan_con.thich}</span> <a class="like btn btn-mini" data- data-original-title="Lượt thích" onclick="return false"><i class="icon-thumbs-up-alt thich-bai-viet" style="color:#CCC;font-size:1.2em;cursor:pointer"></i></a></li>
                  {/if}
                  </ul>
              </div>
          
          <div class="space10"></div>    
        </div>
        
      </article>
      
        {/if}
        
      	{/foreach}
 		</div>     
         
        </div>
        
      </article>
       
      
    </div>
    {/foreach}