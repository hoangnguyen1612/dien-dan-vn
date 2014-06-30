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
                 <span class="imageframe imageframe-glow avatar-frame"><img src="/home/upload/nguoi_dung/{if $chu_dien_dan.hinh_dai_dien!=NULL}{$chu_dien_dan.hinh_dai_dien}{else if $chu_dien_dan.gioi_tinh==0}no_avatar_male.jpg{else if}no_avatar_female.jpg{/if}" width="100px" height="100px" style="float:left"/></span>
                <div style="margin-left:10px">
                 	<div class="ten"><i class="icon-user"></i> Tên: {$chu_dien_dan.ho_nguoi_dung} {$chu_dien_dan.ten_nguoi_dung}</div>
                    <div class="diemso"><i class="icon-bar-chart"></i> Điểm số: {$chu_dien_dan.diem_so}</div>
                    <div class="ngaygianhap"><i class="icon-time"></i> Ngày gia nhập: {$chu_dien_dan.ngay_gia_nhap}</div>       
                </div>
                 <div style="clear:both"></div>
                 </div>
                 
                
                 
                 
                 
                 
                                 
                                  
                 
                <li class="item"> <span class="icon red"><i class="icon16 icon-flag"></i></span>
                  <div class="text">Quyền: </div>
                  <span class="recent-detail">Quản trị</span> </li>
                  {if $danh_sach_quan_tri !=NULL}
                  {foreach $danh_sach_quan_tri as $quan_tri}
                  <div style="display:inline-block;width:360px;margin-top:10px; margin-left:50px">
                 <span class="imageframe imageframe-glow avatar-frame"><img src="/home/upload/nguoi_dung/{if $quan_tri.hinh_dai_dien!=NULL}{$quan_tri.hinh_dai_dien}{else if $quan_tri.gioi_tinh==0}no_avatar_male.jpg{else if}no_avatar_female.jpg{/if}" width="100px" height="100px" style="float:left"/></span>
                <div style="margin-left:10px">
                 	<div class="ten"><i class="icon-user"></i> Tên: {$quan_tri.ho_nguoi_dung} {$quan_tri.ten_nguoi_dung}</div>
                    <div class="diemso"><i class="icon-bar-chart"></i> Điểm số: {$quan_tri.diem_so}</div>
                    <div class="ngaygianhap"><i class="icon-time"></i> Ngày gia nhập: {$quan_tri.ngay_gia_nhap}</div>       
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
                 <span class="imageframe imageframe-glow avatar-frame"><img src="/home/upload/nguoi_dung/{if $thanh_vien.hinh_dai_dien!=NULL}{$thanh_vien.hinh_dai_dien}{else if $thanh_vien.gioi_tinh==0}no_avatar_male.jpg{else if}no_avatar_female.jpg{/if}" width="100px" height="100px" style="float:left"/></span>
                <div style="margin-left:10px">
                 	<div class="ten"><i class="icon-user"></i> Tên: {$thanh_vien.ho_nguoi_dung} {$thanh_vien.ten_nguoi_dung}</div>
                    <div class="diemso"><i class="icon-bar-chart"></i> Điểm số: {$thanh_vien.diem_so}</div>
                    <div class="ngaygianhap"><i class="icon-time"></i> Ngày gia nhập: {$thanh_vien.ngay_gia_nhap}</div>       
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
        <form method="post" id="jumpbox" action="./viewforum.php" onsubmit="if(this.f.value == -1){ return false; }">
          <fieldset class="controls-row">
            <label class="control-label" for="f" accesskey="j">Đi đến:</label>
            <select class="selectpicker" data-container="body" name="f" id="f" onchange="if(this.options[this.selectedIndex].value != -1){ document.forms['jumpbox'].submit() }" data-original-title="" title="" style="display: none;">
              <option value="-1">Select a forum</option>
              <option value="-1">------------------</option>
              <option value="1">Your first category</option>
              <option value="2">&nbsp; &nbsp;Your first forum</option>
              <option value="11">Test Forum</option>
              <option value="6">Category with Password and locked forums</option>
              <option value="7">&nbsp; &nbsp;Password protected</option>
              <option value="8">&nbsp; &nbsp;Locked from the get-go</option>
              <option value="12">Category with Subforums and moderator assigned</option>
              <option value="13">&nbsp; &nbsp;Forum 1</option>
              <option value="17">&nbsp; &nbsp;&nbsp; &nbsp;Subforum 1</option>
              <option value="18">&nbsp; &nbsp;&nbsp; &nbsp;Subforum 2</option>
              <option value="3">Link Category</option>
              <option value="20">&nbsp; &nbsp;BBOOTS Community</option>
              <option value="19">&nbsp; &nbsp;Purchase BBOOTS</option>
              <option value="21">&nbsp; &nbsp;COLORIZE Service</option>
              <option value="15">&nbsp; &nbsp;phpBB ™ Documentation</option>
              <option value="16">&nbsp; &nbsp;phpBB ™ Home</option>
            </select>
            <div class="btn-group bootstrap-select">
              <button type="button" class="btn dropdown-toggle selectpicker btn-default" data-toggle="dropdown" data-id="f" title="" data-original-title="Select a forum"><span class="filter-option pull-left">Thông báo từ BQT HUTECH</span>&nbsp;<span class="caret"></span></button>
              <div class="dropdown-menu open">
                <ul class="dropdown-menu inner selectpicker" role="menu" data-original-title="" title="">
                  <li rel="0" class="selected"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">Chọn chuyện mục</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="1"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">------------------</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="2"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">Thông báo từ BQT HUTECH</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="3"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">&nbsp; &nbsp;Your first forum</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="4"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">Test Forum</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="5"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">Category with Password and locked forums</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="6"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">&nbsp; &nbsp;Password protected</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="7"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">&nbsp; &nbsp;Locked from the get-go</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="8"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">Category with Subforums and moderator assigned</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="9"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">&nbsp; &nbsp;Forum 1</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="10"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">&nbsp; &nbsp;&nbsp; &nbsp;Subforum 1</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="11"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">&nbsp; &nbsp;&nbsp; &nbsp;Subforum 2</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="12"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">Link Category</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="13"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">&nbsp; &nbsp;BBOOTS Community</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="14"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">&nbsp; &nbsp;Purchase BBOOTS</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="15"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">&nbsp; &nbsp;COLORIZE Service</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="16"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">&nbsp; &nbsp;phpBB ™ Documentation</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                  <li rel="17"><a tabindex="0" class="" style="" data-original-title="" title=""><span class="text">&nbsp; &nbsp;phpBB ™ Home</span><i class="glyphicon glyphicon-ok icon-ok check-mark"></i></a></li>
                </ul>
              </div>
            </div>
            <button type="submit" class="btn">Đi</button>
          </fieldset>
        </form>
      </div>
    </div>
    <div class="row-fluid"> </div>
    <div class="space10"></div>
  </main>
</div>



