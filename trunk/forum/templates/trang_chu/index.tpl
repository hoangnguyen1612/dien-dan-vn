<div id="page-body">
  <main role="main"> {include "../elements/statistics.tpl"}
    
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
        <th data-class="expand" class="footable-first-column"><i class="icon-list-ol"></i> <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/danh_sach?loai={$chuyen_muc.ma}" data-original-title="" title="" style="text-transform: capitalize"> {$chuyen_muc.ten} </a></th>
        <th class="large80" data-hide="phone"><i class="icon-bar-chart"></i> Thống kê</th>
        <th class="large20 footable-last-column" data-hide="phone"><i class="icon-comments-alt"></i> Bài mới</th>
      </tr>
      </thead>
      
      <tbody>
      
      {$children = getChildrenFirstForum($chuyen_muc.ma, $ds_chuyen_muc)}
      {if $children == NULL}
      <tr>
        <td class="expand footable-first-column">Chuyên mục chưa có chuyên mục con</td>
      </tr>
      {/if}
      {if $children!=NULL}
      	{if $children == NULL}
        <tr> <td class="expand footable-first-column">Chuyên mục chưa có chuyên mục con</td> </tr>
        </tbody>
        </table>
        {/if}
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
        <td class="expand footable-first-column"><span class="footable-toggle"></span> <i class="row-icon" style="background-image: url(/forum/templates/styles/BBOOTS/imageset/forum_read.gif); background-repeat: no-repeat;" ></i>  <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/danh_sach?loai={$key}" class="forumtitle" data-original-title="" title="" style="text-transform:capitalize">{$value.ten}</a><br>
          <small>{$value.ghi_chu|default:''}</small><br />
          {$child = getChildrenFirstForum($key, $ds_chuyen_muc)}
          {if $child!=NULL}
          &nbsp;&nbsp;Phụ mục : 
          {foreach $child as $k1=>$v1} <i class="icon-comment"> <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/danh_sach?loai={$k1}">{$v1.ten}</a>&nbsp;&nbsp;
          {/foreach}
          
          {/if} </td>
        <td class="center"><!--{$chuyen_muc.so_luong_bai_viet}Chủ đề <br>--> 
          {dem_bai_viet($ma_dien_dan, $key)} bài viết </td>
        {$bai_viet_moi = bai_viet_moi($ma_dien_dan, $key)}
        <td class="center footable-last-column"> {if $bai_viet_moi!=0} 
        <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/chi_tiet?ma={$bai_viet_moi.ma}" title="{$bai_viet_moi.tieu_de}" class="text-color">{$bai_viet_moi.tieu_de|truncate:30}</a><br />
        <i class="icon-user"></i> bởi <a class="text-color" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={url_encode($bai_viet_moi.ma_nguoi_dang)}" data-original-title="" title="">{get_ho_ten($bai_viet_moi.ma_nguoi_dang)}</a> <a rel="tooltip" data-placement="right" data-original-title="Đi đến {get_ho_ten($bai_viet_moi.ma_nguoi_dang)}" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={url_encode($bai_viet_moi.ma_nguoi_dang)}"> <i class="mobile-post icon-signout"></i></a> <br>
          <i class="icon-time"></i> <small>{date('H:i d-m-Y',strtotime($bai_viet_moi.ngay_tao))}</small> {else if} 
          0 bài viết
          {/if} </td>
      </tr>
      {/foreach}
      
      {if $kt==0}
      <tr>
        <td>Chưa có chuyên mục nào để hiển thị</td>
      </tr>
      {/if}
      </tbody>
      
    </table>
    {/if}
    {/if}
    {/if}
    {/foreach}{/if}
    <div class="row-fluid"> </div>
  </main>
</div>
