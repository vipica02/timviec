
   <section id="blog" class="container">
        <div class="center">
            <h2><?php echo $info->sNewsTitle; ?></h2>
            <p class="lead"><i class="glyphicon glyphicon-user"></i> <?php echo 'Người đăng: '; echo $info_name->sUserName; ?> &nbsp;<i class="glyphicon  glyphicon-time"></i> <?php echo 'Cập nhật lúc:'; echo $info->dDatePosted; ?> </p>
        </div>

        <div class="blog">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-item">
                      <?php if($info->sPicture!=''){?>
                      <img class="img-responsive img-blog" src="<?php echo base_url('uploads/post/'.$info->sPicture); ?>" width="100%" alt="" />
                      <?php 
                      } ?>
                        
                            <div class="row">  
                                <div class="col-xs-12 col-sm-2 text-center">
                                    <div class="entry-meta">
                                      <span id="publish_date"><?php
                                      $better_date = nice_date($info->dDatePosted, 'd');
                                        $date2= mdate('%d', time());

                                        echo substr(($date2-$better_date),2);
                                        ?></span>
                                        <span><i class="fa fa-user"></i> <a href="#"><?php echo $info_name->sUserName; ?></a></span>
                                        <span><i class="fa fa-comment"></i> <a href="blog-item.html#comments"><?php echo $total_comment; ?>Comments</a></span>
                                       
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-10 blog-content">
                                   <?php echo $info->sContent; ?>
                                    <div class="post-tags">
                                        
                                    </div>

                                </div>
                            </div>
                        </div><!--/.blog-item-->
                        
                        <div class="media reply_section">
                            <div class="pull-left post_reply text-center">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i> </a></li>
                                </ul>
                            </div>
                        </div> 
                       <!--  <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="10"></div> -->
                        <h1 id="comments_title"><?php echo $total_comment; ?> Comments</h1>
                        <?php $i=0; foreach ($list_comment as  $value) {$i++;?>
                            <div class="media comment_section">
                                <div class="pull-left post_comments">
                                    <a href="#"><img src="<?php echo public_url('/backend/assets/images/avatars/avatar4.png'); ?>" class="img-circle" alt="" /></a>
                                </div>
                                <div class="media-body post_reply_comments">
                                    <h3><?php echo $value->sUserName; ?></h3>
                                    <h4><i class="fa fa-clock-o"></i> <?php echo $value->dDatepost; ?></h4>
                                    <p><?php echo $value->sMessage; ?></p>
                                    <a href="#">Reply</a>
                                </div>
                            </div> 
                            <?php if($info_reply[$i-1]){?>
                              <div class="space-8"></div>
                              <div class="col-md-11 pull-right">
                               <div class="media comment_section">
                                <div class="pull-left post_comments">
                                  <a href="#"><img src="<?php echo public_url('/backend/assets/images/avatars/avatar2.png'); ?>" class="img-circle" alt="" /></a>
                                </div>
                                <div class="media-body post_reply_comments">
                                  <h3></h3>
                                  <h4><i class="fa fa-clock-o"></i> <?php echo $info_reply[$i-1]->sDatepost; ?></h4>
                                  <p><?php echo $info_reply[$i-1]->sReply; ?></p>
                                  <a href="#">Reply</a>
                                </div>
                              </div> 
                            </div>
                            <div class="clearfix"></div>
                            <?php

                            } ?>
                           
                        <?php
                          
                        } ?>
                      

                        <div id="contact-page clearfix">
                            <div class="status alert alert-success" style="display: none"></div>
                            <div class="message_heading">
                                <h4>Leave a Replay</h4>
                                <p>Make sure you enter the(*)required information where indicate.HTML code is not allowed</p>
                            </div> 
      
                            <form  class="contact-form" enctype="multipart/form-data" name="contact-form" method="post" action="" role="form">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Name * <span class="red"><?php echo form_error('name'); ?></span></label>
                                            <input type="text" class="form-control" required="required" name="name" value="<?php echo set_value('name'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Email * <span class="red"><?php echo form_error('email'); ?></span></label>
                                            <input type="email" class="form-control" required="required" name="email" value="<?php echo set_value('email'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>URL *<span class="red"><?php echo form_error('url'); ?></span> </label>
                                            <input type="url" class="form-control" name="url" value="<?php echo set_value('url'); ?>">
                                        </div>                    
                                    </div>
                                    <div class="col-sm-7">                        
                                        <div class="form-group">
                                            <label>Message *<span class="red"><?php echo form_error('message'); ?></span></label>
                                            <textarea name="message" id="message" name="message" required="required" class="form-control" rows="8" ><?php echo set_value('message'); ?></textarea>
                                        </div>                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg" name="submit" required="required">Submit Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>     
                        </div><!--/#contact-page-->
                    </div><!--/.col-md-8-->

                    <aside class="col-md-4">
                      <div class="widget search">
                        <form role="form"  action="<?php echo base_url('post/search'); ?>" method="get">
                          <input type="text" class="form-control search_box" name="search" autocomplete="off" placeholder="Search Here">
                        </form>
                      </div><!--/.search-->

                      <div class="widget categories">
                        <h3>Bài viết mới</h3>
                        <div class="row">
                          <div class="col-sm-12">
                            <?php if(!empty($list)){
                              $i=10;
                              foreach ($list as  $value) {$i--; ?>
                                  <div class="single_comments">
                                    <div class="single_comments_img col-sm-3 col-md-3">
                                      <a href="<?php echo base_url('/post/read/'.$value->id); ?>">
                                        <img src="<?php echo base_url('uploads/post/'.$value->sPicture); ?>" alt=""  />
                                      </a>
                                    </div>
                                    <div class="single_comments_body col-sm-9 col-md-9">  
                                      <a href="<?php echo base_url('/post/read/'.$value->id); ?>">
                                        <p><?php  echo $value->sNewsTitle;?></p>
                                      </a>  
                                      <div class="entry-meta small muted">
                                        <span><i class="glyphicon glyphicon-time"></i>  <?php echo $value->dDatePosted; ?></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="clearfix"></div>
                                <?php
                                  if($i==0){
                                      break; 
                                  }
                                }

                              }?>
                            
                          </div>
                        </div>                     
                      </div><!--/.recent comments-->


                      <div class="widget categories">
                        <h3>Danh mục</h3>
                        <div class="row">
                          <div class="col-sm-6">
                            <ul class="blog_category">
                            <?php $i=0;  foreach ($list_category as  $value) {
                            $i++;
                            if($total[$i-1]!=0){?>
                                 <li><a href="<?php echo base_url('/post/category/'.$value->id); ?>"><?php echo $value->sNewsCategory; ?><span class="badge"><?php echo $total[$i-1]; ?></span></a></li>
                            <?php
                                 }
                            } ?>
                            </ul>
                          </div>
                        </div>                     
                      </div><!--/.categories-->
                

                    </aside>     

            </div><!--/.row-->

         </div><!--/.blog-->

    </section><!--/#blog-->

   

    <section id="partner">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>Giới thiệu</h2>
                <p class="lead">Chào mừng quý vị đên với chúng tôi </p>
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

    

   