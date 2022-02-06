<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ config('app.name', 'Cuadedanh') }}</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href={{ asset('manager/plugins/fontawesome-free/css/all.min.css') }}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset("manager/css/adminlte.css") }}>
    <link rel="stylesheet" href={{ asset("common/style.css") }}>
    <!-- summernote -->
    <link rel="stylesheet" href={{ asset("manager/plugins/summernote/summernote-bs4.min.css") }}>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.manager.header')
        <!-- End Navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.manager.sidebar')
        <!-- End Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">
                                {{ isset($title) ? $title : 'Dashboard' }}
                            </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href={{ route('dashboard') }}>Dashboard</a></li>
                                @isset($detail)
                                <li class="breadcrumb-item"><a href={{ route($link) }}>{{ $detail }}</a></li>
                                @endisset
                                @isset($sub)
                                <li class="breadcrumb-item active">
                                    {{ $sub }}
                                </li>
                                @endisset
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anylink
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2022-2022 <a href={{ route('dashboard') }}>Cuadedanh</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- jQuery -->
    <script src={{ asset('manager/plugins/jquery/jquery.min.js') }}></script>
    <!-- Bootstrap 4 -->
    <script src={{ asset('manager/plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <!-- AdminLTE App -->
    <script src={{ asset('manager/js/adminlte.min.js') }}></script>
    {{-- Sweet alert --}}
    <link rel="stylesheet" href={{ asset('manager/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}>
    <script src={{ asset('manager/plugins/sweetalert2/sweetalert2.min.js') }}></script>
    <script>
        $(function(){
            @if(Session::has('noti'))
                Swal.fire({
                    icon: 'success',
                    title: 'Great!',
                    text: '{{ Session::get("success") }}'
                })
            @endif
        });
    </script>
    @yield('script')
</body>

</html>