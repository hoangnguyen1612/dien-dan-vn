<aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    {if $login!=''}
                    	<div class="user-panel">
                        <div class="pull-left image">
                            <img src="/home/upload/nguoi_dung/{$login.hinh_dai_dien}" class="img-circle" alt="{$login.ten}" />
                        </div>
                        <div class="pull-left info">
                            <p>Xin chào, {$login.ten}</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Trực tuyến</a>
                        </div>
                    </div>
                    {/if}
                    <!-- search form -->
                    <form action="/tim_kiem/dien_dan" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="tu_khoa" class="form-control" placeholder="Tìm kiếm diễn đàn" value="{$smarty.get.tu_khoa|default:''}" autofocus="autofocus"/>
                            <span class="input-group-btn">
                                <button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="index.html">
                                <i class="fa fa-globe"></i> <span style="font-family: 'Kaushan Script', cursive;">diendan.vn</span>
                            </a>
                        </li>
                        {if $login!=''}
                        <li>
                            <a href="pages/widgets.html">
                                <i class="fa fa-user"></i> <span>Tài khoản</span>
                            </a>
                        </li>
                        <li>
                            <a href="/thong_bao">
                                <i class="fa fa-envelope"></i> <span>Thông báo</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Diễn đàn</span>
                                {if !empty($ds_dien_dan)}<i class="fa fa-angle-left pull-right"></i>{/if}
                            </a>
                            {if $ds_dien_dan != ''}
                            <ul class="treeview-menu">
                            {foreach $ds_dien_dan as $value}
                                <li><a href="/{$value.ma_linh_vuc}/{$value.domain}" style="margin-left:0px !important"><img src="/home/upload/dien_dan/{$value.hinh_dai_dien}" width="16px" height="16px" /> {$value.ten|truncate: 22}</a></li>
                            {/foreach}
                            </ul>
                            {/if}
                        </li>
                        {/if}
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>