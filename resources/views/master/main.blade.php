<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Stock Barang - {{ $title }}
    </title>
    <!-- Favicon -->
    <link href="{{ asset('assets/admin') }}/img/logo/favicon tt.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('assets/admin') }}/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="{{ asset('assets/admin') }}/js/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link href="{{ asset('assets/admin') }}/js/plugins/@fortawesome/fontawesome-free/css/all.min.css"
        rel="stylesheet" />

    <!-- Page plugins -->
    <link rel="stylesheet"
        href="{{ asset('assets/admin') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
        type="text/css">
    <link rel="stylesheet"
        href="{{ asset('assets/admin') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets/admin') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets/admin') }}/vendor/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">

    <!-- CSS Files -->
    <link href="{{ asset('assets/admin') }}/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
    <link href="{{ asset('assets/admin') }}/css/style.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand pt-0" href="{{ route('dashboard') }}">
                <img src="{{ asset('assets/admin/img/logo') }}/teropong timur2.png"
                    class="navbar-brand-img img-responsive logo" alt="...">
            </a>

            <!-- User -->
            <ul class="nav align-items-center d-md-none">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder"
                                    src="{{ asset('assets/admin') }}/img/profil/{{ session()->get('akun-admin.gambar') }}">
                            </span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        <a href="{{ route('user.profile') }}" class="dropdown-item">
                            <i class="fas fa-user fa-fw"></i>
                            <span>Profile</span>
                        </a>

                        <a href="{{ route('user.changePassword') }}" class="dropdown-item">
                            <i class="fas fa-lock fa-fw"></i>
                            <span>Ganti Password</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Collapse header -->
                <div class="navbar-collapse-header d-md-none">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="{{ route('dashboard') }}">
                                <img src="{{ asset('assets/admin/img/logo') }}/teropong timur2.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                aria-label="Toggle sidenav">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Navigation -->

                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link {{ $var == 'dashboard' ? 'active' : '' }}"
                            href="{{ route('dashboard') }}"> <i class="ni ni-tv-2 fa-fw text-primary"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $var == 'stockin' ? 'active' : '' }}"
                            href="{{ route('stockin.index') }}"> <i class="ni ni-collection fa-fw text-primary"></i> Barang Masuk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $var == 'stockout' ? 'active' : '' }}"
                            href="{{ url('stockout') }}"> <i
                                class="ni ni-collection fa-fw text-primary"></i> Barang Keluar
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3">
                @if (session()->get('akun-admin.role_id') == 1)
                    <!-- Heading -->
                    <h6 class="navbar-heading p-0 text-muted">
                        <span class="docs-normal">Administrator</span>
                    </h6>
                    <ul class="navbar-nav mb-md-3">

                        <li class="nav-item">
                            <a class="nav-link {{ $var == 'user' ? 'active' : '' }}"
                                href="{{ route('user.list') }}">
                                <i class="ni ni-circle-08 fa-fw text-primary"></i>
                                <span class="nav-link-text">Users</span>
                            </a>
                        </li>

                    </ul>
                @endif

            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">


                <!-- User -->
                <ul class="navbar-nav align-items-center d-none d-md-flex justify-content-end w-100">

                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder"
                                        src="{{ asset('assets/admin') }}/img/profil/{{ session()->get('akun-admin.gambar') }}">
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span
                                        class="mb-0 text-sm  font-weight-bold">{{ session()->get('akun-admin.nama') }}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome!</h6>
                            </div>
                            <a href="{{ route('user.profile') }}" class="dropdown-item">
                                <i class="fas fa-user fa-fw text-primary"></i>
                                <span>Profile</span>
                            </a>

                            <a href="{{ route('user.changePassword') }}" class="dropdown-item">
                                <i class="fas fa-lock fa-fw text-primary"></i>
                                <span>Ganti Password</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                                <i class="ni ni-user-run fa-fw text-primary"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->

        <!-- Modal -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalLabel">Konfimasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin keluar ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header -->
        <div class="header bg-gradient-teal pb-6 mb-4">


        </div>
        <!-- Page content -->
        <div class="container-fluid mt--3">
            @yield('content')

            <!-- Footer -->
            <footer class="footer pt-0 mt-4">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6">
                        <div class="copyright text-center  text-lg-left  text-muted">
                            &copy; {{date('Y')}} <span class="font-weight-bold ml-1 text-info">JRegex</span>
                        </div>
                    </div>

                </div>
            </footer>
        </div>
    </div>

    <!-- Argon Scripts -->
    <!--   Core   -->
    <script src="{{ asset('assets/admin') }}/js/plugins/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('assets/admin') }}/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--   Optional JS   -->
    <script src="{{ asset('assets/admin') }}/js/plugins/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('assets/admin') }}/js/plugins/chart.js/dist/Chart.extension.js"></script>
    <!--   Argon JS   -->
    <script src="{{ asset('assets/admin') }}/js/t.js"></script>
    <script src="{{ asset('assets/admin') }}/js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
    </script>

    <!-- dataTables -->
    <script src="{{ asset('assets/admin') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/admin') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets/admin') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets/admin') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js">
    </script>
    <script src="{{ asset('assets/admin') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('assets/admin') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('assets/admin') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('assets/admin') }}/vendor/datatables.net-responsive-bs4/js/dataTables.responsive.min.js">
    </script>
    <script src="{{ asset('assets/admin') }}/vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
    </script>
    <script src="{{ asset('assets/admin') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

    <!-- Argon JS -->
    <script src="{{ asset('assets/admin') }}/js/argon-dashboard.min.js?v=1.1.0"></script>
    <script src="{{ asset('assets/admin') }}/custom-admin.js"></script>
</body>

</html>
