<script>
	function checkValidation(){
		var tieu_de_con = document.getElementById('tieu_de_con').value;
		var noi_dung_con = document.getElementById('noi_dung_con').value;
		if(tieu_de_con == ''){
			alert('Vui lòng nhập tiêu đề cho bình luận con');
			return false;
		}
		
		return true;
	}
	function checkValidation_1(){

		var tieu_de = document.getElementById('tieu_de').value;
		var noi_dung = document.getElementById('noi_dung').value;
		if(tieu_de == ''){
			alert('Vui lòng nhập tiêu đề cho bài viết');
			return false;
		}
		if(noi_dung == ''){
			alert('Vui lòng nhập nội dung cho bài viết ');
			return false;
		}
		return true;
	}
	function gui()
	{
		var data = $('#binh_luan_nhanh').serialize();
		
		$.ajax({
			type: "POST",
			url: "/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/binh_luan/test",
			data: data,
			beforeSend: function() {
				alert(222);
		}
		}).done(function(html){
			var data = JSON.parse(html);
			alert(data.message);
			$("#current-div").load("/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/binh_luan/du_lieu");
		});
		return false;
	}

$(document).ready(function(){
  $(".like").click(function(){
    $.get("/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/feedback",{ ma_bai_viet : "{$bai_viet.ma}" },function(data,status){
	  var arr = data.split("~");		
	  if($.trim(arr[0]) == 'dislike'){
		  	$(".so_luong_thich_bai_viet").html(arr[1]);
		    $(".thich-bai-viet").css('color','black');
	  }
	  if($.trim(arr[0]) == 'like'){
		  	$(".so_luong_thich_bai_viet").html(arr[1]);
		 	$(".thich-bai-viet").css('color','crimson');		  
	  }
	 
    });
  });
});
</script>

