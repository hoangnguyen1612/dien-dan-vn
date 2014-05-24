<div id="thong_bao_moi" class="form" style="width: 50%; z-index: 9999 !important; border:none; padding:2px;">
  <div style="border-bottom: solid 1px rgba(100, 100, 100, .22);-webkit-background-clip: padding-box; position: relative;height: 33px;
background-color: #F6F6F6; -webkit-border-top-left-radius: 3px;-webkit-border-top-right-radius: 3px; font-weight: 600; font-size: 16px; color:white; line-height: 31px;">
	&nbsp;&nbsp;<a class="topictitle no-bold">Thông báo</a>
</div>
{if $thong_bao_moi==0}
<div style="color: #999;font-size: 13px;margin: auto;text-align: center; padding: 16px">
	Không có thông báo mới nào
</div>
{else if}
<div style="font-size: 13px;margin: 16px auto; padding: 15px;">
<table width="100%" id="noti-content">	
    {foreach $ds_thong_bao as $thong_bao}
    	<tr class="bg">
        	<td style="width: 5%"><i class="icon-plus-sign" style="color: #169FE6"></i></td>
            <td style="width: 95%">
            	<a href="
                	{if $thong_bao.ma_loai_thong_bao == 0}/{$dien_dan.ma}/thanh_vien/yeu_cau_tham_gia?ma_thong_bao={$thong_bao.ma}{/if}
                ">{$thong_bao.noi_dung}</a></td>
        </tr>
    {/foreach}
</table>

</div>{/if}
<div style="padding: 9px 8px 7px 8px; background-color:#F6F6F6">
	<a class="topictitle no-bold" >Xem Tất Cả</a> | <a class="topictitle no-bold" >Đánh dấu là đã đọc</a> | <a href="#" class="modal_close topictitle no-bold" >Đóng</a>
</div>
<!--
  <div id="content">
     <div class="notification">
     	
     </div>
  </div>
 -->
</div>