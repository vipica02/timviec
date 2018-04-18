  <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p><i class="fa fa-phone-square"></i>  +0984407771</p></div>
                    </div>
                    <div class="col-sm-6 col-xs-8">
                       <div class="social">
                            <ul class="social-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                            <div class="search">
                                <form role="form" action="<?php echo base_url('search'); ?>" method="get" >
                                    <input type="text" class="search-form" name="search" autocomplete="off" placeholder="Search">
                                    <i class="fa fa-search"></i>
                                </form>
                           </div>
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo public_url() ?>/fontend/assets/images/logo2.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo base_url(); ?>" title="Home">Home</a></li>
                        <li><a href="<?php echo base_url('/post/read/82'); ?>" title="Giới thiệu">Giới thiệu</a></li>
                     
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ngành nghề <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                            <?php foreach ($list_career as $value) {?>
                                <li><a href="<?php echo base_url('jop/nganh_nghe/'.$value->id); ?>"><?php echo $value->sCareerName; ?></a></li>
                            <?php
                            } ?>
                                
                            </ul>
                        </li>
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tỉnh thành<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                            <?php foreach ($list_city as $value) {?>
                                <li><a href="<?php echo base_url('jop/city/'.$value->id); ?>"><?php echo $value->sCityName; ?></a></li>
                            <?php
                            } ?>
                                
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bài viết <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                            <?php  foreach ($list_category as $value) {?>
                                 <li><a href="<?php echo base_url('post/category/'.$value->id); ?>"><?php echo $value->sNewsCategory; ?></a></li>
                            <?php
                                
                            } ?>
                               
                            </ul>
                        </li>
                        
                        <li><a href="<?php echo base_url('contact'); ?>">Liên hệ</a></li>    
                        <?php if(empty($jobseeker_info) && empty($employer_info)){?>
                             <li><a href="<?php echo base_url('dangki'); ?>">Đăng kí</a></li>
                        <?php
                        }?> 
                                               
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->