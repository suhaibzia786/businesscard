<!DOCTYPE html>

<!-- beautify ignore:start -->
<html lang="en" class="light-style " dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('/') }}" data-template="horizontal-menu-template">

@include('partials.header')

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">

            @include('partials.top')
            <!-- Layout container -->
            <div class="layout-page">

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    
                    @include('partials.nav')

                    <!-- Content -->
                    @yield('content')
                    <!--/ Content -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!--/ Content wrapper -->
            </div>

            <!--/ Layout container -->
        </div>

    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>


    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>

    <!--/ Layout wrapper -->

    @include('partials.footer')

</body>

</html>
