<aside class="right-side"> 
  <!-- Content Header (Page header) -->
  <section class="content-header no-margin">
    <h1> Kết quả tìm kiếm</h1>
  </section>
  {showMessage()}
  <!-- Main content -->
  <section class="content"> 
    <!-- MAILBOX BEGIN -->
    <div class="mailbox row">
      <div class="col-xs-9">
        <div class="box box-solid">
          <div class="box-body">
            <div class="row">
            <p style="margin-left:50px;">
            	<select name="loai" style="width:150px; float:right; margin-right: 50px;" class="form-control" id="change">
                    {foreach $bo_loc as $key=>$value}
                    	<option value="{$key}" {if isset($smarty.get.loai) && $smarty.get.loai==$key}selected{/if}>{$value}</option>
                    {/foreach}
            	</select>
                <script>
            	document.getElementById("change").onchange = function()
				{
					if(document.getElementById("change").value==0)
					{
						window.location.href = '/tim_kiem/dien_dan?tu_khoa={$smarty.get.tu_khoa}';
					}
					else
					{
						window.location.href = '/tim_kiem/dien_dan?tu_khoa={$smarty.get.tu_khoa}&loai='+document.getElementById("change").value;
					}
				}
            </script>
            	<span style="float:left; margin-top:7px">Tìm thấy <span style="color:crimson">{$so_luong}</span> diễn đàn cho từ khóa <span style="color:crimson">&ldquo;{$smarty.get.tu_khoa}&rdquo;</span></span>
            </p>
            <div style="clear:both"></div>
            <div style="border-bottom: 1px solid #f1f1f1; height:2px; width: 100%; margin:auto; margin-top: 10px"></div>
            	<table class="search">
                 <tbody>
                 {foreach $danh_sach as $dien_dan}
                  <tr>
                   <td width="120px">
                   	<a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}"><img src="/home/upload/dien_dan/{$dien_dan.hinh_dai_dien}" width="100" height="80" /></a>
                   </td>
                   <td width="400px">
                   	<p class="header"><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}">{$dien_dan.ten}</a></p>
                    <p>
                        <i class="fa fa-users"></i>&nbsp;Số lượng thành viên: {$dien_dan.so_luong_thanh_vien}<br />
                        <i class="fa fa-clock-o"></i>&nbsp; Ngày tham gia: {ngay_thang_nam($dien_dan.ngay_tao)}<br />
                        <i class="fa fa-bar-chart-o"></i>&nbsp;Lượt xem: {$dien_dan.luot_xem|truncate:40}<br />
                        <i class="fa  fa-thumbs-o-up"></i>&nbsp;&nbsp;Đánh giá: {$dien_dan.feedback|truncate:40}%
                    </p>
                   </td>
                  </tr>
                  {/foreach}
                 </tbody>
                </table>
                <style>
					.search{
						margin-left: 50px;
					}
                	.search td{
						padding: 20px;
						vertical-align: top;
					}
					.search .header{
						text-transform:capitalize;
						color: #3c8dbc;
						font-size: 16px;
					}
					.search img{
						padding: 5px;
						box-shadow: 0 0 14px #ccc;
						border: 1px solid #f1f1f1;
						border-radius: 50%;
						margin-top: 5px;
					}
                </style>

                <div class="pull-right" style="margin:auto; width: 60%">
                    {$phan_trang}
                </div>
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.box-body --> 
        </div>
        <!-- /.box --> 
      </div>
      <!-- /.col (MAIN) --> 
    </div>
    <!-- MAILBOX END --> 
    
  </section>
  <!-- /.content --> 
</aside>
