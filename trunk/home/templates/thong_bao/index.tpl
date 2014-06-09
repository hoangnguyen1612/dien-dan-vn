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
        						{if !empty($danh_sach)} 
                                <div class="box-body">                                  
                                    <div class="row" style="width:90%; margin:auto">
                                            <div class="row pad">
                                                <div class="col-sm-6">
                                                    <label style="margin-right: 10px;">
                                                        <input type="checkbox" id="check-all"/>
                                                    </label>
                                                    <!-- Action button -->
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default btn-sm btn-flat dropdown-toggle" data-toggle="dropdown">
                                                            Thao tác&nbsp;&nbsp;<span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="#">Đánh dấu là đã đọc</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="#">Xóa</a></li>
                                                        </ul>
                                                    </div>

                                                </div>
                                                <div class="col-sm-6 search-form">
                                                    <form action="#" class="text-right">
                                                        <div class="input-group">                                                            
                                                            <input type="text" class="form-control input-sm" placeholder="Tìm kiếm">
                                                            <div class="input-group-btn">
                                                                <button type="submit" name="q" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
                                                            </div>
                                                        </div>                                                     
                                                    </form>
                                                </div>
                                            </div><!-- /.row -->

                                            <div class="table-responsive">
                                                <!-- THE MESSAGES -->
                                                <table class="table table-mailbox">
                                                {foreach $danh_sach as $thong_bao}    
                                                    <tr {if $thong_bao.trang_thai==1}class="unread"{/if}>
                                                        <td class="small-col"><input type="checkbox" /></td>
                                                        <td class="small-col"><img src="/home/upload/nguoi_dung/{$thong_bao.hinh_dai_dien}" width="16" height="16" /></td>
                                                        <td class="name"><a href="/{$thong_bao.domain}/thong_bao/da_doc?ma={$thong_bao.ma}">{$thong_bao.ten}</a></td>
                                                        <td class="subject"><a href="/{$thong_bao.domain}/thong_bao/da_doc?ma={$thong_bao.ma}">{$thong_bao.noi_dung}</a></td>
                                                        <td class="time">{time_thong_bao($thong_bao.ngay_tao)}</td>
                                                    </tr>
                                                {/foreach}    
                                                </table>
                                            </div><!-- /.table-responsive -->
                                    </div><!-- /.row -->
                                </div><!-- /.box-body -->
                                <div class="box-footer clearfix">
                                    <div class="pull-right">
                                        <small>Hiển thị 1-2 / {count($danh_sach)}</small>
                                        <button class="btn btn-xs btn-primary"><i class="fa fa-caret-left"></i></button>
                                        <button class="btn btn-xs btn-primary"><i class="fa fa-caret-right"></i></button>
                                    </div>
                                </div>
                                {else if}
                                  	<p style="padding:10px; color:#999">Không có thông báo nào để hiển thị</p>
                                  {/if} 
                            </div>
        <!-- /.box --> 
      </div>
      <!-- /.col (MAIN) --> 
    </div>
    <!-- MAILBOX END --> 
    
  </section>
  <!-- /.content --> 
</aside>
