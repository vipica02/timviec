
<div id="navbar" class="navbar navbar-default ace-save-state">
	<div class="navbar-container ace-save-state" id="navbar-container">
		<div class="navbar-header pull-left">
			<a href="<?php echo nguoitimviec_url('home'); ?>" class="navbar-brand">
				<small>
					Người tìm việc
				</small>
			</a>
		</div>

		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<li class="purple dropdown-modal">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="ace-icon fa fa-bell icon-animated-bell"></i>
						<span class="badge badge-important"><?php if(!empty($total_head)){echo $total_head;}  ?></span>
					</a>

					<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
						<li class="dropdown-header">
							<i class="ace-icon fa fa-exclamation-triangle"></i>
							<?php if(!empty($total_head)){echo $total_head;} ?> Thông báo
						</li>

						<li class="dropdown-content">
							<ul class="dropdown-menu dropdown-navbar navbar-pink">
								<?php $i=0;foreach ($list_ll as  $value) {$i++;?>
								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
												<?php if(!empty($info_job_list[$i-1])){echo $info_job_list[$i-1]->sComName;} ?>
											</span>
											<span class="pull-right badge badge-info"><?php if($value->iResumeID==1){ echo 'Đã xem';} ?></span>
										</div>
									</a>

								</li>
								<?php
								
								} ?>
								
							</ul>
						</li>

						<li class="dropdown-footer">
							<a href="<?php echo nguoitimviec_url('notification'); ?>">
								See all notifications
								<i class="ace-icon fa fa-arrow-right"></i>
							</a>
						</li>
					</ul>
				</li>

				<li class="light-blue dropdown-modal">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<?php if($jobseeker_info){?>
						<span class="user-info">
							<?php echo $jobseeker_info->sUserName;?>
						</span>
						<?php
						} ?>
						<i class="ace-icon fa fa-caret-down"></i>
					</a>
					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="<?php echo nguoitimviec_url('user_jobseeker/edit'); ?>">
								<i class="ace-icon fa fa-user"></i>
								Thông tin
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="<?php echo nguoitimviec_url('user_jobseeker/logout'); ?>">
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