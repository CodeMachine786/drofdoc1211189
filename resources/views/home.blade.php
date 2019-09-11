@extends('layouts.apps')
@section('container')
<div class="container pr-5 pl-5">
    	<div class="row">
        	<div class="col-ld-6 col-md-6 col-">
            	<div class="appointment-blog">
                	<div class="col-lg-6 col-md-6 col-sm-6 appointment-left-side float-left">
                        <div class="blog">
                                <img class="img-fluid mb-2" src="{{ url('/') }}/public/assets/images/icon1.png" alt="img"><br/> 
                                <span>Dentist</span>
                        </div>
                        <div class="blog">
                                <img class="img-fluid mb-2" src="{{ url('/') }}/public/assets/images/icon2.png" alt="img"><br/> 
                                <span>Dermatologist</span>
                        </div>
                          <div class="blog">
                                <img class="img-fluid mb-2" src="{{ url('/') }}/public/assets/images/icon3.png" alt="img"><br/> 
                                <span>ENT</span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 appointment-right-side float-right mt-4">
                        <div class="blog">
                                <img class="img-fluid mb-2" src="{{ url('/') }}/public/assets/images/icon4.png" alt="img"><br/> 
                                <span>OBGYN</span>
                        </div>
                        <div class="blog">
                                <img class="img-fluid mb-2" src="{{ url('/') }}/public/assets/images/icon5.png" alt="img"><br/> 
                                <span>Eye Specialst</span>
                        </div>
                          <div class="blog">
                                <img class="img-fluid mb-2" src="{{ url('/') }}/public/assets/images/icon6.png" alt="img"><br/> 
                                <span>Primary Care</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-ld-6 col-md-6 col-">
			<div class="appointment-blog">
                	<div class="col-lg-6 col-md-6 col-sm-6 appointment-left-side float-left">
                        <div class="blog">
                                <img class="img-fluid mb-2" src="{{ url('/') }}/public/assets/images/child-spec.png" alt="img"><br/> 
                                <span>Child Specialist</span>
                        </div>
                        <div class="blog">
                                <img class="img-fluid mb-2" src="{{ url('/') }}/public/assets/images/woman-health.png" alt="img"><br/> 
                                <span>Woman's Health</span>
                        </div>
                          <div class="blog">
                                <img class="img-fluid mb-2" src="{{ url('/') }}/public/assets/images/homoepathy.png" alt="img"><br/> 
                                <span>Homoepathy</span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 appointment-right-side float-right mt-4">
                        <div class="blog">
                                <img class="img-fluid mb-2" src="{{ url('/') }}/public/assets/images/skin.png" alt="img"><br/> 
                                <span>Skin</span>
                        </div>
                        <div class="blog">
                                <img class="img-fluid mb-2" src="{{ url('/') }}/public/assets/images/diagnosis.png" alt="img"><br/> 
                                <span>Diagnosis</span>
                        </div>
                          <div class="blog">
                                <img class="img-fluid mb-2" src="{{ url('/') }}/public/assets/images/treatment.png" alt="img"><br/> 
                                <span>Treatment</span>
                        </div>
                    </div>
                </div>
            	<!--<div class="appointment-cont mt-5">
                	<h3>Hassle-Free appointments with prime doctors</h3>
                    <p class="mt-3">Donec aliquam lacinia diam, non lobortis dolor pulvinar at. Pellentesque quis mauris venenatis, 
                    ultrices est sodales, vulputate tellus. Aenean sollicitudin ante massa, nec interdum metus porttitor ac. </p>
                    <p>Vivamus tincidunt consectetur nisi ut molestie. Curabitur fermentum magna in quam vestibulum, 
                    pellentesque pulvinar magna laoreet. Nunc eleifend suscipit nibh, et venenatis turpis placerat eget. Aliquam he</p>
                    <button type="button" class="btn btn-primary btn-lg skyblue">Read More</button>
                </div>-->
            </div>
        </div>
    </div>
</section>
<!---->
<section class="top-deal">

