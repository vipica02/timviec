
<div id="navbar" class="navbar navbar-default ace-save-state">
	<div class="navbar-container ace-save-state" id="navbar-container">
		<div class="navbar-header pull-left">
			<a href="<?php echo admin_url('home'); ?>" class="navbar-brand">
				<small>
					DHT Admin
				</small>
			</a>
		</div>

		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<li class="purple dropdown-modal">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="ace-icon fa fa-bell icon-animated-bell"></i>
						<span class="badge badge-important"><?php if(!empty($total_empoyer)){ echo $total_empoyer; } ?></span>
					</a>
					<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
						<li class="dropdown-header">
							<i class="ace-icon fa fa-exclamation-triangle"></i>
							Thông báo
						</li>

						<li class="dropdown-content">
							<ul class="dropdown-menu dropdown-navbar navbar-pink">
								<?php if(!empty($total_empoyer)){?>
								<li>
									<a href="<?php echo admin_url('notifications'); ?>">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-pink fa fa-pencil-square-o"></i> Nhà tuyển dụng đăng kí mới
											</span>
											<span class="pull-right badge badge-info"><?php if(!empty($total_empoyer)) {echo '+'.$total_empoyer;} ?></span>
										</div>
									</a>
								</li>	
								<?php } ?>

							</ul>
						</li>

						<li class="dropdown-footer">
							<a href="<?php echo admin_url('employer');  ?>">
								See all notifications
								<i class="ace-icon fa fa-arrow-right"></i>
							</a>
						</li>
					</ul>
				</li>

				<li class="light-blue dropdown-modal">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<?php if($admin_info) {?>
						<?php echo $admin_info->sUserName ;?>
						</span>
						<?php } ?>
						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="<?php echo admin_url('admin/edit/'.$admin_info->id) ?>">
								<i class="ace-icon fa fa-user"></i>
								Thông tin
							</a>
						</li>
						<li>
							<a href="<?php echo admin_url('admin/logout'); ?>">
								<i class="ace-icon fa fa-power-off"></i>
								Đăng xuất
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div><!-- /.navbar-container -->
</div>