<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Homeland &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="<?= base_url('public/assets/fonts/icomoon/style.css')?>">

    <link rel="stylesheet" href="<?= base_url('public/assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/magnific-popup.css')?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/jquery-ui.css')?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/owl.carousel.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/owl.theme.default.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/bootstrap-datepicker.css')?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/mediaelementplayer.css')?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/animate.css')?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/fonts/flaticon/font/flaticon.css')?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/fl-bigmug-line.css')?>">
    
  
    <link rel="stylesheet" href="<?= base_url('public/assets/css/aos.css')?>">

    <link rel="stylesheet" href="<?= base_url('public/assets/css/style.css')?>">
    
  </head>
  <body>
  
  <!-- <div class="site-loader"></div> -->
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <div class="site-navbar mt-4">
        <div class="container py-1">
          <div class="row align-items-center">
            <div class="col-8 col-md-8 col-lg-4">
              <h1 class="mb-0"><a href="<?= url_to('home'); ?>" class="text-white h2 mb-0"><strong>Homeland<span class="text-danger">.</span></strong></a></h1>
            </div>
            <div class="col-4 col-md-4 col-lg-8">
              <nav class="site-navigation text-right text-md-right" role="navigation">

                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li class="active">
                    <a href="<?= url_to('home'); ?>">Home</a>
                  </li>
                  <li><a href="<?= url_to('get.prop.type', 'buy'); ?>">Buy</a></li>
                  <li><a href="<?= url_to('get.prop.type', 'rent'); ?>">Rent</a></li>
                  <!-- <li class="has-children">
                    <a href="properties.html">Properties</a>
                    <ul class="dropdown arrow-top">
                      <li><a href="#">Condo</a></li>
                      <li><a href="#">Property Land</a></li>
                      <li><a href="#">Commercial Building</a></li>
                     
                    </ul>
                  </li> -->
                  <li><a href="<?= url_to('about'); ?>">About</a></li>
                  <li><a href="<?= url_to('contact'); ?>">Contact</a></li>

                  <?php if(isset(auth()->user()->username)) : ?>

                    <li class="has-children">
                        <a href=""><?= auth()->user()->username; ?></a>
                        <ul class="dropdown arrow-top">
                        <li><a href="<?= url_to('users.props.requests', auth()->user()->id); ?>">Properties Requests</a></li>
                        <li><a href="<?= url_to('users.props.saved', auth()->user()->id); ?>">Saved Properties</a></li>
                        <li><a href="<?= base_url('logout'); ?>">Logout</a></li>
                        
                        </ul>
                    </li>
                  <?php else : ?> 

                 
                    <li><a href="<?= base_url('login'); ?>">Login</a></li>
                    <li><a href="<?= base_url('register'); ?>">Register</a></li>
                  <?php endif; ?>
                </ul>
              </nav>
            </div>
           

          </div>
        </div>
      </div>
    </div>

    <div class="app">
        <?= $this->renderSection('content'); ?>
    </div>


    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="mb-5">
              <h3 class="footer-heading mb-4">About Homeland</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe pariatur reprehenderit vero atque, consequatur id ratione, et non dignissimos culpa? Ut veritatis, quos illum totam quis blanditiis, minima minus odio!</p>
            </div>

            
            
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Buy</a></li>
                  <li><a href="#">Rent</a></li>
                  <li><a href="#">Properties</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Terms</a></li>
                </ul>
              </div>
            </div>


          </div>

          <div class="col-lg-4 mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Follow Us</h3>

                <div>
                  <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                </div>

            

          </div>
          
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>

  </div>

  <script src="<?= base_url('public/assets/js/jquery-3.3.1.min.js') ?>"></script>
  <script src="<?= base_url('public/assets/js/jquery-migrate-3.0.1.min.js') ?>"></script>
  <script src="<?= base_url('public/assets/js/jquery-ui.js') ?>"></script>
  <script src="<?= base_url('public/assets/js/popper.min.js') ?>"></script>
  <script src="<?= base_url('public/assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('public/assets/js/owl.carousel.min.js') ?>"></script>
  <script src="<?= base_url('public/assets/js/mediaelement-and-player.min.js') ?>"></script>
  <script src="<?= base_url('public/assets/js/jquery.stellar.min.js') ?>"></script>
  <script src="<?= base_url('public/assets/js/jquery.countdown.min.js') ?>"></script>
  <script src="<?= base_url('public/assets/js/jquery.magnific-popup.min.js') ?>"></script>
  <script src="<?= base_url('public/assets/js/bootstrap-datepicker.min.js') ?>"></script>
  <script src="<?= base_url('public/assets/js/aos.js') ?>"></script>

  <script src="<?= base_url('public/assets/js/main.js') ?>"></script>
    
  </body>
</html>