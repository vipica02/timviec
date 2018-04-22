
	<ul class="nav nav-list">
		<li class="active">
			<a href="<?php echo admin_url(''); ?>">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Thống kê - Báo cáo </span>
			</a>

			<b class="arrow"></b>
		</li>
		
		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-book"></i>
				<span class="menu-text"> Bài viết </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?php echo admin_url('post/add');?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Add bài viết
					</a>

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo admin_url('post'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Danh sách bài viết
					</a>

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo admin_url('category'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Danh mục
					</a>

					<b class="arrow"></b>
				</li>
			</ul>
		</li>


		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-user"></i>
				<span class="menu-text"> Doanh nghiệp </span>
				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?php echo admin_url('employer/add');?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Thêm mới nhà tuyển dụng
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo admin_url('employer/view'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Danh sách chi tiết nhà tuyển dụng
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo admin_url('employer'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Quản lý nhà tuyển dụng
					</a>
					<b class="arrow"></b>
				</li>

			</ul>
		</li>
		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-users"></i>
				<span class="menu-text"> Người tìm việc </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?php echo admin_url('job/add');?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Thêm người tìm việc
					</a>

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo admin_url('job');?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Quản lý người tìm việc
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-user-plus"></i>
				<span class="menu-text"> User </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?php echo admin_url('admin/add') ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Add user
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo admin_url('admin');?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Danh sách user
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon fa fa-pencil-square-o"></i>
				<span class="menu-text"> Quản lý mục con </span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
				<li class="">
					<a href="<?php echo  admin_url('city')?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Add city
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?php echo admin_url('diploma'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Add bằng cấp
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?php echo admin_url('wege'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Add tiền lương
					</a>

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo admin_url('experience'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Add Kinh nghiệm
					</a>

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo admin_url('scale'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Add quy mô
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="<?php echo admin_url('naturework'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Add tính chất công việc
					</a>

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo admin_url('formwork'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Add hình thức làm việc
					</a>

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo admin_url('probationary'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Add thời gian thử việc
					</a>

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo admin_url('career'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Add ngành nghề
					</a>

					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="<?php echo admin_url('rank'); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Add cấp bậc mong muốn
					</a>

					<b class="arrow"></b>
				</li>
			</ul>
		</li>

		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon glyphicon glyphicon-cog"></i>
				<span class="menu-text">Cài đặt </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="<?php echo  admin_url('slider')?>">
						<i class="menu-icon fa fa-caret-right"></i>
						Slider
					</a>
					<b class="arrow"></b>
				</li>
			</ul>
		</li>
	</ul><!-- /.nav-list -->
