@extends('layouts.auth')

@section('container')

<section class="recovered-srch-bar">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-12 col-sm-12 col- srch-bar">
				<form class="card card-sm r-srch-bar">
                                <div class="card-body row no-gutters align-items-center r-srch-bar">
                                   
                                    <!--end of col-->
                                    
                                        <input class="form-control colnt form-control-lg form-control-borderless less" type="search" placeholder="Search Doctors, clinic name">
                                <div class="col-auto" style="margin-right:7px;">
                                        <i class="fa fa-search h4 text-body"></i>
                                    </div>
								
									
                                        <!--<input class="form-control colnt form-control-lg form-control-borderless zipc" type="text" placeholder="Zip Code">-->
										<input class="form-control colnt form-control-lg form-control-borderless" type="search" placeholder="Bangalore" style="
    border-left: 1px solid #a2a2a2;
">
                                    	<div class="col-auto">
                                        <i class="fa fa-map-marker h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <!--<div class="col-auto">
                                        <button class="btn btn-lg btn-secondary skyblue" type="submit"><i class="fa fa-search h4 text-body"></i></button>
                                    </div>-->
                                    <!--end of col-->
                                </div>
                            </form>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col- r-srch-bar-cont">
				<p>Fed up of endless wait?</p>
				<p>Look for clinic with<span>Prime</span></p>
			</div>
		</div>
	</div>
</section>
<section class="Availability">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-9 col-">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col- dropdown">
                       
                    <!-- Primary dropdown -->
                    <div class="btn-group mr-2 mb-md-0 mb-3">
                        <button class="btn btn-primary dropdown-toggle Availab" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Availability</button>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col- checkbox">
             <div class="form-group Booking">
      <input type="checkbox" id="html" class="Online">
      <label for="html" class="checked">Online Booking</label>
    </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-">
  <div class="dropdown-filter Filters">
        <a href="#" class="dropdown-toggle Sort" data-toggle="dropdown">All Filters</a>
        <div class="dropdown-menu Action">
            <a href="#" class="dropdown-item">Action</a>
            <a href="#" class="dropdown-item">Another action</a>
        </div>
    </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col- ">
                <div class="dropdown  Relev">
                  <span class="Sort-By">Sort By</span>
                  <div class="dropdown-menu Link">
                    <a class="dropdown-item" href="#">Link 1</a>
                    <a class="dropdown-item" href="#">Link 2</a>
                    <a class="dropdown-item" href="#">Link 3</a>
                  </div>
                    <button type="button" class="btn btn-primary dropdown-toggle Diagnostic" data-toggle="dropdown">
              Relevance 
                  </button>
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-">
          
        </div>
      </div>
    </div>
</section>
<!------dentel-care------------>
    <section class="dentel-care">
       <div class="container">
    <div class="row">
    <h3 class="dentel-care-hdng">9 matches found for: <span>Dentist In Bangalore</span><a href="#">Show doctors near me</a></h3>
    <div class="col-lg-9 col-md-12 col- dentel-care-left">

@if(!empty($results))
    @foreach($results as $resp)
<!------dentel-------->
 <div class="row dentel">
   <div class="col-lg-8 col-md-8 col-sm-8 col-  Partial">
    <div class="row">
      <div class="col-md-3">
 		<img class="img-fluid" src="{{ url('public/upload/logo') }}/{{$resp->logo}}" alt="alt text here">
      </div>
      <div class="col-md-9 Denture">
          <h1 class="Multi Speciality"> {{ $resp->name }}</h1>
          <div class="Speciality-cont">
		  <p>{{ $resp->qualification }}</p>
		  <p>{{ $resp->experience }} years experience overall</p>
		  @php
      		$skills = explode(",",$resp->skill);
      		unset($skills[0]);
        	@endphp
        	<p>
        	@php
      		foreach($skills as $skill){
      			echo '<span class="profile-tag">'.ucfirst($skill)."&nbsp&nbsp".'</span>';
      		}
        	@endphp
        	</p>
          </div>
