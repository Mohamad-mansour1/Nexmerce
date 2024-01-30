<!doctype html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <title>Nexmerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Admin" name="description" />
    <meta content="Mohamad Mansour" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />

    <!-- Page CSS -->
    @include('admin.layouts.css')
    @yield('styles')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            @include('admin.layouts.sideBar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('admin.layouts.nav')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">

                        @yield('content')

                    </div>
                    <!-- / Content -->

                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

    </div>
    <!-- / Layout wrapper -->


    @include('admin.layouts.js')

    @yield('scripts')
</body>

</html>
