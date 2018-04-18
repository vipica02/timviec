

<?php $this->load->view('nhatuyendung/nhatuyendung/head') ?>
<div class="page-content">
<?php $this->load->view('nhatuyendung/nhatuyendung/caidat') ?>
	<div class="page-header">
		<h1>
			Nhà tuyển dụng
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Thêm tin 
			</small>
			
		</h1>

	</div><!-- /.page-header -->
	<?php  ?>
	<form action="" method="post" enctype="multipart/form-data" class="form">
		<div class="row">
			<div class="col-xs-12 col-sm-4">
				<div class="widget-box">
					<div class="widget-header">
						<h4 class="widget-title">Thông tin</h4>
						
						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-up"></i>
							</a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main">

							<div>
								<label for="form-field-1" class="control-label bolder blue">Tiêu đề <span class="red"><?php echo form_error('title'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="title" name="title" placeholder="Tiêu đề" value="<?php echo $info->sJobTitle;?>" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
							</div>
							
							<div>
								<label for="form-field-1" class="control-label bolder blue">Số lượng cần tuyển <span class="red"><?php echo form_error('number'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="number" name="number" placeholder="Số lượng" value="<?php echo $info->sNumBer; ?>" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
							</div>
							<div>
								<div class="control-group">
									<label class="control-label bolder blue">Giới tính</label>
									<span class="red"><?php echo form_error('gender'); ?></span>
									
									<div class="radio">
										<label>
											<input name="gender" <?php if($info->iGender==2){echo 'checked="checked"';}?> type="radio" value="2" class="ace">
											<span class="lbl"> Không yêu cầu</span>
										</label>
									</div>	
									
									<div class="radio">
										<label>
											<input name="gender" <?php if($info->iGender==1){echo 'checked="checked"';}?> type="radio"  value="1" class="ace">
											<span class="lbl"> Nam</span>
										</label>
									</div>
									
									<div class="radio">
										<label>
											<input name="gender" <?php if($info->iGender==0){echo 'checked="checked"';}?> type="radio" value="0" class="ace">
											<span class="lbl"> Nữ</span>
										</label>
									</div>		
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.span -->
			<div class="col-xs-12 col-sm-4">
				<div class="widget-box">
					<div class="widget-header">
						<h4 class="widget-title">Thông tin</h4>
						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-up"></i>
							</a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main">
							<div>
								
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="control-group">
											<label for="form-field-8" class="control-label bolder blue">Mô tả công việc<span class="red"><?php echo form_error('JobContent'); ?></span></label>

											<textarea class="form-control" id="JobContent" name="JobContent" rows="4" placeholder="Giới thiệu về bản thân"><?php echo $info->sJobContent; ?></textarea>
										</div>
									</div>
								</div>
								<div class="space space-8"></div>
							</div>

							<div>
								
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="control-group">
											<label for="form-field-8" class="control-label bolder blue">Yêu cầu công việc<span class="red"><?php echo form_error('requireskill'); ?></span></label>

											<textarea rows="4" class="form-control" id="sequireskill" name="requireskill" placeholder="yêu cầu công việc"><?php echo $info->sRequireSkill; ?></textarea>
										</div>
									</div>
								</div>
								<div class="space space-8"></div>
							</div>
							
						</div>
					</div>

				</div>
			</div><!-- /.span -->
			<div class="col-xs-12 col-sm-4">
				<div class="widget-box">
					<div class="widget-header">
						<h4 class="widget-title">Thông tin </h4>
						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-up"></i>
							</a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main">
							<div>
								<label for="form-field-select-3" class="control-label bolder blue">Tính chất công việc <span class="red"><?php echo form_error('nature'); ?></span></label>

								<br />
								<select class="chosen-select form-control" id="form-field-select-3"  name="nature" data-placeholder="<?php if($info_naturework){echo $info_naturework->sNatureName;}else{echo 'không tồn tại';} ?>">
									<option value="<?php if($info_naturework){echo $info_naturework->id;} ?>"></option>
									<?php if($list){
										foreach ($list as $value) {?>
										<option value="<?php echo $value->id; ?>"><?php echo $value->sNatureName; ?></option>
									<?php
										}	
									} ?>
									
								</select>
								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-select-3" class="control-label bolder blue">Trình độ <span class="red"><?php echo form_error('diploma'); ?></span></label>

								<br />
								<select class="chosen-select form-control" id="form-field-select-3"  name="diploma" data-placeholder="<?php if($info_diploma){echo $info_diploma->sDiplomaName;}else{echo 'Không tồn tại';} ?>">
									<option value="<?php if($info_diploma){echo $info_diploma->id;}?>"></option>
									<?php if($list1){
										foreach ($list1 as $value) {?>
										<option value="<?php echo $value->id; ?>"><?php echo $value->sDiplomaName; ?></option>
									<?php		
										}
									} ?>
									

								</select>
								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-select-3" class="control-label bolder blue">Kinh nghiệm<span class="red"><?php echo form_error('experience'); ?></span></label>

								<br />
								<select class="chosen-select form-control" id="form-field-select-3"  name="experience" data-placeholder="<?php if($info_exp){echo $info_exp->sExperience_name;}else{ echo 'Không tồn tại';} ?>">
									<option value="<?php if($info_exp){echo $info_exp->id;} ?>"></option>
									<?php if($list2){
										foreach ($list2 as  $value) {?>
										<option value="<?php echo $value->id; ?>"><?php echo $value->sExperience_name; ?></option>
									<?php											
										}
									} ?>


								</select>
								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-select-3" class="control-label bolder blue">Mức lương <span class="red"><?php echo form_error('wage'); ?></span></label>
								<br />
								<select class="chosen-select form-control" id="form-field-select-3"  name="wage" data-placeholder="<?php if($info_wege){echo $info_wege->sWage_name;}else{echo 'Không tồn tại';}  ?>">
									<option value="<?php if($info_wege){echo $info_wege->id;}  ?>"></option>
									<?php if($list3){
										foreach ($list3 as  $value) {?>
										<option value="<?php echo $value->id; ?>"><?php echo $value->sWage_name; ?></option>
									<?php

										}

									} ?>
									

								</select>
								<div class="space space-8"></div>
							</div>
						</div>
					</div>

				</div>
			</div><!-- /.span -->
			<div class="clearfix"></div>

			<div class="col-xs-12 col-sm-4">
				<div class="widget-box">
					<div class="widget-header">
						<h4 class="widget-title">Thông tin </h4>
						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-up"></i>
							</a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main">
							<div>
								<label for="form-field-select-3" class="control-label bolder blue">Hình thức làm việc<span class="red"><?php echo form_error('formwork'); ?></span></label>

								<br />
								<select class="chosen-select form-control" id="form-field-select-3"  name="formwork" data-placeholder="<?php if($info_formwork){ echo $info_formwork->sFormWork;}else{echo 'Không tồn tại';} ?>">
									<option value="<?php if($info_formwork){ echo $info_formwork->id;} ?>"></option>
									<?php if($list4){
										foreach ($list4 as  $value) {?>
										<option value="<?php echo $value->id; ?>"><?php echo $value->sFormWork; ?></option>
									<?php

										}
									} ?>
									
								</select>
								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-select-3" class="control-label bolder blue">Thời gian thử việc <span class="red"><?php echo form_error('probationary'); ?></span></label>

								<br />
								<select class="chosen-select form-control" id="form-field-select-3"  name="probationary" data-placeholder="<?php if($info_probationary){echo $info_probationary->sProbationaryName;}else{echo 'Không tòn tại';} ?>">
									<option value="<?php if($info_probationary){echo $info_probationary->id;} ?>"></option>
									<?php if($list5){
										foreach ($list5 as  $value) {?>
										<option value="<?php echo $value->id; ?>"><?php echo $value->sProbationaryName; ?></option>
									<?php

										}

									} ?>
									

								</select>
								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-select-3" class="control-label bolder blue">Ngành nghề<span class="red"><?php echo form_error('career'); ?></span></label>

								<br />
								<select class="chosen-select form-control" id="form-field-select-3"  name="career" data-placeholder="<?php if($info_career){echo $info_career->sCareerName;}else{echo 'Không tồn tại';} ?>">
									<option value="<?php if($info_career){echo $info_career->id;} ?>"></option>
									<?php if($list6){
										foreach ($list6 as $value) {?>
										<option value="<?php echo $value->id; ?>"><?php echo $value->sCareerName; ?></option>
									<?php		
										}
									} ?>
								

								</select>
								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-1" class="control-label bolder blue">Nơi làm việc <span class="red"><?php echo form_error('workplace'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="workplace" name="workplace" placeholder="Nơi làm việc: Hà nội,..." value="<?php echo $info->sWorkPlace; ?>" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
							</div>
						</div>
					</div>

				</div>
			</div><!-- /.span -->

			<div class="col-xs-12 col-sm-4">
				<div class="widget-box">
					<div class="widget-header">
						<h4 class="widget-title">Thông tin </h4>
						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-up"></i>
							</a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main">
							<div>
								
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="control-group">
											<label for="form-field-8" class="control-label bolder blue">Quyền lợi <span class="red"><?php echo form_error('aboutright'); ?></span></label>

											<textarea class="form-control" id="aboutright" name="aboutright" rows="4" placeholder="Giới thiệu về bản thân"><?php echo $info->sAboutRight; ?></textarea>
										</div>
									</div>
								</div>
								<div class="space space-8"></div>
							</div>
							<div>
								<label for="id-date-picker-1" class="control-label bolder blue">Ngày hết hạn <span class="red"><?php echo form_error('date_expiration'); ?></span></label>
								<div class="row">
									<div class="col-md-12">
										<div class="input-group">
											<input class="form-control date-picker" id="date_expiration" name="date_expiration" value="<?php echo nice_date($info->dLastedDate,'d/m/y'); ?>" type="text" data-date-format="mm-dd-yyyy">
											<span class="input-group-addon">
												<i class="fa fa-calendar bigger-110"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="space space-8"></div>
							</div>

							<div>
								<label for="form-field-select-3" class="control-label bolder blue">Hiện thị tin<span class="red"><?php echo form_error('current'); ?></span></label>

								<br />
								<select class="chosen-select form-control" id="form-field-select-3"  name="current" data-placeholder="Choose a State...">
									<option value="1">Hiển thị</option>
									<option value="0">Ẩn tin</option>

								</select>
								<div class="space space-8"></div>
							</div>
						</div>
					</div>

				</div>
			</div><!-- /.span -->


			<div class="col-xs-12 col-sm-4">
				<div class="widget-box">
					<div class="widget-header">
						<h4 class="widget-title">Thông tin liên hệ </h4>
							
						<div class="widget-toolbar">
							<span class="help-inline col-xs-12 col-sm-7">
								<label class="middle">
									<input class="ace" type="checkbox" id="id-disable-check" />
									<span class="lbl"> </span>
								</label>
							</span>
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-up"></i>
							</a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main">
						
							<div>
								<label for="form-field-1" class="control-label bolder blue">Tên người liên hệ <span class="red"><?php echo form_error('name'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text"  name="name" placeholder="Họ và tên" id="form-input-readonly" disabled="disabled" value="<?php echo $employer_info->sContactName; ?>" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-1" class="control-label bolder blue">Email<span class="red"><?php echo form_error('email'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="form-input-readonly-1" disabled="disabled" name="email" placeholder="sangtrank64@gmai.com" value="<?php echo $employer_info->sContactEmail; ?>" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-1" class="control-label bolder blue">Địa chỉ<span class="red"><?php echo form_error('address'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="form-input-readonly-2" disabled="disabled" name="address" placeholder="Địa chỉ" value="<?php echo $employer_info->sAddress; ?>" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-1" class="control-label bolder blue">Điện thoại<span class="red"><?php echo form_error('phone'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="form-input-readonly-3" disabled="disabled" name="phone" placeholder="Số điện thoại" value="<?php echo $employer_info->sMobile; ?>" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
							</div>
							<input name="form-field-checkbox" type="checkbox" class="ace">
						</div>
					</div>

				</div>
			</div><!-- /.span -->



		</div>
		<br>
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<div class="widget-box">
					<div class="widget-header">
						<input type="submit" value="Lưu" class="btn btn-app btn-success pull-right">
					</div>
				</div>
			</div>	
		</div>
	</form>
</div>