<div class="container">
  <h2 class="text-white text-center pt-5 pb-4">Top deals and offers</h2>
   <section class="customer-logos slider">
   	<div class="slide"><img src="{{ url('/') }}/public/assets/images/slider-img1.jpg">
      <div class="slider-cont bg-white">
      <p>Health checkup at home<br><span>$99</span></p>
      </div>
      </div>
      <div class="slide"><img src="{{ url('/') }}/public/assets/images/slider-img2.jpg">
      <div class="slider-cont bg-white">
      <p>Health checkup at home <br/><span>$99</span></p>
      </div>
      </div>
      <div class="slide"><img src="{{ url('/') }}/public/assets/images/slider-img3.jpg">
      <div class="slider-cont bg-white">
      <p>Health checkup at home<br/><span>$99</span></p>
      </div>
      </div>
      <div class="slide"><img src="{{ url('/') }}/public/assets/images/slider-img1.jpg">
      <div class="slider-cont bg-white">
      <p>Health checkup at home<br/><span>$99</span></p>
      </div>
      </div>
      <div class="slide"><img src="{{ url('/') }}/public/assets/images/slider-img2.jpg">
      <div class="slider-cont bg-white">
      <p>Health checkup at home<br/><span>$99</span></p>
      </div>
      </div>
      <div class="slide"><img src="{{ url('/') }}/public/assets/images/slider-img3.jpg">
      <div class="slider-cont bg-white">
      <p>Health checkup at home<br/><span>$99</span></p>
      </div>
      </div>
      <div class="slide"><img src="{{ url('/') }}/public/assets/images/slider-img1.jpg">
      <div class="slider-cont bg-white">
      <p>Health checkup at home<br/><span>$99</span></p>
      </div>
      </div>
      <div class="slide"><img src="{{ url('/') }}/public/assets/images/slider-img2.jpg">
      <div class="slider-cont bg-white">
      <p>Health checkup at home<br/><span>$99</span></p>
      </div>
      </div>
   </section>
</div>
</div>
</div>
</section>
<!--How We Works-->
<section class="how-it-works">
	<div class="container">
    <h2 class="text-center">How We Works</h2>
    	<div class="row it-works">
        	<div class="col-ld-4 col-md-4 col- it-works-step text-center">
            	<span>01</span>
            	<h3>Singup with us</h3>
                <p>Maecenas nisi quam, laoreet vel libero ut, sollicitudin lacinia turpis. Morbi dapibus</p>
            </div>
            <div class="col-ld-4 col-md-4 col- it-works-step text-center">
            <span>02</span>
           		 <h3>Profile list</h3>
                <p>Maecenas nisi quam, laoreet vel libero ut, sollicitudin lacinia turpis. Morbi dapibus</p>
            </div>
            <div class="col-ld-4 col-md-4 col- text-center">
            <span>03</span>
            <h3>Explain your <br/> health Concern</h3>
                <p>Maecenas nisi quam, laoreet vel libero ut, sollicitudin lacinia turpis. Morbi dapibus</p>
            </div>
        </div>
        <hr class="dividr"></hr>
    </div>
</section>

<!-- Start Chats Section -->

<div id="numberFacts">
<div class="container numberFactsSlider" data-appear-top-offset="-100" data-sequence="500">
<div class="col-md-4 col-sm-6 " data-id="2">
<div id="joinedNum" class="factElmt">
<span class="factNumber">3,135,953</span>
<p class="factTxt">User has joined yet</p>
<img src="{{ url('/') }}/public/assets/images/user.jpg">
<a id="id-1-4" class="factMsg mouse-pointer" href="#">Users join us</a> </div>
</div>

<div class="col-md-4 col-sm-6 " data-id="2">
<div id="availableNum" class="factElmt">
<span class="factNumber">180</span>
<p class="factTxt">A doctor is available to answer your questions now</p>
<img src="{{ url('/') }}/public/assets/images/ask.jpg">
<a id="id-1-3" class="factMsg mouse-pointer " href="#">doctors online</a> </div>
</div>

<div class="col-md-4 col-sm-6 " data-id="2">
<div id="voiceCallsNum" class="factElmt">
<span class="factNumber">735,033</span>
<p class="factTxt">Voice call made by patients </p>
<img src="{{ url('/') }}/public/assets/images/speak.jpg">
<a id="id-1-2" class="factMsg mouse-pointer " href="#">Appointments</a> </div>
</div>

