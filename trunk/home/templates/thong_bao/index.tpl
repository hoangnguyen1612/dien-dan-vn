<aside class="right-side"> 
  <!-- Content Header (Page header) -->
  <section class="content-header no-margin">
    <h1> Thông báo của bạn</h1>
  </section>
  {showMessage()} 
  <!-- Main content -->
  <section class="content"> 
    <!-- MAILBOX BEGIN -->
    <div class="mailbox row">
      <div class="col-xs-12">
        <div class="box box-solid">
          <div class="box-body">
            <div class="row" style="width:90%; margin:auto">
              <div class="row pad">
                <div class="col-sm-6">
                <script>
                	$(document).ready(function(e) {
                        $("#da_doc").click(function(){
							$("#form").submit();
						});
                    });
                </script>
                 <form action="/home/thong_bao" class="text-left" method="get">
                  <label style="margin-right: 10px;">
                    <input type="checkbox" name="list" id="check-all"/>
                    
                  </label>
                  <!-- Action button -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm btn-flat dropdown-toggle" data-toggle="dropdown"> Thao tác&nbsp;&nbsp;<span class="caret"></span> </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#" id="da_doc">Đánh dấu là đã đọc</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Xóa</a></li>
                    </ul>
                  </div>
                 
                </div>
                <div class="col-sm-6 search-form">
                    <div class="input-group">
                      <input type="text" name="noi_dung_tb" value="{$smarty.get.noi_dung_tb|default:''}" class="form-control input-sm" placeholder="Tìm kiếm theo nội dung thông báo">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
                        &nbsp;&nbsp;
                        <button type="button" class="btn btn-sm btn-primary" 
                                                                style="border-bottom-left-radius: 3px;
border-top-left-radius: 3px;" onClick="window.location.href='/thong_bao'">Tất cả</button>
					 </form>
                      </div>
                    </div>
           
                </div>
              </div>
              <!-- /.row -->
              
              <div class="table-responsive"> 
                <!-- THE MESSAGES --> 
                {if !empty($danh_sach)}
                <form action="/home/thong_bao/index.php" action="post" id="form">
                <input type="hidden" name="gido" value="111">
                <table class="table table-mailbox">
                  {foreach $danh_sach as $thong_bao}
                  <tr {if $thong_bao.trang_thai==1}class="unread"{/if}>
                    <td class="small-col"><input type="checkbox" name="item[]" value="{$thong_bao.ma}" /></td>
                    <td class="small-col"><img src="/home/upload/nguoi_dung/{$thong_bao.hinh_dai_dien}" width="16" height="16" /></td>
                    <td class="name"><a href="/{$thong_bao.domain}/thong_bao/da_doc?ma={$thong_bao.ma}">{$thong_bao.ten}</a></td>
                    <td class="subject"><a href="/{$thong_bao.domain}/thong_bao/da_doc?ma={$thong_bao.ma}">{$thong_bao.noi_dung}</a></td>
                    <td class="time">{time_thong_bao($thong_bao.ngay_tao)}</td>
                  </tr>
                  {/foreach}
				<script>
                	$(function(){
						//When unchecking the checkbox
						$("#check-all").on('ifUnchecked', function(event) {
							//Uncheck all checkboxes
							$("input[type='checkbox']", ".table-mailbox").iCheck("uncheck");
						});
						//When checking the checkbox
						$("#check-all").on('ifChecked', function(event) {
							//Check all checkboxes
							$("input[type='checkbox']", ".table-mailbox").iCheck("check");
						});
					});
                </script>
                
                </table>
                </form>
              </div>
              <!-- /.table-responsive --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix">
            <div class="pull-right"> <small>Hiển thị {$from}-{$to} trong tổng số {$tong}</small> {$phan_trang} </div>
          </div>
          {/if} </div>
        <!-- /.box --> 
      </div>
      <!-- /.col (MAIN) --> 
    </div>
    <!-- MAILBOX END --> 
    
  </section>
  <!-- /.content --> 
</aside>
