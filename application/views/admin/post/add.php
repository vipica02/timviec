
<div class="page-content">
	<div class="page-header">
		<h1>
			Quản trị viên
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Thêm nhân viên
			</small>
			
		</h1>

	</div><!-- /.page-header -->

 	<?php $this->load->view('admin/message'); ?>
	<form action="" method="post" enctype="multipart/form-data" class="form">
	<div class="row">
		
			<div class="col-xs-12 col-md-9 col-sm-9">
				<!-- PAGE CONTENT BEGINS -->
				<div>
				<label for="form-field-1" class="control-label bolder blue"><h2>Thêm mới bài viết</h2> <span class="red"><?php echo form_error('title'); ?></span></label>
					<div class="row">
                    <!--tieude-->
						<div class="col-md-12 col-xs-12">
							<div class="input-group col-md-12 col-xs-12">
								<input type="text" id="title"  name="title" placeholder="Tiêu đề" value="" class="col-md-12 col-xs-12">
							</div>
						</div>
                    <!--/tieude-->
					</div>
					<div class="space space-8"></div>
				</div>
				<br>
                <!-- Editor -->
				<div class="row">
                    <div class="col-lg-12 col-sm-12">
					<textarea name="editor" id="editor" cols="100" rows="10"></textarea>
					</div>
				</div>
                <!--endeditor-->
				

				<div class="hr hr-double dotted"></div>
				<div>
				<label for="form-field-1" class="control-label bolder blue">Đoạn ngắn<span class="red"></span></label>
					<div class="row">
						<div class="col-md-12 col-xs-12">
							<div class="input-group col-md-12 col-xs-12">
								<textarea name="excerpt" id="excerpt" cols="30" rows="6" class="col-md-12 col-xs-12"  placeholder="sơ lược ngắn"></textarea>
							</div>
						</div>
					</div>

					<div class="space space-8"></div>
				</div>
			</div>
<!--        thông tin-->
			<div class="col-xs-12 col-md-3 col-sm-3">
				<div class="widget-box">
					<div class="widget-header">
						<h4 class="widget-title">Thông tin</h4>
					</div>
					<div class="widget-body">
						<div class="widget-main">
							<div>
								<label for="form-field-2" class="control-label bolder blue">Ảnh tiêu đề bài viết</label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<input type="file" id="id-input-file-2" name="image" />
									</div>
								</div>
								<div class="space space-8"></div>
							</div>
							
							<div>
								<div class="row">
									<div class="col-md-12 col-xs-12">
									
										<input type="submit" value="Lưu" name="them" class="btn btn-app btn-success pull-right">
										
									</div>
								</div>
								<div class="space space-8"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
        <!-- /.span -->
	
			<div class="col-xs-12 col-md-3 col-sm-3">
				<div class="space space-8"></div>
					<div class="widget-box">
						<div class="widget-header">
							<h4 class="widget-title">Danh muc</h4>
						</div>
						<div class="widget-body">
							<div class="widget-main">
								<div>
									<label for="form-field-select-3" class="control-label bolder blue">Danh mục</label>

										<br />
									<select class="chosen-select form-control" id="form-field-select-3" name="paren" 
											data-placeholder="Chọn danh mục">
											
											<option value="<?php if(isset($info)){echo $info->iParentID;}else{echo set_value('paren');}?>"></option>
											<?php 
											foreach ($list as  $value) {?>
											<option value="<?php echo $value->id; ?>"><?php echo $value->sNewsCategory; ?></option>
											<?php
										} ?>
									</select>

									<div class="space space-8"></div>	
								</div>
								<div>
								<label for="form-field-1" class="control-label bolder blue">Thêm mới danh mục <span class="red"><?php echo form_error('category'); ?></span></label>
									<div class="row">
										<div class="col-md-12 col-xs-12">
											<div class="input-group col-md-12 col-xs-12">
												<input type="text" id="category"  name="category" placeholder="Danh mục" value="" class="col-md-12 col-xs-12">
											</div>
										</div>
									</div>
									<div class="space space-8"></div>
								</div>
								<div>
									<div class="row">
										<div class="col-md-12 col-xs-12">
											<input type="submit" name = "category_add" value="thêm mới" class=" btn btn-app btn-success pull-right">
										</div>
									</div>
									<div class="space space-8"></div>
								</div>
							</div>
						</div>
					</div>
			</div><!-- /.span -->
	
	</div>
	</form>
</div>

</div>

<script>
	initSample();
</script>