<div class="col-md-4 col-sm-6 " data-id="1">
<div id="specialNum" class="factElmt">
<span class="factNumber">33,186</span>
<p class="factTxt">Doctor joined so far</p>
<img src="{{ url('/') }}/public/assets/images/doctor.jpg">
<a id="id-1-5" class="factMsg mouse-pointer" href="#">Medical advice & consultation</a> </div>
</div>

<div class="col-md-4 col-sm-6 " data-id="1">
<div id="artNum" class="factElmt">
<span class="factNumber">12,541</span>
<p class="factTxt">Advice and medical article </p>
<img src="{{ url('/') }}/public/assets/images/post.jpg">
<a id="id-1-7" class="factMsg mouse-pointer" href="#">Medical consultation was answered</a> </div>
</div>

<div class="col-md-4 col-sm-6 " data-id="1">
<div id="answerNum" class="factElmt">
<span class="factNumber">921,090</span>
<p class="factTxt">Medical question answered</p>
<img src="{{ url('/') }}/public/assets/images/help.jpg">
<a id="id-1-6" class="factMsg mouse-pointer" href="#">Doctor join us</a> </div>
</div>

</div>
</div>


<!-- End Chats Section -->

<!--Chat with doctors online-->
<section class="Chat-online">
	<div class="container">
    <h3 class="text-center">Chat with doctors online</h3>
    	<div class="row">
        	<div class="col-ld-3 col-md-3 col-sm-6 col-">
               <img class="img-fluid mb-2" src="{{ url('/') }}/public/assets/images/chat-img1.jpg" alt="img">
               <p>Hair loss and skin problem?<br/><span>Chat now</span></p>
            </div>
            <div class="col-ld-3 col-md-3 col-sm-6 col-">
               <img class="img-fluid mb-2" src="{{ url('/') }}/public/assets/images/chat-img2.jpg" alt="img">
               <p>Irregular periods or pregnancy?<br/><span>Chat now</span></p>
            </div>
            <div class="col-ld-3 col-md-3 col-sm-6 col-">
               <img class="img-fluid mb-2" src="{{ url('/') }}/public/assets/images/chat-img3.jpg" alt="img">
               <p>Performance issue in bed?<br/><span>Chat now</span></p>
            </div>
            <div class="col-ld-3 col-md-3 col-sm-6 col-">
               <img class="img-fluid mb-2" src="{{ url('/') }}/public/assets/images/chat-img4.jpg" alt="img">
               <p>Stressed, anxious or depressed<br/><span>Chat now</span></p>
            </div>
        </div>
    </div>
</section>
<!--Client Testimonials-->
<section class="testimonials">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-5 col-md-5 col-sm-5 col- testimonials-cont">
            	<h3>Client<br/>Testimonials</h3>
                <img class="img-fluid mt-2 mb-2" src="{{ url('/') }}/public/assets/images/google-img.png" alt="img">
                <p class="text-white">4.9/5.0 Customer Review all on our services</p>
            </div>
            
            	<div class="col-lg-7 col-md-7 col-sm-7 col- testimonials-slider">
               <div id="demo" class="carousel slide" data-ride="carousel" style="border: none;">
  <!--<ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>-->
  <div class="carousel-inner">
    <div class="carousel-item active">
       
      <div class="carousel-caption test-slider">
	  <img class="review" src="{{ url('/') }}/public/assets/images/star.png"><img class="review" src="{{ url('/') }}/public/assets/images/star.png"><img class="review" src="{{ url('/') }}/public/assets/images/star.png"><img class="review" src="{{ url('/') }}/public/assets/images/star.png"><img class="review" src="{{ url('/') }}/public/assets/images/star.png">
        <p>Fusce varius lectus quis velit consequat aliquet et eget dui. Pellentesque blandit finibus massa, volutpat condimentum nulla tristique in. Vestibulum ante</p>
        <h3>- David K Winter</h3>
        <span>Los Angles CA</span>
      </div>   
    </div>
    <div class="carousel-item">
      
      <div class="carousel-caption test-slider">
	  <img class="review" src="images/star.png"><img class="review" src="{{ url('/') }}/public/assets/images/star.png"><img class="review" src="{{ url('/') }}/public/assets/images/star.png"><img class="review" src="{{ url('/') }}/public/assets/images/star.png"><img class="review" src="{{ url('/') }}/public/assets/images/star.png">
       <p>Fusce varius lectus quis velit consequat aliquet et eget dui. Pellentesque blandit finibus massa, volutpat condimentum nulla tristique in. Vestibulum ante</p>
        <h3>- David K Winter</h3>
        <span>Los Angles CA</span>
      </div>   
    </div>
    <div class="carousel-item">
      
      <div class="carousel-caption test-slider">
	  <img class="review" src="{{ url('/') }}/public/assets/images/star.png"><img class="review" src="{{ url('/') }}/public/assets/images/star.png"><img class="review" src="{{ url('/') }}/public/assets/images/star.png"><img class="review" src="{{ url('/') }}/public/assets/images/star.png"><img class="review" src="{{ url('/') }}/public/assets/images/star.png">
        <p>Fusce varius lectus quis velit consequat aliquet et eget dui. Pellentesque blandit finibus massa, volutpat condimentum nulla tristique in. Vestibulum ante</p>
          <h3>- David K Winter</h3>
             <span>Los Angles CA</span>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev test-slider" href="#demo" data-slide="prev">
    <i class="fa fa-angle-left" aria-hidden="true"></i>
