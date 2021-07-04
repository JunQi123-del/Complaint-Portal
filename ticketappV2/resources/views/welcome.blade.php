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

  <!-- =============================================================== Hero Section =============================================================================== -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

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
                        <input type="number" class="form-control animate__animated animate__fadeInDown" id="inputEmail3" placeholder="Search TicketID">
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
                        <input type="number" class="form-control animate__animated animate__fadeInDown" id="inputEmail3" placeholder="Search TicketID">
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
                        <input type="number" class="form-control animate__animated animate__fadeInDown" id="inputEmail3" placeholder="Search TicketID">
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
   <!-------------------------------------------------------------- TODO Addin expansion bars here -------------------------------------------------------------------->
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
         <br><a href = "/ticket/create/complaint">Lodge a Complaint</a>
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
<!------------------------------------------------------------------------------ Accordion wrapper End ---------------------------------------------------------------------------------------------------------------->
</main>


@endsection