<div id="page-body">
  <main role="main">
    <div class="side-segment">
      <h3><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/danh_sach?loai={$bai_viet.ma_loai_chuyen_muc}" data-original-title="" title="">{ten_chuyen_muc($bai_viet.ma_loai_chuyen_muc,$ma_dien_dan)}</a></h3>
    </div>
    <div class="row-fluid">
      <div class="pull-right">
        <div class="pagination pagination-small hidden-phone">
          <ul>
            <li><a data-original-title="" title="">Trang <strong>{$trang_hien_tai}</strong> trên <strong>{$tong_so_trang}</strong></a></li>
            <li>{$bo_nut}</li>
          </ul>
        </div>
        <div class="visible-phone">
          <div class="pagination pagination-small">
            <ul>
              <li class="active"><a data-original-title="" title="">2 bài viết</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="pull-left">
        <form method="get" id="topic-search" action="./search.php" class="hidden-phone">
          <fieldset>
            <div class="input-append input-icon left"> <i class="icon-search"></i>
              <input type="text" class="span10" size="9" name="keywords" id="search_keywords" placeholder="Tìm kiếm bài viết">
              <button type="submit" class="btn">Tìm kiếm</button>
            </div>
             {if $thanh_vien!='' && $thanh_vien.loai_thanh_vien!=3 && $thanh_vien.trang_thai!=0}
      		<a style="margin-left: 50px; margin-top: -10px;" href="../binh_luan/them?ma_bai_viet={$bai_viet.ma}" data-original-title="Bình luận bài viết" type="button" class="btn"><i class="icon-share-alt"></i>Bình luận</a>
      		{/if}
            <input type="hidden" name="t" value="15">
            <input type="hidden" name="sf" value="msgonly">
          </fieldset>
        </form>
      </div>
    </div>
    {if $trang_hien_tai == 1}
    <div id="p25" class="row-fluid ">
      <article role="article" >
        <div class="well well-small " style="background-color: white;border: 5px solid #e3e3e3;">
          <div class="span3 hidden-phone" id="profile25">
            <div class="user-profile-tab">
              <div class="user-profile-avatar">
                <div class="avatar-frame"> <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={$bai_viet.ma_nguoi_dang}" data-original-title="" title=""><img src="/home/upload/nguoi_dung/{if $bai_viet.thumbnail!=NULL}{$bai_viet.thumbnail}{else if $bai_viet.gioi_tinh==0}no_avatar_male.jpg{else if}no_avatar_female.jpg{/if}" width="100" height="100" alt="User avatar"></a> </div>
              </div>
              <div class="user-profile-row">
                <div class="user-profile-tag">Tên</div>
                <div class="user-profile-output"> <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/thong_tin?ma_thanh_vien={$bai_viet.ma_nguoi_dang}" style="color: #AA0000;" class="username-coloured" data-original-title="" title="">{$bai_viet.ten_nguoi_dang}</a> </div>
              </div>
              <div class="user-profile-row">
                <div class="user-profile-tag">Quyền</div>
                <div class="user-profile-output"> {$quyen[$bai_viet.ma_loai_thanh_vien]} </div>
              </div>
              <div class="user-profile-row">
                <div class="user-profile-tag">Bài viết</div>
                <div class="user-profile-output"> {dem_bai_viet_thanh_vien($ma_dien_dan, $bai_viet.ma_nguoi_dang)} </div>
              </div>
              <div class="user-profile-row">
                <div class="user-profile-tag">Tham gia</div>
                <div class="user-profile-output"> {date('d-m-Y', strtotime($bai_viet.ngay_gia_nhap))} </div>
              </div>
              <div class="user-profile-row">
                <div class="user-profile-tag">Điểm số</div>
                <div class="user-profile-output"> {$bai_viet.diem_so} </div>
              </div>
              <div class="user-profile-row">
                <div class="user-profile-tag">Cấp bậc</div>
                <div class="user-profile-output"> <img src="/forum/upload/rankCF/{lay_icon_diem($bai_viet.ma_nguoi_dang,$ma_dien_dan)}" style="height:18px" /> </div>
              </div>
            </div>
          </div>   
          {if $bai_viet.trang_thai == 1}
          <div class="postbody span9">
            <div class="row-fluid">
              <ul class="inline pull-right visible-phone">
                <li><a class="btn btn-small" href="./report.php?f=2&amp;p=25" title="" data-original-title="Report this post"><i class="icon-exclamation-sign"></i></a></li>
              </ul>
              <div class="pull-left">
                <h3><a href="#p25" data-original-title="" title="">{$bai_viet.tieu_de}</a></h3>
              </div>
            </div>
            <div class="row-fluid">
              <div class="pull-left timepost"> <a href="./viewtopic.php?p=25#p25" title="" data-original-title="Post"></a> bởi &nbsp;<strong><a href="../thong_tin_ca_nhan/index.php" style="color: #AA0000;" class="username-coloured" data-original-title="" title="">{$bai_viet.ten_nguoi_dang}</a></strong>&nbsp; <i class="icon-time"></i> {date('h:i d-m-Y',strtotime($bai_viet.ngay_tao))} </div>
            </div>
            <div class="space10"></div>
            <div class="content" style="text-align:justify;min-height: 150px;">{$bai_viet.noi_dung}
            {if $bai_viet.file != NULL}
            <div style="min-height:30px">
            	<span>File đính kèm :</span>
            	<a href="download?filename={$bai_viet.file}" style="color:crimson">{$bai_viet.file}</a>  	
            </div>
            
            
            {/if}
            </div>
            <ul class="inline pull-right hidden-phone">
            {if $login != '' && $thanh_vien != '' && $thanh_vien.loai_thanh_vien != 3}
           <li> <span class="so_luong_thich_bai_viet">{$bai_viet.thich}</span> <a class="like btn btn-mini" title="Thích"><i class="icon-thumbs-up-alt thich-bai-viet"   {if $thich_bai_viet == NULL} style="color:black;font-size:1.2em;cursor:pointer"{else} style="color:crimson;font-size:1.2em;cursor:pointer"{/if}></i></a></li>
           	
              <li><a class="btn btn-mini" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bao_cao/them?ma={$bai_viet.ma}&loai=0" title="Báo cáo sai phạm" data-original-title="Báo cáo sai phạm" {if trang_thai_bao_cao_bai_viet($bai_viet.ma,$ma_nguoi_dung,$ma_dien_dan)!= NULL} onclick="return false" {/if} ><i class="icon-exclamation-sign" {if trang_thai_bao_cao_bai_viet($bai_viet.ma,$ma_nguoi_dung,$ma_dien_dan)== NULL} style="color:black" {else} style="color:crimson" {/if}></i></a></li>
              {if $ma_nguoi_dung == $bai_viet.ma_nguoi_dang}<li><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/bai_viet/cap_nhat?ma={$bai_viet.ma}" class="btn btn-mini" title="Chỉnh sửa bài viết"><i class="icon-pencil" style="color:black;font-size:1.2em;cursor:pointer"></i></a></li>{/if}
              {else}
              	<li><span class="so_luong_thich_bai_viet">{$bai_viet.thich}</span> <a class="btn btn-mini" data-original-title="Lượt thích" onclick="return false" title="Thích"><i class="icon-thumbs-up-alt" style="color:black;font-size:1.2em"></i></a></li>
              {/if}
            </ul>
          </div>
          {else}
          <div class="postbody span9">
            <div class="row-fluid">
              <ul class="inline pull-right visible-phone">
                <li><a class="btn btn-small" href="./report.php?f=2&amp;p=25" title="" data-original-title="Report this post"><i class="icon-exclamation-sign"></i></a></li>
              </ul>
              <div class="pull-left">
                <h3><a href="#p25" data-original-title="" title="">{$bai_viet.tieu_de}</a></h3>
              </div>
            </div>
            <div class="row-fluid">
          
            </div>
            <div class="space10"></div>
            <div class="content" style="text-align:justify;min-height: 150px; color:red">Bài viết đã bị khóa </div>
          </div>    
          {/if}
          <div class="space10"></div>
        </div>
      </article>
    </div>

    {/if}
    <div id="reload"> {include '../elements/binh_luan.tpl'} </div>
    <form method="post"  action="../binh_luan/them_sm" name="gui_binh_luan" id="binh_luan_nhanh" onsubmit="return checkValidation_1()">

	
   

    {if $thanh_vien!='' && $thanh_vien.loai_thanh_vien!=3 && $thanh_vien.trang_thai!=0}
    	<form method="post"  action="../binh_luan/them_sm" name="gui_binh_luan" id="binh_luan_nhanh" onsubmit="return checkValidation_1()">

      <div class="well well-qr widget-collapsible"><!-- // Widget -->
        <div class="widget-header clickable collapsed" data-toggle="collapse" data-target="#target-col">
          <h4><i class="icon-edit"></i> Bình luận nhanh</h4>
          <a class="icon-arrow-down" href="javascript:void(0);" data-original-title="Hiện/Ẩn" title="" id="target-shown" style="float:right"></a> </div>
        <div id="target-col" class="widget-content collapse" style="height: 0px;">
          <div class="widget-content">
            <div class="space10"></div>
            <label class="control-label" for="subject">Tiêu đề:</label>
            <div class="controls">
              <input class="span11" type="text" name="data[tieu_de]" id="tieu_de" value="Re: {$bai_viet.tieu_de}">
            </div>
            <label class="control-label" for="Message">Nội dung:</label>
            <div class="controls">
              <textarea class="span11" name="data[noi_dung]" id="noi_dung" rows="3" placeholder="Viết nội dung..."></textarea>
            </div>
          </div>
          <div class="widget-footer">
            <div class="btn-toolbar padding-side">
              <input type="hidden" name="data[ma_bai_viet]" value="{$bai_viet.ma}">
              <input type="hidden" name="data[ma_loai_cha]" value="0">
              <button type="submit" class="btn start" id="load" name="post" autocomplete="off" data-loading-text="Chờ xử lý...<i class='icon-spin icon-spinner icon-large icon-white'></i>">Đăng</button>
              <button type="button" class="btn start" id="load" name="full_editor" autocomplete="off" data-loading-text="Chờ xử lý...<i class='icon-spin icon-spinner icon-large icon-white'></i>" onclick="window.location.href='../binh_luan/them?ma_bai_viet={$bai_viet.ma}'">Bình luận đầy đủ</button>
            </div>
          </div>
        </div>
      </div>
      <!-- // Widget -->
    </form>
    {/if}
    <div class="row-fluid">
    {if $thanh_vien!='' && $thanh_vien.loai_thanh_vien!=3 && $thanh_vien.trang_thai!=0}
      <div class="pull-left">
        <div class="da-panel-content"> <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/binh_luan/them?ma_bai_viet={$bai_viet.ma}" data-original-title="Bình luận bài viết" type="button" class="btn"><i class="icon-share-alt"></i> Bình luận</a> </div>
      </div>
      {/if}
      <div class="pull-right">
        <div class="pagination pagination-small hidden-phone">
          <ul>
            <li><a data-original-title="" title="">Trang <strong>{$trang_hien_tai}</strong> trên <strong>{$tong_so_trang}</strong></a></li>
            <li>{$bo_nut}</li>
          </ul>
        </div>
        <div class="visible-phone">
          <div class="pagination pagination-small">
            <ul>
              <li class="active"><a data-original-title="" title="">{$tong_so_bai_viet + 1} bài viết</a></li>
              <li><a data-original-title="" title="">Trang <strong>{$trang_hien_tai}</strong> trên <strong>{$tong_so_trang}</strong></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="space10"></div>
    <div class="pull-right"> </div>
  </main>
</div>
<script type="text/javascript">
// <![CDATA[
	bbcodeEnabled = 1;
// ]]>
</script> 