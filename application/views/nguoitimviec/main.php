<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->load->view('nguoitimviec/head.php'); ?>
	</head>

	<body class="no-skin">
		
	<?php $this->load->view('nguoitimviec/header.php'); ?>
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive  ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<?php $this->load->view('nguoitimviec/left.php'); ?>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<?php $this->load->view($template,$this->data) ?>
<!--                    --><?php //var_dump($template); ?>
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Người tìm việc</span>
						</span>
					</div>
				</div>
			</div>
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
			<?php 	$this->load->view('nguoitimviec/footer.php'); ?>
			
		</div><!-- /.main-container -->
		
	</body>
</html>
