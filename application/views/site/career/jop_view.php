   <section id="services" class="service-item">
	   <div class="container">
            <div class="center wow fadeInDown">
                <h2><?php echo $info->sJobTitle;?></h2>
                <p class="lead"><i class="glyphicon  glyphicon-time"></i> 
                <?php echo nice_date($info->dDatePosted, 'd/m/y'); ?> | <span>Lượt xem: <?php echo $info->iHitView; ?></span></p>

            </div>

            <div class="row">
				<div class="col-sm-12 col-md-12">
					<?php $this->load->view('site/message'); ?>
					<div class="media services-wrap wow fadeInDown">
						<div class="col-md-8">
							<div class="media-body ">
								<h3 class="media-heading" style="color: #ed1c24;"><?php echo $info_company->sComName; ?></h3>
								<h4 class="media-heading">Đia chỉ: <?php echo $info_company->sAddress;  ?></h4>
								<br>
								<span class="col-md-6 wow fadeInDown animated">
									<p>- Mức lương: <?php if(!$info_wage){echo 'Không tồn tại';}else{echo $info_wage->sWage_name;} ?></p>
									<p>- Kinh nghiệm: <?php if(!$info_exp){echo 'Không tồn tại';}else{ echo $info_exp->sExperience_name; }?></p>
									<p>- Trình độ: <?php if(!$info_diploma){echo 'Không tồn tại';}else{echo $info_diploma->sDiplomaName;}
									?>
									</p>
									<p>- Nơi làm việc: <?php echo $info->sWorkPlace; ?></p>
									<p>- Ngành nghề: <?php if(!$info_career){echo 'Không tồn tại';}else{ echo $info_career->sCareerName;} ?></p>
								</span>
								<span class="col-md-6 wow fadeInDown animated">
									
									<p style="color: red;">- Số lượng tuyển dụng: 
									<?php if($info->sNumBer!=''){echo $info->sNumBer;}else{echo '0';} ?></p>
									<p>- Giới tính: <?php if($info->iGender==0){echo 'Nữ';}else if($info->iGender==1){echo 'Nam';}else{echo 'Không yêu cầu';} ?></p>
									<p>- Tính chất công việc:<?php if(!$info_naturework){echo 'Không tồn tại';}else{echo $info_naturework->sNatureName;} ?></p>
									<p>- Hình thức làm việc: <?php if(!$info_formwork){echo 'Không tồn tại';}else{echo $info_formwork->sFormWork;} ?></p>
									<p>- Tỉnh/ Thành phố(Công ty): <?php if(!$info_city){echo 'Không tồn tại';}else{echo $info_city->sCityName; } ?></p>
								</span>
								<div class="clearfix"></div>
								<table  class="table table-striped table-bordered table-hover wow fadeInDown animated">
									<thead>
										<tr>

											<th width="100px;">Tiêu đề</th>
											<th>Nội dung</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Mô tả</td>
											<td>
											
												<?php echo $info->sJobContent; ?>
										
											</td>
										</tr>
										<tr>
											<td>Yêu cầu</td>
											<td>
												<?php echo $info->sRequireSkill; ?>
											</td>
										</tr>
										<tr>
											<td>Quyền lợi</td>
											<td>
												<?php echo $info->sAboutRight; ?>
											</td>
										</tr>
										<tr>
											<td ><p style="color: red;">Hạn nộp</p></td>
											<td >
												<p style="color: red;"><?php echo $info->dLastedDate;  ?></p>
											</td>
										</tr>
										<tr>
											<td >Website</td>
											<td >
												<p><?php echo $info_company->sWebsite;  ?></p>
											</td>
										</tr>
										<tr>
											<td>Hình thức nộp</td>
											<td>
												<span >Hình thức nộp</span>
												<a href="<?php if(!empty($jobseeker_info)){echo base_url('nguoitimviec/user_jobseeker/submit/'.$info->id);}else{ echo base_url('nguoitimviec/user2_login');} ?>"><input type="submit" class="btn btn-primary pull-right" value="Nộp hồ sơ"></a>
											</td>
										</tr>
									</tbody>
								</table>
								<h3 class="media-heading" style="color: #ed1c24;">Thông tin liên hệ</h3>
								<table  class="table table-striped table-bordered table-hover wow fadeInDown animated">
									<thead>
										<tr>
											
											<th width="100px;">Tiêu đề</th>
											<th>Nội dung</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Tên người liên hệ</td>
											<td><?php echo $info_company->sContactName; ?></td>
										</tr>
										<tr>
											<td>Email</td>
											<td><?php echo $info_company->sContactEmail; ?></td>
										</tr>
										<tr>
											<td>Số diện thoại</td>
											<td><?php echo $info_company->sMobile; ?></td>
										</tr>
										<tr>
											<td>Hình thức nộp</td>
											<td>
												<span >Hình thức nộp</span>
												<a href="<?php if(!empty($jobseeker_info)){echo base_url('nguoitimviec/user_jobseeker/submit/'.$info->id);}else{ echo base_url('nguoitimviec/user2_login');} ?>"><input type="submit" class="btn btn-primary pull-right" value="Nộp hồ sơ"></a>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-md-4">
							<div class="single-profile-top wow fadeInDown animated">
							<?php if($info_company->sLogo==''){?>
							<img class="img-responsive text-center" src="<?php echo public_url('/backend/assets/images/avatars/profile-pic.jpg'); ?>">
							<?php
							} else{?>
							<img class="img-responsive text-center" src="<?php echo base_url('uploads/employer/'.$info_company->sLogo); ?>">
							<?php					
							} ?>
								
								<br>
								<br>
								<h3><?php echo $info_company->sComName; ?></h3>
								<span>Địa chỉ: <?php echo $info_company->sAddress; ?></span>
							</div>
							<div class="space space-8"></div>
							<div class="single-profile-top wow fadeInDown animated">
								<h3>Tìm kiếm</h3>
								<form  action="<?php echo base_url('search/search'); ?>" method="get">
									<div>
										<label for="form-field-select-3" class="control-label bolder blue">Bằng cấp <span class="red"><?php // echo form_error('sscale'); ?></span></label>

										<br />
										<select class="chosen-select form-control" id="form-field-select-3" name="diploma" data-placeholder="Chọn bằng cấp" >
											<option value="<?php //echo set_value('sscale'); ?>"></option>   
											<?php foreach ($list_diploma as  $value) {?>
												<option value="<?php echo $value->id; ?>"><?php echo $value->sDiplomaName; ?></option>
											<?php
												
											} ?>
							
	                                      </select>

	                                      <div class="space space-8"></div>
	                                </div>
	                                <div>
										<label for="form-field-select-3" class="control-label bolder blue">Lương tháng <span class="red"><?php //echo form_error('sscale'); ?></span></label>

										<br />
										<select class="chosen-select form-control" id="form-field-select-3" name="wege" data-placeholder="Chọn tiền lương" >
											<option value="<?php //echo set_value('sscale'); ?>"></option>  
											<?php foreach ($list_wege as  $value) {?>
										
											<option value="<?php echo $value->id; ?>"><?php echo $value->sWage_name; ?></option>
											<?php
	                                          } ?>

	                                      </select>

	                                      <div class="space space-8"></div>
	                                </div>
	                                <div>
										<label for="form-field-select-3" class="control-label bolder blue">Thành phố<span class="red"><?php //echo form_error('sscale'); ?></span></label>

										<br />
										<select class="chosen-select form-control" id="form-field-select-3" name="city" data-placeholder="Chọn thành phố" >
											<option value="<?php //echo set_value('sscale'); ?>"></option>   
											<?php foreach ($list_city as $value) { ?>
											<option value="<?php echo $value->id; ?>"><?php echo $value->sCityName; ?></option>
											<?php
	                                           } ?>

	                                      </select>

	                                      <div class="space space-8"></div>
	                                </div>
	                                <div>
										<label for="form-field-select-3" class="control-label bolder blue">Ngành nghề <span class="red"><?php //echo form_error('sscale'); ?></span></label>

										<br />
										<select class="chosen-select form-control" id="form-field-select-3" name="career" data-placeholder="Chọn ngành nghề" >
											<option value="<?php //echo set_value('sscale'); ?>"></option>   
											<?php foreach ($list_career as  $value) { ?>
											<option value="<?php echo $value->id; ?>"><?php echo $value->sCareerName; ?></option>
											<?php
	                                          } ?>
	                                      </select>
	                                      <div class="space space-8"></div>
	                                </div>
	                                <div>
	                                	<input type="submit" class="btn btn-primary " value="Tìm kiếm">
	                                </div>
								</form>
							</div>							
						</div>
					</div>
				</div>
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

    <script src="<?php echo public_url() ?>/backend/assets/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/ace.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/chosen.jquery.min.js"></script>
<script type="text/javascript">
    jQuery(function($) {
        if(!ace.vars['touch']) {
            $('.chosen-select').chosen({allow_single_deselect:true}); 
            //resize the chosen on window resize
    
            $(window)
            .off('resize.chosen')
            .on('resize.chosen', function() {
                $('.chosen-select').each(function() {
                     var $this = $(this);
                     $this.next().css({'width': $this.parent().width()});
                })
            }).trigger('resize.chosen');
            //resize chosen on sidebar collapse/expand
            $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
                if(event_name != 'sidebar_collapsed') return;
                $('.chosen-select').each(function() {
                     var $this = $(this);
                     $this.next().css({'width': $this.parent().width()});
                })
            });
    
    
            $('#chosen-multiple-style .btn').on('click', function(e){
                var target = $(this).find('input[type=radio]');
                var which = parseInt(target.val());
                if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
                 else $('#form-field-select-4').removeClass('tag-input-style');
            });
        }
    });
</script>