<?php /* Smarty version Smarty-3.1.14, created on 2014-07-23 01:08:06
         compiled from "D:\wamp\www\dien-dan-vn\forum\templates\elements\statistics.tpl" */ ?>
<?php /*%%SmartyHeaderCode:956553cea8868f5fd6-05326865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4bb5ebb2bbd33b2ebcb6aaac88bb850b63dec936' => 
    array (
      0 => 'D:\\wamp\\www\\dien-dan-vn\\forum\\templates\\elements\\statistics.tpl',
      1 => 1406052481,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '956553cea8868f5fd6-05326865',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dien_dan' => 0,
    'ds_top_diem_thanh_vien' => 0,
    'thanh_vien' => 0,
    'ds_bai_viet_moi_nhat' => 0,
    'bai_viet_moi_nhat' => 0,
    'ds_online' => 0,
    'online' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53cea886a01589_20632942',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53cea886a01589_20632942')) {function content_53cea886a01589_20632942($_smarty_tpl) {?>
<script>
$(document).ready(function(){
	 $(function() {
    $( "#tabs1" ).tabs();
  });

$.ajaxSetup({ cache:false });
setInterval(function(){ $("#chatlogs").load("/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/trang_chu/logs") },2000);

	
  $("#vietvbb_topstats_s").change(function(){
	 
	  
	  if($("#vietvbb_topstats_s").val()=="bai_viet_nhieu_nhat"){
    $.get("/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thanh_vien/bai_viet_nhieu_nhat",function(data,status){
	
		var arr = data.split("~");
		var thanh_vien = arr[0].split(",");
		var so_luong = arr[1].split(","); 
		var ma_thanh_vien = arr[3].split(",");
		
		var cap_bac = arr[4].split(",");
		var i;
		$("#vietvbb_topstats_s_content").html("");
		for(i=0; i<=arr[2]-1 ; i++){	
	$("#vietvbb_topstats_s_content").append('<div class="topx-bit" style="margin-bottom:2px"><em title="Số lượng bài viết"> '+so_luong[i]+' </em> <span class="topx-content-menu"><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/cap_bac/danh_sach_cap_bac"><img src="/forum/upload/rankCF/'+cap_bac[i]+'" style="width:20px;height:20px ;margin-right:3px"/></a><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thanh_vien/thong_tin?ma_thanh_vien='+ma_thanh_vien[i]+'" title=""><font size="-1" color="#2dba97">'+thanh_vien[i]+'</font></a> </span></div>');		
		}
     });
	  }
	   if($("#vietvbb_topstats_s").val()=="top_diem"){
    $.get("/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thanh_vien/top_diem",function(data,status){
		var arr = data.split("~");
		var thanh_vien = arr[0].split(",");
		var diem_so = arr[1].split(","); 
		var icon = arr[2].split(",");
		var ma_thanh_vien = arr[4].split(",");
		var i;
		$("#vietvbb_topstats_s_content").html("");
		for(i=0; i<=arr[3]-1 ; i++){	
			$("#vietvbb_topstats_s_content").append('<div class="topx-bit" style="margin-bottom:2px"><em title="Top điểm số"> '+ diem_so[i] +' </em> <span class="topx-content-menu"><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/cap_bac/danh_sach_cap_bac"> <img src="/forum/upload/rankCF/'+icon[i]+'" style="width:20px;height:20px ;margin-right:3px"/></a><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thanh_vien/thong_tin?ma_thanh_vien='+ma_thanh_vien[i]+'" title=""><font size="-1"  color="#2dba97">'+ thanh_vien[i]+'</font></a> </span></div>');		
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
	var mausac = form1.mausac.value; 
	var params = "msg="+ msg + "&mausac="+mausac;
	var url = "/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/trang_chu/insert";
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById('chatlogs').innerHTML= xmlhttp.responseText;
			var objDiv = document.getElementById("chatlogs");
			objDiv.scrollTop = objDiv.scrollHeight;
		}
	}
	xmlhttp.open('POST',url,true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.send(params);
	$("#chat-text").val("");
}
</script>

<table class="footable table table-striped table-bordered table-white table-primary table-hover default footable-loaded">
      <thead>
        <tr>
          <th class="large20" data-hide="phone"><i class="icon-bar-chart"></i> Thành Viên Tích Cực </th>
          <th class="large100" data-hide="phone"><i class="icon-bar-chart"></i> Thống kê bài viết </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="expand footable-first-column" ><div class="left-mainbox">
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
                  <?php  $_smarty_tpl->tpl_vars['thanh_vien'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['thanh_vien']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ds_top_diem_thanh_vien']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['thanh_vien']->key => $_smarty_tpl->tpl_vars['thanh_vien']->value){
$_smarty_tpl->tpl_vars['thanh_vien']->_loop = true;
?>
                 <div class="topx-bit" style="margin-bottom:2px"><em title="Top điểm số"> <?php echo $_smarty_tpl->tpl_vars['thanh_vien']->value['diem_so'];?>
 </em> <span class="topx-content-menu"><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/cap_bac/danh_sach_cap_bac"> <img src="/forum/upload/rankCF/<?php echo lay_icon_diem($_smarty_tpl->tpl_vars['thanh_vien']->value['ma_nguoi_dung'],$_smarty_tpl->tpl_vars['thanh_vien']->value['ma_dien_dan']);?>
" style="width:20px;height:20px ;margin-right:3px"/></a><a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thanh_vien/thong_tin?ma_thanh_vien=<?php echo url_encode($_smarty_tpl->tpl_vars['thanh_vien']->value['ma_nguoi_dung']);?>
" title=""><font size="-1" color="#2dba97"><?php echo $_smarty_tpl->tpl_vars['thanh_vien']->value['ten_nguoi_dung'];?>
</font></a> </span>
                    
                     </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div></td>
          <td colspan="2" class="footable-last-column"><div class="right-mainbox" >
              <div class="mainbox" id="tabs1">
                <ul class="tabs" id="vietvbb_topstats_t">
           <li class="current"><span style="padding: 0px 8px;"><a href="#tabs-1">Bài mới</a></span></li>
  			 <li><span style="padding: 0px 8px;"><a href="#tabs-2">Trò chuyện</a></span></li>           
                </ul>
                <div id="tabs-1">
              		<?php if ($_smarty_tpl->tpl_vars['ds_bai_viet_moi_nhat']->value==null){?>
                    <div class="topx-bit" style="margin-bottom:2px" >Chưa có bài viết nào trong diễn đàn</div>
                    <?php }?>
         			<?php  $_smarty_tpl->tpl_vars['bai_viet_moi_nhat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ds_bai_viet_moi_nhat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->key => $_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->value){
$_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->_loop = true;
?>
                  <div class="topx-bit" style="margin-bottom:2px"> <em> <a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/thanh_vien/thong_tin?ma_thanh_vien=<?php echo url_encode($_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->value['ma_nguoi_dang']);?>
" title=""> <font size="-2" color="#2dba97"><?php echo $_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->value['ten_nguoi_dang'];?>
</font> </a> </em> <span class="topx-content-tab"> <img src="/forum/templates/images/icons/post_new.gif" border="0" alt=""> &nbsp; <a href="/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['ma_linh_vuc'];?>
/<?php echo $_smarty_tpl->tpl_vars['dien_dan']->value['domain'];?>
/bai_viet/chi_tiet?ma=<?php echo $_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->value['ma'];?>
"><?php echo $_smarty_tpl->tpl_vars['bai_viet_moi_nhat']->value['tieu_de'];?>
</a> </span>   
                  </div>
                    <?php } ?>
                    
                </div>
                <div id="tabs-2">
                <form name="form1">
              

                	<table class="footable table table-striped table-bordered table-white table-primary table-hover default footable-loaded">
                    <thead>
                    	<tr>
                    		<th class="footable-first-column" data-hide="phone" style="color:black;border-radius:0px"><i class="icon-comments-alt" style="color:black"></i>
                            	Trò chuyện
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
                    	<?php if (isset($_smarty_tpl->tpl_vars['ds_online']->value)){?>
                    	<?php  $_smarty_tpl->tpl_vars['online'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['online']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ds_online']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['online']->key => $_smarty_tpl->tpl_vars['online']->value){
$_smarty_tpl->tpl_vars['online']->_loop = true;
?>
                    	<div style="overflow:auto">
                        	<i class="icon-smile" style="color:#3c763d"></i>
                        	<?php echo $_smarty_tpl->tpl_vars['online']->value['ho_nguoi_dung'];?>
 <?php echo $_smarty_tpl->tpl_vars['online']->value['ten_nguoi_dung'];?>

                        </div>
                        <?php } ?>
                        <?php }?>
                    </td>     
                    
                 
                    </tr>
                    
                    </tbody>
               		</table>
                    <input type="text" name="msg"  style="margin-left:5px; width:42%" placeholder="Nhập nội dung hội thoại trong diễn đàn..."  id="chat-text" />
                    <a onclick="submitChat()" id="gui" class="btn" style="margin-top:-11px;margin-left:2px;cursor:pointer">Gửi</a>                
                    <input type="color" name="mausac" style="margin-top:-11px;margin-left:2px;width:30px" title="Màu sắc của tên khi chat"  value="#0080FF"/>
     
                    </form>
                    <script>
						$("#chat-text").keyup(function(event){
						if(event.keyCode == 13){
							$("#gui").click();
						}
						});
					</script>
                </div>
               
              </div>
            </div></td>
        </tr>
      </tbody>
    </table><?php }} ?>