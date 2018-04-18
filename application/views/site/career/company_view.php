   <section id="services" class="service-item">
	   <div class="container">
            <div class="center wow fadeInDown">
                <h2><?php echo $info->sComName; ?></h2>
                <p class="lead"></p>

            </div>

            <div class="row">
				<div class="col-sm-12 col-md-12">
					<?php $this->load->view('site/message'); ?>
					<div class="media services-wrap wow fadeInDown">
						<div class="col-md-3 col-sm-3">
							<div class="single-profile-top wow fadeInDown animated text-center">
							<?php if($info->sLogo==''){?>
								<img class="img-responsive " src="<?php echo public_url('/backend/assets/images/avatars/profile-pic.jpg'); ?>">
							<?php
							}else{?>
								<img class="img-responsive " src="<?php echo base_url('uploads/employer/'.$info->sLogo); ?>">
							<?php 
							} ?>
							
							</div>
						</div>
						<div class="col-md-9 col-sm-9 ">
							<h4>Địa chỉ: <?php echo $info->sAddress; ?></h4>
							<h4>Website: <?php echo $info->sWebsite; ?></h4>
                            <h4>Quy mô: <?php echo $info_scale->sScale_Name;?></h4>
							<p>Thông tin thêm: <?php echo $info->sProfile; ?></p>
                            <p>Email liên hệ: <?php echo $info->sContactEmail;?></p>
						</div>
					</div>
				</div>
            </div><!--/.row-->
            
            <div class="center wow fadeInDown">
                <h2><?php echo 'Công việc liên quan'; ?></h2>
                <p class="lead"></p>
            </div>

            <div class="row">
            <?php $i=0; foreach ($list as $value) {$i++;?>
                 <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left col-md-4 col-sm-4 col-xs-4 ">
                        <a href="<?php  echo base_url('/jop/cong_viec/'.$value->id); ?>">
                        <?php if(!$info || $info->sLogo==''){?>
                             <img class="img-responsive" src="<?php echo public_url('/backend/assets/images/avatars/profile-pic.jpg'); ?>">
                        <?php
                        }else{?>
                             <img class="img-responsive" src="<?php echo base_url('/uploads/employer/'.$info->sLogo); ?>">
                        <?php
                        } ?>
                           
                        </a>
                        </div>
                        <div class="media-body ">
                        <a href="<?php echo base_url('/jop/cong_viec/'.$value->id); ?>">
                            <h5 class="media-heading"><?php echo $value->sJobTitle; ?></h5>
                        </a>
                        <p><i class="glyphicon  glyphicon-time"></i><span> <?php echo $value->dLastedDate; ?></span></p>
                        <p><i class="fa fa-users"></i><span> <?php if(!$info_exp[$i-1]){echo 'Không tồn tại';}else{echo $info_exp[$i-1]->sExperience_name;} ?></span></p>
                        <p><i class="fa fa-usd"></i><span> <?php if(!$info_money[$i-1]){echo 'Không tồn tại';}else{echo $info_money[$i-1]->sWage_name;} ?></span></p>
                        </div>
                    </div>
                </div>
               <?php if($i%3==0){?>
               
                    <div class="clearfix"></div>
                <?php 
               } ?> 
            <?php
            } ?>
               
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

    <script src="<?php echo public_url() ?>/backend/assets/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/ace.min.js"></script>
<script src="<?php echo public_url() ?>/backend/assets/js/chosen.jquery.min.js"></script>
<script type="text/javascript">
    jQuery(function($) {
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
    });
</script>