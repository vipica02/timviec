

<div class="page-content">
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
						<h4 class="widget-title">Comment</h4>

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
								<label for="form-field-1" class="control-label bolder blue">Username: <span class="red"><?php echo $info->sUserName; ?></span></label>
							</div>
							<div>
								<label for="form-field-1" class="control-label bolder blue">Email: <span class="red"><?php echo $info->sEmail; ?></span></label>
							</div>
							
							<div>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="control-group">
											<label for="form-field-8" class="control-label bolder blue">Comment<span class="red"><?php echo form_error('comment'); ?></span></label>
											<textarea class="form-control" id="form-input-readonly"   name="comment" rows="10" placeholder="Giới thiệu về bản thân"><?php echo $info->sMessage; ?></textarea>
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
						<h4 class="widget-title">Reply</h4>
						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-up"></i>
							</a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main">
							<div class="space space-26"></div>
							<div>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="control-group">
											<label for="form-field-8" class="control-label bolder blue">Trả lời</label>
											<textarea rows="10" class="form-control" id="reply" name="reply" placeholder="yêu cầu công việc"></textarea>
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
						<h4 class="widget-title">Reply</h4>
						
						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-up"></i>
							</a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main">
							<div>
								<div class="control-group">
									<label class="control-label bolder blue">Tin thuộc loại</label>
									<div class="radio">
										<label>
											<input name="curen"  <?php if($info->iCuren==1){echo 'checked="checked"';} ?> type="radio" value="1" class="ace">
											<span class="lbl"> Hiển thị</span>
										</label>
									</div>	
									
									<div class="radio">
										<label>
											<input name="curen"  <?php if($info->iCuren==2){echo 'checked="checked"';}?>   type="radio"  value="2" class="ace">
											<span class="lbl"> Span</span>
										</label>
									</div>
								</div>
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

