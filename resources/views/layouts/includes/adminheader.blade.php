<div class="full-width-header">
    <!--Header Start-->
    <header id="rs-header" class="rs-header homestyle">
        <!-- Menu Start -->
        <div class="menu-area menu-sticky sticky">
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
                                <a class="rs-menu-toggle rs-menu-toggle-close">
                                    <i class="fa fa-bars"></i>
                                </a>
                                <nav class="rs-menu rs-menu-close" style="height: 0px;">
                                   
                                    <ul class="nav-menu text-right">
                                        <!-- Home -->
                                        <li class="active"><a href="{{url('admin/match')}}">Matchs</a></li>
                                        <li><a href="{{url('admin/pronostique')}}">Pronostiques</a></li>
                                        <li><a href="{{url('admin/choix')}}">Choix</a></li>
                                        <li><a href="{{url('admin/resultats')}}">Résultats</a></li>
                                        <li><a href="{{url('logout')}}">Déconnecter</a></li>
                                        <span class="rs-menu-parent"><i class="fa fa-angle-down" aria-hidden="true"></i></span></li>
                                        <!-- End Home --> 

                                        <!-- Club Directory Menu Start -->
                                        
                                        <span class="rs-menu-parent"><i class="fa fa-angle-down" aria-hidden="true"></i></span><span class="rs-menu-parent"><i class="fa fa-angle-down" aria-hidden="true"></i></span></li>
                                    </ul> 
                                </nav>
                            </div> <!-- //.main-menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--Header End-->
</div>