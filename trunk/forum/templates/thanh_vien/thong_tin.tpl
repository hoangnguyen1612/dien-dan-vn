<div id="page-body">
  <main role="main">
    <div class="row-fluid">
      <div class="side-segment">
        <h3>Xem thông tin cá nhân</h3>
      </div>
      <form method="post" action="./memberlist.php?mode=group" id="viewprofile">
        <div class="well">
          <div class="row-fluid">
            <div class="span2">
              <div class="space10"></div>
              <ul class="unstyled">
                <li><span class="imageframe imageframe-glow avatar-frame"> <img src="/home/upload/nguoi_dung/{if $nguoi_dung.hinh_dai_dien!=NULL}{$nguoi_dung.hinh_dai_dien}{else if $nguoi_dung.gioi_tinh==0}no_avatar_male.jpg{else if}no_avatar_female.jpg{/if}" width="100" height="100" title="Random avatar" alt="Random avatar"></span></li>
                <li></li>
                <li> </li>
                <!--<li> <a href="./ucp.php?i=zebra&amp;add=Mimi" data-original-title="" title=""><strong>Thêm bạn</strong></a>-->
              </ul>
            </div>
            <div class="span9">
              <div class="row-fluid">
                <div class="span7">
                  <h4>Thông tin cá nhân</h4>
                  <div class="menubar links primary">
                    <ul class="reset-list">
                      <li><i class="icon-user"></i> Tên: {$nguoi_dung.ho} {$nguoi_dung.ten}</li>
                      <li><i class="icon-map-marker"></i> &nbsp;Địa chỉ:  {$nguoi_dung.dia_chi|default: 'chưa có'}<i class="custom-none icon-large"></i></li>
                      <li><i class="icon-gift"></i> Tuổi: {date('Y')-date('Y', strtotime($nguoi_dung.ngay_sinh))}<i class="custom-none icon-large"></i></li>
                      <!--<li><i class="icon-briefcase"></i> Nghề nghiệp: Sinh Viên <i class="custom-none icon-large"></i></li>-->
                    </ul>
                  </div>
                </div>
                <div class="span5"> 
                  <!-- Bio -->
                
                  <!-- // Bio END --> 
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="row-fluid">
          <div class="side-segment">
            <h3>Thống kê cá nhân</h3>
          </div>
          <div class="well">
            <div class="widget-content">
              <ul class="recent-activity">
              	<li class="item"> <span class="icon red"><i class="icon16 icon-group"></i></span>
                  <div class="text">Quyền: </div>
                  <span class="recent-detail">{$quyen[$thanh_vien_dien_dan.loai_thanh_vien]}</span> </li>
                <li class="item"> <span class="icon red"><i class="icon16 icon-flag"></i></span>
                  <div class="text">Gia nhập: </div>
                  <span class="recent-detail">{date('d-m-Y',strtotime($thanh_vien_dien_dan.ngay_gia_nhap))}</span> </li>
                <!--<li class="item"> <span class="icon yellow"><i class="icon16 icon-eye-open"></i></span> <span class="text">Lần cuối đăng nhập: </span> <span class="recent-detail"> 03-04-2014, 09:07</span> </li>-->
                <li class="item"> <span class="icon blue"><i class="icon16 icon-comments"></i></span> <span class="text">Tổng số bài viết: </span> <span class="recent-detail">{dem_bai_viet_thanh_vien($ma_dien_dan,$thanh_vien_dien_dan.ma_nguoi_dung)}<strong><a href="./search.php?author_id=104&amp;sr=posts" data-original-title="" title=""></a></strong></span> </li>
                 <li class="item"> <span class="icon blue"><i class="icon16 icon-bar-chart"></i></span> <span class="text">Điểm số: </span> <span class="recent-detail"><img src="/forum/upload/rankCF/{$cap_bac}"/>    {$thanh_vien_dien_dan.diem_so}<strong><a href="./search.php?author_id=104&amp;sr=posts" data-original-title="" title=""></a></strong></span> </li>
                <!--
                <li class="item"> <span class="icon green"><i class="icon16 icon-refresh"></i></span> <span class="text">Chuyên mục yêu thích nhất: <a href="./viewforum.php?f=2" data-original-title="" title="">Công nghệ thông tin</a> </span> <span class="recent-detail">(20 Bài viết)</span> </li>
                <li class="item"> <span class="icon green"><i class="icon16 icon-refresh"></i></span> <span class="text">Bài viết yêu thích nhất: <a href="./viewtopic.php?t=15" data-original-title="" title="">Lập trình căn bản PHP</a> </span> <span class="recent-detail">(10 Bài viết)</span> </li>-->
              </ul>
            </div>
          </div>
        </div>
      </form>
    </div>
  </main>
</div>



