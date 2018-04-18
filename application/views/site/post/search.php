<section id="blog" class="container">
        <div class="center">
            <h2>Từ khóa tìm kiếm "<?php echo $key; ?>"</h2>
            <p class="lead"></p>
        </div>

        <div class="blog">
            <div class="row">
                 <?php if(!empty($list)){?>
                    <div class="col-md-8">
                   <?php $i=0; foreach ($list as  $value) { $i++;?>
                   <div class="blog-item">
                    <div class="row">
                       <div class="col-sm-2 text-center">
                        <div class="entry-meta"> 
                            <span id="publish_date">07  NOV</span>
                            <span><i class="fa fa-user"></i> <a href="#"><?php echo $info_admin[$i-1]->sUserName; ?></a></span>
                            <span><i class="fa fa-comment"></i> <a href="blog-item.html#comments"><?php if(!empty($total_comment[$i-1])){echo $total_comment[$i-1];} ?> Comments</a></span>
                          <!--   <span><i class="fa fa-heart"></i><a href="#">56 Likes</a></span> -->
                        </div>
                    </div>
                    <div class="col-sm-10 blog-content">
                        <a href="<?php echo base_url('/post/read/'.$value->id); ?>"><img class="img-responsive img-blog" src="<?php echo base_url('uploads/post/'.$value->sPicture); ?>" width="100%" alt="" /></a>
                        <h2><a href="<?php echo base_url('/post/read/'.$value->id); ?>"><?php echo $value->sNewsTitle; ?></a></h2>
                        <h3><?php if($value->sDescription!=''){echo $value->sDescription;} ?></h3>
                        <a class="btn btn-primary readmore" href="<?php echo base_url('/post/read/'.$value->id); ?>">Read More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>    
            </div><!--/.blog-item-->
                    <?php
                   } ?>
              
                        
                    <ul class="pagination pagination-lg">
                  
                      <?php //echo $this->pagination->create_links(); ?> 
                    
                    </ul><!--/.pagination-->
                </div><!--/.col-md-8-->
                 <?php

                }else{?>
                    <div class="col-md-8 text-center">
                        <div>
                            <h2> <span class="red">Từ khóa bạn cần tìm kiếm hiện không tồn tại</span></h2>
                        </div>
                    </div>
                <?php
                    } ?>

                <aside class="col-md-4">
                    <div class="widget search">
                        <form role="form" action="<?php echo base_url('post/search'); ?>" method="get">
                                <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here" name="search">
                        </form>
                    </div><!--/.search-->
    				
                    <div class="widget archieve">
                        <h3>Danh mục</h3>
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="blog_archieve">
                                   <?php $i=0; foreach ($list_category as $value) {$i++;
                                       if($total[$i-1]!=0) {?>
                                       <li><a href="<?php echo base_url('post/category/'.$value->id); ?>"><i class="fa fa-angle-double-right"></i><?php echo $value->sNewsCategory; ?> <span class="pull-right">(<?php echo $total[$i-1]; ?>)</span></a></li>
                                    <?php
                                       }    
                                    } ?>
                                </ul>
                            </div>
                        </div>                     
                    </div><!--/.archieve-->
    			</aside>  
            </div><!--/.row-->
        </div>
    </section>