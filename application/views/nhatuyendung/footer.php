


<script type="text/javascript">
	if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo public_url() ?>/backend/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="<?php echo public_url() ?>/backend/assets/js/bootstrap.min.js"></script>

<script src="<?php echo public_url() ?>/backend/assets/js/jquery-ui.custom.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/jquery.easypiechart.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/jquery.sparkline.index.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/jquery.flot.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/jquery.flot.pie.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/jquery.flot.resize.min.js"></script>



<script src="<?php echo public_url() ?>/backend/assets/js/chosen.jquery.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/spinbox.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/moment.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/daterangepicker.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/jquery.knob.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/autosize.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/jquery.inputlimiter.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/bootstrap-tag.min.js"></script>


<!-- script -->
<!-- <script src="<?php echo public_url() ?>/backend/assets/js/jquery-ui.custom.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/markdown.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/bootstrap-markdown.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/jquery.hotkeys.index.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/bootstrap-wysiwyg.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/bootbox.js"></script> -->
<!-- ace scripts -->
<script src="<?php echo public_url() ?>/backend/assets/js/ace-elements.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
	jQuery(function($) {
		$('.easy-pie-chart.percentage').each(function(){
			var $box = $(this).closest('.infobox');
			var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
			var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
			var size = parseInt($(this).data('size')) || 50;
			$(this).easyPieChart({
				barColor: barColor,
				trackColor: trackColor,
				scaleColor: false,
				lineCap: 'butt',
				lineWidth: parseInt(size/10),
				animate: ace.vars['old_ie'] ? false : 1000,
				size: size
			});
		})
		
		$('.sparkline').each(function(){
			var $box = $(this).closest('.infobox');
			var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
			$(this).sparkline('html',
			{
				tagValuesAttribute:'data-values',
				type: 'bar',
				barColor: barColor ,
				chartRangeMin:$(this).data('min') || 0
			});
		});
		
		
			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			  
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
			  { label: "social networks",  data: 38.7, color: "#68BC31"},
			  { label: "search engines",  data: 24.5, color: "#2091CF"},
			  { label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
			  { label: "direct traffic",  data: 18.6, color: "#DA5430"},
			  { label: "other",  data: 10, color: "#FEE074"}
			  ]


			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			  
			  placeholder.on('plothover', function (event, pos, item) {
			  	if(item) {
			  		if (previousPoint != item.seriesIndex) {
			  			previousPoint = item.seriesIndex;
			  			var tip = item.series['label'] + " : " + item.series['percent']+'%';
			  			$tooltip.show().children(0).text(tip);
			  		}
			  		$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
			  	} else {
			  		$tooltip.hide();
			  		previousPoint = null;
			  	}
			  	
			  });
			  
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});
				
			
				
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
				
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
				
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}

				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
					
					var off2 = $source.offset();
					//var w2 = $source.width();
					
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				
				
				$('.dialogs,.comments').ace_scroll({
					size: 300
				});
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if(ace.vars['touch'] && ace.vars['android']) {
					$('#tasks').on('touchstart', function(e){
						var li = $(e.target).closest('#tasks li');
						if(li.length == 0)return;
						var label = li.find('label.inline').get(0);
						if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
					});
				}
				
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
				}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
				
				
				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();
					
					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});
				
			})
