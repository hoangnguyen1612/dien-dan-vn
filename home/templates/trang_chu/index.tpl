<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

       <section class="content">

<div class="row">
<div class="col-xs-12 connectedSortable">

</div><!-- /.col -->
</div>

	<div class="row">
<!-- Left col -->
<section class="col-lg-12 connectedSortable"> 
<!-- Box (with bar chart) -->
<div class="box" id="loading-example">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-flag fa-index"></i>Tất cả các diễn đàn</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="row">
        <div class="col-sm-12 custom-padding">
        <div style="width:90%; margin:auto" id="post">
           {foreach $ds as $dien_dan}
           	<div class="forum">
           	<center><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}"><img data-action="swing"  src="/home/upload/dien_dan/{$dien_dan.hinh_dai_dien}" class="img"/></a></center>
           	 <p class="header"><span class="title"><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}">{$dien_dan.ten|truncate:24}</a></span><br />
             <span class="user"><i class="fa fa-users"></i> {$dien_dan.so_luong_thanh_vien} thành viên</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="time"><i class="fa  fa-thumbs-o-up"></i>&nbsp;Đánh giá:&nbsp;{$dien_dan.feedback}%</span>
             </p>
           </div>
           {/foreach}
           </div>
        </div>
        <div id="load-more" style="display:none; margin:auto; width: 100px;"><img src="/home/templates/images/loading.gif" /></div>
        <input type="hidden" id="page" value="{count($ds)}" />
        <input type="hidden" id="done" value="0" /> 
        </div><!-- /.row - inside box -->
    </div><!-- /.box-body -->
</div><!-- /.box -->

</section><!-- /.Left col -->
</div>
<script>
$(".forum").hover(function(){
    $(this).find(".title").addClass('animated ' + 'pulse');
});
$(".forum").bind("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd",function(){
    $(this).find(".title").removeClass('animated ' + 'pulse');
});
</script>

</section>
 </aside>

<script>
$(window).scroll(function(){
	if($(window).scrollTop() == $(document).height() - $(window).height())
	{
		if($("#done").val() == 0)
		{
			$("#load-more").show();
			$.ajax({
				type: "POST",
				url: "/home/trang_chu/get_data.php",
				data: {
					'page':document.getElementById("page").value
				},
				success: function(html)
				{
				if(html)
				{
					$("#load-more").hide();
					$("#post").append(html);
					var page = $("#page").val();
					page = parseInt(page);
					page+=10;
					$("#page").val(page);
				}
				else
				{
					$("#done").val(1);
					$("#load-more").hide();
				}
			}
			});
		}
	}
});
</script>