<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
               
           
<!--<section class="content-header">
<h1>
<i class="fa fa-heart fa-index"></i> Yêu thích trên DienDanVn
<small></small>
</h1>
</section>-->

<<<<<<< .mine
 <!-- /.content -->
 </aside><!-- /.right-side -->=======
<section class="content">
<div class="row">
<div class="col-xs-12 connectedSortable">

</div><!-- /.col -->
</div>

{if $ds_moi!=NULL}
	<div class="row">
<!-- Left col -->
<section class="col-lg-12 connectedSortable"> 
<!-- Box (with bar chart) -->
<div class="box" id="loading-example">
    <div class="box-header">
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Ẩn mục này đi"><i class="fa fa-minus"></i></button>
            <button class="btn btn-primary btn-sm" data-widget='remove' data-toggle="tooltip" title="Không hiển thị mục này"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
        <h3 class="box-title"><i class="fa fa-star fa-index"></i> Mới nhất trên DienDanVn</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="row">
        <div class="col-sm-12 custom-padding">
           {foreach $ds_moi as $dien_dan}
           	<div class="forum">
           	<center><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}"><img src="/home/upload/dien_dan/{$dien_dan.hinh_dai_dien}" class="img"/></a></center>
           	 <p class="header"><span class="title"><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}">{$dien_dan.ten|truncate:24}</a></span><br />
             <span class="user"><i class="fa fa-user"></i> {$dien_dan.so_luong_thanh_vien} thành viên</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="time"><i class="fa fa-clock-o"></i> {humanTiming(strtotime($dien_dan.ngay_tao))}</span>
             </p>
           </div>
           {/foreach}
        </div>
        </div><!-- /.row - inside box -->
    </div><!-- /.box-body -->
</div><!-- /.box -->

</section><!-- /.Left col -->
</div>
{/if}

<div class="row">
<!-- Left col -->
<section class="col-lg-12 connectedSortable"> 
<!-- Box (with bar chart) -->
<div class="box" id="loading-example">
    <div class="box-header">
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Ẩn mục này đi"><i class="fa fa-minus"></i></button>
            <button class="btn btn-primary btn-sm" data-widget='remove' data-toggle="tooltip" title="Không hiển thị mục này"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
        <h3 class="box-title"><i class="fa fa-star fa-index"></i> <a href="/tim_kiem/dien_dan?tu_khoa={$ds_linh_vuc_1[0]['ten_linh_vuc']}">{$ds_linh_vuc_1[0]['ten_linh_vuc']}</a></h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="row">
        <div class="col-sm-12 custom-padding">
           {foreach $ds_linh_vuc_1 as $dien_dan}
           	<div class="forum">
           	<center><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}"><img src="/home/upload/dien_dan/{$dien_dan.hinh_dai_dien}" class="img"/></a></center>
           	 <p class="header"><span class="title"><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}">{$dien_dan.ten|truncate:24}</a></span><br />
             <span class="user"><i class="fa fa-user"></i> {$dien_dan.so_luong_thanh_vien} thành viên</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="time"><i class="fa fa-clock-o"></i> {humanTiming(strtotime($dien_dan.ngay_tao))}</span>
             </p>
           </div>
           {/foreach}
        </div>
        </div><!-- /.row - inside box -->
    </div><!-- /.box-body -->
</div><!-- /.box -->

</section><!-- /.Left col -->
</div>

<div class="row">
<!-- Left col -->
<section class="col-lg-12 connectedSortable"> 
<!-- Box (with bar chart) -->
<div class="box" id="loading-example">
    <div class="box-header">
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-primary btn-sm" data-widget='collapse' data-toggle="tooltip" title="Ẩn mục này đi"><i class="fa fa-minus"></i></button>
            <button class="btn btn-primary btn-sm" data-widget='remove' data-toggle="tooltip" title="Không hiển thị mục này"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
        <h3 class="box-title"><i class="fa fa-star fa-index"></i> <a href="/tim_kiem/dien_dan?tu_khoa={$ds_linh_vuc_2[0]['ten_linh_vuc']}">{$ds_linh_vuc_2[0]['ten_linh_vuc']}</a></h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="row">
        <div class="col-sm-12 custom-padding">
           {foreach $ds_linh_vuc_2 as $dien_dan}
           	<div class="forum">
           	<center><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}"><img src="/home/upload/dien_dan/{$dien_dan.hinh_dai_dien}" class="img"/></a></center>
           	 <p class="header"><span class="title"><a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}">{$dien_dan.ten|truncate:24}</a></span><br />
             <span class="user"><i class="fa fa-user"></i> {$dien_dan.so_luong_thanh_vien} thành viên</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="time"><i class="fa fa-clock-o"></i> {humanTiming(strtotime($dien_dan.ngay_tao))}</span>
             </p>
           </div>
           {/foreach}
        </div>
        </div><!-- /.row - inside box -->
    </div><!-- /.box-body -->
</div><!-- /.box -->

</section><!-- /.Left col -->
</div>

</section>

 </aside>>>>>>>> .r59
