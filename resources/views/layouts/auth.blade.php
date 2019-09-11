<!DOCTYPE html>
<html lang="en">
<head>
  <title>Drofdoc</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ url('/public/assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('/public/assets/css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="{{ url('/public/assets/js/jquery.min.js') }}"></script>
  <script src="{{ url('/public/assets/js/popper.min.js') }}"></script>
  <script src="{{ url('/public/assets/js/bootstrap.min.js') }}"></script>
    
  <!--slider-->
  <script src="{{ url('/public/assets/js/jquery-2.2.0.min.js') }}" type="text/javascript"></script>
 <script src="{{ url('/public/assets/js/slick.js') }}"></script>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" type="text/css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" type="text/css">

</head>
<body>
<header class="inner-pages">
	<div class="top-header">
        <nav class="navbar navbar-expand-md bg-dark-blue navbar-dark pt-4">
        	<div class="container">
              <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('/public/assets/images/logo.png') }}" alt="logo"/></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto list-inline">
                  <li class="nav-item">
                    <a class="nav-link text-white" href="#"> About </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="#"> Doctors </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="#">Chat</a>
                  </li> 
                   <li class="nav-item">
                    <a class="nav-link text-white" href="#"> Pharmacy</a>
                  </li> 
                    <li class="nav-item">
                   <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
                  Diagnostic
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Genetic Tests</a>
                    <a class="dropdown-item" href="#">Biomarker Test</a>
                    <a class="dropdown-item" href="#">Companion Diagnostics</a>
      			</div>
    				</li>
<!--     			  @if (Auth::guest())    -->
<!--                    <li><a href="{{ url('login') }}"><button type="button" class="btn btn-primary skyblue">Login</button></a></li> -->
<!--                   @endif -->
                  @guest
                            <li class="nav-item	">
                                <a href="{{ route('login') }}"><button type="button" class="btn btn-primary skyblue login_btn">{{ __('Login') }}</button></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}"><button type="button" class="btn btn-primary skyblue">{{ __('Register') }}</button></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                	<a class="dropdown-item" href="{{ route('profile') }}">My Profile</a>
                                	@if(Auth::user()->type_id == 3)
                                	<a class="dropdown-item" href="{{ route('PersonalInfo') }}">Personal Info</a>
                                	@endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                </ul>
              </div> 
            </div> 
        </nav>
    </div>
	<!-- Slider Area -->
</header>


<!-- Buy Membership -->




<!-- Health Plans -->



<!-- Clinet Says -->

<!--login form-->
<section class="main-form">
@yield('container')
</section>
<!--footer-->
<footer class="drofdoc-ftr">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-2 col-md-2 col-sm-6 col-">
             	<img class="img-fluid" src="{{ url('/public/assets/images/logo.png') }}" alt="logo">
                <p class="ftr-cont">@ 2019 All Rights Reserved</p>
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


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function() {
	    $('#datetimepicker1').datepicker({ dateFormat: 'yy/mm/dd' });
	    $('#datetimepicker1').datepicker('setDate', new Date());	
	});
		
</script>

<script>
$(function() {
	$('#basicExample .time').timepicker({
        'showDuration': true,
        'timeFormat': 'g:ia'
    });

    $('#basicExample .date').datepicker({
        'format': 'm/d/yyyy',
        'autoclose': true
    });

    var basicExampleEl = document.getElementById('basicExample');
    var datepair = new Datepair(basicExampleEl);
	 });
                
</script>
<!-- DateTime -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="https://jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="https://jonthornton.github.io/jquery-timepicker/jquery.timepicker.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.standalone.css" />

    <script src="{{ url('public/assets/DateTime/lib/pikaday.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets/DateTime/lib/pikaday.css') }}" />

    <script src="{{ url('public/assets/DateTime/lib/jquery.ptTimeSelect.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('public/assets/DateTime/lib/jquery.ptTimeSelect.css') }}" />
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css" type="text/css" media="all" />

    <script src="{{ url('public/assets/DateTime/lib/moment.min.js') }}"></script>
    <script src="{{ url('public/assets/DateTime/lib/site.js') }}"></script>

    <script src="{{ url('public/assets/DateTime/dist/datepair.js') }}"></script>
    <script src="{{ url('public/assets/DateTime/dist/jquery.datepair.js') }}"></script>
    
 <!-- Multiple Image Upload -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" type="text/css">
   
</body>
</html>
