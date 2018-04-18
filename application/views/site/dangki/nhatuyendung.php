

<section id="feature" >
        <div class="container">
           <div class="center wow fadeInDown">
                <h2>Đăng kí tài khoản nhà tuyển dụng</h2>
                <a href="<?php echo base_url('nhatuyendung/user_login'); ?>">Đăng nhập</a>| <a href="<?php echo base_url('nguoitimviec/user2_login'); ?>">Đăng nhập người tìm việc</a>
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
                                                    <input type="text" name="email"  value="<?php echo set_value('email'); ?>" id="email"  placeholder="sangtran@gmail.com" class="col-md-12 col-xs-12">
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
                                <h4 class="widget-title">Thông tin liên hệ</h4>
                                <div class="widget-toolbar">
                                    <a href="#" data-action="collapse">
                                        <i class="ace-icon fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    <div>
                                        <label for="form-field-1" class="control-label bolder blue">Thông tin người liên hệ<span class="red"><?php echo form_error('scontactname'); ?></span></label>
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group col-md-12 col-xs-12">
                                                    <input type="text" id="scontactname" name="scontactname" placeholder="Thông tin người liên hệ" value="<?php echo set_value('scontactname'); ?>" class="col-md-12 col-xs-12">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space space-8"></div>
                                    </div>
                                    <div>
                                        <label for="form-field-1" class="control-label bolder blue">Email<span class="red"><?php echo form_error('semailcontact'); ?></span></label>
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group col-md-12 col-xs-12">
                                                    <input type="text" id="semailcontact" name="semailcontact" placeholder="Email" value="<?php echo set_value('semailcontact'); ?>" class="col-md-12 col-xs-12">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space space-8"></div>
                                    </div>
                                    <div>
                                        <label for="form-field-1" class="control-label bolder blue">Số điện thoại người liên hệ<span class="red"><?php echo form_error('snumecontact'); ?></span></label>
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group col-md-12 col-xs-12">
                                                    <input type="text" id="snumecontact" name="snumecontact" placeholder="Số điện thoại" value="<?php echo set_value('snumecontact'); ?>" class="col-md-12 col-xs-12">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space space-8"></div>
                                    </div>
                                
                                </div>
                            </div>

                        </div>
                    </div><!-- /.span -->
                     <div class="clearfix"></div>
                    <div class="col-xs-12 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms"">
                        <div class="widget-box">
                            <div class="widget-header">
                                <h4 class="widget-title">Thông tin công ty</h4>
                                
                                <div class="widget-toolbar">
                                    <a href="#" data-action="collapse">
                                        <i class="ace-icon fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">

                                    <div>
                                        <label for="form-field-1" class="control-label bolder blue">Tên công ty <span class="red"><?php echo form_error('scomname'); ?></span></label>
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group col-md-12 col-xs-12">
                                                    <input type="text" id="scomname"  name="scomname" placeholder="Tên công ty" value="<?php echo set_value('scomname'); ?>" class="col-md-12 col-xs-12">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space space-8"></div>
                                    </div>
                                    <div>
                                        <label for="form-field-1" class="control-label bolder blue">Địa chỉ<span class="red"><?php echo form_error('saddress'); ?></span></label>
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group col-md-12 col-xs-12">
                                                    <input type="text" id="saddress" name="saddress" placeholder="Địa chỉ" value="<?php echo set_value('saddress'); ?>" class="col-md-12 col-xs-12">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space space-8"></div>
                                    </div>
                                    <div>
                                        <label for="form-field-1" class="control-label bolder blue">Điện thoại<span class="red"><?php echo form_error('stel'); ?></span></label>
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group col-md-12 col-xs-12">
                                                    <input type="text" id="stel" name="stel" placeholder="Số điện thoại" value="<?php echo set_value('stel'); ?>" class="col-md-12 col-xs-12">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space space-8"></div>
                                    </div>

                                    <div>
                                            <label for="form-field-select-3" class="control-label bolder blue">Tỉnh/ Thành phố <span class="red"><?php echo form_error('scity'); ?></span></label>

                                            <br />
                                            <select class="chosen-select form-control" id="form-field-select-3"  name="scity" data-placeholder="Choose a State...">
                                                <option value="<?php echo set_value('scity'); ?>"></option>

                                                <?php 
                                                foreach ($list as  $value) {?>
                                                <option value="<?php echo $value->id; ?>"><?php echo $value->sCityName; ?></option>
                                                <?php
                                            } ?>

                                        </select>

                                        <div class="space space-8"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.span -->
                    
                    <div class="col-xs-12 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms"">
                        <div class="widget-box">
                            <div class="widget-header">
                                <h4 class="widget-title">Thông tin công ty</h4>
                                
                                <div class="widget-toolbar">
                                    <a href="#" data-action="collapse">
                                        <i class="ace-icon fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">

                                    <div>
                                            <label for="form-field-select-3" class="control-label bolder blue">Quy mô <span class="red"><?php echo form_error('sscale'); ?></span></label>
                    
                                            <br />
                                            <select class="chosen-select form-control" id="form-field-select-3" name="sscale" data-placeholder="Chọn quy mô" >
                                              <option value="<?php echo set_value('sscale'); ?>"></option>   
                                                <?php 

                                               foreach ($list1 as  $value) {?>
                                                <option value="<?php echo $value->id; ?>"><?php echo $value->sScale_Name; ?></option>
                                                <?php
                                           } ?>

                                        </select>

                                        <div class="space space-8"></div>
                                    </div>

                                    <div>
                                        <label for="form-field-1" class="control-label bolder blue">Sơ lược về công ty<span class="red"><?php echo form_error('sprofile'); ?></span></label>
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group col-md-12 col-xs-12">
                                                <textarea name="sprofile" id="sprofile" cols="30" rows="6" class="col-md-12 col-xs-12"  placeholder="Sơ lược về công ty"><?php echo set_value('sprofile'); ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space space-8"></div>
                                    </div>
                                    <div>
                                        <label for="form-field-1" class="control-label bolder blue">Fax<span class="red"><?php echo form_error('sfax'); ?></span></label>
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="input-group col-md-12 col-xs-12">
                                                    <input type="text" id="sfax" name="sfax" placeholder="Fax" value="<?php set_value('sfax'); ?>" class="col-md-12 col-xs-12">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space space-8"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.span -->
                   
                </div>
           
                <div class="row">
                    <div class="col-xs-12 col-md-6 pull-right">
                        <div class="widget-box">
                            <div class="widget-header">
                                <input type="submit" value="Đăng kí" class="btn btn-app btn-success pull-right">
                            </div>
                        </div>
                    </div>  
                </div>
               </form>  
           </div>
            <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms"">
                Bài viết mới                
            </div>
            
        </div><!--/.container-->
    </section><!--/#feature-->
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