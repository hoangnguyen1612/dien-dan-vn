<script>
$(document).ready(function(){
  $("#vietvbb_topstats_s").change(function(){
	  if($("#vietvbb_topstats_s").val()=="bai_viet_nhieu_nhat"){
    $.get("/{$ma_dien_dan}/thanh_vien/bai_viet_nhieu_nhat",function(data,status){
		var arr = data.split("~");
		var thanh_vien = arr[0].split(",");
		var so_luong = arr[1].split(","); 
		var ma_thanh_vien = arr[3].split(",");
		var cap_bac = arr[4].split(",");
		var i;
		$("#vietvbb_topstats_s_content").html("");
		for(i=0; i<=arr[2]-1 ; i++){	
	
			$("#vietvbb_topstats_s_content").append('<div class="topx-bit" style="margin-bottom:2px"><em title="Total Thanks"> '+so_luong[i]+' </em> <span class="topx-content-menu"><img src="/forum/upload/rankCF/'+cap_bac[i]+'" style="width:20px;height:20px ;margin-right:3px"/><a href="/{$ma_dien_dan}/thanh_vien/thong_tin?ma_thanh_vien='+ma_thanh_vien[i]+'" title=""><font color="#2dba97">'+thanh_vien[i]+'</font></a> </span></div>');		
		}
     });
	  }
	   if($("#vietvbb_topstats_s").val()=="top_diem"){
    $.get("/{$ma_dien_dan}/thanh_vien/top_diem",function(data,status){
		var arr = data.split("~");
		var thanh_vien = arr[0].split(",");
		var diem_so = arr[1].split(","); 
		var icon = arr[2].split(",");
		var ma_thanh_vien = arr[4].split(",");
		var i;
		$("#vietvbb_topstats_s_content").html("");
		for(i=0; i<=arr[3]-1 ; i++){	
			$("#vietvbb_topstats_s_content").append('<div class="topx-bit" style="margin-bottom:2px"><em title="Total Thanks"> '+ diem_so[i] +' </em> <span class="topx-content-menu"> <img src="/forum/upload/rankCF/'+icon[i]+'" style="width:20px;height:20px ;margin-right:3px"/><a href="/{$ma_dien_dan}/thanh_vien/thong_tin?ma_thanh_vien='+ma_thanh_vien[i]+'" title=""><font color="#2dba97">'+ thanh_vien[i]+'</font></a> </span></div>');		
		}
     });
	  }
  });
});

</script>
<table class="footable table table-striped table-bordered table-white table-primary table-hover default footable-loaded">
      <thead>
        <tr>
          <th class="large20" data-hide="phone"><i class="icon-bar-chart"></i>Thành viên tích cực </th>
          <th class="large100" data-hide="phone"><i class="icon-bar-chart"></i>Thống kê bài viết </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td title="No unread posts" class="expand footable-first-column" ><div class="left-mainbox">
              <div class="mainbox">
                <ul class="tabs">
                  <li class="current" style="list-style:none"> <span style="padding: 0px 5px;">
                    <select id="vietvbb_topstats_s">
                      <option selected="selected" value="top_diem">TOP điểm số của diễn đàn</option>
                      <option value="bai_viet_nhieu_nhat">Gửi bài nhiều nhất</option>
                    </select>
                    </span> </li>
                  <li style="border-right-width: 0px; display: none;" id="vietvbb_topstats_s_loading"><img src="images/misc/13x13progress.gif" border="0" align="middle" alt=""></li>
                </ul>
                <div style="display:block;background: url(vietvbb/topx/list.gif) no-repeat top left; border-top: 0px none; padding: 0px;">
                  <div class="topx-content" id="vietvbb_topstats_s_content">
                  {foreach $ds_top_diem_thanh_vien as $thanh_vien}
                    <div class="topx-bit" style="margin-bottom:2px"><em title="Total Thanks"> {$thanh_vien.diem_so} </em> <span class="topx-content-menu"> <img src="/forum/upload/rankCF/{lay_icon_diem($thanh_vien.ma_nguoi_dung,$thanh_vien.ma_dien_dan)}" style="width:20px;height:20px ;margin-right:3px"/><a href="/{$ma_dien_dan}/thanh_vien/thong_tin?ma_thanh_vien={$thanh_vien.ma_nguoi_dung}" title=""><font color="#2dba97">{$thanh_vien.ten_nguoi_dung}</font></a> </span>
                    
                     </div>
                    {/foreach}
                  </div>
                </div>
              </div>
            </div></td>
          <td colspan="2" class="footable-last-column"><div class="right-mainbox">
              <div class="mainbox">
                <ul class="tabs" id="vietvbb_topstats_t">
                  <li id="latest_posts" class="current"><span style="padding: 0px 8px;">Bài mới</span></li>
                  <li style="border-right: 0px; display: none;" id="vietvbb_topstats_t_loading"><img src="images/misc/13x13progress.gif" border="0" align="middle" alt=""></li>
                </ul>
                <div class="topx-content" id="vietvbb_topstats_t_content">
              
         			{foreach $ds_bai_viet_moi_nhat as $bai_viet_moi_nhat}
                  <div class="topx-bit" style="margin-bottom:2px"> <em> <a href="/{$ma_dien_dan}/thanh_vien/thong_tin?ma_thanh_vien={$bai_viet_moi_nhat.ma_nguoi_dang}" title=""> <font color="#2dba97">{$bai_viet_moi_nhat.ten_nguoi_dang}</font> </a> </em> <span class="topx-content-tab"> <img src="/forum/templates/images/icons/post_new.gif" border="0" alt=""> &nbsp; <a href="/{$ma_dien_dan}/bai_viet/chi_tiet?ma={$bai_viet_moi_nhat.ma}">{$bai_viet_moi_nhat.tieu_de}</a> </span>   
                  </div>
                    {/foreach}
                      
                
            
                </div>
              </div>
            </div></td>
        </tr>
      </tbody>
    </table>