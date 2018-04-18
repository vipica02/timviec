<?php if(isset($message) && $message){?>
	<div class="alert alert-success alert-success">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>

	<i class="ace-icon fa fa-exclamation-triangle"></i>
	Thông báo:
	<strong class="green">
	<?php echo  $message;?>
	</strong>
</div>
<?php
} ?>
