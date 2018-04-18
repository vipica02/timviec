   <section id="services" class="service-item">
	   <div class="container">
            <div class="center wow fadeInDown">
                <h2><?php echo $info_job->sJobTitle;?></h2>
                <p class="lead"><i class="glyphicon  glyphicon-time"></i> 
                <?php echo nice_date($info_job->sDatePost, 'd/m/y'); ?> | <span>Lượt xem: <?php echo $info_job->iHitview; ?></span></p>

            </div>

            <div class="row">
				<div class="col-sm-12 col-md-12">
					<?php $this->load->view('site/message'); ?>
					<div class="media services-wrap wow fadeInDown">
						<div class="col-md-8">
							<div class="media-body ">
								<h3 class="media-heading" style="color: #ed1c24;"><?php echo'Họ và tên: '.$info_jobseeker->sUserName; ?></h3>
								<p>
								<h4 class="media-heading">Ngày sinh: <?php echo   nice_date($info_jobseeker->dBirthday,'d/m/y');  ?></h4></p>
								<?php if($info_jobseeker->iGender==1){?>
								<p>
									<h4 class="media-heading">Giới tính: <?php echo 'Nam';  ?></h4></p>
								<?php
								}else{?>
								<p>
								<h4 class="media-heading">Giới tính: <?php echo 'Nữ';  ?></h4></p>
								<?php

								} ?>
								<p>
								<h4 class="media-heading">Thành phố: <?php if(!$info_city){echo 'không tồn tại';}else{echo $info_city->sCityName;  }?></h4></p>
								<p>
								<h4 class="media-heading">Đia chỉ: <?php echo $info_jobseeker->sAddress;  ?></h4></p>
								<p>
								<h4 class="media-heading">Email: <?php echo $info_jobseeker->sEmail;  ?></h4></p>
								<p>
								<h4 class="media-heading">Số điện thoại: <?php echo $info_jobseeker->sPhone;  ?></h4></p>
								<br>
								<span class="col-md-6 wow fadeInDown animated">
									<p>- Mức lương yêu cầu: <?php echo number_format( $info_job->sWage).' VNĐ'; ?></p>
									<p>- Kinh nghiệm: <?php if(!$info_exp){echo 'Không tồn tại';}else{ echo $info_exp->sExperience_name; }?></p>
									<p>- Trình độ: <?php if(!$info_diploma){echo 'Không tồn tại';}else{echo $info_diploma->sDiplomaName;}
									?>
									</p>
									<p>- Nơi làm việc mong muốn : <?php if(!$info_workplace){echo 'Không tồn tại';}else{ echo $info_workplace->sCityName;}  ?></p>
									
								</span>
								<span class="col-md-6 wow fadeInDown animated">
									<p style="color: red;">- Giới tính: <?php if($info_jobseeker->iGender==0){echo 'Nữ';}else if($info_jobseeker->iGender==1){echo 'Nam';} ?></p>
									<p>- Tính chất công việc: Giờ hành chính</p>
									<p>- Ngành nghề: <?php if(!$info_career){echo 'Không tồn tại';}else{ echo $info_career->sCareerName;} ?></p>
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
											<td><p style="color: red;">Hồ sơ</p></td>
											<td>
												<span >Ngày đăng:  <?php echo nice_date($info_job->sDatePost, 'd/m/y'); ?></span>

												<a href="<?php echo base_url('/jop/download/'.$info_job->sFileName);?>"><input type="submit" class="btn btn-primary pull-right" value="Download"></a>
											</td>
										</tr>
									</tbody>
								</table>
								
							</div>
						</div>
						<div class="col-md-4">
							<div class="single-profile-top wow fadeInDown animated">
							<?php //if($info_company->sLogo==''){?>
							<img class="img-responsive text-center" src="<?php echo public_url('/backend/assets/images/avatars/profile-pic.jpg'); ?>">
							<?php
						//} else{?>
<!-- 							<img class="img-responsive text-center" src="<?php echo base_url('uploads/employer/'.$info_company->sLogo); ?>"> -->
							<?php					
							//} ?>
								
								<br>
								<br>
								<h3><?php //echo $info_company->sComName; ?></h3>
								<span>Địa chỉ: <?php echo $info_jobseeker->sAddress; ?></span>
							</div>
							<div class="space space-8"></div>
							<div class="single-profile-top wow fadeInDown animated">
								<!-- <h3>TÌm kiếm</h3>
								<form action="">
									<div>
										<label for="form-field-select-3" class="control-label bolder blue">Quy mô <span class="red"><?php //echo form_error('sscale'); ?></span></label>

										<br />
										<select class="chosen-select form-control" id="form-field-select-3" name="sscale" data-placeholder="Chọn quy mô" >
											<option value="<?php //echo set_value('sscale'); ?>"></option>   
											<option value="<?php //echo $value->id; ?>"><?php //echo $value->sScale_Name; ?></option>
											<?php
	                                          // } ?>

	                                      </select>

	                                      <div class="space space-8"></div>
	                                </div>
	                                <div>
										<label for="form-field-select-3" class="control-label bolder blue">Quy mô <span class="red"><?php //echo form_error('sscale'); ?></span></label>

										<br />
										<select class="chosen-select form-control" id="form-field-select-3" name="sscale" data-placeholder="Chọn quy mô" >
											<option value="<?php //echo set_value('sscale'); ?>"></option>   
											<option value="<?php //echo $value->id; ?>"><?php //echo $value->sScale_Name; ?></option>
											<?php
	                                          // } ?>

	                                      </select>

	                                      <div class="space space-8"></div>
	                                </div>
	                                <div>
										<label for="form-field-select-3" class="control-label bolder blue">Quy mô <span class="red"><?php //echo form_error('sscale'); ?></span></label>

										<br />
										<select class="chosen-select form-control" id="form-field-select-3" name="sscale" data-placeholder="Chọn quy mô" >
											<option value="<?php //echo set_value('sscale'); ?>"></option>   
											<option value="<?php //echo $value->id; ?>"><?php //echo $value->sScale_Name; ?></option>
											<?php
	                                          // } ?>

	                                      </select>

	                                      <div class="space space-8"></div>
	                                </div>
	                                <div>
										<label for="form-field-select-3" class="control-label bolder blue">Quy mô <span class="red"><?php //echo form_error('sscale'); ?></span></label>

										<br />
										<select class="chosen-select form-control" id="form-field-select-3" name="sscale" data-placeholder="Chọn quy mô" >
											<option value="<?php //echo set_value('sscale'); ?>"></option>   
											<option value="<?php //echo $value->id; ?>"><?php //echo $value->sScale_Name; ?></option>
											<?php
	                                          // } ?>
	                                      </select>
	                                      <div class="space space-8"></div>
	                                </div>
	                                <div>
	                                	<input type="submit" class="btn btn-primary " value="Tìm kiếm">
	                                </div>
								</form> -->
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