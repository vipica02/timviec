<?php $this->load->view('nhatuyendung/nhatuyendung/head',$this->data) ?>
<div class="page-content">
<?php $this->load->view('nhatuyendung/nhatuyendung/caidat.php'); ?>

	<div class="page-header">
		<h1>
			Quản trị viên
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				GIẤY PHÉP ĐĂNG KÝ KINH DOANH
			</small>
			
		</h1>

	</div><!-- /.page-header -->


		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
				<div class="alert alert-block alert-success">
					<button type="button" class="close" data-dismiss="alert">
						<i class="ace-icon fa fa-times"></i>
					</button>

					<i class="ace-icon fa fa-check green"></i>

					
					<strong class="red">
						Để chứng thực tài khoản Quý khách đang sử dụng trên vieclammoi.com, vui lòng đăng tải Giấy phép kinh doanh
					</strong>
				</div>
				<div class="alert alert-block alert-success">
					<button type="button" class="close" data-dismiss="alert">
						<i class="ace-icon fa fa-times"></i>
					</button>
					<strong class="green">
						Hướng dẫn đăng tải:
						<p>1. Giấy phép ĐKKD phải có định dạng là words hoặc pdf. (đuôi .pdf, .doc, .docx),
						Nếu giấy phép ĐKKD có định dạng ảnh, xin vui lòng dán vào file words để có thể đăng tải.</p>
						<p>
						2. Giấy phép ĐKKD cần có dấu giáp lai của cơ quan có thẩm quyền. Trong trường hợp là bản photo thì phải có dấu công chứng.</p>
					</strong>
				</div>
				<?php $this->load->view('nhatuyendung/message'); ?>
				<form action="<?php echo nhatuyendung_url('upload') ?>" method="post" enctype="multipart/form-data" class="form" >
					<div class="row">
						<div class="form-group">

							<div class="col-xs-12">

								<input type="file" id="id-input-file-3" name="image" />
							</div>

							<div class="col-xs-12">
								<input type="submit" name="submit" value="Lưu" class="btn btn-app btn-success pull-right">
							</div>

						</div>

					</div><!-- /.row -->
				</form>				
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content -->
</div>

