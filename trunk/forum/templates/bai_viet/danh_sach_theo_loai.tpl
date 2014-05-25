<div id="page-body">
  <main role="main">
    <div class="side-segment">
      <h3><a href="./viewforum.php?f=2" data-original-title="" title="">Danh sách bài viết</a></h3>
    </div>
    <div> 
      <!-- NOTE: remove the style="display: none" when you want to have the forum description on the forum body -->
      <div style="display: none !important;">Description of your first forum. it can be really really long so let's see what happens to the container here.<br>
      </div>
    </div>
    <div class="row-fluid">
      <div class="pull-left">
        <form method="get" id="topic-search" action="./search.php">
          <div class="input-append hidden-phone input-icon left"> <i class="icon-search"></i>
            <input type="text" class="span9" size="9" name="keywords" id="search_keywords" placeholder="Tìm kiếm bài viết…">
            <a href="./search.php" class="btn" title="" type="submit" data-original-title="Advanced search"><span class="icon-cog"></span></a>
            <button type="submit" class="btn black">Tìm kiếm</button>
          </div>
          <div class="input-append visible-phone">
            <input type="text" class="medium" size="9" name="keywords" id="search_keywords" placeholder="Tìm kiếm bài viết…">
            <button type="submit" class="btn black">Tìm kiếm</button>
          </div>
          <input type="hidden" name="fid[0]" value="2">
        </form>
      </div>
      </div>
    <div class="row-fluid">
      <div class="pull-right">
        <div class="btn-group"> </div>
      </div>
      
    </div>
    <div class="space10"></div>
    <table class="footable table table-striped table-bordered table-white table-primary table-hover default footable-loaded">
      <thead>
        <tr>
          <th data-class="expand" class="footable-first-column"><i class="icon-group"></i> Bài viết</th>
          <th data-hide="phone"><i class="icon-bar-chart"></i> Thống kê</th>
          <th data-hide="phone" class="footable-last-column"><i class="icon-comments-alt"></i> Bình luận mới</th>
        </tr>
      </thead>
      <tbody>
      
      {if $ds_bai_viet_theo_loai == NULL}
      <tr>
        <td>Chưa có bài viết nào để hiển thị</td>
      </tr>
      {/if}
      {foreach $ds_bai_viet_theo_loai as $bai_viet}
      	{if empty($thanh_vien) || $thanh_vien.loai_thanh_vien==3}
        	{if $bai_viet.rieng_tu==1}
            	{continue}
            {/if}
        {/if} 	
        	<tr class="">
        <td class="expand footable-first-column"><span class="footable-toggle"></span> <i class="row-icon" style="background-image: url(/forum/templates/images/icons/misc/{$bai_viet.icon}.gif); background-repeat: no-repeat;" title="No unread posts"></i> <a href="./chi_tiet?ma={$bai_viet.ma}" class="topictitle" data-original-title="" title="">{$bai_viet.tieu_de|truncate:100:"..."}</a> <br>
          <i class="icon-user"></i> bởi <a href="./memberlist.php?mode=viewprofile&amp;u=2" style="color: #AA0000;" class="username-coloured" data-original-title="" title="">{$bai_viet.ho_ten}</a>&nbsp;&nbsp; <i class="icon-time"></i> <small>{date('H:i d-m-Y', strtotime($bai_viet.ngay_tao))}</small></td>
        <td class="center">{$bai_viet.so_luong_binh_luan} Trả lời <br>
          {$bai_viet.luot_xem} Lượt xem</td>
        <td class="center footable-last-column"><i class="icon-user"></i> bởi <a href="/{$ma_dien_dan}/thanh_vien/thong_tin?ma_thanh_vien={$bai_viet.ma_nguoi_dang}" data-original-title="" title="">{get_ho_ten($bai_viet.ma_nguoi_dang)}</a> <a rel="tooltip" data-placement="right" data-original-title="Đi đến {get_ho_ten($bai_viet.ma_nguoi_dang)}" href="/{$ma_dien_dan}/thanh_vien/thong_tin?ma_thanh_vien={$bai_viet.ma_nguoi_dang}"><i class="mobile-post icon-signout"></i></a> <br>
          <i class="icon-time"></i> <small>{date('H:i d-m-Y',strtotime($bai_viet.ngay_tao))}</small></td>
      </tr>
      {/foreach}
      </tbody>
      
    </table>
    <div class="row-fluid">
      
      
    </div>
    <div class="space10"></div>
    <div class="row-fluid">
      <div class="row-fluid">
        <div class="pull-left">
          <form method="post" id="jumpbox" action="./viewforum.php" onsubmit="if(this.f.value == -1){ return false; }">
            <fieldset class="controls-row">
              <label class="control-label" for="f" accesskey="j">Đi đến:</label>
              <select class="selectpicker" data-container="body" name="f" id="f" onchange="if(this.options[this.selectedIndex].value != -1){ document.forms['jumpbox'].submit() }" data-original-title="" title="" style="display: none;">
                <option value="-1">Select a forum</option>
                <option value="-1">------------------</option>
                <option value="1">Your first category</option>
                <option value="2" selected="selected">&nbsp; &nbsp;Thông báo từ BQT</option>
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
        <div class="pull-left"> <a href="./index.php" accesskey="r" data-original-title="" title="">Trở về đầu trang</a> </div>
      </div>
    </div>
    <div class="row-fluid">
      <form method="post" action="./viewforum.php?f=2">
        <fieldset>
          <div class="row-fluid hidden-phone"> 
            <!-- // Column -->
            <div class="span12">
              <div class="widget-collapsible">
                <div class="sorting widget-content collapse">
                  <div class="widget-body-text">
                    <div class="controls controls-row">
                      <div class="span4">
                        <label class="control-label" for="bday_day">Hiển thị:</label>
                        <div class="controls">
                          <div class="selector">
                            <select class="selectpicker" data-width="120px" data-container="body" name="st" id="st" data-original-title="" title="" style="display: none;">
                              <option value="0" selected="selected">Tất cả Bài viết</option>
                              <option value="1">1 ngày</option>
                              <option value="7">7 ngày</option>
                              <option value="14">2 tuần</option>
                              <option value="30">1 tháng</option>
                              <option value="90">3 tháng</option>
                              <option value="180">6 tháng</option>
                              <option value="365">1 năm</option>
                            </select>
                            
                          </div>
                        </div>
                      </div>
                      <div class="span4">
                        <label class="control-label" for="bday_day">Sắp xếp theo</label>
                        <div class="controls">
                          <div class="selector">
                            <select class="selectpicker" data-width="120px" data-container="body" name="sk" id="sk" data-original-title="" title="" style="display: none;">
                              <option value="a">Tác giả</option>
                              <option value="t" selected="selected">Thời gian đăng bài</option>
                              <option value="r">Trả lời</option>
                              <option value="v">Lượt xem</option>
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
                                <option value="a">Tăng dần</option>
                                <option value="d" selected="selected">Giảm dần</option>
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
    </div>
    <div class="side-segment">
      <h3>Ai đang online</h3>
    </div>
    <p><small>Users browsing this forum: No registered users and 1 guest</small></p>
    <!--  change the attribute "none" to "block" to display the forum permission -->
    <div style="display:none;">
      <div class="side-segment">
        <h3>Forum permissions</h3>
      </div>
      <p>You <strong>cannot</strong> post new Bài viết in this forum<br>
        You <strong>cannot</strong> reply to Bài viết in this forum<br>
        You <strong>cannot</strong> edit your posts in this forum<br>
        You <strong>cannot</strong> delete your posts in this forum<br>
        You <strong>cannot</strong> post attachments in this forum<br>
      </p>
    </div>
    <!--  change the attribute "none" to "block" to display the forum permission --> 
    
  </main>
</div>
