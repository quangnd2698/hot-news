<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte3/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte3/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('angular/chosen/chosen.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('adminlte3/plugins/toastr/toastr.min.css')}}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @yield('style')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed" ng-app="adminSystem">
    @include('sweetalert::alert')
    <div class="wrapper">

        <!-- Navbar -->
        @include('admin.layouts.inc.header')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.layouts.inc.side-bar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include('admin.layouts.inc.content-header')
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('admin.layouts.inc.footer')
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>

    <script src="{{ asset('adminlte3/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('froala/js/froala_editor.min.js') }}"></script>
    <script src="{{ asset('angular/angular.min.js') }}"></script>
    <script src="{{ asset('angular/module.js') }}"></script>
    <script src="{{ asset('js/controllers/base-controller.js') }}"></script>
    <script src="{{ asset('angular/chosen/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('angular/chosen/angular-chosen.js') }}"></script>
    <script src="{{ asset('froala/src/angular-froala.js') }}"></script>
    <script src="{{ asset('angular/ng-file-upload-shim.min.js') }}"></script>
    <script src="{{ asset('angular/ng-file-upload.min.js') }}"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('adminlte3/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte3/dist/js/adminlte.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('adminlte3/plugins/toastr/toastr.min.js') }}"></script>

    @yield('script')
</body>

</html>
