
<?php $this->load->view('nhatuyendung/nhatuyendung/head',$this->data) ?>
<div class="page-content">
<?php $this->load->view('nhatuyendung/caidat') ?>
	<div class="page-header">
		<h1>
		Nhà tuyển dụng
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Sửa tài khoản
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
											<input type="text" name="email"  value="<?php echo $employer_info->sEmail; ?>" id="email"  placeholder="sangtran@gmail.com" class="col-md-12 col-xs-12">
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
											<input type="password" id="password" name="password" placeholder="Pasword" value="" class="col-md-12 col-xs-12">
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
											<input type="password" id="re_password" name="re_password"  placeholder="Pasword" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>
								<div class="space space-8"></div>
							</div>
							
							<div>
								<label for="form-field-2" class="control-label bolder blue">Logo</label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<input type="file" id="id-input-file-2" name="image" />
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
						<h4 class="widget-title">Thông tin công ty</h4>
						
						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-up"></i>
							</a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main">

							<div>
								<label for="form-field-1" class="control-label bolder blue">Tên công ty <span class="red"><?php echo form_error('scomname'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="scomname"  name="scomname" placeholder="Tên công ty" value="<?php  echo $employer_info->sComName; ?>" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-1" class="control-label bolder blue">Địa chỉ<span class="red"><?php echo form_error('saddress'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="saddress" name="saddress" placeholder="Địa chỉ" value="<?php echo $employer_info->sAddress;?>" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-1" class="control-label bolder blue">Điện thoại<span class="red"><?php echo form_error('stel'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="stel" name="stel" placeholder="Số điện thoại" value="<?php echo $employer_info->sTel; ?>" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
							</div>

							<div>
								<label for="form-field-select-3" class="control-label bolder blue">Tỉnh/ Thành phố <span class="red"><?php echo form_error('sscale'); ?></span></label>

								<br />
								<select class="chosen-select form-control" id="form-field-select-3"  name="scity" data-placeholder="<?php echo $info->sCityName; ?>">
									<option value="<?php echo $info->id; ?>"></option>
									<?php 
										foreach ($list as  $value) {?>
										<option value="<?php  echo $value->id; ?>"><?php echo $value->sCityName; ?></option>
									<?php
									} ?>
									
								</select>
								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-1" class="control-label bolder blue">Website<span class="red"><?php echo form_error('website'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="website" name="website"  placeholder="Website" value="<?php echo $employer_info->sWebsite; ?>"  class="col-md-12 col-xs-12">
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
						<h4 class="widget-title">Thông tin công ty</h4>
						
						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-up"></i>
							</a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main">

							<div>
									<label for="form-field-select-3" class="control-label bolder blue">Quy mô <span class="red"><?php echo form_error('sscale'); ?></span></label>

									<br />
									<select class="chosen-select form-control" id="form-field-select-3" name="sscale" data-placeholder="<?php echo $info2->sScale_Name; ?>">
										<option value="<?php echo $info2->id; ?>"></option>
										<?php 
										foreach ($list1 as  $value) {?>
										<option value="<?php echo $value->id; ?>"><?php echo $value->sScale_Name; ?></option>
										<?php
									} ?>

								</select>

								<div class="space space-8"></div>
							</div>

							<div>
								<label for="form-field-1" class="control-label bolder blue">Sơ lược về công ty<span class="red"><?php echo form_error('sprofile'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
										<textarea name="sprofile" id="sprofile" cols="30" rows="6" class="col-md-12 col-xs-12"  placeholder="Sơ lược về công ty"><?php echo $employer_info->sProfile;?></textarea>
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-1" class="control-label bolder blue">Fax<span class="red"><?php echo form_error('sfax'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="sfax" name="sfax" placeholder="Fax" value="<?php echo $employer_info->sFax; ?>" class="col-md-12 col-xs-12">
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
			<div class="col-xs-12 col-sm-4">
				<div class="widget-box">
					<div class="widget-header">
						<h4 class="widget-title">Thông tin liên hệ</h4>
						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-up"></i>
							</a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main">
							<div>
								<label for="form-field-1" class="control-label bolder blue">Thông tin người liên hệ<span class="red"><?php echo form_error('scontactname'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="scontactname" name="scontactname" placeholder="Thông tin người liên hệ" value="<?php  echo $employer_info->sContactName; ?>" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-1" class="control-label bolder blue">Email<span class="red"><?php echo form_error('semailcontact'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="semailcontact" name="semailcontact" placeholder="Email" value="<?php echo $employer_info->sContactEmail;?>" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-1" class="control-label bolder blue">Số điện thoại người liên hệ<span class="red"><?php echo form_error('snumecontact'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="snumecontact" name="snumecontact" placeholder="Số điện thoại" value="<?php echo $employer_info->sMobile; ?>" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
							</div>
						
						</div>
					</div>

				</div>
			</div><!-- /.span -->
	
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

