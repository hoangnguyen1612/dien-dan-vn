<script>
	function checkValidation(){

		var tieu_de_con = document.getElementById('tieu_de_con').value;
		var noi_dung_con = document.getElementById('noi_dung_con').value;
		if(tieu_de_con == ''){
			alert('Vui lòng nhập tiêu đề cho bài viết');
			return false;
		}
		if(noi_dung_con == ''){
			alert('Vui lòng nhập nội dung cho bài viết ');
			return false;
		}
		return true;
	}
	function checkValidation_1(){

		var tieu_de = document.getElementById('tieu_de').value;
		var noi_dung = document.getElementById('noi_dung').value;
		if(tieu_de == ''){
			alert('Vui lòng nhập tiêu đề cho bài viết');
			return false;
		}
		if(noi_dung == ''){
			alert('Vui lòng nhập nội dung cho bài viết ');
			return false;
		}
		return true;
	}
	
	
</script>
<div id="page-body">
  <main role="main">
    <div class="side-segment">
      <h3><a href="./viewtopic.php?f=2&amp;t=15" data-original-title="" title="">Thông báo nội quy của BQT HUTECH</a></h3>
    </div>
    <!-- NOTE: remove the style="display: none" when you want to have the forum description on the topic body -->
    <div style="display: none !important;">Description of your first forum. it can be really really long so let's see what happens to the container here.<br>
    </div>
    <div class="row-fluid">
      <div class="pull-right">
        <div class="pagination pagination-small hidden-phone">
          <ul>
            <li class="active"><a data-original-title="" title="">{$tong_so_bai_viet+1} bài viết</a></li>
            <li><a data-original-title="" title="">Trang <strong>{$trang_hien_tai}</strong> trên <strong>{$tong_so_trang}</strong></a></li>
            <li>{$bo_nut}</li>
          </ul>
        </div>
        <div class="visible-phone">
          <div class="pagination pagination-small">
            <ul>
              <li class="active"><a data-original-title="" title="">2 bài viết</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="pull-left">
        <form method="get" id="topic-search" action="./search.php" class="hidden-phone">
          <fieldset>
            <div class="input-append input-icon left"> <i class="icon-search"></i>
              <input type="text" class="span9" size="9" name="keywords" id="search_keywords" placeholder="Tìm kiếm bài viết">
              <a href="./search.php" class="btn" title="" type="submit" data-original-title="Advanced search"><span class="icon-cog"></span></a>
              <button type="submit" class="btn">Tìm kiếm</button>
            </div>
            <input type="hidden" name="t" value="15">
            <input type="hidden" name="sf" value="msgonly">
          </fieldset>
        </form>
        <form method="get" id="topic-search" action="./search.php" class="visible-phone">
          <fieldset>
            <div class="input-append">
              <input type="text" class="medium" size="9" name="keywords" id="search_keywords" placeholder="Search this topic…">
              <button type="submit" class="btn"><i class="icon-search"></i></button>
            </div>
            <input type="hidden" name="t" value="15">
            <input type="hidden" name="sf" value="msgonly">
          </fieldset>
        </form>
      </div>
    </div>
    <div class="row-fluid">
      <div class="pull-right">
        <div class="btn-group"> <a href="./memberlist.php?mode=email&amp;t=15" title="" class="btn" data-original-title="E-mail friend"><i class="icon-envelope"></i></a><a class="btn" href="./viewtopic.php?f=2&amp;t=15&amp;view=print" title="" accesskey="p" data-original-title="Print view"><i class="icon-print"></i></a> </div>
        <div class="btn-group"> <a href="./viewtopic.php?uid=114&amp;f=2&amp;t=15&amp;unwatch=topic&amp;start=0&amp;hash=8846177a" class="btn" title="" data-original-title="Unsubscribe topic"><i class="icon-remove"> </i></a><a href="./viewtopic.php?f=2&amp;t=15&amp;bookmark=1&amp;hash=8846177a" class="btn" title="" data-original-title="Đánh dấu bài viết"><i class="icon-bookmark"></i></a> </div>
      </div>
      <div class="pull-left"> <a href="../binh_luan/them?ma_bai_viet={$bai_viet.ma}" data-original-title="Bình luận bài viết" type="button" class="btn"><i class="icon-share-alt"></i>Bình luận</a> </div>
    </div>
    <div class="space10"></div>
    {if $trang_hien_tai == 1}
    <div id="p25" class="row-fluid ">
      <article role="article" >
        <div class="well well-small " style="background-color: white;border: 5px solid #e3e3e3;">
          <div class="span3 hidden-phone" id="profile25">
            <div class="user-profile-tab">
              <div class="user-profile-avatar">
                <div class="avatar-frame"> <a href="./memberlist.php?mode=viewprofile&amp;u=2" data-original-title="" title=""><img src="../../dien_dan_vn/upload/hinh_dai_dien/" width="100" height="100" alt="User avatar"></a> </div>
              </div>
              <div class="user-profile-row">
                <div class="user-profile-tag">Tên</div>
                <div class="user-profile-output"> <a href="../thong_tin_ca_nhan/index.php" style="color: #AA0000;" class="username-coloured" data-original-title="" title="">{$bai_viet.ten_nguoi_dang}</a> </div>
              </div>
              <div class="user-profile-row">
                <div class="user-profile-tag">Quyền</div>
                <div class="user-profile-output"> Site Admin </div>
              </div>
              <div class="user-profile-row">
                <div class="user-profile-tag">Bài viết</div>
                <div class="user-profile-output"> 9 </div>
              </div>
              <div class="user-profile-row">
                <div class="user-profile-tag">Gia nhập</div>
                <div class="user-profile-output"> 01-12-2013 </div>
              </div>
            </div>
          </div>
          <div class="postbody span9">
            <div class="row-fluid">
              <ul class="inline pull-right hidden-phone">
                <li><a class="btn btn-mini" href="../bao_cao/index.php" title="" data-original-title="Báo cáo bài viết"><i class="icon-exclamation-sign"></i></a></li>
              </ul>
              <ul class="inline pull-right visible-phone">
                <li><a class="btn btn-small" href="./report.php?f=2&amp;p=25" title="" data-original-title="Report this post"><i class="icon-exclamation-sign"></i></a></li>
              </ul>
              <div class="pull-left">
                <h3><a href="#p25" data-original-title="" title="">{$bai_viet.tieu_de}</a></h3>
              </div>
            </div>
            <div class="row-fluid">
              <div class="pull-left timepost"> <a href="./viewtopic.php?p=25#p25" title="" data-original-title="Post">#1</a> bởi <strong><a href="../thong_tin_ca_nhan/index.php" style="color: #AA0000;" class="username-coloured" data-original-title="" title="">{$bai_viet.ten_nguoi_dang}</a></strong> <i class="icon-time"></i> {date('h:i d/m/Y',strtotime($bai_viet.ngay_tao))} </div>
            </div>
            <div class="space10"></div>
            <div class="content">{$bai_viet.noi_dung}</div>
          </div>
          <div class="space10"></div>
        </div>
      </article>
    </div>
	{/if}
    {foreach $ds_binh_luan_cha as $binh_luan_cha}
    <div id="p26" class="row-fluid ">
      <article role="article">
        <div class="well well-small ">
          <div class="span3 hidden-phone" id="profile26">
            <div class="user-profile-tab">
              <div class="user-profile-avatar">
                <div class="avatar-frame"> <a href="./memberlist.php?mode=viewprofile&amp;u=104" data-original-title="" title=""><img src="./images/avatars/random/user10.png" width="100" height="100" title="Random avatar" alt="Random avatar"></a> </div>
              </div>
              <div class="user-profile-row">
                <div class="user-profile-tag">Tên</div>
                <div class="user-profile-output"> <a href="./memberlist.php?mode=viewprofile&amp;u=104" data-original-title="" title="">{$binh_luan_cha.ten_nguoi_dung}</a> </div>
              </div>
              <div class="user-profile-row">
                <div class="user-profile-tag">Bài viết</div>
                <div class="user-profile-output"> 2 </div>
              </div>
              <div class="user-profile-row">
                <div class="user-profile-tag">Tham gia</div>
                <div class="user-profile-output"> 03-04-2014 </div>
              </div>
            </div>
          </div>
          <div class="postbody span9">
            <div class="row-fluid">
              <ul class="inline pull-right hidden-phone">
            <li><a class="btn btn-mini" href="../bao_cao/index.php" title="" data-original-title="Bình luận giúp ích" style="color:red"><i class="icon-heart"></i></a></li>
            <li><a class="btn btn-mini" href="../bao_cao/index.php" title="" data-original-title="Bình luận đúng" style="color:blue"><i class="icon-ok"></i></a></li>
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
          
              <ul class="inline pull-right visible-phone">
                <li><a class="btn btn-small" href="../bao_cao/index.php" title="" data-original-title="Báo cáo bài viết"><i class="icon-exclamation-sign"></i></a></li>
                <li><a class="btn btn-small" href="javascript:void(0);" title="" data-original-title="Trả lời bài viết"><i class="icon-comment" id="target-shown"></i></a></li>
              </ul>
              <div class="pull-left">
                <h3><a href="#p26" data-original-title="" title="">{$binh_luan_cha.tieu_de}</a></h3>
              </div>
            </div>
            <div class="row-fluid">
              <div class="pull-left timepost"> <a href="./viewtopic.php?p=26#p26" title="" data-original-title="Post">#2</a> bởi <strong><a href="./memberlist.php?mode=viewprofile&amp;u=104" data-original-title="" title="">{$binh_luan_cha.ten_nguoi_dung}</a></strong> <i class="icon-time"></i> {date('h:i d/m/Y',strtotime($binh_luan_cha.ngay_tao))} </div>
            </div>
            <div class="space10"></div>
            <div class="content">{$binh_luan_cha.noi_dung}</div>
          </div>
          
          <div class="space10"></div>
          
         <form action="../binh_luan/them_sm" method="post" onsubmit="return checkValidation()">
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
              <button type="submit" class="btn start" id="dang_bai" name="post" autocomplete="off" data-loading-text="Chờ xử lý...<i class='icon-spin icon-spinner icon-large icon-white'></i>">Đăng</button>
            </form>
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
                <div class="avatar-frame"> <a href="./memberlist.php?mode=viewprofile&amp;u=104" data-original-title="" title=""><img src="./images/avatars/random/user10.png" width="100" height="100" title="Random avatar" alt="Random avatar"></a> </div>
              </div>
              <div class="user-profile-row">
                <div class="user-profile-tag">Tên</div>
                <div class="user-profile-output"> <a href="./memberlist.php?mode=viewprofile&amp;u=104" data-original-title="" title="">{$binh_luan_con.ten_nguoi_dung}</a> </div>
              </div>
              <div class="user-profile-row">
                <div class="user-profile-tag">Bài viết</div>
                <div class="user-profile-output"> 2 </div>
              </div>
              <div class="user-profile-row">
                <div class="user-profile-tag">Tham gia</div>
                <div class="user-profile-output"> 03-04-2014 </div>
              </div>
            </div>
          </div>
          <div class="postbody span9">
            <div class="row-fluid">
              <ul class="inline pull-right hidden-phone">
                <li><a class="btn btn-mini" href="../bao_cao/index.php" title="" data-original-title="Báo cáo bài viết"><i class="icon-exclamation-sign"></i></a></li>
              
              </ul>
          
              <ul class="inline pull-right visible-phone">
                <li><a class="btn btn-small" href="../bao_cao/index.php" title="" data-original-title="Báo cáo bài viết"><i class="icon-exclamation-sign"></i></a></li>
               
              </ul>
              <div class="pull-left">
                <h3><a href="#p26" data-original-title="" title="">{$binh_luan_con.tieu_de}</a></h3>
              </div>
            </div>
            <div class="row-fluid">
              <div class="pull-left timepost"> <a href="./viewtopic.php?p=26#p26" title="" data-original-title="Post">#2</a> bởi <strong><a href="./memberlist.php?mode=viewprofile&amp;u=104" data-original-title="" title="">{$binh_luan_con.ten_nguoi_dung}</a></strong> <i class="icon-time"></i>{date('h:i d/m/Y',strtotime($binh_luan_con.ngay_tao))}</div>
            </div>
            <div class="space10"></div>
            <div class="content">{$binh_luan_con.noi_dung}</div>
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
    
    <form method="post" action="../binh_luan/them_sm" onsubmit="return checkValidation_1()">
      <div class="well well-qr widget-collapsible"><!-- // Widget -->
        <div class="widget-header clickable collapsed" data-toggle="collapse" data-target="#target-col">
          <h4><i class="icon-edit"></i> Bình luận nhanh</h4>
          <a class="icon-arrow-down" href="javascript:void(0);" data-original-title="Hiện/Ẩn" title="" id="target-shown" style="float:right"></a> </div>
        <div id="target-col" class="widget-content collapse" style="height: 0px;">
          <div class="widget-content">
            <div class="space10"></div>
            <label class="control-label" for="subject">Tiêu đề:</label>
            <div class="controls">
              <input class="span11" type="text" name="data[tieu_de]" id="tieu_de" value="Re: {$bai_viet.tieu_de}">
            </div>
            <label class="control-label" for="Message">Nội dung:</label>
            <div class="controls">
              <textarea class="span11" name="data[noi_dung]" id="noi_dung" rows="3" placeholder="Viết nội dung..."></textarea>
            </div>
          </div>
          <div class="widget-footer">
            <div class="btn-toolbar padding-side">
              <input type="hidden" name="data[ma_bai_viet]" value="{$bai_viet.ma}">
              <input type="hidden" name="data[ma_loai_cha]" value="0">
              <button type="submit" class="btn start" id="load" name="post" autocomplete="off" data-loading-text="Chờ xử lý...<i class='icon-spin icon-spinner icon-large icon-white'></i>">Đăng</button>
              <button type="button" class="btn start" id="load" name="full_editor" autocomplete="off" data-loading-text="Chờ xử lý...<i class='icon-spin icon-spinner icon-large icon-white'></i>" onclick="window.location.href='../binh_luan/them.php?ma_bai_viet={$bai_viet.ma}'">Bình luận đầy đủ</button>
            </div>
          </div>
        </div>
      </div>
      <!-- // Widget -->
    </form>
    <div class="row-fluid">
      <div class="pull-left">
        <div class="da-panel-content"> <a href="../binh_luan/them.php?ma_bai_viet={$bai_viet.ma}" data-original-title="Bình luận bài viết" type="button" class="btn"><i class="icon-share-alt"></i> Bình luận</a> </div>
      </div>
      <div class="pull-right">
        <div class="pagination pagination-small hidden-phone">
          <ul>
            <li><a title="" data-original-title="" href="javascript:void(0);" data-target=".sorting" data-toggle="collapse" class="">Lựa chọn</a></li>
            <li class="active"><a data-original-title="" title="">{$tong_so_bai_viet + 1} bài viết</a></li>
            <li><a data-original-title="" title="">Trang <strong>{$trang_hien_tai}</strong> trên <strong>{$tong_so_trang}</strong></a></li>
              <li>{$bo_nut}</li>
          </ul>
        </div>
        <div class="visible-phone">
          <div class="pagination pagination-small">
            <ul>
              <li class="active"><a data-original-title="" title="">{$tong_so_bai_viet + 1} bài viết</a></li>
              <li><a data-original-title="" title="">Trang <strong>{$trang_hien_tai}</strong> trên <strong>{$tong_so_trang}</strong></a></li>
            
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="space10"></div>
    <div class="pull-right"> </div>
    <div class="row-fluid">
      <div class="pull-left">
        <form method="post" id="jumpbox" action="./viewforum.php" onsubmit="if(this.f.value == -1){ return false;}">
          <fieldset class="controls-row">
            <label class="control-label" for="f" accesskey="j">Đi đến:</label>
            <select class="selectpicker" data-container="body" name="f" id="f" onchange="if(this.options[this.selectedIndex].value != -1){ document.forms['jumpbox'].submit() }" data-original-title="" title="" style="display: none;">
              <option value="-1">Select a forum</option>
              <option value="-1">------------------</option>
              <option value="1">Your first category</option>
              <option value="2" selected="selected">&nbsp; &nbsp;Your first forum</option>
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
            <button type="submit" class="btn">Đi</button>
          </fieldset>
        </form>
      </div>
    </div>
    <div class="row-fluid">
      <div class="pull-left"> <a href="./viewforum.php?f=2" accesskey="r" data-original-title="" title="">Return to Your first forum</a> </div>
    </div>
    <form id="viewtopic" method="post" action="./viewtopic.php?f=2&amp;t=15">
      <fieldset>
        <div class="row-fluid hidden-phone"> 
          <!-- // Column -->
          <div class="span12">
            <div class="widget-collapsible">
              <div class="sorting widget-content in collapse" style="height: auto;">
                <div class="widget-body-text">
                  <div class="controls controls-row">
                    <div class="span4">
                      <label class="control-label" for="bday_day">Hiển thị:</label>
                      <div class="controls">
                        <div class="selector">
                          <select class="selectpicker" data-width="120px" data-container="body" name="st" id="st" data-original-title="" title="" style="display: none;">
                            <option value="0" selected="selected">Tất cả bài viết</option>
                            <option value="1">1 day</option>
                            <option value="7">7 days</option>
                            <option value="14">2 weeks</option>
                            <option value="30">1 month</option>
                            <option value="90">3 months</option>
                            <option value="180">6 months</option>
                            <option value="365">1 year</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="span4">
                      <label class="control-label" for="bday_day">Sắp xếp theo </label>
                      <div class="controls">
                        <div class="selector">
                          <select class="selectpicker" data-width="120px" data-container="body" name="sk" id="sk" data-original-title="" title="" style="display: none;">
                            <option value="a">Tác giả</option>
                            <option value="t" selected="selected">Thời gian đăng bài</option>
                            <option value="s">Tiêu đề</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="span4">
                      <label class="control-label" for="bday_day">Sắp xếp theo</label>
                      <div class="controls">
                        <div class="input-append">
                          <div class="selector">
                            <select class="selectpicker" data-width="120px" data-container="body" name="sd" id="sd" data-original-title="" title="" style="display: none;">
                              <option value="a" selected="selected">Tăng dần</option>
                              <option value="d">Giảm dần</option>
                            </select>
                          </div>
                          <button class="btn" name="sort" type="submit">Đi</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- // Widget --> 
          </div>
          <!-- // Column --><!-- // Column --> 
        </div>
      </fieldset>
    </form>
    <div class="side-segment">
      <h3><a href="./viewonline.php" data-original-title="" title="">Ai đang online</a></h3>
    </div>
    <p><small>Số thành viên:10 <a href="./memberlist.php?mode=viewprofile&amp;u=114" data-original-title="" title="">hung</a> and 9 guests</small></p>
  </main>
</div>
<script type="text/javascript">
// <![CDATA[
	bbcodeEnabled = 1;
// ]]>
</script>  