<!--<span class="carousel-control-prev-icon"></span>-->
  </a>
  <a class="carousel-control-next test-slider" href="#demo" data-slide="next">
    <i class="fa fa-angle-right" aria-hidden="true"></i>
<!-- <span class="carousel-control-next-icon"></span>-->
  </a>
</div>

               </div>
        </div>
    </div>
</section>

<!--better health-->
<section class="better-health">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-1 col-md-1 col-sm-1">
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col- better-health-img">
            <img class="img-fluid" src="{{ url('/') }}/public/assets/images/health-img.jpg" alt="img">
            </div>
             <div class="col-lg-5 col-md-5 col-sm-5 col- better-health-cont">
             <h3>3 steps for better health</h3>
            
             	<div class="health-step1">
                <div class="row">
                <div class="col-lg-3 health-step-count">
                <span>01</span>
                </div>
                <div class="col-lg-9 health-step-cont">
                <h4>Get fully body checkup</h4>
                <p>Maecenas nisi quam, laoreet vel libero ut, sollicitudin lacinia turpis. Morbi dapibus</p>
                </div>
                </div>
                </div>
                <div class="health-step1">
                <div class="row">
                <div class="col-lg-3 health-step-count">
                <span>02</span>
                </div>
                <div class="col-lg-9 health-step-cont">
                <h4>Connect with a Doctor</h4>
                <p>Maecenas nisi quam, laoreet vel libero ut, sollicitudin lacinia turpis. Morbi dapibus</p>
                </div>
                </div>
                </div>
                <div class="health-step1">
                <div class="row">
                <div class="col-lg-3 health-step-count">
                <span>03</span>
                </div>
                <div class="col-lg-9 health-step-cont">
                <h4>Order Medicine</h4>
                <p>Maecenas nisi quam, laoreet vel libero ut, sollicitudin lacinia turpis. Morbi dapibus</p>
                </div>
                </div>
                </div>
         
          
            <div class="col-lg-1 col-md-1 col-sm-1">
            </div>
        </div>
    </div>
</section>
<!--FAQS-->
<section class="faqs">
<img src="{{ url('/') }}/public/assets/images/faq-bg.png">
<div class="container">
    	<div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 col- faqss">
    <h2 class="faqs-hdng text-left">FAQs</h2>        
<center>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                           Lorem ipsum dolor sit amet, consectetur?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Vestibulum dictum odio eu neque interdum nulla camtne?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Donec sodales nibh malesuada aliquet viverra?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFour">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Sed pellentesque augue at tortor aliquam?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
                                    </div>
                                </div>
                            </div>
							<div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFive">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            Etiam eget metus pellentesque odio?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingSix">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                            Cras interdum neque eget ornare scelerisque?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                </center>
</div>
        </div>
    </div>
</section>

<!-- Latest Articles -->

<section class="latest-articles">
<div id="hotArticles">
<h2 class="title btwnTitle text-center mt-35"> Latest Articles </h2>
<div class="container">
<div id="w2" class="row hotArticlesSlider">

