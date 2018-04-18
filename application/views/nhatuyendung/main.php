<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->load->view('nhatuyendung/head.php'); ?>
	</head>

	<body class="no-skin">
		
	<?php $this->load->view('nhatuyendung/header.php'); ?>
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive  ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<?php $this->load->view('nhatuyendung/left.php'); ?>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					
					<?php $this->load->view($template,$this->data) ?>
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Nhà tuyển dụng</span>
						</span>
					</div>
				</div>
			</div>
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
			<?php 	$this->load->view('nhatuyendung/footer.php'); ?>
			
		</div><!-- /.main-container -->
		
	</body>
</html>
