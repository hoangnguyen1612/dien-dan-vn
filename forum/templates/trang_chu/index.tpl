<div id="page-body">
  <main role="main">
  {include "../elements/statistics.tpl"}
  
   {if empty($ds_chuyen_muc)}<span style="color: #999">Chưa có chuyên mục nào để hiển thị</span>{else if}	
      {foreach $ds_chuyen_muc as $chuyen_muc}
      	{if  empty($chuyen_muc.ma_loai_cha)}
    <table class="footable table table-striped table-bordered table-white table-primary table-hover default footable-loaded">
      <thead>
        {if empty($thanh_vien) || $thanh_vien.loai_thanh_vien==3}
        	{if $chuyen_muc.rieng_tu==1}
            	{continue}
            {/if}
        {/if}     	
        <tr>
      
          <th data-class="expand" class="footable-first-column"><i class="icon-list-ol"></i> <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/danh_sach?loai={$chuyen_muc.ma}" data-original-title="" title=""> {$chuyen_muc.ten} </a></th>
        
          <th class="large80" data-hide="phone"><i class="icon-bar-chart"></i> Thống kê</th>
          <th class="large20 footable-last-column" data-hide="phone"><i class="icon-comments-alt"></i> Bài mới</th>
        </tr>
      </thead>
      <tbody>
      {$children = getChildrenFirstForum($chuyen_muc.ma, $ds_chuyen_muc)}
       {if $children!=NULL}
      {$kt=0}
      	{foreach $children as $key=>$value}
  
            {$kt=1}
            	{if empty($thanh_vien) || $thanh_vien.loai_thanh_vien==3}
                    {if $value.rieng_tu==1}
                        {continue}
                    {/if}
        		{/if}
       			 <tr>
          <td title="No unread posts" class="expand footable-first-column"><span class="footable-toggle"></span> <i class="row-icon" style="background-image: url(/forum/templates/styles/BBOOTS/imageset/forum_read.gif); background-repeat: no-repeat;" title="No unread posts"></i> 
          <a class="feed-icon-forum hidden-phone" title="" href="../bai_viet/index.php?loai={$key}" data-original-title="Bình chọn diễn đàn">
          <img src="/forum/templates/images/icons/misc/star-icon.png" /></a> 
          <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/danh_sach?loai={$key}" class="forumtitle" data-original-title="" title="">{$value.ten}</a><br>
             <small>{$value.ghi_chu|default:''}</small><br />
          {$child = getChildrenFirstForum($key, $ds_chuyen_muc)}
                   {if $child!=NULL}
                   	&nbsp;&nbsp;Phụ mục : 
                            	{foreach $child as $k1=>$v1}
                               <i class="icon-comment"><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/danh_sach?loai={$k1}">{$v1.ten}</a>&nbsp;&nbsp;
                                {/foreach}
        
       			   {/if}
           </td>
             
        	
       
            
          <td class="center"><!--{$chuyen_muc.so_luong_bai_viet}Chủ đề <br>-->
            {dem_bai_viet($ma_dien_dan, $key)} bài viết </td>
            {$bai_viet_moi = bai_viet_moi($ma_dien_dan, $key)}
          <td class="center footable-last-column">
          {if $bai_viet_moi!=0}
          	<i class="icon-user"></i> bởi 
          <a href="" data-original-title="" title="">{get_ho_ten($bai_viet_moi.ma_nguoi_dang)}</a> <a rel="tooltip" data-placement="right" data-original-title="Đi đến {get_ho_ten($bai_viet_moi.ma_nguoi_dang)}" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={$bai_viet_moi.ma_nguoi_dang}"><i class="mobile-post icon-signout"></i></a> <br>
          <i class="icon-time"></i> <small>{date('H:i d-m-Y',strtotime($bai_viet_moi.ngay_tao))}</small>
           {else if} 
           	  0 bài viết
           {/if}
            </td>
           </tr>  
       			
        	
        {/foreach}
        
        {if $kt==0}<tr><td>Chưa có chuyên mục nào để hiển thị</td></tr>{/if}
      </tbody>
    </table> 
    	{/if}
        {/if}
       {/foreach}{/if}

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
    
    <!--<div class="row-fluid">
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
    </div>-->
  </main>
</div>
