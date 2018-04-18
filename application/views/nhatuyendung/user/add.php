
<?php $this->load->view('nhatuyendung/nhatuyendung/head',$this->data) ?>
<div class="page-content">
<?php $this->load->view('nhatuyendung/nhatuyendung/caidat') ?>
	<div class="page-header">
		<h1>
			Quản trị viên
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Thêm nhân viên
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
								<label for="form-field-1" class="control-label bolder blue">Họ và tên <span class="red"><?php echo form_error('name'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="name" name="name" placeholder="Họ và tên" value="<?php echo set_value('name'); ?>" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
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
							<div>
								<label for="form-field-2" class="control-label bolder blue">Ảnh</label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<input type="file" id="id-input-file-2" name="image" />
									</div>
								</div>
								<div class="space space-8"></div>
							</div>
							<div>
								<label for="id-date-picker-1" class="control-label bolder blue">Ngày vào làm <span class="red"><?php echo form_error('date_do'); ?></span></label>
								<div class="row">
									<div class="col-md-12">
										<div class="input-group">
											<input class="form-control date-picker" id="date_do" name="date_do" type="text" value="<?php echo set_value('date_do'); ?>" data-date-format="mm-dd-yyyy">
											<span class="input-group-addon">
												<i class="fa fa-calendar bigger-110"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-3" class="control-label bolder blue">Địa chỉ</label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" name="address" value="<?php echo set_value('address'); ?>" id="address" placeholder="Địa chỉ" class="col-md-12 col-xs-12">
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
								<label for="form-field-2" class="control-label bolder blue">Username <span class="red"><?php echo form_error('username'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="username" value="<?php echo set_value('username'); ?>" name="username" placeholder="Username" class="col-md-12 col-xs-12">
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
											<input type="password" id="password" name="password" placeholder="Pasword" value="<?php echo set_value('password'); ?>" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>
								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-1" class="control-label bolder blue">Password <span class="red"><?php echo form_error('re_password'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="password" id="password" name="re_password"  placeholder="Pasword" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>
								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-1" class="control-label bolder blue">Email <span class="red"><?php echo form_error('email'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12 ">
											<input type="text" name="email"  value="<?php echo set_value('email'); ?>" id="email" placeholder="sangtran@gmail.com" class="col-md-12 col-xs-12">
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
							<div class="control-group">
								<label class="control-label bolder blue">Giới tính</label>

								<div class="radio">
									<label>
										<input name="sex" type="radio" value="1" class="ace">
										<span class="lbl"> Nam</span>
									</label>
								</div>

								<div class="radio">
									<label>
										<input name="sex" type="radio" value="0" class="ace">
										<span class="lbl"> Nữ</span>
									</label>
								</div>								
							</div>

							<div class="control-group">
								<label class="control-label bolder blue">Chức vụ</label>

								<div class="checkbox">
									<label>
										<input name="position" value="1" type="checkbox" class="ace">
										<span class="lbl"> Quản trị viên</span>
									</label>
								</div>

								<div class="checkbox">
									<label>
										<input name="position" value="0" type="checkbox" class="ace">
										<span class="lbl"> Nhân viên</span>
									</label>
								</div>
							</div>
							<div class="control-group">
								<label for="form-field-8 bolder blue">Bản thân</label>

								<textarea class="form-control" id="about_me" name="aboutme" placeholder="Giới thiệu về bản thân"></textarea>
							</div>
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

