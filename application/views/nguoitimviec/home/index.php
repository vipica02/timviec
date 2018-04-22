<div class="main-content-inner">
	<div class="page-content">
		<div class="page-header">
			<h1>
				Dashboard
				<small>
					<i class="ace-icon fa fa-angle-double-right"></i>
					Home
				</small>
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
				<div class="alert alert-block alert-success">
					<button type="button" class="close" data-dismiss="alert">
						<i class="ace-icon fa fa-times"></i>
					</button>

					<i class="ace-icon fa fa-check green"></i>

					Chào mừng các bạn đến với việc làm mới
					<strong class="green">
						<?php //($employer_info){echo $employer_info->sComName;} ?>
						<!-- <small>(Công ty luôn vững mạnh)</small> -->
					</strong>
				</div>

				<div class="row">
					<div class="space-6"></div>

					<div class="col-sm-7 infobox-container">
						<div class="infobox infobox-green">
							<div class="infobox-icon">
								<i class="ace-icon fa fa-street-view"></i>
							</div>

							<div class="infobox-data">
								<span class="infobox-data-number"><?php echo $tong; ?></span>
								<div class="infobox-content">Lượt xem hồ sơ</div>
							</div>

						</div>

					

						<div class="infobox infobox-pink">
							<div class="infobox-icon">
								<i class="ace-icon fa fa-shopping-cart"></i>
							</div>

							<div class="infobox-data">
								<span class="infobox-data-number"><?php echo $total; ?></span>
								<div class="infobox-content">Hồ sơ đã nộp</div>
							</div>
						</div>
						<div class="infobox infobox-blue">
							<div class="infobox-icon">
								<i class="ace-icon fa fa-twitter"></i>
							</div>

							<div class="infobox-data">
								<span class="infobox-data-number"><?php echo $total; ?></span>
								<div class="infobox-content">Hồ sơ đã nộp</div>
							</div>

						</div>
						<div class="space-6"></div>
					</div>
					
					<div class="vspace-12-sm"></div>
					<!-- cong viec -->

				
					<!-- end -->
					<div class="col-sm-5">
						<h1 class="red">
							<?php 
							if($total_job==0){
								echo 'Bạn chưa có hồ sơ nào';
							}else{
							 echo 'Hiện tại bạn đang có: '; echo $total_job; echo' hồ sơ ';} 
							?>
							<a href="<?php echo nguoitimviec_url('user_job/add_upload'); ?>" class="btn btn-primary">Tạo mới hồ sơ</a>
						</h1>
					</div><!-- /.col -->
				</div><!-- /.row -->
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->

						<div class="hr hr-18 hr-double dotted"></div>

						<div class="widget-box">
							<div class="widget-header widget-header-blue widget-header-flat">
								<h4 class="widget-title lighter">Công việc theo ngành nghề</h4>

							</div>

							<div class="widget-body">
								<div class="widget-main">
									
									 <div class="container">
									 	<div class="row">
									 		<div class="features">
									 			<?php if($list_career){
									 				$i=0;
									 				foreach ($list_career as  $value) {$i++;?>
									 				<div class="col-md-4 col-sm-6 " >
									 					<div class="feature-wrap">
									 						<a href="<?php echo base_url('jop/nganh_nghe/'.$value->id); ?>">
									 						<!-- <div class="infobox-icon">
									 							<i class="ace-icon fa<?php echo $value->sIcon; ?>"></i>
									 						</div>	 -->
									 						</a>

									 						<a href="<?php echo base_url('jop/nganh_nghe/'.$value->id); ?>">
									 							<h2><?php echo $value->sCareerName; ?></h2>
									 						</a>
									 						<h3><?php echo $value->sConten; ?></h3>
									 					</div>
									 				</div><!--/.col-md-4-->
									 				<?php if($i%3==0){?>
									 				<div class="clearfix"></div>
									 				<?php
									 			}?>
									 			<?php
									 		}
									 	} ?>

									 </div><!--/.services-->
									</div><!--/.row-->    
								</div><!--/.container-->
									<hr />

								</div><!-- /.widget-main -->
							</div><!-- /.widget-body -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->

						<div class="hr hr-18 hr-double dotted"></div>

						<div class="widget-box">
							<div class="widget-header widget-header-blue widget-header-flat">
								<h4 class="widget-title lighter">Công ty được đề xuất</h4>

							</div>

							<div class="widget-body">
								<div class="widget-main">
									
									<div class="container">
										<div class="row">
											<?php $i=0; foreach ($list_vip as $value) { $i++;?>
											<div class="col-sm-6 col-md-4">
												<div class="media services-wrap wow fadeInDown">
													<div class="pull-left col-md-4 col-sm-4 col-xs-4 ">
														<a href="<?php echo base_url('/jop/cong_viec/'.$value->id); ?>">
															<?php if($value->sLogo==''){?>
															<img class="img-responsive" src="<?php echo public_url('/backend/assets/images/avatars/profile-pic.jpg'); ?>">
															<?php
														}else{?>
														<img class="img-responsive" src="<?php echo base_url('/uploads/employer/'.$value->sLogo);?>">
														<?php
													} ?>
													
													
												</a>
											</div>
											<div class="media-body ">
												<a href="<?php echo base_url('/jop/cong_viec/'.$value->id); ?>">
													<h5 class="media-heading" style="color: #ed1c24;"><?php //echo $value->sJobTitle; ?></h5>
												</a>
												<a href="<?php echo base_url('/jop/viec_cong_ty/'.$value->id); ?>">
													<h5 class="media-heading"><?php echo $value->sComName; ?></h5>
												</a>
												<p><i class="fa fa-globe"></i><span> <?php echo $value->sWebsite; ?></span></p>
												<p><i class="fa  fa-home"></i><span> <?php echo $value->sAddress;?></span></p>
												<p style="color: red;"><i class="fa fa-envelope-o"></i><a href="<?php echo base_url('/jop/viec_cong_ty/'.$value->id); ?>"><span> Tuyển dụng</span></a></p>
											</div>
										</div>    
									</div>
									<?php if($i%3==0){?>
									<div class="clearfix"></div>
									<?php   
								} ?> 
								<?php
							} ?>
						</div><!--/.row-->   
							</div><!--/.container-->
							<hr />

						</div><!-- /.widget-main -->
					</div><!-- /.widget-body -->
				</div>
			</div><!-- /.col -->
		</div><!-- /.row -->
				<!-- PAGE CONTENT ENDS -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content -->
</div>