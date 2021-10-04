
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('partials.head')
    <!-- =======================================================
    * Template Name: Bethany - v4.3.0
    * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    
    @include('partials.navbar')
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    @yield('hero')
    <!-- End Hero -->

    <main id="main">

        {{ $slot }}

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('partials.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    @include('partials.scripts')

</body>

</html>