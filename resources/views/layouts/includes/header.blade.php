<?php
use Illuminate\Support\Facades\Session;
use App\Models\User;

$session= Session::get('user');

$user=User::getUser($session->id);
?>
<div class="full-width-header">
    <!--Header Start-->
    <header id="rs-header" class="rs-header homestyle">
        <!-- Menu Start -->
        <div class="menu-area menu-sticky">
            <div class="container">
                <div class="row rs-vertical-middle">
                    <div class="col-lg-2">
                        <div class="logo-area">
                            <a href="index.html"><img src="{{ asset('images/logo2.png') }}" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-10 mobile-menu-area">
                        <div class="rs-menu-area display-flex-center">
                            <div class="main-menu">
                                <a class="rs-menu-toggle">
                                    <i class="fa fa-bars"></i>
                                </a>
                                <nav class="rs-menu">
                                    <div class="expand-btn">
                                        <span class="search-parent">
                                            <a class="hidden-xs rs-search" href="#">
                                              <i class="flaticon-search"></i>
                                            </a>
                                           <div class="sticky_form">
                                               <form role="search" class="bs-search search-form" method="get">
                                                   <div class="search-wrap">
                                                        <input class="search-input" type="text" name="fname" placeholder="Rechercher...">
                                                        <button type="submit" value="Search"><i class="flaticon-search"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </span>
                                        <span class="menu-cart-area mini-cart-active">
                                            <a href="#">
                                                    <i class="fa fa-shopping-cart"></i>
                                                <span class="icon-num">0</span>
                                            </a>
                                            <!-- woocommerce-mini -->
                                            <div class="woocommerce-mini-cart text-left">
                                                <div class="cart-bottom-part">
                                                    <h2 class="widget-title">Aucun pari enregistré.</h2>
                                                </div>
                                            </div> 
                                        </span>
                                        <span>
                                            <a id="nav-expander" class="nav-expander">
                                                <ul class="offcanvas-icon">
                                                    <li>
                                                        <span class="hamburger1"></span>
                                                        <span class="hamburger2"></span>
                                                        <span class="hamburger3"></span>
                                                    </li>
                                                </ul>
                                            </a>
                                        </span>
                                    </div>
                                    <ul class="nav-menu text-right">
                                        <!-- Home -->
                                        
               
                                        <li><a href="{{url('home')}}">Matchs</a></li>
                                        <li><a href="{{url('paris')}}">Paris</a></li>
                                        
                                        <li><a href="{{url('result')}}">Résultats</a></li>
                                        <!--Point Table End-->

                                        <!--News Start-->
                                        
                                        <!--Point Table End-->

                                        <!--Contact Menu Start-->
                                        <!--Contact Menu End-->
                                    </ul> <!-- //.nav-menu -->
                                </nav>
                            </div> <!-- //.main-menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->

        <!-- Canvas Menu start -->
        <nav class="right_menu_togle hidden-md">
            <div class="close-btn"><span id="nav-close" class="text-center"><i class="flaticon-cross"></i></span></div>
            <div class="canvas-logo">
                <a href="index.html"><img src="images/logo2.png" alt="logo"></a>
            </div>
            <div class="sidebarnav_menu">
                <ul>
                    <li>Nom : {{$user->name}}</li>
                    <li>Pseudo : {{$user->pseudo}}</li>
                    <li><a href="{{url('compte')}}">Solde : {{$user->available}} €</a></li>
                    <li><a href="{{url('logout')}}">Déconnecter</a></li>
                    
                </ul>
            </div>
            <div class="canvas-contact">
                <h5 class="canvas-contact-title">Contact Info</h5>
                <ul class="contact">
                    <li><i class="fa fa-globe"></i>{{$user->address}}, Cameroun</li>
                    <li><i class="fa fa-phone"></i><a href="tel:{{$user->phone}}">{{$user->phone}}</a></li>
                    <li><i class="fa fa-envelope"></i><a href="mailto:support@rstheme.com">{{$user->email}}</a></li>
                </ul>
                
            </div>
        </nav>
        <!-- Canvas Menu end --> 
    </header>
    <!--Header End-->
</div>