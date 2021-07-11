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
              
               <form action="/search-ticket" method="POST" id="search_form">
                      @CSRF
                    <div class="form-group row">
                        <div class="col-sm-5 mx-auto">
                           <input type="number" class="form-control animate__animated animate__fadeInDown" id="id_search" name="id_search" placeholder="Search TicketID">
                        </div>
                    </div>
                  <button type=submit class="btn btn-danger">Search</button>
               </form>

            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(/image/slides-background/slide2.jpg">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">欢迎来到投诉门户</h2>
              <p class="animate__animated animate__fadeInUp">你今天想要做什么？</p>
              
              <form action="/search-ticket" method="POST" id="search_form">
                      @CSRF
                    <div class="form-group row">
                        <div class="col-sm-5 mx-auto">
                           <input type="number" class="form-control animate__animated animate__fadeInDown" id="id_search" name="id_search" placeholder="Search TicketID">
                        </div>
                    </div>
                  <button type=submit class="btn btn-danger">Search</button>
               </form>

            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(/image/slides-background/slide3.jpg">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">ComplaintPortal에 오신 것을 환영합니다</h2>
              <p class="animate__animated animate__fadeInUp">오늘 뭐하고 싶니?</p>
              
               <form action="/search-ticket" method="POST" id="search_form">
                      @CSRF
                    <div class="form-group row">
                        <div class="col-sm-5 mx-auto">
                           <input type="number" class="form-control animate__animated animate__fadeInDown" id="id_search" name="id_search" placeholder="Search TicketID">
                        </div>
                    </div>
                  <button type=submit class="btn btn-danger">Search</button>
               </form>

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
                     data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  Complaint
                  <i class="fa fa-angle-down"></i>
                  </button>
               </h2>
         </div>
         <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
            data-parent="#accordionExample">
            <div class="t">
               <div class="row" style = "content: ''; display: table; clear: both;">
                  <div class="column" style = "float: left; width: 50%; padding: 10px; height: 310px;">
                     <h2>Complaint</h2>
                        
                        <p>Anyone that is experiencing or experienced any issues during their time in the university and would want to notify the school, they could send the university a complaint. By sending the complaint, the university would review it and investigate on the issue. If the complaint is approved to be valid, then the university would take appropriate action and fix the requested issue.
                        The university is not only opened for the students enrolled and the staffs working there, but also to the member of the publics that would want to enjoy the different areas that the university if providing such as the library, café or just to hangout in the university.                      
                        <br><br>For the reason above, this complaint is also opened to everyone that would want to notify an issue to the university, not just the students and staffs.</p>
                  
                     <a href = "/ticket/create/complaint">Lodge a Complaint</a>
                     
                  </div>
                     
                  <div class="column" style = "float: left; width: 50%; padding: 10px; height: 310px;">
                     <h2> Anonymous Complaint</h2>

                     <p>If anyone that do not wish to provide their personal details, such as their names or contact information, but still want to send a complaint to the university, they remain can anonymous and send the feedback through this feature.</p>
                     
                     <br><br><br<br><a href = "/ticket/create/complaint/anonymous">Lodge an anonymous Complaint</a>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <br>

      <div class="item">
         <div class="item-header" id="headingTwo">
            <h2 class="mb-0">
               <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                  data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
               Feedback
               <i class="fa fa-angle-down"></i>
               </button>
            </h2>
         </div>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
            data-parent="#accordionExample">
            <div class="t">
               <div class="row" style = "content: ''; display: table; clear: both;">
                  <div class="column" style = "float: left; width: 50%; padding: 10px; height: 310px;">
                     <h2>Feedback</h2>
                           
                        <p>Anyone that would want to provide a positive feedback to the school to show appreciation of the things that the university is doing well, they could send the university a feedback so that the university would include more of that activities or enhance those factors that was given.                      
                         The university is not only opened for the students enrolled and the staffs working there, but also to the member of the public that would want to enjoy the different areas that the university if providing such as the library, café or just to hangout in the university. 
                        <br><br>For the reason above, this feedback is also opened to everyone that would want to provide a positive feedback to the university, not just the students and staffs.</p>
                        
                        <a href = "/ticket/create/feedback">Lodge a Feedback</a>
                           
                  </div>
                           
                  <div class="column" style = "float: left; width: 50%; padding: 10px; height: 310px;">
                     <h2> Anonymous Feedback</h2>

                     <p>If anyone that do not wish to provide their personal details, such as their names or contact information, but still want to send a positive feedback to the university, they can remain anonymous and send the feedback through this feature.</p>
                           
                     <br><br><br<br><a href = "/ticket/create/feedback/anonymous">Lodge an anonymous Feedback</a>
                  </div>
               </div> 
            </div>
         </div>
      </div>

      <div class="item">
         <div class="item-header" id="headingThree">
            <h2 class="mb-0">
               <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                  data-target="#collapseThree" aria-expanded="false"
                  aria-controls="collapseThree">
               Remark
               <i class="fa fa-angle-down"></i>
               </button>
            </h2>
         </div>
         <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
            data-parent="#accordionExample">
            <div class="t">
               <p>If a student is not satisfied with the mark of their exam or assessment; or feel like there is a mistakes in terms of the marking of their exam or assessment, they could discuss this issue with their unit coordinator. When this is the case, the student could request a review or a remark of their exam or assessment.</p>
               <br>
               <strong>A remark request would be approved to be reviewed if:</strong>
               <ul>
                  <li>The mark that was given was not based on a marking guide provided in the unit guide or provided by the unit coordinator.</li>
                  <li>The marking was biased which affect the result of the assessment.</li>
                  <li>The mark shows inconsistency with advice from staff teaching the unit.</li>
               </ul>
               <a href = "/ticket/create/remark">Lodge a remark</a>  
            </div>
         </div>
      </div>

      <div class="item">
         <div class="item-header" id="headingFour">
            <h2 class="mb-0">
               <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                  data-target="#collapseFour" aria-expanded="false"
                  aria-controls="collapseFour">
               Appeal
               <i class="fa fa-angle-down"></i>
               </button>
            </h2>
         </div>
         <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
            data-parent="#accordionExample">
            <div class="t">
               <p>If a student has gotten penalties regarding their assessment or has gotten any punishments on other issues but feel like the penalties or punishment was a mistake, they could apply a appeal request to the university so the university could investigate on the issue.</p>         
               <a href = "/ticket/create/appeal">Lodge an appeal</a>  
            </div>
         </div>
      </div>   
   </div>

 <!------------------------------------------------------------------------------ Accordion wrapper End ---------------------------------------------------------------------------------------------------------------->
   </main>


@endsection