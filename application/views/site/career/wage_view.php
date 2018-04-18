   <section id="services" class="service-item">
	   <div class="container">
            <div class="center wow fadeInDown">
                <h2><?php echo 'Lương từ '.$info->sWage_name; ?></h2>
                <p class="lead"><?php echo $title; ?></p>
            </div>

            <div class="row">

			<?php if(!empty($list)){
				$i=0;	
				foreach ($list as $value) {$i++;?>
				<div class="col-sm-6 col-md-4">
					<div class="media services-wrap wow fadeInDown">
						<div class="pull-left col-md-4 col-sm-4 col-xs-4 ">
						<a href="<?php echo base_url('/jop/cong_viec/'.$value->id); ?>">
							<?php if($info_company[$i-1]->sLogo==''){?>
								<img class="img-responsive" src="<?php echo public_url('/backend/assets/images/avatars/profile-pic.jpg'); ?>">
							<?php
							} else{?>
								<img class="img-responsive" src="<?php echo base_url('uploads/employer/'.$info_company[$i-1]->sLogo); ?>">
							<?php

							}?>
						</a>
						</div>
						<div class="media-body ">
						<a href="<?php echo base_url('/jop/cong_viec/'.$value->id); ?>">
							<h5 class="media-heading" style="color: #ed1c24;"><?php echo $value->sJobTitle; ?></h5>
						</a>
						<a href="<?php echo base_url('/jop/cong_ty/'.$info_company[$i-1]->id); ?>">
							<h5 class="media-heading"><?php if(!$info_company[$i-1]){echo 'Không tồn tại';}else{echo $info_company[$i-1]->sComName; }?></h5>
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
				}
			} 
			?>
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->