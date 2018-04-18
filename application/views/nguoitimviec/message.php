<?php if(isset($message)&& $message){?>
	<div class="alert alert-block alert-success">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>

	<i class="ace-icon fa fa-check green"></i>
	Thông báo:
	<strong class="green">
	<?php echo  $message;?>
	</strong>
</div>
<?php
} ?>
