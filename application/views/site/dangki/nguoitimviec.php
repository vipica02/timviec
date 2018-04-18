

<section id="feature" >
        <div class="container">
           <div class="center wow fadeInDown">
                <h2>Đăng kí tài khoản người tìm việc</h2>
                <a href="<?php echo base_url('nguoitimviec/user2_login'); ?>">Đăng nhập</a>| <a href="<?php echo base_url('nhatuyendung/user_login'); ?>">Đăng nhập nhà tuyển dụng</a>
            </div>
    <?php $this->load->view('site/message'); ?>
           <div class="col-md-8">
             <form action="" method="post" enctype="multipart/form-data" class="form">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms"">
                        <div class="widget-box">
                            <div class="widget-header">
                                <h4 class="widget-title">Mật khẩu</h4>
                                <div class="widget-toolbar">
                                    <a href="#" data-action="collapse">
                                        <i class="ace-icon fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                
                                    <div>
                                        <label for="form-field-1" class="control-label bolder blue">Email <span class="red"><?php echo form_error('email'); ?></span></label>
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group col-md-12 col-xs-12 ">
                                                    <input type="text" name="email"  value="<?php  echo set_value('email'); ?>" id="email"  placeholder="sangtran@gmail.com" class="col-md-12 col-xs-12">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="space space-8"></div>
                                    </div>

                                    <div>
                                        <label for="form-field-1" class="control-label bolder blue">Password <span class="red"><?php echo form_error('password'); ?></span></label>
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group col-md-12 col-xs-12">
                                                    <input type="password" id="password" name="password" placeholder="Pasword" value="" class="col-md-12 col-xs-12">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="space space-8"></div>
                                    </div>

                                    <div>
                                        <label for="form-field-1" class="control-label bolder blue">Nhập lại password <span class="red"><?php echo form_error('re_password'); ?></span></label>
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group col-md-12 col-xs-12">
                                                    <input type="password" id="re_password" name="re_password"  placeholder="Pasword" class="col-md-12 col-xs-12">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="space space-8"></div>
                                    </div>

                                    
                                </div>
                            </div>

                        </div>
                    </div><!-- /.span -->
                    
                    <div class="col-xs-12 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms"">
                        <div class="widget-box">
                            <div class="widget-header">
                                <h4 class="widget-title">Thông tin cá nhân</h4>
                                <div class="widget-toolbar">
                                    <a href="#" data-action="collapse">
                                        <i class="ace-icon fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    <div>
                                        <label for="form-field-1" class="control-label bolder blue">Họ tên<span class="red"><?php echo form_error('name'); ?></span></label>
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group col-md-12 col-xs-12">
                                                    <input type="text" id="scontactname" name="name" placeholder="Thông tin người liên hệ" value="<?php echo set_value('name'); ?>" class="col-md-12 col-xs-12">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space space-8"></div>
                                    </div>
                                
                                    <div>
                                        <label for="form-field-1" class="control-label bolder blue">Số điện thoại <span class="red"><?php echo form_error('stel'); ?></span></label>
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group col-md-12 col-xs-12">
                                                    <input type="text" id="stel" name="stel" placeholder="Số điện thoại" value="<?php echo set_value('stel'); ?>" class="col-md-12 col-xs-12">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space space-8"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12  pull-right">
                                            <div class="widget-box">
                                                <div class="widget-header">
                                                    <input type="submit" value="Đăng kí" class="btn btn-app btn-success pull-right">
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- /.span -->
                     <div class="clearfix"></div>
                </div>
           
                
               </form>  
           </div>
            <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms"">
                Bài viết mới                
            </div>
            
        </div><!--/.container-->
    </section><!--/#feature-->
