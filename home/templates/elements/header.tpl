<header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Diendan.vn
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
               
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                    <li class="dropdown messages-menu">
                        <a href="/" class="dropdown-toggle header-user">
                            <i class="fa fa-home"></i> <span>Trang chủ</span>
                        </a>
                    </li>
                    <li class="dropdown messages-menu">
                        <a href="/dien_dan/dang_ky.html" class="dropdown-toggle header-user">
                            <i class="fa fa-info-circle"></i> <span>Giới thiệu</span>
                        </a>
                    </li>
                    {if $login!=''}
                    	<li class="dropdown messages-menu">
                            <a href="/dien_dan/dang_ky.html" class="dropdown-toggle header-user">
                                <i class="fa fa-globe"></i> <span>Đăng ký diễn đàn</span>
                            </a>
                    	</li>
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="/home/templates/images/avatar3.png" class="img-circle" alt="User Image"/>
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li><!-- end message -->
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="/home/templates/images/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="/home/templates/images/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="/home/templates/images/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="/home/templates/images/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><i class="caret"></i></span>
                                <!--<span>{$login.ho_ten}<i class="caret"></i></span>-->
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="/home/upload/nguoi_dung/{$login.hinh_dai_dien}" class="img-circle" alt="User Image" />
                                    <p style="color:white">
                                        {$login.ho} {$login.ten}<br />
                                        <span style="font-size: 13px">Nghề nghiệp: {$login.nghe_nghiep}</span>
                                        <small>Kể từ tháng {date('m', strtotime($login.ngay_tham_gia))} năm  {date('Y', strtotime($login.ngay_tham_gia))}</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!--<li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>-->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Tài khoản</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="/nguoi_dung/dang_xuat.html" class="btn btn-default btn-flat">Đăng xuất</a>
                                    </div>
                                </li>
                            </ul>
                        </li>  
                    {else if}
                    	<li class="dropdown messages-menu">
                            <a href="/nguoi_dung/dang_ky.html" class="dropdown-toggle header-user">
                                <i class="fa fa-pencil"></i> <span>Đăng ký</span>
                            </a>
                        </li>
                        <li class="dropdown messages-menu">
                            <a href="/nguoi_dung/dang_nhap.html" class="dropdown-toggle header-user">
                                <i class="fa fa-key"></i> <span>Đăng nhập</span>
                            </a>
                        </li>  
                    {/if}    
                    </ul>
                </div>
            </nav>
        </header>