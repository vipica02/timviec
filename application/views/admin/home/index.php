<div class="main-content-inner">
	<div class="page-content">
		<div class="page-header">
			<h1>
				Dashboard
				<small>
					<i class="ace-icon fa fa-angle-double-right"></i>
					 Home
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

					Xin chào
					<strong class="green">
						<?php echo $admin_info->sUserName; ?>
						<!-- <small>(v1.4)</small> -->
					</strong>
				</div>

				<div class="row">
					<div class="space-6"></div>

					<div class="col-sm-12 infobox-container">
						<div class="infobox infobox-green">
							<div class="infobox-icon">
								<i class="ace-icon fa fa-comments" title="Comment"></i>
							</div>
							<div class="infobox-data">
								<span class="infobox-data-number"><?php echo $total_comment; ?></span>
							</div>
							<div class="stat stat-success">Comment</div>
						</div>
						<div class="infobox infobox-orange2">
							<div class="infobox-chart">
								<span class="sparkline" data-values="196,128,202,177,154,94,100,170,224" title="Lượt xem"></span>
							</div>

							<div class="infobox-data">
								<span class="infobox-data-number"><?php echo $total_view; ?></span>
								<div class="infobox-content">Lượt xem</div>
							</div>
						</div>
						

						<div class="infobox infobox-pink">
							<div class="infobox-icon">
								<i class="ace-icon fa fa-user" title="Nhà tuyển dụng"></i>
							</div>

							<div class="infobox-data">
								<span class="infobox-data-number"><?php echo $total_employer; ?></span>
								<div class="infobox-content">Nhà tuyển dụng</div>
							</div>
							
						</div>

						<div class="infobox infobox-red">
							<div class="infobox-icon">
								<i class="ace-icon fa fa-users" title="Người tìm việc"></i>
							</div>

							<div class="infobox-data">
								<span class="infobox-data-number"><?php echo $total_jobseeker; ?></span>
								<div class="infobox-content">người tìm việc</div>
							</div>
						</div>

						<div class="space-6"></div>

					</div>

					<div class="vspace-12-sm"></div>

					
				</div><!-- /.row -->
				<!-- PAGE CONTENT ENDS -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content -->
</div>