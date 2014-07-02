<aside class="right-side"> 
  <!-- Content Header (Page header) -->
  <section class="content-header no-margin">
    <h1> Diễn đàn theo lĩnh vực</h1>
  </section>
  {showMessage()}
  <!-- Main content -->
  <section class="content"> 
    <!-- MAILBOX BEGIN -->
    <div class="mailbox row">
      <div class="col-xs-10">
        <div class="box box-solid">
          <div class="box-body">
            <div class="row">
            <div class="ten_linh_vuc"><i class="fa  fa-flag-checkered"></i>&nbsp;&nbsp;{$ten}</div>
            <div style="width:95%; margin:auto">
            {foreach $danh_sach as $dien_dan}
                <div class="dien_dan">
                    <a class="hinh" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}"><img src="/home/upload/dien_dan/{$dien_dan.hinh_dai_dien}" width="100" height="80" /></a>
                	<div class="noi_dung">
                    <p class="header"><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}">{$dien_dan.ten}</a></p>
                    <p>
                        <i class="fa fa-users"></i>&nbsp;Số lượng thành viên: {$dien_dan.so_luong_thanh_vien}<br />
                        <i class="fa fa-clock-o"></i>&nbsp; Ngày tham gia: {ngay_thang_nam($dien_dan.ngay_tao)}<br />
                        <i class="fa fa-bar-chart-o"></i>&nbsp;Lượt xem: {$dien_dan.luot_xem}<br />
                        <i class="fa  fa-thumbs-o-up"></i>&nbsp;&nbsp;Đánh giá: {$dien_dan.feedback}%
                    </p>
                    </div>
                </div>
            {/foreach}
            </div>    
                <style>
					.ten_linh_vuc{
						width: 90%;
						margin-left: 50px;
						margin-bottom: 50px;
						font-size: 18px;
						height: 30px;
						color: crimson;
					}
					.dien_dan{
						width: 400px;
						margin-left: 30px;
						float:left;
						margin-bottom: 30px;
					}
					.hinh{
						display:block;
						width: 80px;
						height: 60px;
						float:left;
					}
					.noi_dung{
						width: 280px;
						float:left;
						margin-left: 40px;
					}
					.dien_dan img{
						padding: 5px;
						box-shadow: 0 0 14px #ccc;
						border: 1px solid #f1f1f1;
						border-radius: 50%;
						margin-top: 5px;
					}
                </style>
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
