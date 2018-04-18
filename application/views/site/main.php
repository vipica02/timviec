<!DOCTYPE html>
<html lang="en">
<head>
 <?php $this->load->view('site/head.php'); ?>
</head><!--/head-->

<body class="homepage">

  <?php $this->load->view('site/header.php'); ?>
  <?php $this->load->view($template,$this->data);?>
  <section id="conatcat-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="pull-left">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="media-body">
                            <h2>Bạn muốn giúp đỡ hãy gọi tới đường dây nóng  của chúng tôi?</h2>
                            <p>Đường dây nóng hoạt động 24/24 giờ thông qua số điện thoại +0984407771</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.container-->    
    </section><!--/#conatcat-info-->
   <section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="widget">
                        <h3 >Miền Bắc</h3>
                        <ul>
                            <li><a href="#">Trần Văn Sang: 0984407771</a></li>
                            <li><a href="#">Trần Văn Sang: 0984407771</a></li>
                            <li><a href="#">Trần Văn Sang: 0984407771</a></li>
                            <li><a href="#">Trần Văn Sang: 0984407771</a></li>
                            <li><a href="#">Trần Văn Sang: 0984407771</a></li>
                            <li><a href="#">Trần Văn Sang: 0984407771</a></li>
                            <li><a href="#">Trần Văn Sang: 0984407771</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-4 text-center">
                    <div class="widget">
                        <h3>Miền Trung</h3>
                        <ul>
                            <li><a href="#">Trần Văn Sang: 0984407771</a></li>
                            <li><a href="#">Trần Văn Sang: 0984407771</a></li>
                            <li><a href="#">Trần Văn Sang: 0984407771</a></li>
                            <li><a href="#">Trần Văn Sang: 0984407771</a></li>
                            <li><a href="#">Trần Văn Sang: 0984407771</a></li>
                            <li><a href="#">Trần Văn Sang: 0984407771</a></li>
                            <li><a href="#">Trần Văn Sang: 0984407771</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-4 text-center">
                    <div class="widget">
                        <h3 >Miền Nam</h3>
                        <ul>
                            <li><a href="#">Trần Văn Sang: 0984407771</a></li>
                            <li><a href="#">Trần Văn Sang: 0984407771</a></li>
                            <li><a href="#">Trần Văn Sang: 0984407771</a></li>
                            <li><a href="#">Trần Văn Sang: 0984407771</a></li>
                            <li><a href="#">Trần Văn Sang: 0984407771</a></li>
                            <li><a href="#">Trần Văn Sang: 0984407771</a></li>
                            <li><a href="#">Trần Văn Sang: 0984407771</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->
            </div>
        </div>
    </section><!--/#bottom-->

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2017 <a target="_blank" href="#" title="sangtrank64@gmail.com">Sangtran</a>. Email : sangtrank64@gmail.com
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><a href="<?php echo base_url('post/read/82'); ?>">Giới thiệu</a></li>
                        <li><a href="<?php echo base_url('contact'); ?>">Liên hệ</a></li>
                        <li><a href="<?php echo base_url('dangki'); ?>">Đăng kí</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->


<?php $this->load->view('site/footer.php'); ?>
</body>
</html>