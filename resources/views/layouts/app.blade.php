<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta-tags')
    <title>{{is_null(setting('site.title'))?'': setting('site.title').'-'}}@yield('title')</title>
  
    <link rel="shortcut icon" type="image" href="{{is_null(setting('site.logo'))?'': Storage::url(setting('site.logo'))}}">
    
    @notifyCss
    <!-- Fontawesome -->
    <link type="text/css" href="/frontend/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    
    <!-- Prism -->
    <link type="text/css" href="/frontend/vendor/prismjs/themes/prism.css" rel="stylesheet">

    <!-- Front CSS -->
    <link type="text/css" href="/frontend/css/front.css" rel="stylesheet">
    <!-- Owl CSS -->
    <link type="text/css" href="/frontend/css/owl.carousel.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link type="text/css" href="/frontend/css/custom.css" rel="stylesheet">
    <!-- Star CSS -->
    <link type="text/css" href="/frontend/css/star-rating-svg.css" rel="stylesheet">
    
    <!-- datatable CSS -->
    <link type="text/css" href="/frontend/css/DataTables/css/jquery.dataTables.min.css" rel="stylesheet">
   
    @yield('css')
</head>

<body>
    @include('notify::messages')
    <header class="header-global">
        <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg headroom py-lg-3 px-lg-6 navbar-dark navbar-theme-primary">
            <div class="container">
                <a class="text-white" href="/">
                    <h2>{{setting('site.title')}}</h2>
                </a>
                <div class="navbar-collapse collapse" id="navbar_global">
                    <div class="navbar-collapse-header">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a href="/">
                                    <h2>{{setting('site.title')}}</h2>
                                </a>
                            </div>
                            <div class="col-6 collapse-close">
                                <a href="#navbar_global" role="button" class="fas fa-times" data-toggle="collapse"
                                    data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false"
                                    aria-label="Toggle navigation"></a>
                            </div>
                        </div>
                    </div>
                    <ul class="navbar-nav navbar-nav-hover navbar-nav ml-lg-auto">
                        {{menu('header_menu','partials.header-menu')}}
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown" aria-controls="pages_submenu" aria-expanded="false" aria-label="Toggle pages menu item">
                                <span class="nav-link-inner-text">{{Auth::user()?Auth::user()->name:'My account'}}</span>
                                <span class="fas fa-angle-down nav-link-arrow ml-2"></span>
                            </a>
                            <ul class="dropdown-menu" id="pages_submenu">
                                @if (Auth::user())
                                    <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="#" id="logout-btn">Logout</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form> 
                                @else
                                    <li><a class="dropdown-item" href="/login">Login</a></li>
                                    <li><a class="dropdown-item" href="/register">Register</a></li> 
                                @endif
                            </ul>
                        </li>
                    </ul>
                    
                </div>
                
                <div class="d-none d-lg-block"> 
                    <a href="/cart" class="text-white"><i class="fas fa-shopping-cart"></i> 
                        <span class="badge badge-danger">
                            {{Cart::getTotalQuantity()}}
                        </span>
                    </a>
                </div>
                
                <div class="d-flex d-lg-none align-items-center">
                    <a href="/cart" class="text-white"><i class="fas fa-shopping-cart"></i> 
                        <span class="badge badge-danger">
                            {{Cart::getTotalQuantity()}}
                        </span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
                        aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <main>
        
        <div class="preloader bg-soft flex-column justify-content-center align-items-center">
            <div class="loader-element">
                <span class="loader-animated-dot"></span>
                <h1>{{setting('site.title')}}</h1>
            </div>
        </div>
        
        @yield('content')
    
        <footer class="footer section pt-6 pt-md-8 pt-lg-10 pb-3 bg-primary text-white overflow-hidden">
            <div class="pattern pattern-soft top"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <a class="footer-brand mr-lg-5 d-flex" href="/">
                            <h2>{{setting('site.title')}}</h2>
                        </a>
                        <p class="my-4">{{setting('site.description')}}</p>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-2 mb-4 mb-lg-0">
                        <h4>Navigation</h4>
                        <ul class="links-vertical">
                            <li><a href="/">Home</a></li>
                            <li><a  href="/projects">Projects</a></li>
                            <li><a  href="/services">Services</a></li>
                            <li><a  href="/about">About</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-2 mb-4 mb-lg-0">
                        <h4>Useful Pages</h4>
                        <ul class="links-vertical">
                            {{menu('footer_menu','partials.footer-menu')}}
                        </ul>
                    </div>
                    <div class="col-12 col-sm-3 col-lg-2">
                        <h4>Social</h4>
                        <ul class="links-vertical">
                            <li><a href="//{{setting('social.facebook')}}" target="_blank">Facebook</a></li>
                            <li><a  href="//{{setting('social.twitter')}}" target="_blank">Twitter</a></li>
                            <li><a  href="//{{setting('social.linkedin')}}" target="_blank">LinkedIn</a></li>
                            <li><a  href="//{{setting('social.youtube')}}" target="_blank">Youtube</a></li>
                        </ul>
                    </div>
                </div>
                <hr class="my-4 my-lg-5">
                <div class="row">
                    <div class="col pb-4 mb-md-0">
                        <div class="d-flex text-center justify-content-center align-items-center">
                        <p class="font-weight-normal mb-0">© {{setting('site.title')}} <span class="current-year"></span>. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <!-- Core -->
    <script src="/frontend/vendor/jquery/dist/jquery.min.js"></script>
    <!-- Datatables JS -->
    <script src="/frontend/assets/js/datatables.min.js"></script>
    
    <script src="/frontend/vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="/frontend/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/frontend/vendor/headroom.js/dist/headroom.min.js"></script>

    <!-- Vendor JS -->
    <script src="/frontend/vendor/onscreen/dist/on-screen.umd.min.js"></script>
    <script src="/frontend/vendor/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="/frontend/vendor/jarallax/dist/jarallax.min.js"></script>
    <script src="/frontend/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

    <!-- Button Js -->
    <script async defer src="/frontend/assets/js/button.js"></script>

    <!-- Impact JS -->
    <script src="/frontend/assets/js/front.js"></script>
    <!-- Star JS -->
    <script src="/frontend/assets/js/jquery.star-rating-svg.js"></script>
    <!-- Owl JS -->
    <script src="/frontend/assets/js/owl.carousel.min.js"></script>
    <!-- Select2 JS -->
    <script src="/frontend/assets/js/select2.min.js"></script>
    <!-- Custom JS -->
    <script src="/frontend/assets/js/custom.js"></script>
    
    @notifyJs
    @yield('javascript')
</body>

</html>
 