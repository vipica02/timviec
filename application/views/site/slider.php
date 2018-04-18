 <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
            <?php if(!empty($total)){
                for ($i=0; $i < $total ; $i++) {?> 
                  <li data-target="#main-slider" data-slide-to="<?php echo $i; ?>" <?php if($i==0){echo 'class="active"';} ?>></li>
            <?php                       
                }

            } ?>
              
            </ol>
            <div class="carousel-inner">
                <?php if(!empty($list)){
                    $i=0;
                    foreach ($list as $value) { $i++; ?>
                    <div class="item <?php if($i==1){echo 'active';} ?>" style="background-image: url(<?php echo base_url() ?>uploads/user/slider/<?php echo $value->sBackgroud; ?>)">
                      <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                             
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1"><?php echo $value->stitle; ?> </h1>
                                    <h2 class="animation animated-item-2"><?php echo $value->sContenName; ?></h2>
                                    <?php if(empty($employer_info)){?>
                                        <a class="btn-slide animation animated-item-3" href="<?php echo base_url('nhatuyendung/user_login'); ?>">Nhà tuyển dụng đăng nhập</a>
<!--                                         <a class="btn-slide animation animated-item-3" href="<?php echo base_url('dangki/nhatuyendung'); ?>">Nhà tuyển dụng đăng kí</a> -->
                                    <?php
                                    } ?>
                                    <?php if(empty($jobseeker_info)){?>
                                        <a class="btn-slide animation animated-item-3" href="<?php echo base_url('nguoitimviec/user2_login'); ?>">Người tìm việc đăng nhập</a>
                                         <!-- <a class="btn-slide animation animated-item-3" href="<?php echo base_url('dangki/nguoitimviec'); ?>">Người tìm việc đăng kí</a> -->
                                    <?php

                                    } ?>
                                    
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="<?php echo base_url() ?>uploads/user/slider/<?php echo $value->sImage; ?>" class="img-responsive">
                                </div>
                            </div>

                        </div>
              
                    </div>
                </div><!--/.item-->
                      <?php    
                    } 
                }?>
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->