
<?php $this->load->view('admin/head',$this->data) ?>
<div class="page-content">
	<div class="page-header">
		<h1>
			Quản trị viên
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Thêm Người tìm việc
			</small>
			
		</h1>

	</div><!-- /.page-header -->
	<?php $this->load->view('admin/message'); ?>
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
											<input type="text" name="email"  value="<?php echo set_value('email'); ?>" id="form-input-readonly"  placeholder="sangtran@gmail.com" class="col-md-12 col-xs-12">
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
											<input type="password" id="form-input-readonly-1" name="password" placeholder="Pasword" value="<?php echo set_value('password'); ?>" class="col-md-12 col-xs-12">
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
											<input type="password" id="form-input-readonly-2" name="re_password"  placeholder="Pasword" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>
								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-1" class="control-label bolder blue">Số điện thoại<span class="red"><?php echo form_error('stel'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="form-input-readonly-3" name="stel" value="<?php echo set_value('stel'); ?>" placeholder="0984407771" class="col-md-12 col-xs-12">
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
											<input type="text" id="name"  name="name" placeholder="Họ và tên" value="<?php echo set_value('name'); ?>" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
							</div>
							<div class="control-group">
								<label class="control-label bolder blue">Giới tính</label>
								
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
								
							</div>
							<div>
								<label for="id-date-picker-1" class="control-label bolder blue">Năm sinh <span class="red"><?php echo form_error('date_birth'); ?></span></label>
								<div class="row">
									<div class="col-md-12">
										<div class="input-group">
											<input class="form-control date-picker" id="date_birth" name="date_birth" value="<?php echo set_value('date_birth'); ?>" type="text" data-date-format="mm-dd-yyyy">
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
								<select class="chosen-select form-control" id="form-field-select-3"  name="scity" data-placeholder="">
									<option value="<?php //echo $jobseeker_info->iCityID; ?>"></option>
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
											<input type="text" id="adress" name="adress"  placeholder="Địa chỉ" value="<?php echo set_value('adress'); ?>"  class="col-md-12 col-xs-12">
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

