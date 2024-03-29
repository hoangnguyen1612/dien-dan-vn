<aside class="left-side sidebar-offcanvas"> 
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar"> 
    <!-- Sidebar user panel --> 
    {if $login!=''}
    <div class="user-panel">
      <div class="pull-left image"> <img src="/home/upload/nguoi_dung/{$login.hinh_dai_dien}" class="img-circle" alt="{$login.ten}" /> </div>
      <div class="pull-left info">
        <p>Xin chào, {$login.ten}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Trực tuyến</a> </div>
    </div>
    {/if} 
    <!-- search form -->
    <form action="/tim_kiem/dien_dan" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="tu_khoa" class="form-control" placeholder="Tìm kiếm diễn đàn" value="{$smarty.get.tu_khoa|default:''}" autofocus="autofocus"/>
        <span class="input-group-btn">
        <button type='submit' id='search-btn' class="btn btn-flat" style="margin: 0px; width: 29px"><i class="fa fa-search"></i></button>
        </span> </div>
    </form>
    <ul class="sidebar-menu">
      </li>
      <li class="active"> <a href="#" style="background-color: #fff; box-shadow:0 0 14px #FFFFFF; color:#3c8dbc; text-transform:capitalize"> <i class="fa fa-globe"></i> <span style="">Cá nhân</span> </a> </li>
      {if $login!=''}
      <li> <a href="/tai_khoan/{urlencode(base64_encode($login.ma))}-{convert_to_dot(noi_chuoi($login.ho, $login.ten, ' '))}"> <i class="fa fa-user"></i> <span>Tài khoản</span> </a></li>
      <li class="treeview"> <a href="#"> <i class="fa fa-bar-chart-o"></i> <span>Diễn đàn</span> {if !empty($ds_dien_dan)}<i class="fa fa-angle-left pull-right"></i>{/if} </a> {if $ds_dien_dan != ''}
        <ul class="treeview-menu">
          {foreach $ds_dien_dan as $value}
          <li><a href="/{$value.ma_linh_vuc}/{$value.domain}" style="margin-left:0px !important"><img src="/home/upload/dien_dan/{$value.hinh_dai_dien}" width="16px" height="16px" /> {$value.ten|truncate: 22}</a></li>
          {/foreach}
        </ul>
        {/if} </li>
      <li> <a href="/thong_bao"> <i class="fa fa-envelope"></i> <span>Thông báo</span> </a> </li>
      {else if}
      	<li class="active">
        <p style="padding: 10px;">Nếu bạn chưa có tài khoản hãy đăng ký ngay bây giờ!</p>
  		<center>
        <button id="dang-ky-btn" class="btn" onclick="window.location.href = '/tai_khoan/dang_ky.html'">Đăng ký</button>
        </center>
        <br />
        </li>
      {/if}
    </ul>
    <ul class="sidebar-menu">
      <li class="active"> <a href="index.html" style="background-color: #fff; box-shadow:0 0 14px #FFFFFF; color:#3c8dbc; text-transform:capitalize"> <i class="fa fa-globe"></i> <span style="">Lĩnh vực phổ biến</span> </a> </li>
      {foreach $danh_sach_linh_vuc as $linh_vuc}
      {if $linh_vuc.ma_loai_cha==0}
      <li class="treeview"> <a href="#"> <span>{$linh_vuc.ten}</span><i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          {foreach $danh_sach_linh_vuc as $linh_vuc_con}
          {if $linh_vuc_con.ma_loai_cha == $linh_vuc.ma}
          <li><a href="/linh_vuc/danh_sach?ma_linh_vuc={$linh_vuc_con.ma}" style="margin-left:0px !important"><i class="fa fa-angle-right"></i>{$linh_vuc_con.ten|truncate: 22}</a></li>
          {/if}
          {/foreach}
        </ul>
      </li>
      {/if}
      {/foreach}
    </ul>
   
    <br />
  </section>
  <!-- /.sidebar --> 
</aside>
