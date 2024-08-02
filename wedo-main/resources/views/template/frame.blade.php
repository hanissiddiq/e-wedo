<!DOCTYPE html>
<html>

<head>
    <link href="{{ url('') }}/favicon.png" rel="icon">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Wedo - {{ $subtitle }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="{{ url('') }}/asset/plugins/jquery/jquery.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('') }}/asset/plugins/fontawesome-free/css/all.min.css">
      <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('') }}/asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ url('') }}/asset/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('') }}/asset/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('') }}/asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="{{ url('') }}/asset/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="{{ url('') }}/asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    

        {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">


   </head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <p class="text-sm font-weight-bold font-italic"></p>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->


        @include('template/sidebar')


        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

    <footer class="main-footer text-sm">
        <strong>Copyright &copy; {{date('Y')}} <a href="#">Wedo, Wedding Organizer Kabupaten Bireuen</a>. <a
                href="{{url('')}}" target="_blank"></a></strong>
        All rights reserved
    </footer>

    @include('template/footer')
