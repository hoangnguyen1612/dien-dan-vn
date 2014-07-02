<div id="page-body">
  <main role="main">
    <div class="side-segment">
      <h3>Số lượng bài viết tìm kiếm : <span style="color:crimson">{$tong_so_bai_viet}</span></h3>
    </div>
    <div> 
      <!-- NOTE: remove the style="display: none" when you want to have the forum description on the forum body -->
      <div style="display: none !important;">Description of your first forum. it can be really really long so let's see what happens to the container here.<br>
      </div>
    </div>
    <div class="row-fluid">
      <div class="pull-left">
   
      </div>
      <div class="pull-right">
        <div class="pagination pagination-small hidden-phone">
          <ul>
            <li class="active"><a data-original-title="" title="">{$tong_so_bai_viet} Bài viết</a></li>
            <li><a data-original-title="" title="">Trang <strong>{$trang_hien_tai}</strong> trên <strong>{$tong_so_trang}</strong></a></li>
            <li>{$bo_nut}</li>
          </ul>
        </div>
        <div class="visible-phone">
          <div class="pagination pagination-small">
            <ul>
              <li class="active"><a data-original-title="" title="">{$tong_so_bai_viet} Bài viết</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="pull-right">
        <div class="btn-group"> </div>
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
      {if $ds_bai_viet == NULL}
      <tr>
        <td>Danh sách tìm kiếm bài viết tìm thấy : <span style="color:crimson">{$tong_so_bai_viet}</span></td>
      </tr>
      {/if}
      {foreach $ds_bai_viet as $bai_viet}
      	{if empty($thanh_vien) || $thanh_vien.loai_thanh_vien==3}
        	{if $bai_viet.rieng_tu==1}
            	{continue}
            {/if}
        {/if} 	
        	<tr class="">
        <td class="expand footable-first-column"><span class="footable-toggle"></span> <i class="row-icon" style="{if $bai_viet.trang_thai == 0}background-image: url(/forum/templates/images/icons/misc/lock_closed.png){else} background-image: url(/forum/templates/images/icons/misc/{$bai_viet.icon}.gif) {/if}; background-repeat: no-repeat;" title="No unread posts"></i> <a href="./chi_tiet?ma={$bai_viet.ma}" class="topictitle" data-original-title="" title="" {if $bai_viet.trang_thai == 0} style="text-decoration:line-through" {/if}>{$bai_viet.tieu_de|truncate:100:"..."}</a> <br>
          <i class="icon-user"></i> bởi <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={$bai_viet.ma_nguoi_dang}" style="color: #AA0000;" class="username-coloured" data-original-title="" title="">{$bai_viet.ho_ten}</a>&nbsp;&nbsp; <i class="icon-time"></i> <small>{date('H:i d-m-Y', strtotime($bai_viet.ngay_tao))}</small></td>
        <td class="center">{$bai_viet.so_luong_binh_luan} Trả lời <br>
          {$bai_viet.luot_xem} Lượt xem</td>
        
        
        <td class="center footable-last-column"><i class="icon-user"></i> bởi <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={$bai_viet.ma_nguoi_dang}" data-original-title="" title="">{get_ho_ten($bai_viet.ma_nguoi_dang)}</a> <a rel="tooltip" data-placement="right" data-original-title="Đi đến {get_ho_ten($bai_viet.ma_nguoi_dang)}" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={$bai_viet.ma_nguoi_dang}"><i class="mobile-post icon-signout"></i></a> <br>
          <i class="icon-time"></i> <small>{date('H:i d-m-Y',strtotime($bai_viet.ngay_tao))}</small></td>
      </tr>
      {/foreach}
      </tbody>
      
    </table>

    <div class="row-fluid">
      <div class="pull-left">

      </div>
      <div class="pull-right">
        <div class="pagination pagination-small hidden-phone">
          <ul>
            <li><a title="" data-original-title="" href="javascript:void(0);" data-target=".sorting" data-toggle="collapse">Lựa chọn</a></li>
            <li class="active"><a data-original-title="" title="">{$tong_so_bai_viet} Bài viết</a></li>
            <li><a data-original-title="" title="">Trang <strong>{$trang_hien_tai}</strong> trên <strong>{$tong_so_trang}</strong></a></li>
            <li>{$bo_nut}</li>
          </ul>
        </div>
        <div class="visible-phone">
          <div class="pagination pagination-small">
            <ul>
              <li><a data-original-title="" title="">Trang <strong>1</strong> trên <strong>1</strong></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="space10"></div>
    <div class="row-fluid">
      <div class="row-fluid">
        <div class="pull-left">
            <form method="post" id="jumpbox" action="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/chuyen_trang/chuyen_trang" >
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
            <button type="submit" class="btn" style="margin-bottom: 10px;">Đi</button>
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
   {if isset($so_luong_online) && isset($ds_online)}
    <p><small>Tổng số {$so_luong_online} thành viên đang online : {foreach $ds_online as $online} {$online.ten_nguoi_dung} {/foreach}</small></p>
    {else}
    <p><small>Hiện không có ai đang online</small></p>
    {/if}
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
