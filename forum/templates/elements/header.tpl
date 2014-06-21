<section class="social-top">
  <div class="pull-right"> <a title="" data-original-title="Google+" href="http://www.sitesplat.com/demo/phpBB3/index.php#1"><i class="icon-google-plus-sign icon-large google-plus-color"></i></a> <a title="" data-original-title="Github" href="http://www.sitesplat.com/demo/phpBB3/index.php#2"><i class="icon-github-sign icon-large github-color"> </i></a> <a title="" data-original-title="Pinterest" href="http://www.sitesplat.com/demo/phpBB3/index.php#4"><i class="icon-pinterest-sign icon-large pinterest-color"> </i></a> <a title="" data-original-title="Facebook" href="http://www.sitesplat.com/demo/phpBB3/index.php#5"><i class="icon-facebook-sign icon-large facebook-color"> </i></a> <a title="" data-original-title="Twitter" href="http://www.sitesplat.com/demo/phpBB3/index.php#6"><i class="icon-twitter-sign icon-large twitter-color"> </i></a> <a title="" data-original-title="rss" href="http://www.sitesplat.com/demo/phpBB3/feed.php"><i class="icon-rss-sign icon-large rss-color"> </i></a> </div>
</section>
<header class="header" role="banner"> <!-- Header block -->
  <div class="topArea"> <!-- Logo block -->
    <div class="leftArea">
      <div class="logo-transition"> <a class="logo" href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}" title="" data-original-title="" style="text-transform:uppercase;font-size:28px"><span>{$dien_dan.ten[0]}</span>{$dien_dan.ten|substr:1:strlen($dien_dan.ten)}</a> </div>
      <p class="site-info">{$dien_dan.slogan}&nbsp;<i class="icon-umbrella icon-large"></i></p>
      <div class="clearfix"></div>
    </div>
    <nav class="mainnav" role="navigation" aria-label="Primary"><!-- Main navigation block -->
      <ul>
        <li class="nav-icon"> <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}" data-original-title="" title="">TRANG CHỦ<span class="has-sub"><i class="icon-home"></i></span></a>
          <p>{$dien_dan.ten}</p>
          <!--<ul class="submenu">
            <li><a href="./elements.php?sid=bd17d981b9b4204315ed142a9491085e" data-original-title="" title=""><i class="icon-magic"></i> Bootstrap Elements</a><span></span></li>
            <li><a href="./faq.php?sid=bd17d981b9b4204315ed142a9491085e" data-original-title="" title=""><i class="icon-question-sign"></i> FAQ</a><span></span></li>
            <li><a href="./memberlist.php?mode=leaders&amp;sid=bd17d981b9b4204315ed142a9491085e" data-original-title="" title=""><i class="icon-group"></i> The team</a></li>
          </ul> -->
        </li>
       
        <li class="nav-icon"> <a href="#" data-original-title="" title="">TÌM KIẾM <span class="has-sub"><i class="icon-search icon-flip-horizontal"></i></span></a>
          <p>Tìm kiếm nâng cao</p>
          <ul class="submenu">
            <li><a href="./search.php?sid=bd17d981b9b4204315ed142a9491085e" data-original-title="" title=""><i class="icon-search icon-flip-horizontal"></i> Tìm theo tên</a><span></span></li>
            <li><a href="#" data-original-title="" title=""><i class="icon-search icon-flip-horizontal"></i> Tìm kiếm theo thời gian</a><span></span></li>
            <li><a href="#" data-original-title="" title=""><i class="icon-search icon-flip-horizontal"></i> Tìm kiếm theo chủ đề</a><span></span></li>
          </ul>
        </li>
        <li class="nav-icon"> <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/thanh_vien/danh_sach" data-original-title="" title="">CHỨC NĂNG <span class="has-sub"><i class="icon-signin"></i></span></a>
          <p>Một số tính năng của diễn đàn</p>
          <ul class = "submenu">
          <li><a href="/{$dien_dan.ma}/bai_viet/danh_sach_theo_loai?loai=0" data-original-title="" title=""><i class="icon-search"></i> Cách tính điểm thành viên trong diễn đàn</a><span></span>
          </li>
          </ul>
        </li>
        <li class="nav-icon"> <a href="/{$dien_dan.ma_linh_vuc}/{$dien_dan.domain}/phan_hoi/them" data-original-title="" title="">PHẢN HỒI <span class="has-sub"><i class="icon-thumbs-up"></i></span></a>
          <p>Gửi thông tin phản hồi</p>
        </li>
      </ul>
      <div id="navBtn" class="" data-toggle="collapse" data-target=".nav-collapse">MENU<i class="icon  icon-list"></i></div>
    </nav>
    <!-- Main navigation block --><!-- Everything you want hidden at 940px or less, place within here -->
    <div id="nav-listen" class="nav-collapse collapse flexnav-show">
      <nav class="hidden-desktop hidden-tablet"> <!-- MOBILE Navigation block -->
        <ul class="flexnav">
          <li><a href="" data-original-title="" title=""><i class="icon-thumbs-up"></i> Register</a></li>
          <li><a href="" data-original-title="" title=""><i class="icon-question-sign"></i> FAQ</a></li>
          <li><a href="" data-original-title="" title=""><i class="icon-group"></i> The team</a></li>
          <li class="item-with-ul"> <a href="" data-original-title="" title=""><i class="icon-search"></i> Advanced search</a>
            <ul class="collapse viewdetails">
              <li><a href="" data-original-title="" title=""><i class="icon-search"></i> View unanswered posts</a></li>
              <li><a href="" data-original-title="" title=""><i class="icon-star"></i> View active topics</a></li>
            </ul>
            <a class="touch-button" href="javascript:void(0);" data-toggle="collapse" data-target=".viewdetails" data-original-title="" title=""><i class="navicon icon-sort-down"></i></a> </li>
          
          <!-- BLOCK WITH SUBMENU EXAMPLE
	
		<li class="item-with-ul">
			  <a href="#4"><i class="icon-search"></i> Submenu Group 1</a>
		     <ul class="collapse viewdetails">
                <li><a href="#5">SubLink 1</a></li>
                <li><a href="#6">SubLink 2</a></li>
                <li><a href="#7">SubLink 3</a></li>
                <li><a href="#8">SubLink 4</a></li>
             </ul>
			  <a class="touch-button" href="javascript:void(0);" data-toggle="collapse" data-target=".viewdetails"><i class="navicon icon-sort-down"></i></a>
		</li>
		
    BLOCK WITH SUBMENU EXAMPLE -->
          
        </ul>
      </nav>
      <!-- MOBILE Navigation block --> 
    </div>
  </div>
</header>