</script>

		
<script type="text/javascript">
	jQuery(function($) {
		$('#id-disable-check').on('click', function() {
			var inp = $('#form-input-readonly').get(0);
			var inp1 = $('#form-input-readonly-1').get(0);
			var inp2 = $('#form-input-readonly-2').get(0);
			var inp3 = $('#form-input-readonly-3').get(0);
			if(inp.hasAttribute('disabled') && inp1.hasAttribute('disabled') && inp2.hasAttribute('disabled') && inp3.hasAttribute('disabled')) {
				inp.removeAttribute('disabled');
				inp1.removeAttribute('disabled');
				inp2.removeAttribute('disabled');
				inp3.removeAttribute('disabled');	
			}
			else {
				inp.setAttribute('disabled' , '');
				inp1.setAttribute('disabled' , '');
				inp2.setAttribute('disabled' , '');
				inp3.setAttribute('disabled' , '');
			}
		});

	
	
		if(!ace.vars['touch']) {
			$('.chosen-select').chosen({allow_single_deselect:true}); 
			//resize the chosen on window resize
	
			$(window)
			.off('resize.chosen')
			.on('resize.chosen', function() {
				$('.chosen-select').each(function() {
					 var $this = $(this);
					 $this.next().css({'width': $this.parent().width()});
				})
			}).trigger('resize.chosen');
			//resize chosen on sidebar collapse/expand
			$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
				if(event_name != 'sidebar_collapsed') return;
				$('.chosen-select').each(function() {
					 var $this = $(this);
					 $this.next().css({'width': $this.parent().width()});
				})
			});
	
	
			$('#chosen-multiple-style .btn').on('click', function(e){
				var target = $(this).find('input[type=radio]');
				var which = parseInt(target.val());
				if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
				 else $('#form-field-select-4').removeClass('tag-input-style');
			});
		}
	
	
		$('[data-rel=tooltip]').tooltip({container:'body'});
		$('[data-rel=popover]').popover({container:'body'});
	
		autosize($('textarea[class*=autosize]'));
		
		$('textarea.limited').inputlimiter({
			remText: '%n character%s remaining...',
			limitText: 'max allowed : %n.'
		});
	
		$.mask.definitions['~']='[+-]';
		$('.input-mask-date').mask('99/99/9999');
		$('.input-mask-phone').mask('(999) 999-9999');
		$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
		$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
	
	
	
		$( "#input-size-slider" ).css('width','200px').slider({
			value:1,
			range: "min",
			min: 1,
			max: 8,
			step: 1,
			slide: function( event, ui ) {
				var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
				var val = parseInt(ui.value);
				$('#form-field-4').attr('class', sizing[val]).attr('placeholder', '.'+sizing[val]);
			}
		});
	
		$( "#input-span-slider" ).slider({
			value:1,
			range: "min",
			min: 1,
			max: 12,
			step: 1,
			slide: function( event, ui ) {
				var val = parseInt(ui.value);
				$('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
			}
		});
	
	
		
		//"jQuery UI Slider"
		//range slider tooltip example
		$( "#slider-range" ).css('height','200px').slider({
			orientation: "vertical",
			range: true,
			min: 0,
			max: 100,
			values: [ 17, 67 ],
			slide: function( event, ui ) {
				var val = ui.values[$(ui.handle).index()-1] + "";
	
				if( !ui.handle.firstChild ) {
					$("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
					.prependTo(ui.handle);
				}
				$(ui.handle.firstChild).show().children().eq(1).text(val);
			}
		}).find('span.ui-slider-handle').on('blur', function(){
			$(this.firstChild).hide();
		});
		
		
		$( "#slider-range-max" ).slider({
			range: "max",
			min: 1,
			max: 10,
			value: 2
		});
		
		$( "#slider-eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
			// read initial values from markup and remove that
			var value = parseInt( $( this ).text(), 10 );
			$( this ).empty().slider({
				value: value,
				range: "min",
				animate: true
				
			});
		});
		
		$("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item
	
		
		$('#id-input-file-1 , #id-input-file-2').ace_file_input({
			no_file:'No File ...',
			btn_choose:'Choose',
			btn_change:'Change',
			droppable:false,
			onchange:null,
			thumbnail:false //| true | large
			//whitelist:'gif|png|jpg|jpeg'
			//blacklist:'exe|php'
			//onchange:''
			//
		});
		//pre-show a file name, for example a previously selected file
		//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
	
	
		$('#id-input-file-3').ace_file_input({
			style: 'well',
			btn_choose: 'Drop files here or click to choose',
			btn_change: null,
			no_icon: 'ace-icon fa fa-cloud-upload',
			droppable: true,
			thumbnail: 'small'//large | fit
			//,icon_remove:null//set null, to hide remove/reset button
			/**,before_change:function(files, dropped) {
				//Check an example below
				//or examples/file-upload.html
				return true;
			}*/
			/**,before_remove : function() {
				return true;
			}*/
			,
			preview_error : function(filename, error_code) {
				//name of the file that failed
				//error_code values
				//1 = 'FILE_LOAD_FAILED',
				//2 = 'IMAGE_LOAD_FAILED',
				//3 = 'THUMBNAIL_FAILED'
				//alert(error_code);
			}
	
		}).on('change', function(){
			//console.log($(this).data('ace_input_files'));
			//console.log($(this).data('ace_input_method'));
		});
		
		
		//$('#id-input-file-3')
		//.ace_file_input('show_file_list', [
			//{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
			//{type: 'file', name: 'hello.txt'}
		//]);
	
		
		
	
		//dynamically change allowed formats by changing allowExt && allowMime function
		$('#id-file-format').removeAttr('checked').on('change', function() {
			var whitelist_ext, whitelist_mime;
			var btn_choose
			var no_icon
			if(this.checked) {
				btn_choose = "Drop images here or click to choose";
				no_icon = "ace-icon fa fa-picture-o";
	
				whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
				whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
			}
			else {
				btn_choose = "Drop files here or click to choose";
				no_icon = "ace-icon fa fa-cloud-upload";
				
				whitelist_ext = null;//all extensions are acceptable
				whitelist_mime = null;//all mimes are acceptable
			}
			var file_input = $('#id-input-file-3');
			file_input
			.ace_file_input('update_settings',
			{
				'btn_choose': btn_choose,
				'no_icon': no_icon,
				'allowExt': whitelist_ext,
				'allowMime': whitelist_mime
			})
			file_input.ace_file_input('reset_input');
			
			file_input
			.off('file.error.ace')
			.on('file.error.ace', function(e, info) {
				//console.log(info.file_count);//number of selected files
				//console.log(info.invalid_count);//number of invalid files
				//console.log(info.error_list);//a list of errors in the following format
				
				//info.error_count['ext']
				//info.error_count['mime']
				//info.error_count['size']
				
				//info.error_list['ext']  = [list of file names with invalid extension]
				//info.error_list['mime'] = [list of file names with invalid mimetype]
				//info.error_list['size'] = [list of file names with invalid size]
				
				
				/**
				if( !info.dropped ) {
					//perhapse reset file field if files have been selected, and there are invalid files among them
					//when files are dropped, only valid files will be added to our file array
					e.preventDefault();//it will rest input
				}
				*/
				
				
				//if files have been selected (not dropped), you can choose to reset input
				//because browser keeps all selected files anyway and this cannot be changed
				//we can only reset file field to become empty again
				//on any case you still should check files with your server side script
				//because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
			});
			
			
			/**
			file_input
			.off('file.preview.ace')
			.on('file.preview.ace', function(e, info) {
				console.log(info.file.width);
				console.log(info.file.height);
				e.preventDefault();//to prevent preview
			});
			*/
		
		});
	
		$('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
		.closest('.ace-spinner')
		.on('changed.fu.spinbox', function(){
			//console.log($('#spinner1').val())
		}); 
		$('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});
		$('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
		$('#spinner4').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});
	
		//$('#spinner1').ace_spinner('disable').ace_spinner('value', 11);
		//or
		//$('#spinner1').closest('.ace-spinner').spinner('disable').spinner('enable').spinner('value', 11);//disable, enable or change value
		//$('#spinner1').closest('.ace-spinner').spinner('value', 0);//reset to 0
	
	
		//datepicker plugin
		//link
		$('.date-picker').datepicker({
			autoclose: true,
			todayHighlight: true
		})
		//show datepicker when clicking on the icon
		.next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
	
		//or change it into a date range picker
		$('.input-daterange').datepicker({autoclose:true});
	
	
		//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
		$('input[name=date-range-picker]').daterangepicker({
			'applyClass' : 'btn-sm btn-success',
			'cancelClass' : 'btn-sm btn-default',
			locale: {
				applyLabel: 'Apply',
				cancelLabel: 'Cancel',
			}
		})
		.prev().on(ace.click_event, function(){
			$(this).next().focus();
		});
	
	
		$('#timepicker1').timepicker({
			minuteStep: 1,
			showSeconds: true,
			showMeridian: false,
			disableFocus: true,
			icons: {
				up: 'fa fa-chevron-up',
				down: 'fa fa-chevron-down'
			}
		}).on('focus', function() {
			$('#timepicker1').timepicker('showWidget');
		}).next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
		
		
	
		
		if(!ace.vars['old_ie']) $('#date-timepicker1').datetimepicker({
		 //format: 'MM/DD/YYYY h:mm:ss A',//use this option to display seconds
		 icons: {
			time: 'fa fa-clock-o',
			date: 'fa fa-calendar',
			up: 'fa fa-chevron-up',
			down: 'fa fa-chevron-down',
			previous: 'fa fa-chevron-left',
			next: 'fa fa-chevron-right',
			today: 'fa fa-arrows ',
			clear: 'fa fa-trash',
			close: 'fa fa-times'
		 }
		}).next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
		
	
		$('#colorpicker1').colorpicker();
		//$('.colorpicker').last().css('z-index', 2000);//if colorpicker is inside a modal, its z-index should be higher than modal'safe
	
		$('#simple-colorpicker-1').ace_colorpicker();
		//$('#simple-colorpicker-1').ace_colorpicker('pick', 2);//select 2nd color
		//$('#simple-colorpicker-1').ace_colorpicker('pick', '#fbe983');//select #fbe983 color
		//var picker = $('#simple-colorpicker-1').data('ace_colorpicker')
		//picker.pick('red', true);//insert the color if it doesn't exist
	
	
		$(".knob").knob();
		
		
		var tag_input = $('#form-field-tags');
		try{
			tag_input.tag(
			  {
				placeholder:tag_input.attr('placeholder'),
				//enable typeahead by specifying the source array
				source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
				/**
				//or fetch data from database, fetch those that match "query"
				source: function(query, process) {
				  $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
				  .done(function(result_items){
					process(result_items);
				  });
				}
				*/
			  }
			)
	
			//programmatically add/remove a tag
			var $tag_obj = $('#form-field-tags').data('tag');
			$tag_obj.add('Programmatically Added');
			
			var index = $tag_obj.inValues('some tag');
			$tag_obj.remove(index);
		}
		catch(e) {
			//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
			tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
			//autosize($('#form-field-tags'));
		}
		
		
		/////////
		$('#modal-form input[type=file]').ace_file_input({
			style:'well',
			btn_choose:'Drop files here or click to choose',
			btn_change:null,
			no_icon:'ace-icon fa fa-cloud-upload',
			droppable:true,
			thumbnail:'large'
		})
		
		//chosen plugin inside a modal will have a zero width because the select element is originally hidden
		//and its width cannot be determined.
		//so we set the width after modal is show
		$('#modal-form').on('shown.bs.modal', function () {
			if(!ace.vars['touch']) {
				$(this).find('.chosen-container').each(function(){
					$(this).find('a:first-child').css('width' , '210px');
					$(this).find('.chosen-drop').css('width' , '210px');
					$(this).find('.chosen-search input').css('width' , '200px');
				});
			}
		})
		/**
		//or you can activate the chosen plugin after modal is shown
		//this way select element becomes visible with dimensions and chosen works as expected
		$('#modal-form').on('shown', function () {
			$(this).find('.modal-chosen').chosen();
		})
		*/
	
		
		
		$(document).one('ajaxloadstart.page', function(e) {
			autosize.destroy('textarea[class*=autosize]')
			
			$('.limiterBox,.autosizejs').remove();
			$('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
		});
	
	});
</script>

<script type="text/javascript">
			jQuery(function($){

				$('textarea[data-provide="markdown"]').each(function(){
					var $this = $(this);

					if ($this.data('markdown')) {
						$this.data('markdown').showEditor();
					}
					else $this.markdown()

						$this.parent().find('.btn').addClass('btn-white');
				})



				function showErrorAlert (reason, detail) {
					var msg='';
					if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
					else {
					//console.log("error uploading file", reason, detail);
				}
				$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
					'<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
			}

			//$('#editor1').ace_wysiwyg();//this will create the default editor will all buttons

			//but we want to change a few buttons colors for the third style
			$('#editor1').ace_wysiwyg({
				toolbar:
				[
				'font',
				null,
				'fontSize',
				null,
				{name:'bold', className:'btn-info'},
				{name:'italic', className:'btn-info'},
				{name:'strikethrough', className:'btn-info'},
				{name:'underline', className:'btn-info'},
				null,
				{name:'insertunorderedlist', className:'btn-success'},
				{name:'insertorderedlist', className:'btn-success'},
				{name:'outdent', className:'btn-purple'},
				{name:'indent', className:'btn-purple'},
				null,
				{name:'justifyleft', className:'btn-primary'},
				{name:'justifycenter', className:'btn-primary'},
				{name:'justifyright', className:'btn-primary'},
				{name:'justifyfull', className:'btn-inverse'},
				null,
				{name:'createLink', className:'btn-pink'},
				{name:'unlink', className:'btn-pink'},
				null,
				{name:'insertImage', className:'btn-success'},
				null,
				'foreColor',
				null,
				{name:'undo', className:'btn-grey'},
				{name:'redo', className:'btn-grey'}
				],
				'wysiwyg': {
					fileUploadError: showErrorAlert
				}
			}).prev().addClass('wysiwyg-style2');

			
			/**
			//make the editor have all the available height
			$(window).on('resize.editor', function() {
				var offset = $('#editor1').parent().offset();
				var winHeight =  $(this).height();
				
				$('#editor1').css({'height':winHeight - offset.top - 10, 'max-height': 'none'});
			}).triggerHandler('resize.editor');
			*/
			

			$('#editor2').css({'height':'200px'}).ace_wysiwyg({
				toolbar_place: function(toolbar) {
					return $(this).closest('.widget-box')
					.find('.widget-header').prepend(toolbar)
					.find('.wysiwyg-toolbar').addClass('inline');
				},
				toolbar:
				[
				'bold',
				{name:'italic' , title:'Change Title!', icon: 'ace-icon fa fa-leaf'},
				'strikethrough',
				null,
				'insertunorderedlist',
				'insertorderedlist',
				null,
				'justifyleft',
				'justifycenter',
				'justifyright'
				],
				speech_button: false
			});
			
			


			$('[data-toggle="buttons"] .btn').on('click', function(e){
				var target = $(this).find('input[type=radio]');
				var which = parseInt(target.val());
				var toolbar = $('#editor1').prev().get(0);
				if(which >= 1 && which <= 4) {
					toolbar.className = toolbar.className.replace(/wysiwyg\-style(1|2)/g , '');
					if(which == 1) $(toolbar).addClass('wysiwyg-style1');
					else if(which == 2) $(toolbar).addClass('wysiwyg-style2');
					if(which == 4) {
						$(toolbar).find('.btn-group > .btn').addClass('btn-white btn-round');
					} else $(toolbar).find('.btn-group > .btn-white').removeClass('btn-white btn-round');
				}
			});


			

			//RESIZE IMAGE
			
			//Add Image Resize Functionality to Chrome and Safari
			//webkit browsers don't have image resize functionality when content is editable
			//so let's add something using jQuery UI resizable
			//another option would be opening a dialog for user to enter dimensions.
			if ( typeof jQuery.ui !== 'undefined' && ace.vars['webkit'] ) {
				
				var lastResizableImg = null;
				function destroyResizable() {
					if(lastResizableImg == null) return;
					lastResizableImg.resizable( "destroy" );
					lastResizableImg.removeData('resizable');
					lastResizableImg = null;
				}

				var enableImageResize = function() {
					$('.wysiwyg-editor')
					.on('mousedown', function(e) {
						var target = $(e.target);
						if( e.target instanceof HTMLImageElement ) {
							if( !target.data('resizable') ) {
								target.resizable({
									aspectRatio: e.target.width / e.target.height,
								});
								target.data('resizable', true);
								
								if( lastResizableImg != null ) {
									//disable previous resizable image
									lastResizableImg.resizable( "destroy" );
									lastResizableImg.removeData('resizable');
								}
								lastResizableImg = target;
							}
						}
					})
					.on('click', function(e) {
						if( lastResizableImg != null && !(e.target instanceof HTMLImageElement) ) {
							destroyResizable();
						}
					})
					.on('keydown', function() {
						destroyResizable();
					});
				}

				enableImageResize();

				/**
				//or we can load the jQuery UI dynamically only if needed
				if (typeof jQuery.ui !== 'undefined') enableImageResize();
				else {//load jQuery UI if not loaded
					//in Ace demo ./components will be replaced by correct components path
					$.getScript("assets/js/jquery-ui.custom.min.js", function(data, textStatus, jqxhr) {
						enableImageResize()
					});
				}
				*/
			}


		});
</script>