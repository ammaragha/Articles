<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="" type="{{ url('backEnd/image/jpg') }}">
    <title>@yield('title')</title>
    
    <link href="{{ url('backEnd/dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ url('backEnd/dist/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ url('backEnd/dist/css/mine.css') }}" rel="stylesheet"> <!-- this is mu custom -->
</head>
<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <div class="navbar-brand">
                        <a href="{{ url('admin') }}" class="logo">
                          
                            <span class="logo-text">
                                <img src="{{ url('backEnd/assets/images/wh-dashboard.png') }}" class="light-logo" alt="homepage" style="margin-left:10px;width:180px;height:25px" />
                            </span>
                        </a>
                    </div>

                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
               
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
                    
                    <ul class="navbar-nav float-left mr-auto">
                       
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-magnify font-20 mr-1"></i>
                                    <div class="ml-1 d-none d-sm-block">
                                        <span>Search</span>
                                    </div>
                                </div>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li>
                    </ul>
                   
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1-old.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="index.html"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="{{ url('/') }}"><i class="ti-agenda m-r-5 m-l-5"></i> My Website</a>
                                <a class="dropdown-item" href="index.html"><i class="ti-wallet m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
       
    



    @extends('backEnd.temps.sidebar')

    @yield('content')
















    
<script src="{{ url('backEnd/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ url('backEnd/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ url('backEnd/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ url('backEnd/assets/extra-libs/sparkline/sparkline.js') }}"></script>
<script src="{{ url('backEnd/dist/js/waves.js') }}"></script>
<script src="{{ url('backEnd/dist/js/sidebarmenu.js') }}"></script>
<script src="{{ url('backEnd/dist/js/custom.min.js') }}"></script>
<script src="{{ url('backEnd/assets/libs/chartist/dist/chartist.min.js') }}"></script>
<script src="{{ url('backEnd/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ url('backEnd/dist/js/pages/dashboards/dashboard1.js') }}"></script>
    
</body>
</html>