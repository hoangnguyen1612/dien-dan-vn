 {foreach $ds_binh_luan_cha as $binh_luan_cha}
    <div id="p26" class="row-fluid ">
      <article role="article">
        <div class="well well-small ">
          <div class="span3 hidden-phone" id="profile26">
                <div class="user-profile-tab">
                  <div class="user-profile-avatar">
                    <div class="avatar-frame"> <a href="./memberlist.php?mode=viewprofile&amp;u=104" data-original-title="" title=""><img src="/home/upload/nguoi_dung/{if $binh_luan_cha.thumbnail!=NULL}{$binh_luan_cha.thumbnail}{else if $binh_luan_cha.gioi_tinh==0}no_avatar_male.jpg{else if}no_avatar_female.jpg{/if}" width="100" height="100" title="Random avatar" alt="Random avatar"></a> </div>
                  </div>
                  <div class="user-profile-row">
                    <div class="user-profile-tag">Tên</div>
                    <div class="user-profile-output"> <a href="./memberlist.php?mode=viewprofile&amp;u=104" data-original-title="" title="">{$binh_luan_cha.ten_nguoi_dung}</a> </div>
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
                <a href="../binh_luan/feedback?ma_binh_luan={$binh_luan_cha.ma}&loai=0" title="" data-original-title="Không thích" style="color:crimson"><i class="icon-chevron-left like" style="color:#999;font-size:1.2em;"></i> </a>
                
                    <span style="font-weight:bold; color: #666; font-size: 1.2em">{dem_feedback_binh_luan($binh_luan_cha.ma)}</span> 
               
               <a href="../binh_luan/feedback?ma_binh_luan={$binh_luan_cha.ma}&loai=1" title="" data-original-title="Thích" style="color:crimson"><i class="icon-chevron-right like" style="color:#999;font-size:1.2em"></i></a>
          </div>
      
      
    <!--=======================================================COMMENTS PARENT============================================================== -->         
              
          <div class="postbody span9">
            <div class="row-fluid">    
              <ul class="inline pull-right visible-phone">
                <li><a class="btn btn-small" href="../bao_cao/index.php" title="" data-original-title="Báo cáo bài viết"><i class="icon-exclamation-sign"></i></a></li>
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
                    <li><a class="btn btn-mini" href="../bao_cao/index.php" title="" data-original-title="Báo cáo bài viết"><i class="icon-exclamation-sign"></i></a></li>
                    <li><a class="btn btn-mini" data-toggle="collapse" data-target="#{$binh_luan_cha.ma}{$binh_luan_cha.ma_nguoi_dung}" data-original-title="Trả lời bài viết"><i class="icon-comment"></i></a></li>
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
        <article role="article" style="width:98%;margin-left:2%;">
        <div  class="well well-small" style="background-color: white;margin-bottom:0px;border-radius:0px">
          <div class="span3 hidden-phone" id="profile26">
                <div class="user-profile-tab">
                  <div class="user-profile-avatar">
                    <div class="avatar-frame"> <a href="./memberlist.php?mode=viewprofile&amp;u=104" data-original-title="" title=""><img src="/home/upload/nguoi_dung/{if $binh_luan_con.thumbnail!=NULL}{$binh_luan_con.thumbnail}{else if $binh_luan_con.gioi_tinh==0}no_avatar_male.jpg{else if}no_avatar_female.jpg{/if}" width="100" height="100" title="Random avatar" alt="Random avatar"></a> </div>
                  </div>
                  <div class="user-profile-row">
                    <div class="user-profile-tag">Tên</div>
                    <div class="user-profile-output"> <a href="./memberlist.php?mode=viewprofile&amp;u=104" data-original-title="" title="">{$binh_luan_con.ten_nguoi_dung}</a> </div>
                  </div>
                  <div class="user-profile-row">
                    <div class="user-profile-tag">Tham gia</div>
                    <div class="user-profile-output"> {date('d-m-Y', strtotime($binh_luan_con.ngay_gia_nhap))} </div>
                  </div>
                </div>
              </div>
          <div class="feedback-comment">
                {if $binh_luan_con.dung == 1}<i class="icon-ok-sign" style="color:green;font-size:2em"></i><br /><br />{/if}
                    <a href="../binh_luan/cap_nhat_binh_luan_giup_ich?ma={$binh_luan_con.ma}" title="" data-original-title="Không thích" style="color:crimson"><i class="icon-chevron-left like" style="color:#999;font-size:1.2em;"></i> </a>
                    
                        <span style="font-weight:bold; color: #666; font-size: 1.2em">{dem_feedback_binh_luan($binh_luan_con.ma)}</span> 
                   
                   <a href="../binh_luan/feedback?ma_binh_luan={$binh_luan_con.ma}&loai=1" title="" data-original-title="Thích" style="color:crimson"><i class="icon-chevron-right like" style="color:#999;font-size:1.2em"></i></a>
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
                    <li><a class="btn btn-mini" href="../bao_cao/index.php" title="" data-original-title="Báo cáo bài viết"><i class="icon-exclamation-sign"></i></a></li>
                  
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