<article class="col-md-6 withArtBox">
<div class="articleHolder">
<h2 class="articleTitle"> <a class="id-1-12" href="#">Plasma injection for cosmetology</a></h2>
<h5 class="category">Skin and beauty</h5>
<div class="articleImg"> <img class="post-thumbnail lozad" src="{{ url('/') }}/public/assets/images/skin.jpg"> </div>
<div class="doctorBox clearfix">
<div class="doctorImg imgHolder pull-right">
<img class="article-doctorImg lozad" src="{{ url('/') }}/public/assets/images/doctor.jpg"> 
</div>
<ul class="doctorBio list-unstyled pull-right">
<li class="name fn-16"> <a href="#">Dr. David K Winter</a></li>
</ul>
</div>
<div class="articleAnswer-New clearfix">
<p>Platelet-rich plasma injections have been widely used recently in various pathological conditions, including cardiac surgery, and the treatment of joint pain b ... </p>
</div>
<ul class="articleTags list-inline">
<li> <a href="#">Skin and beauty</a> </li>
</ul>
</div>
</article>
<article class="col-md-6 withArtBox">
<div class="articleHolder">
<h2 class="articleTitle"> <a class="id-1-12" href="#">Plasma injection for joint pain</a></h2>
<h5 class="category">Diseases of muscles, bones and joints</h5>
<div class="articleImg"> <img class="post-thumbnail lozad" src="{{ url('/') }}/public/assets/images/knee.png"> </div>
<div class="doctorBox clearfix">
<div class="doctorImg imgHolder pull-right">
<img class="article-doctorImg lozad" src="{{ url('/') }}/public/assets/images/doctor.jpg"> 
</div>
<ul class="doctorBio list-unstyled pull-right">
<li class="name fn-16"> <a href="#">Dr. David K Winter</a></li>
</ul>
</div>
<div class="articleAnswer-New clearfix">
<p>Traditional methods of treating knee pain caused by arthritis include traditional treatments, such as NSAIDs, physiotherapy, and sometimes cortisone injections or ... </font></font></p>
</div>
<ul class="articleTags list-inline">
<li> <a href="#">Diseases of muscles, bones and joints</a> </li>
</ul>
</div>
</article></div> </div>
</div>
</section>

<!-- End Latest Articles -->
@stop
@section('footer')
<!--footer-->
<footer class="drofdoc-ftr">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-2 col-md-2 col-sm-6 col-">
             	<img class="img-fluid" src="{{ url('/') }}/public/assets/images/logo.png" alt="logo">
                <p class="ftr-cont">@2019 All Rights Rserved</p>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-">
            <h4 class="ftr-hdng"> About</h4>
                 <ul class="ftr-menu">
                     <li> <a href="#">Home</a></li>
                    <li> <a href="#">How it Works</a></li>
                     <li> <a href="#"> Find Doctors</a></li>
                     <li><a href="#">FAQ's</a></li>
                     <li><a href="#">Contact</a></li>
                     </ul>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-">
             <h4 class="ftr-hdng"> Other</h4>
                 <ul class="ftr-menu">
                     <li> <a href="#">Login</a></li>
                    <li> <a href="#">Chat Doctor</a></li>
                     <li> <a href="#">Pharmacy</a></li>
                     <li><a href="#">Blog</a></li>
       </ul>

            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-">
             <h4 class="ftr-hdng">Contact </h4>
                 <ul class="ftr-menu">
                 <li>Phone<br/><a href="tel:+0123 456 7890">0123 456 7890</a></li>
                    <!--<li> <a href="#">0123 456 7890</a></li>-->
                        <li>Email<br/><a href="email:info@yourdomain.com">info@yourdomain.com</a></li>
                       <!--<li><a href="#">Email<br/>info@yourdomain.com</a></li>-->
                     <!--<li> <a href="#">info@yourdomain.com</a></li>-->
                     
       </ul>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-">
            <h4 class="ftr-hdng"> Email Alert</h4>
 <div class="input-group">
                        <input type="text" class="form-control ftr" placeholder="Enter your email">
                        <div class="input-group-append">
                          <button class="btn btn-secondary skyblue" type="button">
                        Subscribe
                          </button>
                        </div>
  					</div>
  <div class="iocn">
      <i class="fa fa-facebook-f"></i>
<i class="fa fa-twitter"></i>
<i class="fa fa-instagram"></i>

  </div>
            </div>
        </div>
    </div>
</footer>



</body>
</html>
<script>
$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: true,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});
</script>
@stop 

 
	
