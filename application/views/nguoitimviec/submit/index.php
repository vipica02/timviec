<!-- head -->
<?php $this->load->view('nguoitimviec/head',$this->data) ?>
<div class="page-content">
	<?php $this->load->view('nguoitimviec/caidat.php'); ?>

	<div class="page-header">
		<h1>
			Người tìm việc
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				 Danh sách

			</small>
			
		</h1>

	</div><!-- /.page-header -->
 	<?php $this->load->view('nguoitimviec/message'); ?>
	<div class="row">
		<?php foreach ($list as  $value) {?>
		<form action="" method="post" enctype="multipart/form-data" class="form" >

			<div class="col-xs-12 col-sm-4">
				<div class="widget-box">
					<div class="widget-header">
						<h4 class="widget-title"><?php echo 'Thông tin'; ?></h4>

						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-up"></i>
							</a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main">

							<div>
								<label for="form-field-1" class="control-label bolder blue">ID hồ sơ<span class="red"> </span></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
										<input type="text" id="title" name="title" placeholder="Tiêu đề hồ sơ" value="<?php echo $value->id; ?>" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
							</div>
							<div>
								<label for="form-field-1" class="control-label bolder blue">Tiêu đề <span class="red"></label>
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="text" id="wage" name="wage" placeholder="Mức lương, chú ý các bạn lên viết bằng số" value="<?php echo $value->sJobTitle; ?>" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
							</div>
							<div>
								
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<div class="input-group col-md-12 col-xs-12">
											<input type="submit"  value="Nộp hồ sơ" class="col-md-12 col-xs-12">
										</div>
									</div>
								</div>

								<div class="space space-8"></div>
							</div>
						</div>

						<div class="space space-8"></div>
					</div>

				</div>
			</div>
		</form>
		<?php
			
		} ?>
	
	</div><!-- /.row -->
	<div class="row">
		<div class="col-md-12">
			<h1 class="red">
				<?php 
				if($total_job==0){
					echo 'Hiện tại bạn chưa có hồ sơ nào';
				}else{
					echo 'Hiện tại bạn đang có: '; echo $total_job; echo' hồ sơ ';} 
					?>
					<a href="<?php echo nguoitimviec_url('user_job/add_upload'); ?>" class="btn btn-primary">Tạo mới hồ sơ</a>
				</h1>
		</div>
	</div>
</div><!-- /.page-content -->

<SCRIPT LANGUAGE="JavaScript">
      function confirmAction() {
        return confirm("Bạn có chắc muốn xóa không?")
      }
      function confirmedit(){
      	 return confirm("Bạn có chắc muốn sửa không?")
      }
 
</SCRIPT>
