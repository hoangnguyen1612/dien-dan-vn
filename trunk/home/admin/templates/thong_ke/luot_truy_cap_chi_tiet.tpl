<div class="content-box-header">
					
	<h3>Thống kê [Lượt truy cập chi tiết]</h3>
	<ul class="content-box-tabs">
    	<li><a href="luot_truy_cap.php" >Lượt truy cập 7 ngày gần nhất</a></li>
        <li><a href="luot_truy_cap_nhieu_nhat.php" >Lượt truy cập nhiều nhất</a></li>
		<li><a href="#" class="default-tab">Lượt truy cập chi tiết</a></li>
	</ul>
	<div class="clear"></div>
	
</div> <!-- End .content-box-header -->

<div class="content-box-content">

	<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
	{showMessage()}
    <div id="post">
    {$i = 1}
    {foreach $ds as $dien_dan}
        <div class="forum" title="Lượt xem">
            <div class="feedback"><span>{$dien_dan.luot_xem}</span></div>
            <div class="content">
            	<h3>{$i}.&nbsp;{$dien_dan.ten}</h3>
            </div>
            <hr class="line" size="1">
        </div>
        {$i = $i+1}
     {/foreach}
    </div> 
     <br /><br />
     <input type="hidden" id="page" value="{count($ds)}" />
     <input type="button" class="button" value="Xem thêm" onclick="get_data()" id="read-more" />
     <div id="load-more" style="display:none"><img src="/home/templates/images/loading.gif" /></div> 
     <p style="display:none; font-weight: bold; color:#4FA1CC" id="done">Đã tải lên tất cả!</p>  
<style>
.highcharts-legend{
	display:none
}
</style>
	</div> <!-- End #tab1 -->
						
</div> 
<script>
function get_data()
{
	$("#read-more").hide();
	$("#load-more").show();
	$.ajax({
		type: "POST",
		url: "/home/admin/thong_ke/get_view.php",
		data: {
			'page':document.getElementById("page").value
		},
		success: function(html)
		{
			if(html)
			{
				$("#load-more").hide();
				$("#read-more").show();
				$("#post").append(html);
				var page = $("#page").val();
				page = parseInt(page);
				page+=4;
				$("#page").val(page);
			}
			else
			{
				$("#load-more").hide();
				$("#read-more").hide();
				$("#done").show();
			}
		}
	});
}
</script>
<style>
.forum{
	width: 320px;
	height: 30px;
	margin-top: 30px;
	border: 1px solid #4FA1CC;
	border-radius: 5px;
	background-color: #4FA1CC;
}
.forum .feedback{
	width: 33px;
	height: 33px;
	border-radius: 50%;
	border: 1px solid #4FA1CC;
	position: relative;
	margin-top: -4px;
	margin-right: -57px;
	color: #F60;
	text-align:center;
	float:right;
	font-weight: bold;
}
.forum .content h3{
	font-size: 15px;
	color: white;
}
.forum .line{
	position:relative;
	float:right;
	width: 10px;
	margin-top: -26px;
	margin-right: -17px;

}
.forum .feedback span{
	line-height: 35px;
}
.forum .content h3{
	line-height: 30px;
	margin-left: 10px;
}
</style>