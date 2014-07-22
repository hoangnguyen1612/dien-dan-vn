<div id="page-body">
  <main role="main">
    <div class="side-segment">
      <h3><a href="#" data-original-title="" title="">{$chuyen_muc.ten}</a></h3>
    </div>
    <div> 
      <!-- NOTE: remove the style="display: none" when you want to have the forum description on the forum body -->
      <div style="display: none !important;">Description of your first forum. it can be really really long so let's see what happens to the container here.<br>
      </div>
    </div>
    <div class="row-fluid">
      <div class="pull-left">
        <form method="get" id="topic-search" action="danh_sach">
          <div class="input-append hidden-phone input-icon left"> <i class="icon-search"></i>
          <input type="hidden" name = "loai" value="{$smarty.get.loai}">
            <input type="text" class="span9" size="9" name="tu_khoa" id="search_keywords" placeholder="Tìm kiếm bài viết…">
            <button type="submit" class="btn black">Tìm kiếm</button>
          </div>
        </form>
      </div>
      <div class="pull-right">
        <div class="pagination pagination-small hidden-phone">
          <ul>
            <li class="active"><a data-original-title="" title="">{$tong_so_bai_viet} Bài viết</a></li>
            <li><a data-original-title="" title="">Trang <strong>{$trang_hien_tai}</strong> trên <strong>{if $tong_so_trang == 0} 1 {else} {$tong_so_trang} {/if}</strong></a></li>
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
     <div class="pull-left"> <a href="./them?loai={$smarty.get.loai}" data-original-title="Tạo bài viết mới" type="button" class="btn"><i class="icon-share-alt"></i>Tạo bài viết mới</a> </div> 
       <div class="pull-left" style="margin-left:2px"><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/danh_sach?loai={$chuyen_muc.ma}&bo_loc=1" class="btn" data-original-title="Danh sách 10 bài viết được yêu thích nhất của chuyên mục" title="Danh sách 10 bài viết được yêu thích nhất của chuyên mục"><i class="icon-heart" style="color:crimson;font-size:1.2em" ></i></a> </div>
        <div class="pull-left" style="margin-left:2px"><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/danh_sach?loai={$chuyen_muc.ma}&bo_loc=0" class="btn" data-original-title="Danh sách 10 bài viết mới nhất của chuyên mục" title="Danh sách 10 bài viết mới nhất của chuyên mục"><i class="icon-bolt" style="color:yellow;font-size:1.2em" ></i></a> </div>
    </div>
    <div class="space10"></div>
    {if $ds_chuyen_muc_con != NULL}
     <table class="footable table table-striped table-bordered table-white table-primary table-hover default footable-loaded">
      <thead>
        <tr>
          <th data-class="expand" class="footable-first-column"><i class="icon-group"></i> Phụ mục : {$chuyen_muc.ten}</th>
          <th data-hide="phone"><i class="icon-bar-chart"></i> Thống kê</th>
          <th data-hide="phone" class="footable-last-column"><i class="icon-comments-alt"></i> Bình luận mới</th>
        </tr>
      </thead>
      <tbody>
      
     
      {foreach $ds_chuyen_muc_con as $chuyen_muc_con}
      	{if empty($thanh_vien) || $thanh_vien.loai_thanh_vien==3}
        	{if $chuyen_muc_con.rieng_tu==1}
            	{continue}
            {/if}
        {/if} 	
        	<tr class="">
        <td class="expand footable-first-column"><span class="footable-toggle"></span> <i class="icon-comment"  title="No unread posts"></i>   <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/danh_sach?loai={$chuyen_muc_con.ma}" class="topictitle" data-original-title="" title="">{$chuyen_muc_con.ten|truncate:100:"..."}</a> <br><small>{$chuyen_muc_con.ghi_chu|default:''}</small></td>
        <td class="center">{dem_bai_viet($ma_dien_dan, $chuyen_muc_con.ma)} bài viết </td>
         {$bai_viet_moi = bai_viet_moi($ma_dien_dan, $chuyen_muc_con.ma)}
         
        <td class="center footable-last-column"> 
        {if $bai_viet_moi!=0}
          	<i class="icon-user"></i> bởi 
          <a href="" data-original-title="" title="">{get_ho_ten($bai_viet_moi.ma_nguoi_dang)}</a> <a rel="tooltip" data-placement="right" data-original-title="Đi đến {get_ho_ten($bai_viet_moi.ma_nguoi_dang)}" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={url_encode($bai_viet_moi.ma_nguoi_dang)}"><i class="mobile-post icon-signout"></i></a> <br>
          <i class="icon-time"></i> <small>{date('H:i d-m-Y',strtotime($bai_viet_moi.ngay_tao))}</small>
           {else if} 
           	  0 bài viết
           {/if}</td>
      </tr>
      {/foreach}
      </tbody>
      
    </table>
    {/if}
    <table class="footable table table-striped table-bordered table-white table-primary table-hover default footable-loaded">
      <thead>
        <tr>
          <th data-class="expand" class="footable-first-column"><i class="icon-group"></i> Bài viết được đánh dấu</th>
          <th data-hide="phone"><i class="icon-bar-chart"></i> Thống kê</th>
         
          <th data-hide="phone" class="footable-last-column"><i class="icon-comments-alt"></i> Bình luận mới</th>
        </tr>
      </thead>
      <tbody>
     	{if $ds_bai_viet_danh_dau != NULL}
        {foreach $ds_bai_viet_danh_dau as $bai_viet_danh_dau}       	 	
        <tr class="">
        <td class="expand footable-first-column"><span class="footable-toggle"></span> <i class="row-icon" style=" background-image: url(/forum/templates/images/icons/misc/0.gif) ; background-repeat: no-repeat;" title="No unread posts"></i> <a href="./chi_tiet?ma=24" class="topictitle" data-original-title="" title=""><i class="icon-tag"></i> <span style="color:red">Chú ý :</span> {$bai_viet_danh_dau.tieu_de}</a>
        {if $thanh_vien != ''  && ($thanh_vien.loai_thanh_vien == 0 || $thanh_vien.loai_thanh_vien == 1)}	
        <a class="feed-icon-forum hidden-phone" title="Bỏ đánh dấu bài viết" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/trang_thai_danh_dau?ma={$bai_viet_danh_dau.ma}" data-original-title="Bình chọn diễn đàn">
          <i class="icon-tag"></i></a>
         {/if} 
         <br>
          <i class="icon-user"></i> bởi <a href="/29/sinh-vien-hutech/thanh_vien/thong_tin?ma_thanh_vien={url_encode($bai_viet_danh_dau.ma_nguoi_dang)}" style="color: #AA0000;" class="username-coloured" data-original-title="" title="">{$bai_viet_danh_dau.ho_ten}</a>&nbsp;&nbsp; <i class="icon-time"></i> <small>{$bai_viet_danh_dau.ngay_tao}</small></td>
        <td class="center">{$bai_viet_danh_dau.so_luong_binh_luan} Trả lời <br>
          {$bai_viet_danh_dau.luot_xem} Lượt xem</td>
         {$binh_luan_danh_dau = binh_luan_moi_nhat($bai_viet_danh_dau.ma,$ma_dien_dan)}
        	{if $binh_luan_danh_dau != NULL}
        <td class="center footable-last-column"><i class="icon-user"></i> bởi <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={url_encode($binh_luan_danh_dau[0].ma_nguoi_dung)}" data-original-title="" title="">{get_ho_ten($binh_luan_danh_dau[0].ma_nguoi_dung)}</a> <a rel="tooltip" data-placement="right" data-original-title="Đi đến bài viết" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/chi_tiet?ma={$bai_viet_danh_dau.ma}#{$binh_luan_danh_dau[0].ma}{$bai_viet_danh_dau.ma}"><i class="mobile-post icon-signout"></i></a> <br>
          <i class="icon-time"></i> <small>{date('H:i d-m-Y',strtotime($binh_luan_danh_dau[0].ngay_tao))}</small></td>
          {else}
          	<td class="center footable-last-column">Chưa có bình luận nào</td>
          	{/if}
        
        
      	
        {/foreach}
        {else}
        <tr>
        <td>Chưa có bài viết nào được đánh dấu</td>
        </tr>
        
        {/if}
            	 	
        	
            </tbody>
      
    </table>
  
   
 
    

    {if isset($smarty.get.bo_loc) }
    	{if $smarty.get.bo_loc == 0}
            <table class="footable table table-striped table-bordered table-white table-primary table-hover default footable-loaded">
      <thead>
        <tr>
          <th data-class="expand" class="footable-first-column"><i class="icon-group"></i> Bài viết</th>
          <th data-hide="phone"><i class="icon-bar-chart"></i> Thống kê</th>
          <th data-hide="phone"><i class="icon-bar-chart"></i> Thời gian</th>
          <th data-hide="phone" class="footable-last-column"><i class="icon-comments-alt"></i> Bình luận mới</th>
        </tr>
      </thead>
      <tbody>
      
      {if $ds_bai_viet_moi_nhat == NULL}
      <tr>
        <td>Chưa có bài viết nào để hiển thị</td>
      </tr>
      {/if}
      {foreach $ds_bai_viet_moi_nhat as $bai_viet_moi_nhat}
      	{if empty($thanh_vien) || $thanh_vien.loai_thanh_vien==3}
        	{if $bai_viet_moi_nhat.rieng_tu==1}
            	{continue}
            {/if}
        {/if} 	
        	<tr class="">
        <td class="expand footable-first-column"><span class="footable-toggle"></span> <i class="row-icon" style="background-image: url(/forum/templates/images/icons/misc/{$bai_viet_moi_nhat.icon}.gif); background-repeat: no-repeat;" title="No unread posts"></i> <a href="./chi_tiet?ma={$bai_viet_moi_nhat.ma}" class="topictitle" data-original-title="" title="">{$bai_viet_moi_nhat.tieu_de|truncate:100:"..."}</a> <br>
          <i class="icon-user"></i> bởi <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={url_encode($bai_viet_moi_nhat.ma_nguoi_dang)}" style="color: #AA0000;" class="username-coloured" data-original-title="" title="">{$bai_viet_moi_nhat.ho_ten}</a>&nbsp;&nbsp; <i class="icon-time"></i> <small>{date('H:i d-m-Y', strtotime($bai_viet_moi_nhat.ngay_tao))}</small></td>
        <td class="center">{$bai_viet_moi_nhat.so_luong_binh_luan} Trả lời <br>
          {$bai_viet_moi_nhat.luot_xem} Lượt xem</td>
           <td class="center">{time_since(time() - strtotime($bai_viet_moi_nhat.ngay_tao))}</td>
       
       {$binh_luan_moi = binh_luan_moi_nhat($bai_viet_moi_nhat.ma,$ma_dien_dan)}
        	{if $binh_luan_moi != NULL}
        <td class="center footable-last-column"><i class="icon-user"></i> bởi <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={url_encode($binh_luan_moi[0].ma_nguoi_dung)}" data-original-title="" title="">{get_ho_ten($binh_luan_moi[0].ma_nguoi_dung)}</a> <a rel="tooltip" data-placement="right" data-original-title="Đi đến bài viết" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/chi_tiet?ma={$bai_viet_moi_nhat.ma}#{$binh_luan_moi[0].ma}{$bai_viet_moi_nhat.ma}"><i class="mobile-post icon-signout"></i></a> <br>
          <i class="icon-time"></i> <small>{date('H:i d-m-Y',strtotime($binh_luan_moi[0].ngay_tao))}</small></td>
          {else}
          	<td class="center footable-last-column">Chưa có bình luận nào</td>
          	{/if}
       
       
       
      </tr>
      {/foreach}
      </tbody>
      
    </table>
        {/if}
       
        
     	{if $smarty.get.bo_loc == 1}
        <table class="footable table table-striped table-bordered table-white table-primary table-hover default footable-loaded">
      <thead>
        <tr>
          <th data-class="expand" class="footable-first-column"><i class="icon-group"></i> Bài viết</th>
          <th data-hide="phone"><i class="icon-bar-chart"></i> Thống kê</th>
          <th data-hide="phone"><i class="icon-bar-chart"></i> Lượt thích</th>
          <th data-hide="phone" class="footable-last-column"><i class="icon-comments-alt"></i> Bình luận mới</th>
        </tr>
      </thead>
      <tbody>
      
      {if $ds_bai_viet_yeu_thich_nhat == NULL}
      <tr>
        <td>Chưa có bài viết nào để hiển thị</td>
      </tr>
      {/if}
      {foreach $ds_bai_viet_yeu_thich_nhat as $bai_viet_yeu_thich_nhat}
      	{if empty($thanh_vien) || $thanh_vien.loai_thanh_vien==3}
        	{if $bai_viet_yeu_thich_nhat.rieng_tu==1}
            	{continue}
            {/if}
        {/if} 	
        	<tr class="">
        <td class="expand footable-first-column"><span class="footable-toggle"></span> <i class="row-icon" style="background-image: url(/forum/templates/images/icons/misc/{$bai_viet_yeu_thich_nhat.icon}.gif); background-repeat: no-repeat;" title="No unread posts"></i> <a href="./chi_tiet?ma={$bai_viet_yeu_thich_nhat.ma}" class="topictitle" data-original-title="" title="">{$bai_viet_yeu_thich_nhat.tieu_de|truncate:100:"..."}</a> <br>
          <i class="icon-user"></i> bởi <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={url_encode($bai_viet_yeu_thich_nhat.ma_nguoi_dang)}" style="color: #AA0000;" class="username-coloured" data-original-title="" title="">{$bai_viet_yeu_thich_nhat.ho_ten}</a>&nbsp;&nbsp; <i class="icon-time"></i> <small>{date('H:i d-m-Y', strtotime($bai_viet_yeu_thich_nhat.ngay_tao))}</small></td>
        <td class="center">{$bai_viet_yeu_thich_nhat.so_luong_binh_luan} Trả lời <br>
          {$bai_viet_yeu_thich_nhat.luot_xem} Lượt xem</td>
           <td class="center">{$bai_viet_yeu_thich_nhat.thich} <i class="icon-thumbs-up-alt" style="color:crimson"></i> <br>
          {$bai_viet_yeu_thich_nhat.luot_xem} Lượt xem</td>
          
          
         {$binh_luan_yeu_thich = binh_luan_moi_nhat($bai_viet_yeu_thich_nhat.ma,$ma_dien_dan)}
        	{if $binh_luan_yeu_thich != NULL}
        <td class="center footable-last-column"><i class="icon-user"></i> bởi <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={url_encode($binh_luan_yeu_thich[0].ma_nguoi_dung)}" data-original-title="" title="">{get_ho_ten($binh_luan_yeu_thich[0].ma_nguoi_dung)}</a> <a rel="tooltip" data-placement="right" data-original-title="Đi đến bài viết" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/chi_tiet?ma={$bai_viet_yeu_thich_nhat.ma}#{$binh_luan_yeu_thich[0].ma}{$bai_viet_yeu_thich_nhat.ma}"><i class="mobile-post icon-signout"></i></a> <br>
          <i class="icon-time"></i> <small>{date('H:i d-m-Y',strtotime($binh_luan_yeu_thich[0].ngay_tao))}</small></td>
          	{else}
          	<td class="center footable-last-column">Chưa có bình luận nào</td>
          	{/if}
        
        
      </tr>
      {/foreach}
      </tbody>
      
    </table>
        {/if}
         {else}
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
        <td class="expand footable-first-column"><span class="footable-toggle"></span> <i class="row-icon" style="{if $bai_viet.trang_thai == 0}background-image: url(/forum/templates/images/icons/misc/lock_closed.png){else} background-image: url(/forum/templates/images/icons/misc/{$bai_viet.icon}.gif) {/if}; background-repeat: no-repeat;" title="No unread posts"></i> <a href="./chi_tiet?ma={$bai_viet.ma}" class="topictitle" data-original-title="" title="" {if $bai_viet.trang_thai == 0} style="text-decoration:line-through" {/if}>{$bai_viet.tieu_de|truncate:100:"..."}</a>
        {if $thanh_vien != ''  && ($thanh_vien.loai_thanh_vien == 0 || $thanh_vien.loai_thanh_vien == 1) && $bai_viet.stick == 0}	
        <a class="feed-icon-forum hidden-phone" title="Đánh dấu bài viết" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/trang_thai_danh_dau?ma={$bai_viet.ma}" data-original-title="Bình chọn diễn đàn">
          <i class="icon-tag"></i></a>
         {/if} 
          <br />
          <i class="icon-user"></i> bởi <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={url_encode($bai_viet.ma_nguoi_dang)}" style="color: #AA0000;" class="username-coloured" data-original-title="" title="">{$bai_viet.ho_ten}</a>&nbsp;&nbsp; <i class="icon-time"></i> <small>{date('H:i d-m-Y', strtotime($bai_viet.ngay_tao))}</small></td>
        <td class="center">{$bai_viet.so_luong_binh_luan} Trả lời <br>
          {$bai_viet.luot_xem} Lượt xem</td>
        
        {$binh_luan_theo_loai = binh_luan_moi_nhat($bai_viet.ma,$ma_dien_dan)}
        	{if $binh_luan_theo_loai != NULL}
        <td class="center footable-last-column"><i class="icon-user"></i> bởi <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={url_encode($binh_luan_theo_loai[0].ma_nguoi_dung)}" data-original-title="" title="">{get_ho_ten($binh_luan_theo_loai[0].ma_nguoi_dung)}</a> <a rel="tooltip" data-placement="right" data-original-title="Đi đến bài viết" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/chi_tiet?ma={$bai_viet.ma}#{$binh_luan_theo_loai[0].ma}{$bai_viet.ma}"><i class="mobile-post icon-signout"></i></a> <br>
          <i class="icon-time"></i> <small>{date('H:i d-m-Y',strtotime($binh_luan_theo_loai[0].ngay_tao))}</small></td>
          {else}
          	<td class="center footable-last-column">Chưa có bình luận nào</td>
          	{/if}
      </tr>
      {/foreach}
      </tbody>
      
    </table>
    {/if}
    <div class="row-fluid">
      <div class="pull-left">
     <div class="da-panel-content"> <a href="./them?loai={$smarty.get.loai}" data-original-title="Tạo bài viết mới" type="button" class="btn"><i class="icon-share-alt"></i> Tạo bài viết mới</a> </div> 
      </div>
      <div class="pull-right">
        <div class="pagination pagination-small hidden-phone">
          <ul>
            <li class="active"><a data-original-title="" title="">{$tong_so_bai_viet} Bài viết</a></li>
            <li><a data-original-title="" title="">Trang <strong>{$trang_hien_tai}</strong> trên <strong>{if $tong_so_trang == 0} 1 {else} {$tong_so_trang} {/if}</strong></a></li>
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
      </div>
    </div>
    <!--  change the attribute "none" to "block" to display the forum permission -->
    <div style="display:block;">
      <div class="side-segment">
        <h3>Điều hành của diễn đàn</h3>
      </div>
      <p>
      <table>
      <tr>
      <td width="200px">
      	<img src="/forum/templates/images/icons/misc/star-icon.png" title="Chủ diễn đàn" />&nbsp;&nbsp;&nbsp;<a title="Chủ diễn đàn" class="text-color" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={url_encode($dien_dan.ma_nguoi_tao)}">{get_ho_ten($dien_dan.ma_nguoi_tao)}</a>
      </td>
      	{foreach $quan_tri_vien as $qt}
        <td>
        	<img src="/forum/upload/rankCF/{lay_icon_diem($qt.ma_nguoi_dung, $ma_dien_dan)}" style="height:18px" />&nbsp;&nbsp;&nbsp;<a class="text-color" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={url_encode($qt.ma_nguoi_dung)}" title="Quản trị viên">{$qt.ho_ten}</a>
        </td>
        {/foreach}
       </tr>
       </table> 
      </p>
    </div>
    <!--  change the attribute "none" to "block" to display the forum permission --> 
    
  </main>
</div>
