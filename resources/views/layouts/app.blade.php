<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>KSA Web App | @yield('page_title')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/layout.min.css')}}" rel="stylesheet" type="text/css">
    {{-- <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" /> --}}
    <link href="{{asset('css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/colors.min.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
	@yield('css_section')

</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-light navbar-static">

        <!-- Header with logos -->
        <div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center">
            <div class="navbar-brand navbar-brand-md">
                {{-- <a href="{{route('home')}}" class="d-inline-block">
                    <img src="../../../../global_assets/images/logo_light.png" alt="">
                </a> --}}
            </div>

            <div class="navbar-brand navbar-brand-xs">
                {{-- <a href="{{route('home')}}" class="d-inline-block">
                    <img src="../../../../global_assets/images/logo_icon_light.png" alt="">
                </a> --}}
            </div>
        </div>
        <!-- /header with logos -->


        <!-- Mobile controls -->
        <div class="d-flex flex-1 d-md-none">
            <div class="navbar-brand mr-auto">
                {{-- <a href="{{route('home')}}" class="d-inline-block">
                    <img src="../../../../global_assets/images/logo_dark.png" alt="">
                </a> --}}
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>

            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-paragraph-justify3"></i>
            </button>
        </div>
        <!-- /mobile controls -->


        <!-- Navbar content -->
        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                        <i class="icon-paragraph-justify3"></i>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">


                <li class="nav-item dropdown dropdown-user">
                    <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle"
                        data-toggle="dropdown">
                        <img src="../../../../global_assets/images/image.png" class="rounded-circle mr-2" height="34"
                            alt="">
                        <span>{{Auth::user()->name}}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">

                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="icon-switch2"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </li>
            </ul>
        </div>
        <!-- /navbar content -->

    </div>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

            <!-- Sidebar mobile toggler -->


            <!-- Sidebar content -->
            <div class="sidebar-content">




                <!-- Main navigation -->
                <div class="card card-sidebar-mobile">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">

                        <!-- Main -->
                        <li class="nav-item-header">
                            <div class="text-uppercase font-size-xs line-height-xs">Menu</div> <i class="icon-menu"
                                title="Menu"></i>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link">
                                <i class="icon-home4"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>



                        <li class="nav-item">
                            <a href="{{url('penjualan')}}" class="nav-link">
                                <i class="icon-coins"></i>
                                <span>Data Transaksi Penjualan Kredit</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('nasabah')}}" class="nav-link">
                                <i class="icon-person"></i>
                                <span>Data Nasabah</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('pembayaran')}}" class="nav-link">
                                <i class="icon-cart5"></i>
                                <span>Data Pembayaran Angsuran</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('va')}}" class="nav-link">
                                <i class="icon-credit-card"></i>
                                <span>Data Virtual Account</span>
                            </a>
                        </li>


                    </ul>
                </div>
                <!-- /main navigation -->

            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">



            <!-- Content area -->
            <div class="content pt-0">
                @yield('content')

            </div>
            <!-- /content area -->


            <footer class="footer-area footer-light">
                <div class="mini-footer" style="padding-top: 14px; padding-bottom:14px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright-text">
                                    <p>© 2021
                                        <a href="#">KSA WebApp</a>. All rights reserved.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

    <!-- Core JS files -->
    <script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/ui/ripple.min.js')}}"></script>
    <!-- /core JS files -->

    <script type="text/javascript" src="{{asset('global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('global_assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('global_assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('global_assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('global_assets/js/plugins/tables/datatables/extensions/buttons/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('global_assets/js/plugins/tables/datatables/extensions/buttons/buttons.html5.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('global_assets/js/plugins/forms/validation/additional_methods.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('global_assets/js/plugins/notifications/noty.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('global_assets/js/setting.js?v='.time())}}"></script>
    <script type="text/javascript" src="{{asset('global_assets/js/datetimepicker/datetimepicker.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

    <!-- Theme JS files -->
    <script src="{{asset('js/app.js')}}"></script>
    <!-- /theme JS files -->
    @yield('js_section')
</body>

</html>
