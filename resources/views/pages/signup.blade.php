<?php
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
?>

<!DOCTYPE html>
<html lang="zxx">
    
<!-- Mirrored from rstheme.com/products/html/khelo/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Jun 2023 12:31:19 GMT -->
<head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>Khelo | Sports HTML Template</title>
        <meta name="description" content="">
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->
        <link rel="apple-touch-icon" href="apple-touch-icon.html">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo2.png')}}">
        <!-- bootstrap v4 css -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <!-- font-awesome css -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <!-- owl.carousel css -->
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
        <!-- animate css -->
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <!-- Slick css -->
        <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
        <!-- off canvas css -->
        <link rel="stylesheet" href="{{ asset('css/off-canvas.css') }}">
        <!-- flaticon css  -->
        <link rel="stylesheet" href="{{ asset('fonts/flaticon.css') }}">
        <!-- magnific popup css -->
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
        <!-- rsmenu CSS -->
        <link rel="stylesheet" href="{{ asset('css/rsmenu-main.css') }}">
        <!-- swiper slider CSS -->
        <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">
        <!-- rsmenu transitions CSS -->
        <link rel="stylesheet" href="{{ asset('css/rsmenu-transitions.css') }}">
        <!-- rsanimations CSS -->
        <link rel="stylesheet" href="{{asset('css/rsanimations.css') }}">
        <!-- style css -->
        <link rel="stylesheet" href="{{ asset('style.css') }}">
        <!-- rs-spaceing css -->
        <link rel="stylesheet" href="{{ asset('css/rs-spaceing.css') }}">
        <!-- responsive css -->
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    </head>
    <body>
        <!--Preloader area start here-->
        <div id="loading" class="loading">
            <div class="rs-loader">
                <div class="rs-shadow"></div>
                <div class="rs-gravity">
                    <div class="rs-ball"></div>
                </div>
            </div>
        </div>
        <!--Preloader area End here-->



        <!-- Breadcrumbs Section Start -->
        <div class="rs-breadcrumbs">
            <div class="breadcrumbs-wrap">
                <img src="images/breadcrumbs/inner2.jpg" alt="Breadcrumbs Image">
            </div>                
        </div>

        <!-- Breadcrumbs Section End -->

        <!-- Account Login Start -->
        <div id="rs-my-account" class="rs-my-account pt-50 md-pb-80 md-pt-80">
            <div class="container">
                <div class="row pb-100 md-pb-72">
                   <div class="col-lg-3"></div>
                   <div class="col-lg-7 md-mb-70">
                        <div class="regi-side">
                            <div class="sec-title">
                                <h2 class="title">Inscription</h2>
                            </div>
                            <form class="register-form" id="register-form" method="post" action="{{url('signup/signup')}}">
                                @csrf
                                <label class="input-label">Nom d'utilisateur <span class="req">*</span></label>
                                <input class="custom-placeholder" type="text" name="pseudo" required="">

                                <label class="input-label">Adresse Email<span class="req">*</span></label>
                                <input class="custom-placeholder" type="email" name="email" required="">

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="input-label">Mot de passe <span class="req">*</span></label>
                                        <input class="custom-placeholder" type="password" name="password" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="input-label">Confirmation<span class="req">*</span></label>
                                        <input class="custom-placeholder" type="password" name="passwordconf" required="">
                                    </div>
                                </div>

                                <label class="input-label">nom <span class="req">*</span></label>
                                <input class="custom-placeholder" type="text" name="name" required="">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="margin-space gender-detect">
                                            <label class="input-label">Sexe <span class="req">*</span></label>
                                            <br>
                                            <label>
                                                <input class="radio-btn" type="radio" name="sex" value="M" required=""><span>Masculin</span>
                                            </label>
                                            <label>
                                                <input class="radio-btn" type="radio" name="sex" value="F" required=""><span>Feminin</span>
                                            </label>
                                        </div>
                                    </div>
                                    
                                </div>

                                

                                <label class="input-label">Téléphone <span class="req">*</span></label>
                                <input class="custom-placeholder" type="tel" name="phone" required="">
                                <label class="input-label">Adresse <span class="req">*</span></label>
                                <input class="custom-placeholder" type="text" name="address" required="">

                                <label>
                                    <input class="checkbox" type="checkbox" name="agreement" required=""> J'accepte <a href="#">les termes et conditions</a> du contrat d'utlisateur.
                                </label>

                                <div class="submit-btn">
                                    <button class="readon" type="submit">S'inscrire</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Subscribe Section Start -->
                
                <!-- Subscribe Section End -->
            </div>
        </div>
        <!-- Account Login End -->

        <!-- Footer Start -->
        
        <!-- Search Modal End -->
        
        <!-- modernizr js -->
        <script src="{{asset('js/modernizr-2.8.3.min.js')}}"></script>
        <!-- jquery latest version -->
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <!-- bootstrap js -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- owl.carousel js -->
        <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
        <!-- slick js -->
        <script src="{{ asset('js/slick.min.js')}}"></script>
        <!-- isotope.pkgd.min js -->
        <script src="{{ asset('js/isotope.pkgd.min.js')}}"></script>
        <!-- imagesloaded.pkgd.min js -->
        <script src="{{ asset('js/imagesloaded.pkgd.min.js')}}"></script>
        <!-- wow js -->
        <script src="{{ asset('js/wow.min.js') }}"></script>
        <!-- counter top js -->
        <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('js/waypoints.min.js') }}"></script>
        <!-- magnific popup -->
        <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
        <!-- rsmenu js -->
        <script src="{{ asset('js/rsmenu-main.js') }}"></script>
        <!-- plugins js -->
        <script src="{{asset('js/plugins.js') }}"></script>
        <!-- swiper slider js -->
        <script src="{{ asset('js/swiper.min.js') }}"></script>
         <!-- main js -->
        <script src="{{ asset('js/main.js')}} "></script>
    </body>

</html>
