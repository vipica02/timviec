	<ul class="nav nav-list">
		<li class="active">
			<a href="<?php echo nhatuyendung_url('home'); ?>">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Dashboard </span>
			</a>

			<b class="arrow"></b>
		</li>

	
		
		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon ace-icon glyphicon glyphicon-search"></i>
				<span class="menu-text"> Tìm kiếm </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?php echo nhatuyendung_url('search/search_all'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Tất cả
					</a>

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo nhatuyendung_url('search/search_city'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Thành phố
					</a>

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo nhatuyendung_url('search/search_diploma'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Học vấn
					</a>

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo nhatuyendung_url('search/search_wage'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Tiền lương
					</a>

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo nhatuyendung_url('search/search_exp'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Kinh nghiệm
					</a>

					<b class="arrow"></b>
				</li>
			
				<li class="">
					<a href="<?php echo nhatuyendung_url('search/search_rank'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Cấp bậc công việc
					</a>

					<b class="arrow"></b>
				</li>
				
				<li class="">
					<a href="<?php echo nhatuyendung_url('search/search_career'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Ngành nghề
					</a>

					<b class="arrow"></b>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-book"></i>
				<span class="menu-text"> Đăng tin </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?php echo nhatuyendung_url('trustworthy/add'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Add Tin mới
					</a>

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo nhatuyendung_url('trustworthy'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Quản lý tin
					</a>

					<b class="arrow"></b>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-user"></i>
				<span class="menu-text"> Tài khoản </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?php echo nhatuyendung_url('user_employer/edit'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Sửa tài khoản
					</a>

					<b class="arrow"></b>
				</li>
				
			</ul>
		</li>

<!--		<li class="">-->
<!--			<a href="#" class="dropdown-toggle">-->
<!--				<i class="menu-icon fa  fa-pencil-square-o"></i>-->
<!--				<span class="menu-text"> Giấy phép kinh doanh </span>-->
<!---->
<!--				<b class="arrow fa fa-angle-down"></b>-->
<!--			</a>-->
<!---->
<!--			<b class="arrow"></b>-->
<!---->
<!--			<ul class="submenu">-->
<!--				<li class="">-->
<!--					<a href="--><?php //echo nhatuyendung_url('upload'); ?><!--">-->
<!--						<i class="menu-icon fa fa-caret-right"></i>-->
<!--						Gửi giấy phép-->
<!--					</a>-->
<!---->
<!--					<b class="arrow"></b>-->
<!--				</li>-->
<!--			</ul>-->
<!--		</li>-->

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon  fa fa-cog"></i>
				<span class="menu-text"> Cài đặt </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?php echo nhatuyendung_url('user_employer/logout'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Logout
					</a>

					<b class="arrow"></b>
				</li>
			</ul>
		</li>
	</ul><!-- /.nav-list -->