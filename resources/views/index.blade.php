<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Stock Barang - {{ $title }}</title>
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
    <!-- CSS Files -->
    <link href="{{ asset('assets/admin') }}/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
    <link href="{{ asset('assets/admin') }}/css/style.css" rel="stylesheet" />
</head>

<body class="bg-default">

    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-teal py-7 py-lg-8 pt-lg-9">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                            <h1 class="text-white">Welcome!</h1>
                            <p class="text-lead text-white">Login to Access Monitoring.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-2">

                        <div class="card-body px-lg-5 py-lg-5">
                            @if (session()->has('message'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <form class="needs-validation" role="form" action="{{ route('login-act') }}"
                                method="POST">
                                @csrf
                                <div class="form-group mb-3 mt-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control @error('username') is-invalid @enderror"
                                            placeholder="Username/Email" type="text" name="username"
                                            value="{{ old('username') }}">
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Password" id="password-login" type="password" name="password">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    <input class="custom-control-input" id="showPass" type="checkbox">
                                    <label class="custom-control-label" for="showPass">
                                        <span class="text-muted">Show Password</span>
                                    </label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-block mt-4">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
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
    <!-- Argon JS -->
    <script src="{{ asset('assets/admin') }}/js/argon-dashboard.min.js?v=1.1.0"></script>
    <script src="{{ asset('assets/admin') }}/custom.js"></script>
</body>

</html>
