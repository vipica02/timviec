
<?php $this->load->view('nhatuyendung/head',$this->data) ?>
<div class="page-content">
<?php $this->load->view('nhatuyendung/caidat') ?>
	<div class="page-header">
		<h1>
			Người tìm việc
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Sửa công ty
			</small>
			
		</h1>

	</div><!-- /.page-header -->
	<?php $this->load->view('nhatuyendung/message'); ?>
	<form action="" method="post" enctype="multipart/form-data" class="form">
		<div class="row">
			<div class="col-xs-12 col-sm-4">
				<div class="widget-box">
					<div class="widget-header">
						<h4 class="widget-title">Mật khẩu</h4>
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
								<label for="form-field-1" class="control-label bolder blue">Email <span class="red"><?php echo form_error('email'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12 ">
											<input type="text" name="email"  value="<?php echo $jobseeker_info->sEmail; ?>" id="form-input-readonly" disabled="disabled"  placeholder="sangtran@gmail.com" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>
								<div class="space space-8"></div>
							</div>

							<div>
								<label for="form-field-1" class="control-label bolder blue">Password <span class="red"><?php echo form_error('password'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="password" id="form-input-readonly-1" disabled="disabled" name="password" placeholder="Pasword" value="" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>
								<div class="space space-8"></div>
							</div>

							<div>
								<label for="form-field-1" class="control-label bolder blue">Nhập lại password <span class="red"><?php echo form_error('re_password'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="password" id="form-input-readonly-2" disabled="disabled" name="re_password"  placeholder="Pasword" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>
								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-1" class="control-label bolder blue">Số điện thoại<span class="red"><?php echo form_error('re_password'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="form-input-readonly-3" disabled="disabled" name="stel" value="<?php echo $jobseeker_info->sPhone; ?>" placeholder="0984407771" class="col-md-12 col-xs-12">
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
						<h4 class="widget-title">Thông tin thêm</h4>
						
						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-up"></i>
							</a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main">

							<div>
								<label for="form-field-1" class="control-label bolder blue">Họ và tên <span class="red"><?php echo form_error('name'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="name"  name="name" placeholder="Họ và tên" value="<?php  echo  $jobseeker_info->sUserName; ?>" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
							</div>
							<div class="control-group">
								<label class="control-label bolder blue">Giới tính</label>
								<?php if($jobseeker_info->iGender==1){?>
								<div class="radio">
									<label>
										<input name="gender" type="radio" checked="checked" value="1" class="ace">
										<span class="lbl"> Nam</span>
									</label>
								</div>
								<div class="radio">
									<label>
										<input name="gender" type="radio" value="0" class="ace">
										<span class="lbl"> Nữ</span>
									</label>
								</div>	
								<?php
								}else if($jobseeker_info->iGender==0){?>
								<div class="radio">
									<label>
										<input name="gender" type="radio"  value="1" class="ace">
										<span class="lbl"> Nam</span>
									</label>
								</div>
								<div class="radio">
									<label>
										<input name="gender" type="radio" checked="checked" value="0" class="ace">
										<span class="lbl"> Nữ</span>
									</label>
								</div>	
								<?php
								} ?>
								
															
							</div>
							<div>
								<label for="id-date-picker-1" class="control-label bolder blue">Năm sinh <span class="red"><?php echo form_error('date_birth'); ?></span></label>
								<div class="row">
									<div class="col-md-12">
										<div class="input-group">
											<input class="form-control date-picker" id="date_birth" name="date_birth" value="<?php if($jobseeker_info->dBirthday){echo $jobseeker_info->dBirthday;}else{ echo set_value('date_birth'); }?>" type="text" data-date-format="mm-dd-yyyy">
											<span class="input-group-addon">
												<i class="fa fa-calendar bigger-110"></i>
											</span>
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
						<h4 class="widget-title">Thông tin thêm</h4>
						
						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-up"></i>
							</a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main">
							<div>
								<label for="form-field-2" class="control-label bolder blue">Avatar</label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<input type="file" id="id-input-file-2" name="image" />
									</div>
								</div>
								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-select-3" class="control-label bolder blue">Tỉnh/ Thành phố <span class="red"><?php echo form_error('scity'); ?></span></label>

								<br />
								<select class="chosen-select form-control" id="form-field-select-3"  name="scity" data-placeholder="<?php if(!$info){echo 'không tồn tại';}else{echo $info->sCityName;}  ?>">
									<option value="<?php echo $jobseeker_info->iCityID; ?>"></option>
									<?php 
										foreach ($list as  $value) {?>
										<option value="<?php  echo $value->id; ?>"><?php echo $value->sCityName; ?></option>
									<?php
									} ?>
								</select>
								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-1" class="control-label bolder blue">Địa chỉ<span class="red"><?php echo form_error('adress'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="adress" name="adress"  placeholder="Địa chỉ" value="<?php echo $jobseeker_info->sAddress; ?>"  class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>
								<div class="space space-8"></div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.span -->
			<div class="clearfix"></div>
		</div>
		
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

