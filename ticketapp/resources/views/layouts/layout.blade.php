<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
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


        <!-- Styles -->
         <link href="/css/app.css" rel="stylesheet">
         <link href="/css/welcomepage/style.css" rel="stylesheet">
         <link href="/css/welcomepage/icofont.min.css" rel="stylesheet">
         <link href="/css/welcomepage/boxicons.min.css" rel="stylesheet">
         <link href="/css/welcomepage/animate.min.css" rel="stylesheet">
         <link href="/css/welcomepage/venobox.min.css" rel="stylesheet">
         <link href="/css/welcomepage/owl.carousel.min.css" rel="stylesheet">
        

        
    </head>
    <body>
     @yield('content')
    </body>
</html>