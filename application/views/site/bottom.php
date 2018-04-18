<?php $this->load->view('site/slider.php'); ?>
    <section id="feature" >
        <div class="container">
           <div class="center wow fadeInDown">
                <h2>Công việc theo ngành nghề</h2>
                <p class="lead"><br> Bạn đang cần 1 công việc theo ngành nghề???</p>
            </div>

            <div class="row">
                <div class="features">
                <?php if($list_career){
                    $i=0;
                    foreach ($list_career as  $value) {$i++;?>
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <a href="<?php echo base_url('jop/nganh_nghe/'.$value->id); ?>">
                                <i class="fa <?php echo $value->sIcon; ?>"></i>
                            </a>
                            
                            <a href="<?php echo base_url('jop/nganh_nghe/'.$value->id); ?>">
                            <h2><?php echo $value->sCareerName; ?></h2>
                            </a>
                            <h3><?php echo $value->sConten; ?></h3>
                        </div>
                    </div><!--/.col-md-4-->
                    <?php if($i%3==0){?>
                        <div class="clearfix"></div>
                    <?php
                        }?>
                    <?php
                        }
                    } ?>
                   
                </div><!--/.services-->
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#feature-->

    <section id="services" class="service-item">
	   <div class="container">
            <div class="center wow fadeInDown">
                <h2>Công ty hot</h2>
                <p class="lead">Các bạn đang tìm một công ty hot???</p>
            </div>

            <div class="row">
              <?php $i=0; foreach ($list_vip as $value) { $i++;?>
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

    <section id="middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 wow fadeInDown">
                    <div class="skill">
                        <h2>Trình độ</h2>
                        <?php if(!empty($list_diploma)){
                            foreach ($list_diploma as  $value) {?>
                          
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h3 class="panel-title">
                                    <a class="accordion-toggle" href="<?php echo base_url('jop/trinh_do/'.$value->id); ?>">
                                      <?php echo $value->sDiplomaName; ?>
                                      <i class="fa fa-angle-right pull-right"></i>
                                    </a>
                                  </h3>
                                </div>
                              </div>  
                            

                        <?php
                            
                            }
                          } ?>
                     
                                          
                    </div>

                </div><!--/.col-sm-6-->

              
                <div class="col-sm-6 wow fadeInDown">
                  <div class="accordion">
                    <h2>Bài viết mới</h2>
                    <div class="panel-group" id="accordion1">
                      <?php $a = array("collapseOne1","collapseTwo1","collapseThree1","collapseFour1"); ?>
                      <?php $i=0; foreach ($list_post as $value) {$i++;?>
                      <div class="panel panel-default">
                        <div class="panel-heading <?php if($i-1==0){echo 'active';} ?>">
                          <h3 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#<?php echo $a[$i-1]; ?>">
                              <?php echo $value->sNewsTitle; ?>
                              <i class="fa fa-angle-right pull-right"></i>
                            </a>
                          </h3>
                        </div>

                        <div id="<?php echo $a[$i-1]; ?>" class="panel-collapse collapse <?php if($i-1==0){echo 'in';} ?>">
                          <div class="panel-body">
                            <div class="media accordion-inner">
                              <div class="pull-left col-md-3 ">
                                <img class="img-responsive" src="<?php echo base_url('/uploads/post/'.$value->sPicture); ?>">
                              </div>
                              <div class="media-body">
                              <a href="<?php echo base_url('/post/read/'.$value->id); ?>">
                               <h4><?php echo $value->sNewsTitle; ?></h4>
                              </a>
                               <p><?php echo $value->sDescription; ?></p>
                             </div>
                           </div>
                         </div>
                       </div>
                     </div>
                     <?php if($i==4){ break;} ?>
                     <?php 
                   } ?>
                 </div><!--/#accordion1-->
               </div>
             </div>

            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#middle-->

    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 wow fadeInDown">
                   <div class="tab-wrap"> 
                        <div class="media">
                            <div class="parrent pull-left">
                                <ul class="nav nav-tabs nav-stacked">
                                  <?php $i = 0; foreach ($list_exp as $value) { $i++;?>
                                   <li <?php if($i==1){echo 'class="active"';} ?>><a href="#tab<?php echo $i; ?>" data-toggle="tab" <?php if($i==1){echo 'class="analistic-01"';}elseif($i==2){echo 'class="analistic-02"';}else{echo 'class="tehnical"';} ?>><?php echo $value->sExperience_name; ?></a></li>
                                  <?php
                                    
                                  } ?>
                                   
                                </ul>
                            </div>

                            <div class="parrent media-body">
                                <div class="tab-content">
                                <?php $i=0; foreach ($list_exp as $value) { $i++;?>
                                    <div class="tab-pane fade <?php if($i==1){echo 'active in';} ?>" id="tab<?php echo $i; ?>">
                                     
                                   <div class="clearfix"></div>
                                     <?php
                                     $j=0;
                                     if(!empty($value->list_cere)){
                                        foreach ($value->list_cere as  $sub) {$j++;?>
                                        <div class="media col-md-6">
                                         <div class="pull-left col-md-3">
                                        <?php if($list_employ[$j-1]->sLogo==' ' || empty($list_employ[$j-1]->sLogo)){?>
                                         <a href="<?php echo base_url('jop/cong_ty/'.$list_employ[$j-1]->id); ?>"> <img class="img-responsive " src="<?php echo public_url('/fontend/assets/'); ?>images/tab1.png"></a>
                                        <?php

                                        } else{?>
                                        <a href="<?php echo base_url('jop/cong_ty/'.$list_employ[$j-1]->id); ?>">
                                          <img class="img-responsive " src="<?php echo base_url('uploads/employer/'.$list_employ[$j-1]->sLogo); ?>"></a>
                                        <?php

                                        }?>
                                          
                                        </div>
                                        <div class="media-body ">
                                        <a href="<?php echo base_url('jop/cong_viec/'.$sub->id); ?>">
                                         <h2 class="red">Công việc: <?php echo $sub->sJobTitle; ?></h2>
                                        </a> 
                                        <a href="<?php echo base_url('jop/cong_ty/'.$list_employ[$j-1]->id); ?>"><h2><?php echo $list_employ[$j-1]->sComName; ?></h2></a>
                                        <p><i class="fa  fa-home"></i> <?php echo $list_employ[$j-1]->sAddress; ?>
                                         </p>
                                         <p>Giới thiệu: <?php echo $list_employ[$j-1]->sProfile; ?>
                                         </p>
                                       </div>

                                     </div>
                                        <?php
                                          if($j%2==0){echo '<div class="clearfix"></div>';}
                                        }
                                     }
                                     ?>
                                   </div> 
                                   <div class="clearfix"></div>
                                <?php
                                 
                                } ?>
                                   

                                       
                                  

                                </div> <!--/.tab-content-->  
                            </div> <!--/.media-body--> 
                        </div> <!--/.media-->     
                    </div><!--/.tab-wrap-->               
                </div><!--/.col-sm-6-->
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#content-->
    <section id="middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 wow fadeInDown">
                    <div class="skill">
                        <h2>Trình độ</h2>
                        <?php if(!empty($list_scale)){
                            foreach ($list_scale as  $value) {?>
                          
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h3 class="panel-title">
                                    <a class="accordion-toggle" href="<?php echo base_url('jop/trinh_do/'.$value->id); ?>">
                                      <?php //echo $value->sScale_Name; ?>
                                      <i class="fa fa-angle-right pull-right"></i>
                                    </a>
                                  </h3>
                                </div>
                              </div>  
                            

                        <?php
                            
                            }
                          } ?>
                     
                                          
                    </div>

                </div><!--/.col-sm-6-->

                <div class="col-sm-6 wow fadeInDown">
                  <div class="skill">
                  <h2>Tiền lương</h2>
                    <?php if(!empty($list_money)){
                      foreach ($list_money as  $value) {?>

                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title">
                            <a class="accordion-toggle" href="<?php echo base_url('jop/tien_luong/'.$value->id); ?>">
                              <?php echo $value->sWage_name; ?>
                              <i class="fa fa-angle-right pull-right"></i>
                            </a>
                          </h3>
                        </div>
                      </div>  


                      <?php

                    }
                  } ?>


                </div>

              </div><!--/.col-sm-6-->
                
             </div>

            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#middle-->
    <section id="partner">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>Our Partners</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>    

            <div class="partners">
                <ul>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="<?php echo public_url('/fontend/assets/'); ?>images/partners/partner1.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" src="<?php echo public_url('/fontend/assets/'); ?>images/partners/partner2.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" src="<?php echo public_url('/fontend/assets/'); ?>images/partners/partner3.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" src="<?php echo public_url('/fontend/assets/'); ?>images/partners/partner4.png"></a></li>
                    <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1500ms" src="<?php echo public_url('/fontend/assets/'); ?>images/partners/partner5.png"></a></li>
                </ul>
            </div>        
        </div><!--/.container-->
    </section><!--/#partner-->

    

   