<div class="content-box-header">
					
	<h3>Thống kê [Thành viên diễn đàn]</h3>
	<ul class="content-box-tabs">
		<li><a href="#" class="default-tab">Thống kê thành viên</a></li>
	</ul>
	<div class="clear"></div>
	
</div> <!-- End .content-box-header -->

<div class="content-box-content">
<div id="loading" style="display: none; opacity: 0.5; position:fixed;z-index: 1000;top: 0px;left: 0px;height: 100%;width: 100%; background: #f1f1f1">
	<img src="/home/admin/templates/images/loading.gif" style="position: fixed;left: 50%;top: 30%;" />
</div>
	<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
    {showMessage()}
        <p>
        <label>Thống kế theo</label>
        <select class="text-input" id="change" style="padding: 6px;font-size: 13px;background: #fff url('/forum/admin/tenplates/images/bg-form-field.gif') top left repeat-x;border: 1px solid #d5d5d5;color: #333; border-radius: 3px;">
            {foreach $options as $key=>$value}
                <option value="{$key}">{$value}</option>
            {/foreach}
        </select>
        </p>
     
     	<div id="post">
        {$i = 1}
        {foreach $ds as $tv}
            <div class="forum" title="">
                <div class="feedback"><span>{$tv.tong}</span></div>
                <div class="content">
                    <h3>{$i}.&nbsp;{$tv.ten}</h3>
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
$("#change").change(function(){
	$("#loading").show();
	$("#page").val({count($ds)});
	
	$.ajax({
		type: "POST",
		url: "get_change.php",
		data: {
			"type":document.getElementById("change").value
		},
		success: function(data){
			if(data)
			{
				$("#loading").hide();
				$("#post").html(data);
				$("#done").hide();
				$("#read-more").show();
			}
			else
			{
				$("#loading").hide();
				$("#post").html("<p style='color: #666; font-weight: bold'>Chưa có dữ liệu để thống kê!</p>");
				$("#done").hide();
				$("#read-more").hide();
			}
		}
	});
});

function get_data()
{
	$("#read-more").hide();
	$("#load-more").show();
	$.ajax({
		type: "POST",
		url: "get_data.php",
		data: {
			'page':document.getElementById("page").value,
			'type':document.getElementById("change").value
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
				page+=10;
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