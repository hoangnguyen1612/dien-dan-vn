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
      <div class="col-xs-12">
        <div class="box box-solid">
          <div class="box-body">
            <div class="row">
            <p style="margin-left:50px;">
            	Tìm thấy <span style="color:crimson">{$so_luong}</span> diễn đàn cho từ khóa <span style="color:crimson">&ldquo;{$smarty.get.tu_khoa}&rdquo;</span>
            </p>
            	<table class="search">
                 <tbody>
                 {foreach $danh_sach as $dien_dan}
                  <tr>
                   <td width="120px">
                   	<a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}"><img src="/home/upload/dien_dan/{$dien_dan.hinh_dai_dien}" width="100" height="100" /></a>
                   </td>
                   <td width="400px">
                   	<p class="header"><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}">{$dien_dan.ten}</a></p>
                    <p>
                    	<i class="fa fa-pencil"></i>&nbsp;&nbsp;Mô tả: {$dien_dan.mo_ta|truncate:40}<br />
                        <i class="fa fa-users"></i>&nbsp;Số lượng thành viên: {$dien_dan.so_luong_thanh_vien}<br />
                        <i class="fa fa-clock-o"></i>&nbsp; Ngày tham gia: {ngay_thang_nam($dien_dan.ngay_tao)}
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
						box-shadow: 1px 1px 1px #ccc;
						border-radius: 3px;
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
