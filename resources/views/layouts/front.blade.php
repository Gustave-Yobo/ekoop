<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/font.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap5.css')}}">

    {{-- Owl Carousel --}}
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">

    {{-- Google Font --}}
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com"> --}}
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{asset('frontend/css/fontawesome.min.css')}}">

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous"> --}}
    <style>
        a{
            text-decoration: none !important;
            color: #212529 !important;

        }
    </style>
</head>
<body>
    @include('layouts.inc.frontnavbar')

    <div class="content">
        @yield('content')
    </div>

    <script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/custom.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    @if(session('status'))
        <script>
            swal("{{session('status')}}");
        </script>
    @endif
    @yield('scripts')
</body>
</html>
