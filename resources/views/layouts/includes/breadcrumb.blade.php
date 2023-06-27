<div class="rs-breadcrumbs">
    <div class="breadcrumbs-wrap">
        <img src="{{ asset('images/breadcrumbs/inner8.jpg') }}" alt="Breadcrumbs Image">
        <div class="breadcrumbs-inner">
            <div class="container">
                <div class="breadcrumbs-text">
                    <h1 class="breadcrumbs-title mb-17">@yield('title')</h1>
                    <div class="categories">
                        <ul>
                            <li><a href="index.html">Acceuil</a></li>
                            <li class="active"> @yield('title') </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>                
</div>