 <section id="services" class="service-item">
	   <div class="container">
            <div class="center wow fadeInDown">
                <h2>Công ty hot</h2>
                <p class="lead">Các bạn đang tìm một công ty hot???</p>
            </div>

            <div class="row">
              <?php $i=0; foreach ($list as $value) { $i++;?>
                <div class="col-sm-6 col-md-4">
                  <div class="media services-wrap wow fadeInDown">
                    <div class="pull-left col-md-4 col-sm-4 col-xs-4 ">
                      <a href="<?php echo base_url('/jop/cong_viec/'.$value->id); ?>">
                        <?php if($value->sLogo==''){?>
                           <img class="img-responsive" src="<?php echo public_url('/backend/assets/images/avatars/profile-pic.jpg'); ?>">
                        <?php
                        }else{?>
                           <img class="img-responsive" src="<?php echo base_url('/uploads/employer/'.$value->sLogo);?>">
                        <?php
                        } ?>
                      
                       
                      </a>
                    </div>
                    <div class="media-body ">
                      <a href="<?php echo base_url('/jop/cong_viec/'.$value->id); ?>">
                        <h5 class="media-heading" style="color: #ed1c24;"><?php //echo $value->sJobTitle; ?></h5>
                      </a>
                      <a href="<?php echo base_url('/jop/viec_cong_ty/'.$value->id); ?>">
                        <h5 class="media-heading"><?php echo $value->sComName; ?></h5>
                      </a>
                      <p><i class="fa fa-globe"></i><span> <?php echo $value->sWebsite; ?></span></p>
                      <p><i class="fa  fa-home"></i><span> <?php echo $value->sAddress;?></span></p>
                      <p style="color: red;"><i class="fa fa-envelope-o"></i><a href="<?php echo base_url('/jop/viec_cong_ty/'.$value->id); ?>"><span> Tuyển dụng</span></a></p>
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