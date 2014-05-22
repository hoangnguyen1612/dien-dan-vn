<div id="page-body">
  <main role="main">
  {include "../elements/statistics.tpl"}
   {function in_loai_chuyen_muc}	
      {foreach $ds_lcm as $lcm}
      	{if $lcm.ma_loai_cha == $ma}
    <table class="footable table table-striped table-bordered table-white table-primary table-hover default footable-loaded">
      <thead>
        <tr>
      
          <th data-class="expand" class="footable-first-column"><i class="icon-list-ol"></i> <a href="../bai_viet/index.php" data-original-title="" title=""> {$lcm.ten} </a></th>
        
          <th class="large80" data-hide="phone"><i class="icon-bar-chart"></i> Thống kê</th>
          <th class="large20 footable-last-column" data-hide="phone"><i class="icon-comments-alt"></i> Bài mới</th>
        </tr>
      </thead>
      <tbody>
      	{foreach $ds_chuyen_muc as $chuyen_muc}
        	{if $chuyen_muc.ma_loai_cha == $lcm.ma}
        <tr>
          <td title="No unread posts" class="expand footable-first-column"><span class="footable-toggle"></span> <i class="row-icon" style="background-image: url(/forum/templates/styles/BBOOTS/imageset/forum_read.gif); background-repeat: no-repeat;" title="No unread posts"></i> <a class="feed-icon-forum hidden-phone" title="" href="../bai_viet/index.php?loai={$chuyen_muc.ma}" data-original-title="Feed - Your first forum"><i class="icon-rss rss-color-forum"></i></a> <a href="../bai_viet/index.php?loai={$chuyen_muc.ma}" class="forumtitle" data-original-title="" title="">{$chuyen_muc.ten}</a><br>
            <small>{$chuyen_muc.ghi_chu|default:''}</small></td>
          <td class="center">{$chuyen_muc.so_luong_bai_viet}Chủ đề <br>
            9 Bài viết </td>
          <td class="center footable-last-column"><i class="icon-user"></i> bởi <a href="http://www.sitesplat.com/demo/phpBB3/memberlist.php?mode=viewprofile&amp;u=104" data-original-title="" title="">Hung</a> <a rel="tooltip" data-placement="right" data-original-title="View the latest post" href="http://www.sitesplat.com/demo/phpBB3/viewtopic.php?f=2&amp;p=27#p27"><i class="mobile-post icon-signout"></i></a> <br>
            <i class="icon-time"></i> <small>03-04-2014, 02:07</small></td>
        </tr>  
        	{/if}
        {/foreach}
      </tbody>
    </table> 
    	{/if}
       {/foreach}
       {/function}                 
       {in_loai_chuyen_muc  ds_lcm=$ds_chuyen_muc ma=0}
    <div class="row-fluid"> </div>
    
    <!-- Promo Box

  <section class="promo-box">
	<div class="row-fluid">
	
	<div class="pull-left">
	<h2>About Us</h2>
	<p>BBOOTS&#8482; Is The First And Only Responsive phpBB&reg; Unofficial HTML5/CSS3 Theme. Based On Bootstrap Framework Is Sure To AMAZE The phpBB Fan Club. </p> 
	<p>It’s Clean And Crisp Design Looks AWESOME Across All Browsers And Devices. Granted. <i aria-hidden="true" class="custom-firefox"></i> <i aria-hidden="true" class="custom-chrome"></i> <i aria-hidden="true" class="custom-IE"></i> <i aria-hidden="true" class="custom-opera"></i> <i aria-hidden="true" class="custom-safari"></i></p>
	</div>
		<div class="promo-icon">
		    <i class="custom-screen screen-pos"></i> 
			<i class="custom-tablet laptop-pos"></i> 
			<i class="custom-mobile mobile-pos"></i>
		</div>
	</div>
  </section>
  
  <div class="space10"></div>
	<div class="space10"></div>
	  <div class="space10"></div>
	  
 Promo Box  -->
    
    <div class="row-fluid">
      <div class="span12 statistics">
        <div class="span6">
          <div class="side-segment">
            <h3>Ai đang online</h3>
          </div>
          <p>Tổng số <strong>2</strong> thành viên online :: 0 đã đăng ký, 0 ẩn và 2 khách (dựa trên các thành viên đã đăng nhập trong 5 phút)<br>
            Thành viên online lâu nhất <strong>12</strong> đến 14 tháng 5 2014, 05:16<br>
            <br>
          </p>
        </div>
        <div class="span6">
          <div class="side-segment">
            <h3>Thống kê</h3>
          </div>
          <p>Tổng số bài viết <strong>11</strong> • Tổng số chuyên mục <strong>9</strong> • Tổng số thành viên <strong>53</strong> • Thành viên mới nhất <strong><a href="http://www.sitesplat.com/demo/phpBB3/memberlist.php?mode=viewprofile&amp;u=111" data-original-title="" title="">Hung</a></strong></p>
        </div>
      </div>
    </div>
  </main>
</div>
