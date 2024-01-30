<!doctype html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/xton/default/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Jan 2023 15:58:45 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <meta charset="utf-8" />
    <title>Nexmerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Ecommerce" name="description" />
    <meta content="Mohamad Mansour" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta property="og:image" content="{{ asset('assets/img/logo.png') }}" >

    <!-- Page CSS -->
    @include('website.layouts.css')
    @yield('styles')
</head>

<body>

    @include('website.layouts.header')

    @include('website.layouts.nav')
    
    @yield('content')
    
    @include('website.layouts.footer')

    @include('website.layouts.js')

    @yield('scripts')

</body>

</html>