
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    
    @include('user.partials.head')
    <!-- =======================================================
    * Template Name: Bethany - v4.3.0
    * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container">
            <div class="header-container d-flex align-items-center justify-content-between">
            <div class="logo">
                <h1 class="text-light"><a href="index.html"><span>Bethany</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="Bethany/assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            @include('user.partials.navbar')

            </div><!-- End Header Container -->
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1>Your New Online Presence with Bethany</h1>
        <h2>We are team of talented designers making websites with Bootstrap</h2>
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
    </section><!-- End Hero -->

    <main id="main">

        {{ $slot }}

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('user.partials.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    @include('user.partials.scripts')

</body>

</html>