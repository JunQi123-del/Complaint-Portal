@extends('layouts.layout')

@section('content')

<?php /*<header class ="header">
<nav class ="navbar navbar-style">
<div class ="container-fluid">
<div class ="navbar-header col-md-6">
<a href="/"><img class="logo" src="/image/wrait.JPG" width="50" height="50" alt="logo"></a>
</div>
<div class=col-md-6>
<button type="button" class="btn btn-danger">Login</button>
</div>
*/
?>

<div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">contact@example.com</a>
        <i class="icofont-phone"></i> +1 5589 55488 55
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!--<h1 class="logo mr-auto"><a href="{{url('/')}}">Green</a></h1>-->
      <!-- Uncomment below if you prefer to use an image logo -->
       <a href="{{url('/')}}" class="logo mr-auto"><img src="/image/Logo.png" alt="Logo" class="img-fluid" ></a>

      

      <a href="" class="get-started-btn scrollto">login</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
   < <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox"> 

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(/image/slides-background/slide1.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to <span>ComplaintPortal</span></h2>
              <p class="animate__animated animate__fadeInUp">What would you like to do today?<p>
              
              <form>
                    <div class="form-group row">
                        <div class="col-sm-5 mx-auto">
                        <input type="number" class="form-control animate__animated animate__fadeInDown" id="inputEmail3" placeholder="TicketID">
                        </div>
                    </div>
              <button type=submit class="btn btn-danger">Search</a></button>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(/image/slides-background/slide2.jpg">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">欢迎来到投诉门户</h2>
              <p class="animate__animated animate__fadeInUp">你今天想要做什么？</p>
              <form>
                    <div class="form-group row">
                        <div class="col-sm-5 mx-auto">
                        <input type="number" class="form-control animate__animated animate__fadeInDown" id="inputEmail3" placeholder="TicketID">
                        </div>
                    </div>
              <button type=submit class="btn btn-danger">Search</a></button>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(/image/slides-background/slide3.jpg">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">ComplaintPortal에 오신 것을 환영합니다</h2>
              <p class="animate__animated animate__fadeInUp">오늘 뭐하고 싶니?</p>
              <form>
                    <div class="form-group row">
                        <div class="col-sm-5 mx-auto">
                        <input type="number" class="form-control animate__animated animate__fadeInDown" id="inputEmail3" placeholder="TicketID">
                        </div>
                    </div>
              <button type=submit class="btn btn-danger">Search</a></button>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section>
  
  <!---------------------------------------------------------------------- End Hero ---------------------------------------------------------------------------------->

  <main id="main">
   <!-- TODO Addin expansion bars here -->
   <div class="container">
<div class="accordion" id="accordionExample">
  <div class="item">
     <div class="item-header" id="headingOne">
        <h2 class="mb-0">
           <button class="btn btn-link" type="button" data-toggle="collapse"
              data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
           Collapsible Item #1
           <i class="fa fa-angle-down"></i>
           </button>
        </h2>
     </div>
     <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
        data-parent="#accordionExample">
        <div class="t-p">
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
        </div>
     </div>
  </div>
  <div class="item">
     <div class="item-header" id="headingTwo">
        <h2 class="mb-0">
           <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
              data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
           Collapsible Item #2
           <i class="fa fa-angle-down"></i>
           </button>
        </h2>
     </div>
     <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
        data-parent="#accordionExample">
        <div class="t-p">
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
        </div>
     </div>
  </div>
  <div class="item">
     <div class="item-header" id="headingThree">
        <h2 class="mb-0">
           <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
              data-target="#collapseThree" aria-expanded="false"
              aria-controls="collapseThree">
           Collapsible Item #3
           <i class="fa fa-angle-down"></i>
           </button>
        </h2>
     </div>
     <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
        data-parent="#accordionExample">
        <div class="t-p">
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
        </div>
     </div>
  </div>
  <div class="item">
     <div class="item-header" id="headingFour">
        <h2 class="mb-0">
           <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
              data-target="#collapseFour" aria-expanded="false"
              aria-controls="collapseFour">
           Collapsible Item #4
           <i class="fa fa-angle-down"></i>
           </button>
        </h2>
     </div>
     <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
        data-parent="#accordionExample">
        <div class="t-p">
           It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
        </div>
     </div>
  </div>
</div>
</div>
<!-- Accordion wrapper -->

  
   </main>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Green</h3>
      <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
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

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>





@endsection