<section id="feature" >
        <div class="container">
           <div class="center wow fadeInDown">
                <h2>Đăng kí tài khoản mới</h2>
            </div>
            <?php $this->load->view('site/message'); ?>
            <div class="row">
                <div class="features ">
                    <div class="col-md-6 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
                        <div class="feature-wrap" style="border: 1px solid #da1414;">
                            <a href="<?php echo base_url('dangki/nguoitimviec'); ?>">
                                <i class="fa  fa-users"></i>
                            </a>
                            <a href="<?php echo base_url('dangki/nguoitimviec'); ?>">
                            <h2>Người tìm việc</h2>
                            </a>
                            <h3>Người tìm việc đăng kí</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-6 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
                        <div class="feature-wrap" style="border: 1px solid #da1414; ">
                        	<a href="<?php echo base_url('dangki/nhatuyendung'); ?>">
                        		<i class="fa  fa-globe"></i>
                        	</a>
                        	<a href="<?php echo base_url('dangki/nhatuyendung'); ?>">
                        		<h2>Nhà tuyển dụng</h2>
                        	</a>
                        	<h3>Nhà tuyển dụng đăng kí</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-6 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
                        <div class="feature-wrap" style="border: 1px solid #da1414; ">
                        	<a href="<?php echo base_url('nguoitimviec/user2_login'); ?>">
                        		<i class="fa fa-lock"></i>
                        	</a>
                        	<a href="<?php echo base_url('nguoitimviec/user2_login'); ?>">
                        		<h2>Người tìm việc</h2>
                        	</a>
                        	<h3>Người tìm việc đăng nhập</h3>
                        </div>
                    </div><!--/.col-md-4-->
                    <div class="col-md-6 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
                    	<div class="feature-wrap" style="border: 1px solid #da1414;">
                    		<a href="<?php echo base_url('nhatuyendung/user_login'); ?>">
                    			<i class="fa fa-lock"></i>
                    		</a>
                    		<a href="<?php echo base_url('nhatuyendung/user_login'); ?>">
                    			<h2>Nhà tuyển dụng</h2>
                    		</a>
                    		<h3>Nhà tuyển dụng đăng nhập</h3>
                    	</div>
                    </div><!--/.col-md-4-->
                
                   
                </div><!--/.services-->
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#feature-->