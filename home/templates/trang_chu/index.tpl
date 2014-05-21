<!-- start popup -->
<div class="header_btm">
		<div class="h_left">
			<h2 style="font-family: Georgia; font-size: 1.6em">Chào Mừng Bạn Đến Với Diendanvn.com.vn</h2>
			<h3 style="font-family: Georgia; font-size: 1.2em">Hãy để việc tạo lập diễn đàn trở nên đơn giản nhất</h3>
		</div>
		<div class="soc_icons">
			<h2>Kết nối với chúng tôi</h2>
				<ul>
					<li><a class="icon1" href="#"></a></li>
					<li><a class="icon2" href="#"></a></li>
					<li><a class="icon3" href="#"></a></li>
					<div class="clear"></div>
				</ul>	
		</div>
		<div class="clear"></div>
	</div>
</div>
</div>
<div class="main_bg">
<div class="wrap">
	<div class="main">
		<!--<div id="small-dialog" class="mfp-hide">
			<div class="pop_up">
			 	<h2>Lorem Ipsum is simply dummy text of the printing and industry</h2>
			 	<img src="../templates/images/zoom.jpg" title="image-name">
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic</p>
				<a class="btn" href="details.html">Read more</a>
			</div>
		</div>-->
		<!-- end popup -->
		<!-- start gallery  -->
		<div class="container">
					<ul id="filters" class="clearfix">
						<li><span class="filter active" data-filter="app card icon logo web">Tất Cả</span></li> |
						<li><span class="filter" data-filter="app card logo">Xã Hội</span></li> |
						<li><span class="filter" data-filter="card app web icon">Học Tập</span></li> |
						<li><span class="filter" data-filter="icon web app">Thể Thao</span></li> |
						<li><span class="filter" data-filter="logo app">Tin Tức</span></li> |
						<li><span class="filter" data-filter="web app card logo icon">Việc Làm</span></li> |
						<li><span class="filter" data-filter="web app logo card">Hỏi Đáp</span></li>
					</ul>
		<ul id="portfoliolist">
        {foreach $danh_sach as $dien_dan}
			<li><a class="popup-with-zoom-anim" href="#small-dialog">
				<div class="portfolio logo1 mix_all" data-cat="logo" style="display: inline-block; opacity: 1;">
					<div class="portfolio-wrapper" style="">				
							<img src="../upload/dien_dan/{$dien_dan.hinh_dai_dien}" alt="Image 2" style="top: -30px;" width="270" height="180">
						<div class="label" style="bottom: 0px;">
							<div class="label-text">
								<p class="text-title" style="text-transform:uppercase">{$dien_dan.ten}</p>
								<span class="text-category"></span>
							</div>
							<div class="label-bg"></div>
						</div>
					</div>
				</div>		
			</a></li>
          {/foreach}
            
            
            
	<!--		<li><a class="popup-with-zoom-anim" href="#small-dialog">
				<div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
					<div class="portfolio-wrapper">			
							<img src="../templates/images/4.jpg" alt="Image 2" width="270" height="180">
						<div class="label">
							<div class="label-text">
								<p class="text-title">VNZOOM</p>
							</div>
							<div class="label-bg"></div>
						</div>
					</div>
				</div>		
			</a></li>
			<li><a class="popup-with-zoom-anim" href="#small-dialog">
				<div class="portfolio web mix_all" data-cat="web" style="display: inline-block; opacity: 1;">
					<div class="portfolio-wrapper">						
							<img src="../templates/images/5.jpg" alt="Image 2" width="270" height="180">
						<div class="label">
							<div class="label-text">
								<p class="text-title">DIỄN ĐÀN BẠC LIÊU</p>
							</div>
							<div class="label-bg"></div>
						</div>
					</div>
				</div>				
			</a></li>
			<li><a class="popup-with-zoom-anim" href="#small-dialog">
				<div class="portfolio card mix_all" data-cat="card" style="display: inline-block; opacity: 1;">
					<div class="portfolio-wrapper">			
							<img src="../templates/images/6.jpg" alt="Image 2" width="270" height="180">
						<div class="label">
							<div class="label-text">
								<p class="text-title">GENK</p>
							</div>
							<div class="label-bg"></div>
						</div>
					</div>
				</div>	
			</a></li>
			<li><a class="popup-with-zoom-anim" href="#small-dialog">	
				<div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
					<div class="portfolio-wrapper">
							<img src="../templates/images/7.jpg" alt="Image 2" width="270" height="180">
						<div class="label">
							<div class="label-text">
								<p class="text-title">WEB TRẺ THƠ</p>
							</div>
							<div class="label-bg"></div>
						</div>
					</div>
				</div>			
			</a></li>
			<li><a class="popup-with-zoom-anim" href="#small-dialog">
				<div class="portfolio card mix_all" data-cat="card" style="display: inline-block; opacity: 1;">
					<div class="portfolio-wrapper">			
							<img src="../templates/images/8.jpg" alt="Image 2" width="270" height="180">
						<div class="label">
							<div class="label-text">
								<p class="text-title">MUARE.VN</p>
							</div>
							<div class="label-bg"></div>
						</div>
					</div>
				</div>	
			</a></li>
			<li><a class="popup-with-zoom-anim" href="#small-dialog">
				<div class="portfolio card mix_all" data-cat="card" style="display: inline-block; opacity: 1;">
					<div class="portfolio-wrapper">			
							<img src="../templates/images/9.jpg" alt="Image 2" width="270" height="180">
						<div class="label">
							<div class="label-text">
								<p class="text-title">GO.VN</p>
							</div>
							<div class="label-bg"></div>
						</div>
					</div>
				</div>	
			</a></li>
			<li><a class="popup-with-zoom-anim" href="#small-dialog">
				<div class="portfolio logo1 mix_all" data-cat="logo" style="display: inline-block; opacity: 1;">
					<div class="portfolio-wrapper">			
							<img src="../templates/images/10.jpg" alt="Image 2" width="270" height="180">
						<div class="label">
							<div class="label-text">
								<p class="text-title">DIADIEM.VN</p>
							</div>
							<div class="label-bg"></div>
						</div>
					</div>
				</div>																																							
			</a></li>
			<li><a class="popup-with-zoom-anim" href="#small-dialog">
				<div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
					<div class="portfolio-wrapper">			
							<img src="../templates/images/11.jpg" alt="Image 2" width="270" height="180">
						<div class="label">
							<div class="label-text">
								<p class="text-title">BONGDASO.COM</p>
							</div>
							<div class="label-bg"></div>
						</div>
					</div>
				</div>		
			</a></li>
			<li><a class="popup-with-zoom-anim" href="#small-dialog">												
				<div class="portfolio web mix_all" data-cat="web" style="display: inline-block; opacity: 1;">
					<div class="portfolio-wrapper">						
							<img src="../templates/images/12.jpg" alt="Image 2" width="270" height="180">
						<div class="label">
							<div class="label-text">
								<p class="text-title">LINKEDIN.COM</p>
							</div>
							<div class="label-bg"></div>
						</div>
					</div>
				</div>	
			</a></li>
			<li><a class="popup-with-zoom-anim" href="#small-dialog">																
				<div class="portfolio icon mix_all" data-cat="icon" style="display: inline-block; opacity: 1;">
					<div class="portfolio-wrapper">
							<img src="../templates/images/pic11.jpg" alt="Image 2">
						<div class="label">
							<div class="label-text">
								<p class="text-title">NGOINHACHUNG.NET</p>
							</div>
							<div class="label-bg"></div>
						</div>
					</div>
				</div>			
			</a></li>
			<li><a class="popup-with-zoom-anim" href="#small-dialog">																																																													
				<div class="portfolio icon mix_all" data-cat="icon" style="display: inline-block; opacity: 1;">
					<div class="portfolio-wrapper">						
							<img src="../templates/images/pic12.jpg" alt="Image 2">
						<div class="label">
							<div class="label-text">
								<p class="text-title">ZING</p>
							</div>
							<div class="label-bg"></div>
						</div>
					</div>
				</div>		
			</a></li>	 -->
		</ul>
	</div> 	
        <!-- end container -->
   </div>
</div>
</div>