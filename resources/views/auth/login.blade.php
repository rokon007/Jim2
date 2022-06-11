<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
     <!-- Site Metas -->
    <title>Jim Electrical</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="front/images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="front/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="front/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="front/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="front/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="front/css/custom.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="app_version" data-spy="scroll" data-target="#navbarApp" data-offset="98">

    
    <header class="header header_style_01">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html"><img src="images/logos/logo-app.png" alt="image"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarApp" aria-controls="navbarApp" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarApp">
                    <ul class="navbar-nav">
                        <li><a class="nav-link active" href="#home">Home</a></li>                
                        <li><a class="nav-link" href="#contact">Login</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">Registration</a></li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </header>   
    
    <section id="home" class="cd-hero js-cd-hero">
        <ul class="cd-hero__slider">
            <li class="cd-hero__slide cd-hero__slide--selected js-cd-slide">
                <div class="cd-hero__content cd-hero__content--half-width">
                    <h2>Jim Electric & Hardware</h2>
                    <p>Mirbag, Kaunia, Rangpur.</p>
                    <a href="#contact" class="hvr-bounce-to-right cd-hero__btn">Login</a>
                    <a href="{{ route('register') }}" class="hvr-bounce-to-right cd-hero__btn cd-hero__btn--secondary">Registration</a>
                </div> <!-- .cd-hero__content -->

                <div class="cd-hero__content cd-hero__content--half-width cd-hero__content--img">
                    <img src="uploads/app_iphone_01.png" class="img-fluid" alt="tech 1">
                </div> <!-- .cd-hero__content -->
            </li>
             <?php $success = Session::get('success');if($success){ ?>
         
    <script type="text/javascript">
     Swal.fire({
  icon: 'success',
  title: '<?php  echo $success; ?>',
  text: 'Jim Electric',
  footer: 'Jim Electric office automation system'
})   
    </script>
<?php  Session::put('success',null); } ?> 
<?php $error = Session::get('error');if($error){ ?>
         
    <script type="text/javascript">
     Swal.fire({
  icon: 'error',
  title: '<?php  echo $error; ?>',
  text: 'Please contact with Admin',
  footer: 'Jim Electric office automation system'
})   
    </script>
<?php  Session::put('error',null); } ?> 
<!--
            <li class="cd-hero__slide js-cd-slide">
                <div class="cd-hero__content cd-hero__content--half-width">
                    <h2>Familiarize Your Creative Apps</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <a href="#0" class="hvr-bounce-to-right cd-hero__btn">App Store</a>
                    <a href="#0" class="hvr-bounce-to-right cd-hero__btn cd-hero__btn--secondary">GooglePlay</a>
                </div> <!-- .cd-hero__content -->
<!--
                <div class="cd-hero__content cd-hero__content--half-width cd-hero__content--img">
                    <img src="uploads/app_iphone_02.png" class="img-fluid" alt="tech 1">
                </div> <!-- .cd-hero__content -->
<!--            </li>

            <li class="cd-hero__slide js-cd-slide">
                <div class="cd-hero__content cd-hero__content--half-width cd-hero__content--img">
                    <img src="uploads/app_iphone_01.png" class="img-fluid" alt="tech 2">
                </div> <!-- .cd-hero__content -->

    <!--            <div class="cd-hero__content cd-hero__content--half-width">
                    <h2>Familiarize Your Creative Apps</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <a href="#0" class="hvr-bounce-to-right cd-hero__btn">App Store</a>
                    <a href="#0" class="hvr-bounce-to-right cd-hero__btn cd-hero__btn--secondary">GooglePlay</a>
                </div> <!-- .cd-hero__content -->
                
    <!--        </li>

            <li class="cd-hero__slide js-cd-slide">
                <div class="cd-hero__content cd-hero__content--half-width cd-hero__content--img">
                    <img src="uploads/app_iphone_02.png" class="img-fluid" alt="tech 2">
                </div> <!-- .cd-hero__content -->

        <!--        <div class="cd-hero__content cd-hero__content--half-width">
                    <h2>Familiarize Your Creative Apps</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <a href="#0" class="hvr-bounce-to-right cd-hero__btn">App Store</a>
                    <a href="#0" class="hvr-bounce-to-right cd-hero__btn cd-hero__btn--secondary">GooglePlay</a>
                </div> <!-- .cd-hero__content -->
                
        <!--    </li>

            <li class="cd-hero__slide js-cd-slide">
                <div class="cd-hero__content cd-hero__content--half-width">
                    <h2>Familiarize Your Creative Apps</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <a href="#0" class="hvr-bounce-to-right cd-hero__btn">App Store</a>
                    <a href="#0" class="hvr-bounce-to-right cd-hero__btn cd-hero__btn--secondary">GooglePlay</a>
                </div> <!-- .cd-hero__content -->

            <!--    <div class="cd-hero__content cd-hero__content--half-width cd-hero__content--img">
                    <img src="uploads/app_iphone_01.png" class="img-fluid" alt="tech 1">
                </div> <!-- .cd-hero__content -->
            <!--</li>-->
        </ul> <!-- .cd-hero__slider -->

        <div class="cd-hero__nav js-cd-nav">
            <nav>
                <span class="cd-hero__marker cd-hero__marker--item-1 js-cd-marker"></span>
                
                <ul>
                    <li class="cd-selected"><a href="#">01</a></li>
                    
                    
                </ul>
            </nav> 
        </div> <!-- .cd-hero__nav -->
    </section> <!-- .cd-hero -->

    
    
    
    

   

   
    
    
    

   

   

    

    
    
    
    

    <div id="contact" class="section lb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Login</h3>
                <div class="info-box" data-toggle="tooltip" data-placement="bottom" title="Login For Jim Electric Office Automation System.">
                    <i class="fa fa-lock" style="font-size:48px;color:red" aria-hidden="true"></i>
                    
                </div>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-12">
                    <div class="contact_form">
                        <div id="message"></div>
                        
                        <form id="contactform" class="row" method="POST" action="{{ route('login') }}" name="contactform" >
                        @csrf
                            <div class="row">
                                
                                
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Your Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                </div>
                                
                                <div class="text-center pdi">
                                    <button type="submit"  id="submit" class="hvr-bounce-to-right get-btn">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end section -->

   

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-left">                    
                    <p class="footer-company-name">All Rights Reserved. &copy; 2022 <a href="#">Jim Electric</a> Design By : 
                    <a href="https://www.facebook.com/rezaulkarim.rokon/">ROKON</a></p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="front/js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="front/js/main.js"></script>
    <script src="front/js/custom.js"></script>
    <script src="front/js/swiper.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            loop: true,
            effect: 'coverflow',
            centeredSlides: true,
            loopFillGroupWithBlank: true,
            slidesPerView: 3,
            initialSlide: 3,
            keyboardControl: true,
            mousewheelControl: false,
            lazyLoading: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                1199: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                991: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                767: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                575: {
                    slidesPerView: 1,
                    spaceBetween: 3,
                }
            }
        });
      </script>

</body>
</html>