<!--           <h3 class="Multi-Slity ">Care 32 Multi Speciality Dental Clinic and 1 more clinic</h3> -->
             <ul class="image">
             @php
        	$images = json_decode($resp->images);
        	if(!empty($images)){
        		foreach($images as $img){
        	@endphp
        	<li> <img src="{{ url('public/upload') }}/{{$img}}" alt="My Image" class="img-fluid" width="50px" height=50px""></li>
        	@php	
    			}
        	}
        	@endphp
            </ul>
<!--         	<ul class="dentel-service"><li><a href="#">Acrylic Partial Denture</a></li><li><a href="#">Acrylic Partial Denture</a></li> -->
<!--         	<li><a href="#">View all 7 services...</a></li> -->
<!--         </ul> -->
      </div>
<!--             <div class="col-md-12 view-profile"> -->
<!--   <h3 class="sponsored">View Profile</h3> -->
<!--       </div> -->
    </div>
  </div>
  <div class="col-md-4 Appointment-secnd">
<div class=""> 
    <ul class="Appointment-list-secnd">
<!--   <li><a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>99%</a></li> -->
<!--   <li><a href="#"><i class="fa fa-commenting" aria-hidden="true"></i>244 Patient Experience</a></li> -->
  <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $resp->city }}, {{ $resp->state }}</a></li>
  <li><a href="#"><i class="fa fa-medkit" aria-hidden="true"></i>{{ $resp->fees }}</a></li>
  		@php
      		$timing = json_decode($resp->timing);
    	@endphp
  <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$timing->start_date}} - {{$timing->end_date}}<br/>{{$timing->start_time}} - {{$timing->end_time}}</a></li>
  </ul>
 </div>
<div class="u-purple-text"><span class="" data-reactid="308">Prime</span></div><div data-qa-id="wait_time" class="u-purple-text" data-reactid="310"><span data-reactid="311">Max. 30 mins wait + Verified details</span></div>
 <button type="button" class="btn btn-primary kll">Book Appointment<br/>No Booking Fee</button>
  </div>

</div>

  <!------dentel-------->
@endforeach
@endif
<!------ doctor online.-------->
<div class="row Chat">
  <div class="col-md-4 response">
    <!--<img src="./images/Dentist.png" class="img-fluid" alt="Responsive image by Bootstrap">-->
  </div>
  <div class="col-md-4">
  <div class="text-dentist">
   <h1>Too busy to see a Dentist in person?</h1>
   <p class="Chat">Chat privately with an experienced doctor online.<br>Get a response within 5 minutes. </p>
</div>
  </div>
  <div class="col-md-4 Appointment-secnd">
<div class=""> 
    <ul class="Patient">
  <li><a href="#"><i class="fa fa-stethoscope" aria-hidden="true"></i>99%</a></li>
  <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>244 Patient Experience</a></li>
  <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i>Horamavu, Bangalore</a></li>

  </ul>
 </div>

 <button type="button" class="btn btn-primary kll">chat<br><span class="Doctor-online">Doctors are online</span> </button>
  </div>

</div>
<!------ doctor online.-------->

</div>

  <div class="col-lg-3 col-md-12 col- dentel-care-right">
 <h3>Health Articles<h3>
	<ul class="dentel-care-more-list">
	<li><a href="#">Root Canal</a></li>
	<li><a href="#">Tooth Extraction</a></li>
	<li><a href="#">Root Canal</a></li>
	<li><a href="#">Tooth Extraction</a></li>
	</ul>
<div class="care-no recover">
  <label for="phone">Extra phone numbers </label>
<input type="tel" placeholder="Enter your mobile number" class="form-control recover-no" id="phone" name="phone" style="
    background: transparent;">
<button type="button" class="app-link">Send App Link</button>
</div>
<div class="healthcare-list">
 <div class="media">
    <img src="{{ url('public/assets/images/practoimg.png') }}" alt="John Doe" class="">
    <div class="media-body ml-2">
      <h4 class="media-hdng">Drofdoc</h4>
	  <p class="media-cont">India's #1 healthcare platform</p>   
    </div>
  </div>
	<ul class="media-care-list"><li><a href=""><span>2 lakh+</span>Doctors</a></li>
	<li><a href=""><span>50 lakh+</span>Users</a></li>
	<li><a href=""><span>50000+</span>Clinics & Hospitals</a></li>
	</ul>
</div>
  </div>
</div>
</div>
</section>

@endsection