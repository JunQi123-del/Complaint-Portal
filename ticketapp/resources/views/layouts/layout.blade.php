<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <header id="header" class="fixed-top">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name',"Notes App")}}</title>

        <!--Scripts -->
        <!-- <script type ="text/javascript"  src="{!! asset('js/app.min.js') !!}"></script> -->
        <script type ="text/javascript"  src="{!! asset('js/app.js') !!}"> </script>
        <script type ="text/javascript"  src="{!! asset('js/wecomepage/main.js') !!}"> </script>
        <script type ="text/javascript"  src="{!! asset('js/wecomepage/venobox.min.js') !!}"> </script>
        <script type ="text/javascript"  src="{!! asset('js/wecomepage/owl.carousel.min.js') !!}"> </script>
        <script type ="text/javascript"  src="{!! asset('js/wecomepage/isotope.pkgd.min.js') !!}"> </script>
        <script src="https://use.fontawesome.com/84ee66b848.js"></script>


        <!-- Styles -->
         <link href="/css/app.css" rel="stylesheet"><!-- from bootstrap -->
         <link href="/css/welcomepage/style.css" rel="stylesheet">
         <link href="/css/welcomepage/icofont.min.css" rel="stylesheet">
         <link href="/css/welcomepage/boxicons.min.css" rel="stylesheet">
         <link href="/css/welcomepage/animate.min.css" rel="stylesheet">
         <link href="/css/welcomepage/venobox.min.css" rel="stylesheet">
         <link href="/css/welcomepage/owl.carousel.min.css" rel="stylesheet">
         <link href="/css/welcomepage/accordion.css" rel="stylesheet">

        
         
        <div class="container d-flex align-items-center">

        <!--<h1 class="logo mr-auto"><a href="{{url('/')}}">Green</a></h1>-->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="{{url('/')}}" class="logo mr-auto"><img src="/image/Logo.png" alt="Logo" class="img-fluid" ></a>

        

        <a href="" class="get-started-btn scrollto">login</a>

        </div>
    </header><!-- End Header -->
    <body>
     @yield('content')

     <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
        <h3>Green</h3>
        <div class="social-links">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
        <div class="copyright">
            &copy; Copyright <strong><span>ComplaintPortal</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/green-free-one-page-bootstrap-template/ -->
            Designed by <a href="https://bootstrapmade.com/">FT05</a>
        </div>
        </div>
    </footer><!-- End Footer -->

    <!-- back to top have not implemen -->
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    </body>

</html>