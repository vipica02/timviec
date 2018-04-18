
<div class="page-content">
<?php $this->load->view('admin/admin/caidat') ?>
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
			<div class="col-xs-12 col-sm-6">
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
								<label for="form-field-1" class="control-label bolder blue">Tiêu đề<span class="red"><?php echo form_error('title'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="title" name="title" placeholder="Tiêu đề..." value="<?php echo $info->stitle; ?>" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
							</div>
							<div>
								<div class="control-group">
								<label for="form-field-8 bolder " class="blue">Mô tả ngắn<span class="red"><?php echo form_error('conten'); ?></span></label>
									<textarea class="form-control" id="conten" rows="6" name="conten" placeholder="Mô tả ngắn"><?php echo $info->sContenName;?></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.span -->
			<div class="col-xs-12 col-sm-6">
				<div class="widget-box">
					<div class="widget-header">
						<h4 class="widget-title">Hình ảnh</h4>
						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-up"></i>
							</a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main">
							<div>
								<label for="form-field-2" class="control-label bolder blue">Background</label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<input type="file" id="id-input-file-1" name="image" />
									</div>
								</div>
								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-2" class="control-label bolder blue">Ảnh minh họa</label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<input type="file" id="id-input-file-2" name="image_list"  />
									</div>
								</div>
								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-1" class="control-label bolder blue">Link<span class="red"><?php echo form_error('link'); ?></span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="link" name="link" placeholder="Link..." value="<?php echo $info->sLink; ?>" class="col-md-12 col-xs-12">
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


