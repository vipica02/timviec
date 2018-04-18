<!-- head -->
<?php $this->load->view('nhatuyendung/head',$this->data) ?>
<div class="page-content">
	<?php $this->load->view('nhatuyendung/caidat.php'); ?>

	<div class="page-header">
		<h1>
			Quản trị viên
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				 Danh sách

			</small>
			
		</h1>

	</div><!-- /.page-header -->
 	<?php $this->load->view('nhatuyendung/message'); ?>
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="row">
				<div class="col-xs-12">
				

					<div class="clearfix">
						<div class="pull-right tableTools-container"></div>
					</div>
					<div class="table-header">
						Danh sách bài viết
 					</div>

					<!-- div.table-responsive -->

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="center">
										<label class="pos-rel">
											<input type="checkbox" class="ace" />
											<span class="lbl"></span>
										</label>
									</th>
									<th>Người tìm việc</th>
									<th>Tiêu đề</th>
									<th class="hidden-480">Học vấn</th>
									<th class="hidden-480">Lượt xem</th>
									<th class="hidden-480">
										<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
										Ngày làm hồ sơ
									</th>	
									
									<th class="hidden-480"></th>
								</tr>
							</thead>

							<tbody>
							<?php if(!empty($list)){?>
								<?php $i=0; foreach ($list as  $value) {$i++;?>

										<tr>
									<td class="center">
										<label class="pos-rel">
											<input type="checkbox" class="ace" />
											<span class="lbl"></span>
										</label>
									</td>
									
									<td>
										<a href="<?php echo base_url('jop/hoso/'.$value->id); ?>"><?php if(!$info){echo 'Không tồn tại';}else{echo $info[$i-1]->sUserName;} ?></a>
									</td>
									<td>
										<a href="<?php echo base_url('jop/cong_viec/'.$value->id); ?>"><?php echo  $value->sJobTitle; ?></a>
									</td>
								
									<td ><?php if(!$info_diploma[$i-1]){ echo 'Không tồn tại';}else{ echo $info_diploma[$i-1]->sDiplomaName;} ?></td>
									

									<td ><?php echo $value->iHitview; ?></td>
									
									<td><?php echo $value->sDatePost; ?></td>
									
								
									<td>
										<div class="hidden-sm hidden-xs action-buttons text-center">
											<a class="green" href="<?php echo nhatuyendung_url('search/download/'.$value->sFileName); ?>">
												<i class="ace-icon fa fa-download bigger-130"></i>
											</a>
										</div>

										<div class="hidden-md hidden-lg">
											<div class="inline pos-rel">
												<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
													<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
												</button>

												<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
													<li>
														<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
															<span class="blue">
																<i class="ace-icon fa fa-search-plus bigger-120"></i>
															</span>
														</a>
													</li>

													<li>
														<a href="<?php echo nhatuyendung_url('search/download/'.$value->sFileName); ?>" class="tooltip-success" data-rel="tooltip" title="Tải hồ sơ">
															<span class="green">
																<i class="ace-icon fa fa-download bigger-120"></i>
															</span>
														</a>
													</li>

													
												</ul>
											</div>
										</div>
									</td>

								</tr>
							
								<?php		
								}
							} ?>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
			<div class="row" style="display: none;">

				<table id="dynamic-table">
				</table>
			</div>
			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.page-content -->

<SCRIPT LANGUAGE="JavaScript">
      function confirmAction() {
        return confirm("Bạn có chắc muốn xóa không?")
      }
      function confirmedit(){
      	 return confirm("Bạn có chắc muốn sửa không?")
      }
 
</SCRIPT>
<script src="<?php echo public_url() ?>/backend/assets/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/dataTables.buttons.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/buttons.flash.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/buttons.html5.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/buttons.print.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/buttons.colVis.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/dataTables.select.min.js"></script>
<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = 

				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null,null,null,
					  { "bSortable": false }
					],
					"aaSorting": [],
					

			
					select: {
						style: 'multi'
					}
			    } );
				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
				
				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					  {
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					  },
					  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					 
					  {
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					  }		  
					]
				} );
				myTable.buttons().container().appendTo( $('.tableTools-container') );
				
				//style the message box
				var defaultCopyAction = myTable.button(1).action();
				myTable.button(1).action(function (e, dt, button, config) {
					defaultCopyAction(e, dt, button, config);
					$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
				});
				
				
				var defaultColvisAction = myTable.button(0).action();
				myTable.button(0).action(function (e, dt, button, config) {
					
					defaultColvisAction(e, dt, button, config);
					
					
					if($('.dt-button-collection > .dropdown-menu').length == 0) {
						$('.dt-button-collection')
						.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
						.find('a').attr('href', '#').wrap("<li />")
					}
					$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
				});
			
				////
			
				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);
				
				
				
				
				
				myTable.on( 'select', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
					}
				} );
			
			
			
			
				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
				
				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$('#dynamic-table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) myTable.row(row).select();
						else  myTable.row(row).deselect();
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(this.checked) myTable.row(row).deselect();
					else myTable.row(row).select();
				});
			
			
			
				$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});
				
				
				
				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					

					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
			
				
			
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				
				
				
				
				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
			
			})
		</script>