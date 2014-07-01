<div id="page-body">
  <main role="main">
    <div class="row-fluid">
      <div class="side-segment">
        <h3>danh sách thành viên diễn đàn {$dien_dan.ten}</h3>
      </div>
        <div class="well">
            <div class="widget-content">
              <ul class="recent-activity">
              	<li class="item"> <span class="icon red"><i class="icon16 icon-group"></i></span>
                  <div class="text">Quyền: </div>
                  <span class="recent-detail">Chủ diễn đàn</span> </li>
                 <div style="display:inline-block;width:360px;margin-top:10px; margin-left:50px">
                 <span class="imageframe imageframe-glow avatar-frame"><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={$chu_dien_dan.ma_nguoi_dung}"><img src="/home/upload/nguoi_dung/{if $chu_dien_dan.hinh_dai_dien!=NULL}{$chu_dien_dan.hinh_dai_dien}{else if $chu_dien_dan.gioi_tinh==0}no_avatar_male.jpg{else if}no_avatar_female.jpg{/if}" width="100px" height="100px" style="float:left"/></a></span>
                <div style="margin-left:10px">
                 	<div class="ten"><i class="icon-user"></i> Tên: {$chu_dien_dan.ho_nguoi_dung} {$chu_dien_dan.ten_nguoi_dung}</div>
                    <div class="diemso"><i class="icon-bar-chart"></i> Điểm số: {$chu_dien_dan.diem_so}</div>
                    <div class="ngaygianhap"><i class="icon-time"></i> Ngày gia nhập: {date('d-m-Y',strtotime($chu_dien_dan.ngay_gia_nhap))}</div>       
                </div>
                 <div style="clear:both"></div>
                 </div>
                 
                
                 
                 
                 
                 
                                 
                                  
                 
                <li class="item"> <span class="icon red"><i class="icon16 icon-flag"></i></span>
                  <div class="text">Quyền: </div>
                  <span class="recent-detail">Quản trị</span> </li>
                  {if $danh_sach_quan_tri !=NULL}
                  {foreach $danh_sach_quan_tri as $quan_tri}
                  <div style="display:inline-block;width:360px;margin-top:10px; margin-left:50px">
                 <span class="imageframe imageframe-glow avatar-frame"><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={$quan_tri.ma_nguoi_dung}"><img src="/home/upload/nguoi_dung/{if $quan_tri.hinh_dai_dien!=NULL}{$quan_tri.hinh_dai_dien}{else if $quan_tri.gioi_tinh==0}no_avatar_male.jpg{else if}no_avatar_female.jpg{/if}" width="100px" height="100px" style="float:left"/></a></span>
                <div style="margin-left:10px">
                 	<div class="ten"><i class="icon-user"></i> Tên: {$quan_tri.ho_nguoi_dung} {$quan_tri.ten_nguoi_dung}</div>
                    <div class="diemso"><i class="icon-bar-chart"></i> Điểm số: {$quan_tri.diem_so}</div>
                    <div class="ngaygianhap"><i class="icon-time"></i> Ngày gia nhập: {date('d-m-Y',strtotime($quan_tri.ngay_gia_nhap))}</div>       
                </div>
                 <div style="clear:both"></div>
                 </div>
                 {/foreach}
                 {/if}
                  
                <!--<li class="item"> <span class="icon yellow"><i class="icon16 icon-eye-open"></i></span> <span class="text">Lần cuối đăng nhập: </span> <span class="recent-detail"> 3-04-2014, 09:07</span> </li>-->
                <li class="item"> <span class="icon blue"><i class="icon16 icon-comments"></i></span> <span class="text">Quyền: </span> <span class="recent-detail">Thành viên diễn đàn<strong><a href="./search.php?author_id=104&amp;sr=posts" data-original-title="" title=""></a></strong></span> </li>
                {if $danh_sach_thanh_vien !=NULL}
                  {foreach $danh_sach_thanh_vien as $thanh_vien}
                  <div style="display:inline-block;width:360px;margin-top:10px; margin-left:50px">
                 <span class="imageframe imageframe-glow avatar-frame"><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={$thanh_vien.ma_nguoi_dung}"><img src="/home/upload/nguoi_dung/{if $thanh_vien.hinh_dai_dien!=NULL}{$thanh_vien.hinh_dai_dien}{else if $thanh_vien.gioi_tinh==0}no_avatar_male.jpg{else if}no_avatar_female.jpg{/if}" width="100px" height="100px" style="float:left"/></a></span>
                <div style="margin-left:10px">
                 	<div class="ten"><i class="icon-user"></i> Tên: {$thanh_vien.ho_nguoi_dung} {$thanh_vien.ten_nguoi_dung}</div>
                    <div class="diemso"><i class="icon-bar-chart"></i> Điểm số: {$thanh_vien.diem_so}</div>
                    <div class="ngaygianhap"><i class="icon-time"></i> Ngày gia nhập: {date('d-m-Y',strtotime($thanh_vien.ngay_gia_nhap))}</div>       
                </div>
                 <div style="clear:both"></div>
                 </div>
                 {/foreach}
                 {/if}
                
                <!--
                <li class="item"> <span class="icon green"><i class="icon16 icon-refresh"></i></span> <span class="text">Chuyên mục yêu thích nhất: <a href="./viewforum.php?f=2" data-original-title="" title="">Công nghệ thông tin</a> </span> <span class="recent-detail">(20 Bài viết)</span> </li>
                <li class="item"> <span class="icon green"><i class="icon16 icon-refresh"></i></span> <span class="text">Bài viết yêu thích nhất: <a href="./viewtopic.php?t=15" data-original-title="" title="">Lập trình căn bản PHP</a> </span> <span class="recent-detail">(10 Bài viết)</span> </li>-->
              </ul>
            </div>
          </div>
    </div>
  
    <div class="row-fluid">
      <div class="pull-left">
         <form method="post" id="jumpbox" action="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/chuyen_trang/chuyen_trang" onsubmit="if(this.f.value == -1){ return false; }">
          <fieldset class="controls-row">
            <label class="control-label" for="f" accesskey="j">Đi đến:</label>
            <select class="selectpicker"  id="ma_chuyen_muc" name="ma_chuyen_muc">
               		<option value="0">Chọn diễn đàn cần đến</option>
                    {*  Tuong tuong la se co 2 tham so nay: $ds_lcm,  $ma, kitu *}                                                            
                    {function in_loai_chuyen_muc}
                    	{foreach $ds_lcm as $lcm}
                        	{if $lcm.ma_loai_cha == $ma}
                            	<option value="{$lcm.ma}">{$kitu}{$lcm.ten}</option>
                                {in_loai_chuyen_muc ds_lcm=$ds_lcm ma=$lcm.ma kitu="$kitu$kitu"}
                        	{/if}
                        {/foreach}
                    
                    {/function}
                    
                    
                    {in_loai_chuyen_muc  ds_lcm=$ds_chuyen_muc ma=0 kitu='='}
                    
                </select>
            <button type="submit" class="btn">Đi</button>
          </fieldset>
        </form>
      </div>
    </div>
    <div class="row-fluid"> </div>
    <div class="space10"></div>
  </main>
</div>



