<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
    <title>Ekoop</title>

    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/font.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/material-dashboard.css')}}">

    <link rel="stylesheet" href="{{asset('admin/demo/demo.css')}}">

</head>
    <div class="wrapper">
        @include('layouts.inc.sidebar')

        <div class="main-panel">
            @include('layouts.inc.adminnav')

            <div class="content">
                @yield('content')
            </div>

            @include('layouts.inc.adminfooter')

        </div>
    </div>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="{{asset('admin/js/jquery.min.js')}}" defer></script>
    <script src="{{asset('admin/js/popper.min.js')}}" defer></script>
    <script src="{{asset('admin/js/bootstrap-material-design.min.js')}}" defer></script>
    <script src="{{asset('admin/js/perfect-scrollbar.jquery.min.js')}}" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    @if(session('status'))
        <script>
            swal("{{session('status')}}");
        </script>
    @endif
    @yield('scripts')
</body>
</html>
