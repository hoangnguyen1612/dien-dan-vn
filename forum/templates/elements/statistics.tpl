<script>
$(document).ready(function(){
	 $(function() {
    $( "#tabs1" ).tabs();
  });

$.ajaxSetup({ cache:false });
setInterval(function(){ $("#chatlogs").load("/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/trang_chu/logs") },2000);

	
  $("#vietvbb_topstats_s").change(function(){
	  if($("#vietvbb_topstats_s").val()=="bai_viet_nhieu_nhat"){
    $.get("/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/bai_viet_nhieu_nhat",function(data,status){
	
		var arr = data.split("~");
		var thanh_vien = arr[0].split(",");
		var so_luong = arr[1].split(","); 
		var ma_thanh_vien = arr[3].split(",");
		var cap_bac = arr[4].split(",");
		var i;
		$("#vietvbb_topstats_s_content").html("");
		for(i=0; i<=arr[2]-1 ; i++){	
	
			$("#vietvbb_topstats_s_content").append('<div class="topx-bit" style="margin-bottom:2px"><em title="Total Thanks"> '+so_luong[i]+' </em> <span class="topx-content-menu"><img src="/forum/upload/rankCF/'+cap_bac[i]+'" style="width:20px;height:20px ;margin-right:3px"/><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien='+ma_thanh_vien[i]+'" title=""><font color="#2dba97">'+thanh_vien[i]+'</font></a> </span></div>');		
		}
     });
	  }
	   if($("#vietvbb_topstats_s").val()=="top_diem"){
    $.get("/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/top_diem",function(data,status){
		var arr = data.split("~");
		var thanh_vien = arr[0].split(",");
		var diem_so = arr[1].split(","); 
		var icon = arr[2].split(",");
		var ma_thanh_vien = arr[4].split(",");
		var i;
		$("#vietvbb_topstats_s_content").html("");
		for(i=0; i<=arr[3]-1 ; i++){	
			$("#vietvbb_topstats_s_content").append('<div class="topx-bit" style="margin-bottom:2px"><em title="Total Thanks"> '+ diem_so[i] +' </em> <span class="topx-content-menu"> <img src="/forum/upload/rankCF/'+icon[i]+'" style="width:20px;height:20px ;margin-right:3px"/><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien='+ma_thanh_vien[i]+'" title=""><font color="#2dba97">'+ thanh_vien[i]+'</font></a> </span></div>');		
		}
     });
	  }
  });
});
function submitChat(){
	if(form1.msg.value == ''){
		alert('Vui lòng nhập nội dung để chat');
		return;
	}
	var msg = form1.msg.value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById('chatlogs').innerHTML= xmlhttp.responseText;
		}
	}
	xmlhttp.open('GET',"/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/trang_chu/insert?msg="+ msg,true);
	xmlhttp.send();
	$("#chat-text").val("");
}
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
                    <div class="topx-bit" style="margin-bottom:2px"><em title="Total Thanks"> {$thanh_vien.diem_so} </em> <span class="topx-content-menu"> <img src="/forum/upload/rankCF/{lay_icon_diem($thanh_vien.ma_nguoi_dung,$thanh_vien.ma_dien_dan)}" style="width:20px;height:20px ;margin-right:3px"/><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={$thanh_vien.ma_nguoi_dung}" title=""><font size="-1" color="#2dba97">{$thanh_vien.ten_nguoi_dung}</font></a> </span>
                    
                     </div>
                    {/foreach}
                  </div>
                </div>
              </div>
            </div></td>
          <td colspan="2" class="footable-last-column"><div class="right-mainbox" >
              <div class="mainbox" id="tabs1">
                <ul class="tabs" id="vietvbb_topstats_t">
           <li class="current"><span style="padding: 0px 8px;"><a href="#tabs-1">Bài mới</a></span></li>
  			 <li><span style="padding: 0px 8px;"><a href="#tabs-2">Chat box</a></span></li>           
                </ul>
                <div id="tabs-1">
              		{if $ds_bai_viet_moi_nhat == NULL}
                    <div class="topx-bit" style="margin-bottom:2px" >Chưa có bài viết nào trong diễn đàn</div>
                    {/if}
         			{foreach $ds_bai_viet_moi_nhat as $bai_viet_moi_nhat}
                  <div class="topx-bit" style="margin-bottom:2px"> <em> <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={$bai_viet_moi_nhat.ma_nguoi_dang}" title=""> <font size="-2" color="#2dba97">{$bai_viet_moi_nhat.ten_nguoi_dang}</font> </a> </em> <span class="topx-content-tab"> <img src="/forum/templates/images/icons/post_new.gif" border="0" alt=""> &nbsp; <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/chi_tiet?ma={$bai_viet_moi_nhat.ma}">{$bai_viet_moi_nhat.tieu_de}</a> </span>   
                  </div>
                    {/foreach}
                    
                </div>
                <div id="tabs-2">
                <form name="form1">
              

                	<table class="footable table table-striped table-bordered table-white table-primary table-hover default footable-loaded">
                    <thead>
                    	<tr>
                    		<th class="footable-first-column" data-hide="phone" style="color:black;border-radius:0px"><i class="icon-comments-alt" style="color:black"></i>
                            	CHAT BOX
                        	</th>
                            <th data-hide="phone" style="color:black;border-radius:0px;width:250px"><i class="icon-user" style="color:black"></i>
                            	Danh sách trực tuyến
                        	</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
               		<td class="expand footable-first-column"><div id="chatlogs" class="chatlogs" >Đang tải đoạn chat , vui lòng chờ ....</div></td> 
                    <td class="expand footable-first-column">
                    	{if isset($ds_online)}
                    	{foreach $ds_online as $online}
                    	<div style="overflow:auto">
                        	<i class="icon-smile" style="color:#3c763d"></i>
                        	{$online.ho_nguoi_dung} {$online.ten_nguoi_dung}
                        </div>
                        {/foreach}
                        {/if}
                    </td>     
                    
                 
                    </tr>
                    
                    </tbody>
               		</table>
                    <input type="text" name="msg"  style="margin-left:5px; width:42%" placeholder="Nhập nội dung hội thoại trong diễn đàn..." onKeyDown="if(event.keyCode==13) submitChat();" id="chat-text" />
                    <a href="#tabs-2" onclick="submitChat()" class="btn" style="margin-top:-11px;margin-left:2px">Gửi</a>                
                </form>
                </div>
               
              </div>
            </div></td>
        </tr>
      </tbody>
    </table>