<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Fruitkha - Slider Version</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">

    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- mean menu css -->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    @stack('styles')


</head>




<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="/">
                                <img src="assets/img/logo.png" alt="">
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li class="current-list-item"><a href="/">{{ __('messages.home') }}</a>
                                </li>
                                <li><a href="/categories">{{ __('messages.categories') }}</a></li>
                                <li><a href="/products">{{ __('messages.products') }}</a></li>
                                <li><a href="/addproduct">{{ __('messages.add_product') }}</a></li>
                                <li><a href="/addreview">{{ __('messages.add_review') }}</a></li>

                                <style>
                                    .user-dropdown {
                                        position: relative;
                                    }

                                    .user-dropdown>a {
                                        cursor: pointer;
                                        display: flex;
                                        align-items: center;
                                        gap: 6px;
                                    }

                                    .user-dropdown .arrow {
                                        font-size: 12px;
                                    }

                                    .user-menu {
                                        position: absolute;
                                        top: 100%;
                                        right: 0;
                                        background: #1a1a1a;
                                        min-width: 140px;
                                        border-radius: 6px;
                                        padding: 8px 0;
                                        display: none;
                                        z-index: 999;
                                    }

                                    .user-menu li {
                                        list-style: none;
                                    }

                                    .user-menu li a {
                                        display: block;
                                        padding: 8px 16px;
                                        color: #fff;
                                        text-decoration: none;
                                    }

                                    .user-menu li a:hover {
                                        background: #333;
                                    }

                                    .user-toggle {
                                        cursor: pointer;
                                        color: #fff;
                                        display: flex;
                                        align-items: center;
                                        gap: 6px;
                                    }

                                    .user-dropdown {
                                        position: relative;
                                    }

                                    .user-menu {
                                        position: absolute;
                                        top: 120%;
                                        right: 0;
                                        background: #1a1a1a;
                                        min-width: 140px;
                                        border-radius: 6px;
                                        padding: 8px 0;
                                        display: none;
                                        z-index: 9999;
                                    }

                                    .cart-icon {
                                        position: relative;
                                    }

                                    .cart-badge {
                                        position: absolute;
                                        top: -6px;
                                        right: -10px;
                                        background: #f28123;
                                        color: #fff;
                                        font-size: 12px;
                                        font-weight: 600;
                                        padding: 2px 7px;
                                        border-radius: 999px;
                                        line-height: 1;
                                    }
                                </style>
                                @guest
                                    @if (Route::has('login'))
                                        <li>
                                            <a href="{{ route('login') }}">{{ __('messages.login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li>
                                            <a href="{{ route('register') }}">{{ __('messages.register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="user-dropdown">
                                        <span id="userToggle" class="user-toggle">
                                            {{ Auth::user()->name }}
                                            <span class="arrow">▼</span>
                                        </span>

                                        <ul class="user-menu" id="userMenu">
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    {{ __('messages.logout') }}
                                                </a>
                                            </li>
                                        </ul>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                @endguest
                                <li>
                                    <div class="language-dropdown">
                                        <form id="lang-form" method="POST">
                                            @csrf
                                            <select onchange="changeLanguage(this.value)">
                                                <option value="" disabled selected>
                                                    {{ app()->getLocale() === 'ar' ? 'اللغة' : 'Language' }}
                                                </option>
                                                <option value="en" {{ app()->getLocale() === 'en' ? 'selected' : '' }}>
                                                    English
                                                </option>
                                                <option value="ar" {{ app()->getLocale() === 'ar' ? 'selected' : '' }}>
                                                    العربية
                                                </option>
                                            </select>
                                        </form>
                                    </div>
                                </li>

                                <li>
                                    <div class="header-icons">
                                        <a href="/cart" class="cart-icon">
                                            <i class="fas fa-shopping-cart"></i>

                                            @if ($cartCount > 0)
                                                <span class="cart-badge">{{ $cartCount }}</span>
                                            @endif
                                        </a>
                                        <a class="mobile-hide search-bar-icon" href="#"><i
                                                class="fas fa-search"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <input type="text" placeholder="Keywords">
                            <button type="submit">Search <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->

    <!-- home page slider -->

    <!-- end home page slider -->


    <div style="height: 100px"></div>
    <!-- product section -->
    <script>
        function changeLanguage(lang) {
            const form = document.getElementById('lang-form');
            form.action = `/lang/${lang}`;
            form.submit();
        }
    </script>
    <style>
        .language-dropdown {
            position: relative;
            display: inline-block;
        }

        .language-dropdown select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;

            padding: 8px 36px 8px 14px;
            font-size: 14px;
            font-weight: 500;

            border-radius: 8px;
            border: 1px solid #e5e7eb;

            background-color: #ffffff;
            color: #111827;

            cursor: pointer;
            transition: all 0.2s ease;
        }

        /* Hover */
        .language-dropdown select:hover {
            border-color: #3b82f6;
        }

        /* Focus */
        .language-dropdown select:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
        }

        /* Arrow */
        .language-dropdown::after {
            content: "▾";
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            font-size: 12px;
            color: #6b7280;
        }

        /* Dark mode (optional) */
        body.dark .language-dropdown select {
            background-color: #1f2933;
            color: #f9fafb;
            border-color: #374151;
        }
    </style>

    @yield('content')
    <!-- end product section -->





    <!-- footer -->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box about-widget">
                        <h2 class="widget-title">About us</h2>
                        <p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium
                            doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">Get in Touch</h2>
                        <ul>
                            <li>34/8, East Hukupara, Gifirtok, Sadan.</li>
                            <li>support@fruitkha.com</li>
                            <li>+00 111 222 3333</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box pages">
                        <h2 class="widget-title">Pages</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="services.html">Shop</a></li>
                            <li><a href="news.html">News</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box subscribe">
                        <h2 class="widget-title">Subscribe</h2>
                        <p>Subscribe to our mailing list to get the latest updates.</p>
                        <form action="index.html">
                            <input type="email" placeholder="Email">
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer -->

    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>, All Rights
                        Reserved.<br>
                        Distributed By - <a href="https://themewagon.com/">Themewagon</a>
                    </p>
                </div>
                <div class="col-lg-6 text-right col-md-12">
                    <div class="social-icons">
                        <ul>
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end copyright -->

    <script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
    <!-- DataTables JS (must load after jQuery) -->
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.isotope-3.0.6.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/sticker.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggle = document.getElementById('userToggle');
            const menu = document.getElementById('userMenu');

            if (!toggle || !menu) return;

            toggle.addEventListener('click', function (e) {
                e.stopPropagation();
                menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
            });

            document.addEventListener('click', function () {
                menu.style.display = 'none';
            });
        });
    </script>
    @stack('scripts')
</body>

</html>