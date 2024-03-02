<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="MkRqEzTGuoSx6LqJUm0OAKxSgNUYt26wTT7RMUZY">
    <link rel="manifest" href="manifest.json">
    <link rel="apple-touch-icon" href="{{asset('assets/images/favicon.ico')}}">
    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <meta name="theme-color" content="#e87316">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Surfside Media">
    <meta name="msapplication-TileImage" content="assets/images/favicon.ico">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Surfside Media">
    <meta name="keywords" content="Surfside Media">
    <meta name="author" content="Surfside Media">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>ARventure</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/template/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/ion.rangeSlider.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick/slick-theme.css')}}">
    <link id="color-link" rel="stylesheet" type="text/css" href="{{ asset('assets/css/demo4.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style>
        .h-logo {
            max-width: 185px !important;
        }

        .f-logo {
            max-width: 220px !important;
        }

        @media only screen and (max-width: 600px) {
            .h-logo {
                max-width: 110px !important;
            }
        }
    </style>
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    @stack('styles')

</head>
<body class="theme-color4 light ltr">
    <style>
        header .profile-dropdown ul li {
            display: block;
            padding: 5px 20px;
            border-bottom: 1px solid #ddd;
            line-height: 35px;
        }

        header .profile-dropdown ul li:last-child {
            border-color: #fff;
        }

        header .profile-dropdown ul {
            padding: 10px 0;
            min-width: 250px;
        }

        .name-usr {
            background: #678957;
            padding: 8px 12px;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            line-height: 24px;
            border-radius:50%;
        }

        .name-usr span {
            margin-right: 10px;
        }

        @media (max-width:600px) {
            .h-logo {
                max-width: 150px !important;
            }

            i.sidebar-bar {
                font-size: 22px;
            }

            .mobile-menu ul li a svg {
                width: 20px;
                height: 20px;
            }

            .mobile-menu ul li a span {
                margin-top: 0px;
                font-size: 12px;
            }

            .name-usr {
                padding: 5px 12px;
            }
        }
    </style>
    <header class="header-style-2" id="home">
        <div class="main-header navbar-searchbar">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-menu">
                            <div class="menu-left">
                                <div class="brand-logo">
                                    <a href="{{('/')}}">
                                        <img src="{{asset('assets/images/Arventure.png')}}" class="h-logo img-fluid blur-up lazyload"
                                            alt="logo">
                                    </a>
                                </div>
                            </div>
                            <nav>
                                <div class="main-navbar">
                                    <div id="mainnav">
                                        <div class="toggle-nav">
                                            <i class="fa fa-bars sidebar-bar"></i>
                                        </div>
                                        <ul class="nav-menu">
                                            <li class="back-btn d-xl-none">
                                                {{-- <div class="close-btn">
                                                    Menu
                                                    <span class="mobile-back"><i class="fa fa-angle-left"></i>
                                                    </span>
                                                </div> --}}
                                            </li>
                                            @if(Route::has('login'))
                                                @auth
                                                    @if(Auth::user()->utype === 'ADM')
                                                        <li> <a href="{{route('admin.index')}}" class="d-block">Dashboard</a>
                                                    @else
                                                        <li><a href="{{('/')}}" class="nav-link menu-title">Home</a></li>
                                                        <li><a href="{{route('shop.index')}}" class="nav-link menu-title">Shop</a></li>
                                                        <li><a href="{{route('users.aboutus')}}" class="nav-link menu-title">About Us</a></li>
                                                        <li><a href="{{route('users.contactus')}}" class="nav-link menu-title">Contact Us</a>
                                                    @endif
                                                @else
                                                        <li><a href="{{('/')}}" class="nav-link menu-title">Home</a></li>
                                                        <li><a href="{{route('login')}}" class="d-block">Shop</a></li>
                                                        <li><a href="{{route('login')}}" class="d-block">About Us</a></li>
                                                        <li><a href="{{route('login')}}" class="d-block">Contact Us</a>
                                                @endauth
                                            @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <div class="menu-right">
                                <ul>
                                    @if(Route::has('login'))
                                        @auth
                                            @if(Auth::user()->utype === 'USR')

                                            <li class="onhover-dropdown wislist-dropdown">
                                                <div class="cart-media">
                                                    <a href="{{route('users.cart')}}">
                                                        <i data-feather="shopping-cart"></i>
                                                    </a>
                                                </div>
                                            </li>
                                            @else
                                            @endif
                                        @endauth
                                    @endif
                                    <li class="onhover-dropdown">
                                        <div class="cart-media ">
                                            @if (Route::has('login'))
                                                @auth
                                                     @if(Auth::user()->foto)
                                                        <img width="40px" style="border-radius: 50%" src="{{ asset('storage/userpic/user/' . Auth::user()->foto) }}" alt="User Photo">
                                                    @else
                                                        <i data-feather="user"></i>
                                                    @endif
                                                @else
                                                    <i data-feather="user"></i>
                                                @endauth
                                            @endif
                                        </div>
                                        <div class="onhover-div profile-dropdown">
                                            <ul>
                                                @if(Route::has('login'))
                                                    @auth
                                                        @if(Auth::user()->utype === 'ADM')
                                                            <li>
                                                                <p class="d-block">{{Auth::user()->name}}</p>
                                                                <a href="{{route('admin.index')}}" class="d-block">Dashboard</a>
                                                                <a href="{{route('admin.adminprofile')}}" class="d-block">Admin Profile</a>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <p class="d-block">{{Auth::user()->name}}</p>
                                                                <a href="{{route('users.index')}}" class="d-block">My Account</a>
                                                            </li>
                                                        @endif
                                                        <li>
                                                            <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('frmlogout').submit();" class="d-block">Logout</a>
                                                            <form id="frmlogout" action="{{route('logout')}}" method="POST">
                                                                @csrf
                                                            </form>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="{{route('login')}}" class="d-block">Login</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('register')}}" class="d-block">Register</a>
                                                        </li>
                                                    @endauth
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="search-full">
                                <form method="GET" class="search-full" action="http://localhost:8000/search">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i data-feather="search" class="font-light"></i>
                                        </span>
                                        <input type="text" name="q" class="form-control search-type"
                                            placeholder="Search here..">
                                        <span class="input-group-text close-search">
                                            <i data-feather="x" class="font-light"></i>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="mobile-menu d-sm-none">
        <ul>
            <li>
                <a href="demo3.php" class="active">
                    <i data-feather="home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <i data-feather="align-justify"></i>
                    <span>Category</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <i data-feather="shopping-bag"></i>
                    <span>Cart</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <i data-feather="heart"></i>
                    <span>Wishlist</span>
                </a>
            </li>
            <li>
                <a href="user-dashboard.php">
                    <i data-feather="user"></i>
                    <span>Account</span>
                </a>
            </li>
        </ul>
    </div>
    @yield('content');
    <div id="qvmodal"></div>
    <footer class="footer-sm-space mt-5">
        <div class="main-footer">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer-contact">
                            <div class="brand-logo">
                                <a href="{{('/')}}" class="footer-logo float-start">
                                    <img src="{{asset('assets/images/arventure.png')}}" class="f-logo img-fluid blur-up lazyload"
                                        alt="logo">
                                </a>
                            </div>
                            <ul class="contact-lists" style="clear:both;">
                                <li>
                                    <span><b>phone:</b> <span class="font-light"> +62 81226513164</span></span>
                                </li>
                                <li>
                                    <span><b>Address:</b><span class="font-light">Sememi Jaya, Surabaya, East Java, Indonesia</span></span>
                                </li>
                                <li>
                                    <span><b>Email:</b><span class="font-light"> argyawoles@gmail.com</span></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="footer-links">
                            <div class="footer-title">
                                <h3>About us</h3>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li>
                                        <a href="{{route('app.index')}}" class="font-dark">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{route('users.aboutus')}}" class="font-dark">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{route('users.contactus')}}" class="font-dark">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-links">
                            <div class="footer-title">
                                <h3>Get Help</h3>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li>
                                        <a href="{{route('users.history')}}" class="font-dark">Your Orders</a>
                                    </li>
                                    <li>
                                        <a href="{{route('users.index')}}" class="font-dark">Your Account</a>
                                    </li>
                                    <li>
                                        <a href="{{route('users.cart')}}" class="font-dark">Your Cart</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-links">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 d-none d-sm-block">
                        <div class="footer-newsletter">
                            <h3>Let’s stay in touch</h3>
                            <div class="form-newsletter">
                                <div class="input-group mb-4">
                                    <input type="text" class="form-control color-4" placeholder="Contact Us">
                                        <a href="{{route('users.contactus')}}">
                                            <span class="input-group-text" id="basic-addon4" style="height: 48px"><i
                                                class="fas fa-arrow-right"></i></span>
                                        </a>
                                </div>
                                <p class="font-dark mb-0">Send Us Some Messages.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-footer">
            <div class="container">
                <div class="row gy-3">
                    <div class="col-md-6">
                        <ul>
                            <li class="font-dark">We accept:</li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{{asset('assets/images/payment-icon/1.jpg')}}" class="img-fluid blur-up lazyload"
                                        alt="payment icon">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{{asset('assets/images/payment-icon/2.jpg')}}" class="img-fluid blur-up lazyload"
                                        alt="payment icon">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{{asset('assets/images/payment-icon/3.jpg')}}" class="img-fluid blur-up lazyload"
                                        alt="payment icon">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{{asset('assets/images/payment-icon/4.jpg')}}" class="img-fluid blur-up lazyload"
                                        alt="payment icon">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-0 font-dark">© 2023, Arventure.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <div class="bg-overlay"></div>
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/feather/feather.min.js')}}"></script>
    <script src="{{ asset('assets/js/lazysizes.min.js')}}"></script>
    <script src="{{ asset('assets/js/slick/slick.js')}}"></script>
    <script src="{{ asset('assets/js/slick/slick-animation.min.js')}}"></script>
    <script src="{{ asset('assets/js/slick/custom_slick.js')}}"></script>
    <script src="{{ asset('assets/js/price-filter.js')}}"></script>
    <script src="{{ asset('assets/js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{ asset('assets/js/filter.js')}}"></script>
    <script src="{{ asset('assets/js/newsletter.js')}}"></script>
    <script src="{{ asset('assets/js/cart_modal_resize.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap-notify.min.js')}}"></script>
    <script src="{{ asset('assets/js/theme-setting.js')}}"></script>
    <script src="{{ asset('assets/js/script.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(function () {
            $('[data-bs-toggle="tooltip"]').tooltip()
        });
    </script>
    @stack('scripts')
</body>
</html>
