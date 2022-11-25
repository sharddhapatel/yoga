<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>FelicityYoga @yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{ URL::asset('assests/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ URL::asset('assests/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ URL::asset('assests/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ URL::asset('assests/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ URL::asset('assests/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ URL::asset('assests/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ URL::asset('assests/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}"
        rel="stylesheet" media="all">
    <link href="{{ URL::asset('assests/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ URL::asset('assests/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ URL::asset('assests/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ URL::asset('assests/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ URL::asset('assests/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet"
        media="all">

    <!-- Main CSS-->
    <link href="{{ URL::asset('assests/css/theme.css') }}" rel="stylesheet" media="all">

</head>
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="{{ URL::asset('assests/images/icon/logo.png') }}" alt="CoolAdmin">
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile" style="display: none;">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub">
                    <a class="js-arrow" href="{{ url('admindashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>

                </li>
                <li>
                    <a href="{{ url('showcategory') }}">
                        <i class="fas  fa-list-alt"></i>Category <span class="badge badge-dark"></span> </a>
                </li>

                <li>
                    <a href="{{ url('showproduct') }}">
                        <i class="fas  fa-list-alt"></i>Products <span class="badge badge-dark"></span> </a>
                </li>

                <li>
                    <a href="{{ url('showimage') }}">
                        <i class="fas  fa-list-alt"></i>ProductsImage <span class="badge badge-dark"></span> </a>
                </li>


                <li>
                    <a href="{{ url('showcontact') }}">
                        <i class="fas  fa-list-alt"></i>Contact <span class="badge badge-dark"></span> </a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Pages</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ url('adminprofile') }}">
                                <i class="zmdi zmdi-account"></i>Admin Profile</a>
                        </li>

                        <li>
                            <a href="{{ url('adminlogin') }}">
                                <i class="fas fa-sign-in-alt"></i>Login</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>
<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{ url('admindashboard') }}">
            <img src="{{ URL::asset('assests/images/icon/logo.png') }}" alt="Cool Admin" />
        </a>
    </div>

    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="{{ url('admindashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    <!-- <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ url('admindashboard') }}">Dashboard</a>
                                </li>
                               
                            </ul> -->
                </li>
                <li>
                    <a href="{{ url('showcategory') }}">
                        <i class="fas  fa-list-alt"></i>Category <span class="badge badge-dark"></span> </a>
                </li>

                <li>
                    <a href="{{ url('showproduct') }}">
                        <i class="fas  fa-list-alt"></i>Products <span class="badge badge-dark"></span> </a>
                </li>

                <li>
                    <a href="{{ url('showimage') }}">
                        <i class="fas  fa-list-alt"></i>ProductsImage <span class="badge badge-dark"></span> </a>
                </li>


                <li>
                    <a href="{{ url('showcontact') }}">
                        <i class="fas  fa-list-alt"></i>Contact <span class="badge badge-dark"></span> </a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Pages</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ url('adminprofile') }}">
                                <i class="zmdi zmdi-account"></i>Admin Profile</a>
                        </li>

                        <li>
                            <a href="{{ url('adminlogin') }}">
                                <i class="fas fa-sign-in-alt"></i>Login</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<div class="page-container">
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap" style="float: right;">

                    <div class="header-button">
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                <div class="image">
                                    <img src="{{ URL::asset('image') }}/{{ Session::get('admin_profile_image') }}"
                                        alt="" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#">{{ Session::get('admin_name') }}</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="{{ URL::asset('image') }}/{{ Session::get('admin_profile_image') }}"
                                                    alt="" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#">{{ Session::get('admin_name') }}</a>
                                            </h5>
                                            <span class="email">{{ Session::get('admin_email') }}</span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="{{ url('adminprofile') }}">
                                                <i class="zmdi zmdi-account"></i>Admin Profile</a>
                                        </div>

                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="{{ url('adminlogout') }}">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
</div>
<!-- END MENU SIDEBAR-->

@yield('content')

<div class="row">
    <div class="col-md-12">
        <div class="copyright">
            <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.
            </p>
        </div>
    </div>
</div>

<!-- Jquery JS-->
<script src="{{ URL::asset('assests/vendor/jquery-3.2.1.min.js') }}"></script>
<!-- Bootstrap JS-->
<script src="{{ URL::asset('assests/vendor/bootstrap-4.1/popper.min.js') }}"></script>
<script src="{{ URL::asset('assests/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
<!-- Vendor JS       -->
<script src="{{ URL::asset('assests/vendor/slick/slick.min.js') }}">
</script>
<script src="{{ URL::asset('assests/vendor/wow/wow.min.js') }}"></script>
<script src="{{ URL::asset('assests/vendor/animsition/animsition.min.js') }}"></script>
<script src="{{ URL::asset('assests/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
</script>
<script src="{{ URL::asset('assests/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ URL::asset('assests/vendor/counter-up/jquery.counterup.min.js') }}">
</script>
<script src="{{ URL::asset('assests/vendor/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ URL::asset('assests/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ URL::asset('assests/vendor/chartjs/Chart.bundle.min.js') }}"></script>
<script src="{{ URL::asset('assests/vendor/select2/select2.min.js') }}">
</script>

<!-- Main JS-->
<script src="{{ URL::asset('assests/js/main.js') }}"></script>

</html>
