<!-- head -->

<div class="page-content">
	<?php $this->load->view('nhatuyendung/nhatuyendung/caidat.php'); ?>

	<div class="page-header">
		<h1>
			Quản trị viên
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				 Danh sách

			</small>
			
		</h1>
	</div><!-- /.page-header -->
 	<?php $this->load->view('nhatuyendung/message'); ?>
	<div class="row">
		<div>
			<div id="user-profile-1" class="user-profile row">
				<div class="col-xs-12 col-sm-2 center">
					<div>
						<span class="profile-picture">
							<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?php if(!empty($info_jobseeker) && $info_jobseeker->sImage !=''){echo base_url('/uploads/jobseeker/'.$info_jobseeker->sImage);} else { echo public_url('/backend/assets/images/avatars/profile-pic.jpg');} ?>" />
						</span>

						<div class="space-4"></div>

						<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
							<div class="inline position-relative">
								<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
									<i class="ace-icon fa fa-circle light-green"></i>
									&nbsp;
									<marquee><span class="white" ><?php //echo $info_jobseeker->sUserName; ?></span></marquee>
								</a>

								
							</div>
						</div>
					</div>

					<div class="space-6"></div>
				</div>

				<div class="col-xs-12 col-sm-10">
					
					<div class="profile-user-info profile-user-info-striped">
						<div class="col-xs-12 col-sm-6">
							<div class="profile-info-row">
								<div class="profile-info-name"> Họ và tên</div>

								<div class="profile-info-value">
									<span class="editable" id="username"><?php echo $info_jobseeker->sUserName; ?></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name"> Ngày sinh</div>

								<div class="profile-info-value">
									<span class="editable" id="username"><?php echo $info_jobseeker->dBirthday; ?></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name"> Giới tính</div>

								<div class="profile-info-value">
									<span class="editable" id="username"><?php if($info_jobseeker->iGender==1){echo 'Nam';}elseif($info_jobseeker->iGender==0){ echo 'Nữ';} ?></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name">Tỉnh/Thành phố</div>

								<div class="profile-info-value">
									<i class="fa fa-map-marker light-orange bigger-110"></i>

									<span class="editable" id="city"><?php if(empty($info_city)){echo 'Không tồn tại';}else{echo $info_city->sCityName;}  ?></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name"> Địa chỉ</div>

								<div class="profile-info-value">
									<i class="fa fa-map-marker light-orange bigger-110"></i>

									<span class="editable" id="city"><?php echo $info_jobseeker->sAddress; ?></span>
								</div>
							</div>

							<div class="profile-info-row">
								<div class="profile-info-name">Số điện thoại </div>

								<div class="profile-info-value">
									<span class="editable" id="age"><?php echo $info_jobseeker->sPhone; ?></span>
								</div>
							</div>

							<div class="profile-info-row">
								<div class="profile-info-name"> Email </div>

								<div class="profile-info-value">
									<span class="editable" id="signup"><?php echo $info_jobseeker->sEmail; ?></span>
								</div>
							</div>

						</div>
						<div class="col-xs-12 col-sm-6">
							<div class="profile-info-row">
								<div class="profile-info-name">Hồ sơ</div>

								<div class="profile-info-value">
									<span class="editable" id="login"><?php echo $info_jop->sJobTitle; ?></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name">Lương yêu cầu</div>

								<div class="profile-info-value">
									<span class="editable" id="login"><?php echo number_format($info_jop->sWage).' VND'; ?></span>
								</div>
							</div>

							<div class="profile-info-row">
								<div class="profile-info-name">Kinh nghiệm </div>

								<div class="profile-info-value">
									<span class="editable" id="about"><?php echo $info_exp->sExperience_name; ?></span>
								</div>
							</div>
							<div class="profile-info-row">
							<div class="profile-info-name">Trình độ</div>

								<div class="profile-info-value">
									<span class="editable" id="about"><?php echo $info_diploma->sDiplomaName; ?></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name">Nơi làm việc</div>
								<div class="profile-info-value">
									<span class="editable" id="about"><?php echo  $info_city_2->sCityName;?></span>
								</div>
								
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name">Ngành nghề </div>

								<div class="profile-info-value">
									<span class="editable" id="about"><?php echo $info_career->sCareerName; ?></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name">Tải hồ sơ </div>

								<div class="profile-info-value">
									<span class="editable" id="about"><a class="btn btn-primary btn-xs" href="<?php echo nhatuyendung_url('notification/download/'.$info_jop->sFileName);?>">Download</a></span>
								</div>
							</div>
						
						</div>
					</div>

				</div>
			</div>
		</div>
	</div><!-- /.row -->
</div><!-- /.page-content -->
