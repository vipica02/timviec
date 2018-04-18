
<?php $this->load->view('nguoitimviec/head',$this->data) ?>
<div class="page-content">
<?php $this->load->view('nguoitimviec/caidat') ?>
	<div class="page-header">
		<h1>
			Người tìm việc
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
								<label for="form-field-1" class="control-label bolder blue">Tiêu đề <span class="red"><?php  echo form_error('title'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="title" name="title" placeholder="Tiêu đề hồ sơ" value="<?php echo set_value('title'); ?>" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-1" class="control-label bolder blue">Mức lương tối thiểu mong muốn <span class="red"><?php  echo form_error('wage'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="wage" name="wage" placeholder="Mức lương, chú ý các bạn lên viết bằng số" value="<?php echo set_value('wage'); ?>" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-select-3" class="control-label bolder blue">Trình độ <span class="red"><?php echo form_error('diploma'); ?></span></label>

								<br />
								<select class="chosen-select form-control" id="form-field-select-3"  name="diploma" data-placeholder="Choose a State...">
									<option value="<?php echo set_value('diploma'); ?>"></option>
									<?php if($list_diploma){
										foreach ($list_diploma as $value) {?>
										<option value="<?php echo $value->id; ?>"><?php echo $value->sDiplomaName; ?></option>
									<?php		
										}
									} ?>
									

								</select>
								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-select-3" class="control-label bolder blue">Kinh nghiệm<span class="red"><?php echo form_error('exp'); ?></span></label>

								<br />
								<select class="chosen-select form-control" id="form-field-select-3"  name="exp" data-placeholder="Choose a State...">
									<option value="<?php echo set_value('exp'); ?>"></option>
									<?php if($list_experience){
										foreach ($list_experience as  $value) {?>
										<option value="<?php echo $value->id; ?>"><?php echo $value->sExperience_name; ?></option>
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
								<label for="form-field-select-3" class="control-label bolder blue">Cấp bậc mong muốn<span class="red"><?php echo form_error('ranks'); ?></span></label>

								<br />
								<select class="chosen-select form-control" id="form-field-select-3"  name="ranks" data-placeholder="Choose a State...">
									<option value="<?php echo set_value('ranks'); ?>"></option>
									<?php if($list_rank){
										foreach ($list_rank as $value) {?>
										<option value="<?php echo $value->id; ?>"><?php echo $value->sRankName; ?></option>
									<?php											
										}
									} ?>


								</select>
								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-select-3" class="control-label bolder blue">Ngành nghề<span class="red"><?php echo form_error('career'); ?></span></label>

								<br />
								<select class="chosen-select form-control" id="form-field-select-3"  name="career" data-placeholder="Choose a State...">
									<option value="<?php echo set_value('career'); ?>"></option>
									<?php if($list_career){
										foreach ($list_career as $value) {?>
										<option value="<?php  echo $value->id; ?>"><?php echo $value->sCareerName; ?></option>
									<?php		
									}
									} ?>
								

								</select>
								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-select-3" class="control-label bolder blue">Nơi làm việc mong muốn<span class="red"><?php echo form_error('city'); ?></span></label>

								<br />
								<select class="chosen-select form-control" id="form-field-select-3"  name="city" data-placeholder="Choose a State...">
									<option value="<?php echo set_value('city'); ?>"></option>
									<?php if($list_city){
										foreach ($list_city as $value) {?>
										<option value="<?php  echo $value->id; ?>"><?php echo $value->sCityName	; ?></option>
									<?php		
										}
									} ?>
								

								</select>
								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-select-3" class="control-label bolder blue">Hiển thị<span class="red"><?php echo form_error('display'); ?></span></label>

								<br />
								<select class="chosen-select form-control" id="form-field-select-3"  name="display" data-placeholder="Choose a State...">
									<option value="1">Hiện thị</option>
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
						<h4 class="widget-title">Upload hồ sơ</h4>
						
						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-up"></i>
							</a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main">
							<div>
								<label for="form-field-select-3" class="control-label bolder blue">Hồ sơ ( bắt buộc )<span class="red"><?php echo form_error('image'); ?></span></label>

								<br />
								<div class="form-group">
									<div class="col-xs-12">
									<input type="file" id="id-input-file-3" name="image" />
									</div>
								</div>
								<div class="space space-8"></div>
							</div>
							<label for="form-field-select-3" class="control-label bolder blue"></label>
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

