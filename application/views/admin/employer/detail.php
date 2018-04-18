<!-- head -->

<div class="page-content">
	<?php $this->load->view('admin/admin/caidat.php'); ?>

	<div class="page-header">
		<h1>
			Quản trị viên
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				 Danh sách

			</small>
			
		</h1>
	</div><!-- /.page-header -->
 	<?php $this->load->view('admin/message'); ?>
	<div class="row">
		<div>
			<div id="user-profile-1" class="user-profile row">
				<div class="col-xs-12 col-sm-3 center">
					<div>
						<span class="profile-picture">
							<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?php if(!empty($info) && $info->sLogo !=''){echo base_url('/uploads/employer/'.$info->sLogo);} else { echo public_url('/backend/assets/images/avatars/profile-pic.jpg');} ?>" />
						</span>

						<div class="space-4"></div>

						<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
							<div class="inline position-relative">
								<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
									<i class="ace-icon fa fa-circle light-green"></i>
									&nbsp;
									<marquee><span class="white" ><?php echo $info->sComName; ?></span></marquee>
								</a>

								
							</div>
						</div>
					</div>

					<div class="space-6"></div>
				</div>

				<div class="col-xs-12 col-sm-9">
					
					<div class="profile-user-info profile-user-info-striped">
						<div class="profile-info-row">
							<div class="profile-info-name"> Tên công ty </div>

							<div class="profile-info-value">
								<span class="editable" id="username"><?php echo $info->sComName; ?></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name">Tỉnh/Thành phố</div>

							<div class="profile-info-value">
								<i class="fa fa-map-marker light-orange bigger-110"></i>
								
								<span class="editable" id="city"><?php echo $info_city->sCityName; ?></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name"> Địa chỉ</div>

							<div class="profile-info-value">
								<i class="fa fa-map-marker light-orange bigger-110"></i>
								
								<span class="editable" id="city"><?php echo $info->sAddress; ?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name">Số điện thoại </div>

							<div class="profile-info-value">
								<span class="editable" id="age"><?php echo $info->sTel; ?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> Email </div>

							<div class="profile-info-value">
								<span class="editable" id="signup"><?php echo $info->sEmail; ?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name">Fax</div>

							<div class="profile-info-value">
								<span class="editable" id="login"><?php echo $info->sFax; ?></span>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name">Website </div>

							<div class="profile-info-value">
								<span class="editable" id="about"><?php echo $info->sWebsite; ?></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name">Quy mô công ty</div>

							<div class="profile-info-value">
								<span class="editable" id="about"><?php echo $info_cale->sScale_Name; ?></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name">Giấy phép kinh doanh </div>

							<div class="profile-info-value">
								<span class="editable" id="about"><a class="btn btn-primary btn-xs" href="<?php echo admin_url('employer/download/'.$info->sLink_Upload);?>">Download</a></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name">Số lượng hồ sơ </div>

							<div class="profile-info-value">
								<span class="editable" id="about"><?php if(!empty($total_strustworthy)){echo $total_strustworthy;}else{echo '0';} ?></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name">Tên người liên hệ </div>

							<div class="profile-info-value">
								<span class="editable" id="about"><?php echo $info->sContactName; ?></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name">SDT liên hệ</div>

							<div class="profile-info-value">
								<span class="editable" id="about"><?php echo $info->sMobile; ?></span>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name">Email liên hệ</div>

							<div class="profile-info-value">
								<span class="editable" id="about"><?php echo $info->sContactEmail; ?></span>
							</div>
						</div>
						
						<!-- <div class="profile-info-row">
							<div class="profile-info-name">Số lượng hồ sơ </div>

							<div class="profile-info-value">
								<span class="editable" id="about">Editable as WYSIWYG</span>
							</div>
						</div> -->
					</div>


				</div>
			</div>
		</div>
	</div><!-- /.row -->
</div><!-- /.page-content -->
