@extends('layouts.auth')

@section('container')

@php
	  function selectedState($id){
        $result = DB::select(DB::raw("Select name from states where id='$id'"));
        return $result;
    }
    
      function selectedCity($id){
        $result = DB::select(DB::raw("Select name from cities where id='$id'"));
        return $result;
    }
    $patient =DB::table('users')->where('type_id', '=', '2')->count();
@endphp
<section class="recovered-srch-bar">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-12 col-sm-12 col- srch-bar">
        <form class="card card-sm r-srch-bar">
                                <div class="card-body row no-gutters align-items-center r-srch-bar clinic-card">
                                   
                                    <!--end of col-->
                                    
                                        <input class="form-control colnt form-control-lg form-control-borderless less-search" id="clinic_name"type="search" placeholder="Search Doctors, clinic name">
                                <div class="col-auto" style="margin-right:7px;">
                                        <i class="fa fa-search "></i>
                                    </div>
                
                  
                                        <!--<input class="form-control colnt form-control-lg form-control-borderless zipc" type="text" placeholder="Zip Code">-->
                    <input class="form-control colnt form-control-lg form-control-borderless less-search" type="search" id="zip_code" name="zip_code" placeholder="Zipcode" style="
    border-left: 1px solid #a2a2a2;
">
                                      <div class="col-auto">
                                        <i class="fa fa-map-marker"></i>
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
<!-- <section class="Availability"> -->
<!--     <div class="container"> -->
<!--       <div class="row"> -->
    
<!--         <div class="col-lg-9 col-md-9 col-sm-9 col-"> -->
<!--           <div class="row"> -->
<!--             <div class="col-lg-3 col-md-3 col-sm-3 col- dropdown"> -->
                       <!---
<!--                     Primary dropdown -->
<!--                     <div class="btn-group mr-2 mb-md-0 mb-3"> -->
<!--                         <button class="btn btn-primary dropdown-toggle Availab" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Availability</button> -->

<!--                         <div class="dropdown-menu"> -->
<!--                             <a class="dropdown-item" href="#">Action</a> -->
<!--                             <a class="dropdown-item" href="#">Another action</a> -->
<!--                             <a class="dropdown-item" href="#">Something else here</a> -->
<!--                         </div> -->
<!--                     </div> -->
<!--             </div> -->
<!--             <div class="col-lg-3 col-md-3 col-sm-3 col- checkbox"> -->
<!--              <div class="form-group Booking"> -->
<!--       <input type="checkbox" id="html" class="Online"> -->
<!--       <label for="html" class="checked">Online Booking</label> -->
<!--     </div> -->
<!--             </div> -->
<!--             <div class="col-lg-2 col-md-2 col-sm-2 col-"> -->
<!--   <div class="dropdown-filter Filters"> -->
<!--         <a href="#" class="dropdown-toggle Sort" data-toggle="dropdown">All Filters</a> -->
<!--         <div class="dropdown-menu Action"> -->
<!--             <a href="#" class="dropdown-item">Action</a> -->
<!--             <a href="#" class="dropdown-item">Another action</a> -->
<!--         </div> -->
<!--     </div> -->
<!--             </div> -->
<!--             <div class="col-lg-4 col-md-4 col-sm-4 col- "> -->
<!--                 <div class="dropdown  Relev"> -->
<!--                   <span class="Sort-By">   Sort By</span> -->
<!--                   <div class="dropdown-menu Link"> -->
<!--                     <a class="dropdown-item" href="#">Link 1</a> -->
<!--                     <a class="dropdown-item" href="#">Link 2</a> -->
<!--                     <a class="dropdown-item" href="#">Link 3</a> -->
<!--                   </div> -->
<!--                     <button type="button" class="btn btn-primary dropdown-toggle Diagnostic" data-toggle="dropdown"> -->
<!--               Relevance  -->
<!--                   </button> -->
<!--                 </div> -->
<!--             </div> -->
<!--           </div> -->
<!--         </div> -->
<!--         <div class="col-lg-3 col-md-3 col-sm-3 col-"> -->
          
<!--         </div> -->
       
<!--       </div> -->
<!--     </div> -->
<!-- </section> -->
<!------dentel-care------------>

    <section class="dentel-care">
       <div class="container">
    <div class="row">
    <h3 class="pl-2 dentel-care-hdng">
    @if( !empty(Route::currentRouteName() == 'Listing') )
    	{{ !empty($listing)?count($listing):0 }}
    @else
	    {{ !empty($details)?count($details):0 }}
    @endif
     matches found 
     
    <span style="display: none">Dentist In Bangalore</span><a href="#">Show doctors near me</a></h3>

    <div class="col-lg-9 col-md-12 col- dentel-care-left">

<!------ doctor online.-------->

@if(!empty($details))
    @foreach($details as $resp)
<!------dentel-------->
<div class="searched_doctor" id=""></div>
 <div class="row dentel" id="_dentel">
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

      </div>

    </div>
  </div>
  <div class="col-md-4 Appointment-secnd">
<div class=""> 
    <ul class="Appointment-list-secnd">
  <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>{{ selectedCity($resp->state)[0]->name }}, {{ selectedState($resp->state)[0]->name }}</a></li>
  <li><a href="#"><i class="fa fa-medkit" aria-hidden="true"></i>{{ $resp->fees }}</a></li>
      @php
          $timing = json_decode($resp->timing);
      @endphp
  <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$timing->start_date}} - {{$timing->end_date}}<br/>{{$timing->start_time}} - {{$timing->end_time}}</a></li>
  </ul>
 </div>
<div class="u-purple-text"><span class="" data-reactid="308">Prime</span></div><div data-qa-id="wait_time" class="u-purple-text" data-reactid="310"><span data-reactid="311">Max. 30 mins wait + Verified details</span></div>
 <button type="button" class="btn btn-primary kll get_appont" data-value="{{ $resp->user_id }}[]" data-toggle="modal" data-target="#exampleModal">Book Appointment<br/>No Booking Fee</button>
  </div>

</div>

  <!------dentel-------->
@endforeach
@elseif(isset($message)) 
  <p><h4> {{ $message }}</h4> </p>
   @endif
<div class="dentel1"></div>
   @if(!empty($listing))
    @foreach($listing as $resp)
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

      </div>

    </div>
  </div>
  <div class="col-md-4 Appointment-secnd">
<div class=""> 
    <ul class="Appointment-list-secnd">
  <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>{{ selectedCity($resp->state)[0]->name }}, {{ selectedState($resp->state)[0]->name }}</a></li>
  <li><a href="#"><i class="fa fa-medkit" aria-hidden="true"></i>{{ $resp->fees }}</a></li>
      @php
          $timing = json_decode($resp->timing);
      @endphp
  <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$timing->start_date}} - {{$timing->end_date}}<br/>{{$timing->start_time}} - {{$timing->end_time}}</a></li>
  </ul>
 </div>
<div class="u-purple-text"><span class="" data-reactid="308">Prime</span></div><div data-qa-id="wait_time" class="u-purple-text" data-reactid="310"><span data-reactid="311">Max. 30 mins wait + Verified details</span></div>
 <button type="button" class="btn btn-primary kll get_appont" data-value="{{ $resp->user_id }}" data-toggle="modal" data-target="#exampleModal">Book Appointment<br/>No Booking Fee</button>
  </div>

</div>

  <!------dentel-------->
@endforeach
   @endif

<!------ doctor online.-------->

<!-- <div class="row Chat"> -->
<!--   <div class="col-md-4 response"> -->
<!--   </div> -->
<!--   <div class="col-md-4"> -->
<!--   <div class="text-dentist"> -->
<!--    <h1>Too busy to see a Dentist in person?</h1> -->
<!--    <p class="Chat">Chat privately with an experienced doctor online.<br>Get a response within 5 minutes. </p> -->
<!-- </div> -->
<!--   </div> -->
<!--   <div class="col-md-4 Appointment-secnd"> -->
<!-- <div class="">  -->
<!--     <ul class="Patient"> -->
<!--   <li><a href="#"><i class="fa fa-stethoscope" aria-hidden="true"></i>99%</a></li> -->
<!--   <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>244 Patient Experience</a></li> -->
<!--   <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i>Horamavu, Bangalore</a></li> -->

<!--   </ul> -->
<!--  </div> -->

<!--  <button type="button" class="btn btn-primary kll">chat<br><span class="Doctor-online">Doctors are online</span> </button> -->
<!--   </div> -->

<!-- </div> -->
<!------ doctor online.-------->

</div>

  <div class="col-lg-3 col-md-12 col- dentel-care-right">
<!--  <h3>Health Articles<h3> -->
<!--   <ul class="dentel-care-more-list"> -->
<!--   <li><a href="#">Root Canal</a></li> -->
<!--   <li><a href="#">Tooth Extraction</a></li> -->
<!--   <li><a href="#">Root Canal</a></li> -->
<!--   <li><a href="#">Tooth Extraction</a></li> -->
<!--   </ul> -->
<!-- <div class="care-no recover"> -->
<!--   <label for="phone">Extra phone numbers </label> -->
<!-- <input type="tel" placeholder="Enter your mobile number" class="form-control recover-no" id="phone" name="phone" style="
    background: transparent;"> -->
<!-- <button type="button" class="app-link">Send App Link</button> -->
<!-- </div> -->
<div class="healthcare-list mt-0">
 <div class="media">
    <img src="{{ url('public/assets/images/practoimg.png') }}" alt="John Doe" class="">
    <div class="media-body ml-2">
      <h4 class="media-hdng">Drofdoc</h4>
    <p class="media-cont">India's #1 healthcare platform</p>   
    </div>
  </div>
  <ul class="media-care-list"><li><a href=""><span> @if( !empty(Route::currentRouteName() == 'Listing') )
    	{{ !empty($listing)?count($listing):0 }}
    @else
	    {{ !empty($details)?count($details):0 }}
    @endif +</span>Doctors</a></li>
  <li><a href=""><span>{{ $patient }}+</span>Users</a></li>
  <li><a href=""><span>@if( !empty(Route::currentRouteName() == 'Listing') )
    	{{ !empty($listing)?count($listing):0 }}
    @else
	    {{ !empty($details)?count($details):0 }}
    @endif+</span>Clinics & Hospitals</a></li>
  </ul>
</div>
  </div>
</div>
</div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form action="" id="appointment_form">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Book Appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <p class="text-center text-danger msg"></p>
      <div class="modal-body">
        <div class="">
            <label for="phone pr-3">Email</label>
            <input type="email"  required="" autocomplete="email" autofocus="" placeholder="" class="form-control" id="name" value="" name="name">
         </div>
         <div class="">
            <label for="phone pr-3">Date</label>
            <input type="text" placeholder="" class="form-control" id="datetimepicker1" value="" name="date">
         </div>
          <div class="">
            <label for="phone pr-3">Time</label>
            <input type="text" placeholder="" class="form-control time start" id="time" value="" name="time">
         </div>
         <div class="">
            <label for="phone pr-3"></label>
            <input type="hidden" placeholder="" class="form-control time start" id="user_id" value="" name="user_id">
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="appointment">Submit</button>
      </div>
    </div>
    </form>
  </div>
</div>

<script>
$(document).ready(function(){
    $('#time').timepicker({});

    $('.get_appont').click(function(){
		var userID = $(this).attr("data-value");
		var user_id = $('#user_id').val(userID);
    });
    $('#appointment').click(function(){
		if( user_id !== "" ){
			var name = $('#name').val();
			var datetimepicker1 = $('#datetimepicker1').val();
			var time = $('#time').val();
			var url = "{{ url('/appointment/') }}/"+user_id;
			var data = $('#appointment_form').serialize();
					$.ajax({
				         url : url,
				         type: 'GET',
				         data:data,
				        // dataType:'json',
				            success: function(res){
					            $('.msg').text(res);
				            }
				      });		
		}				
    });
});
</script>

<script type="text/javascript">
jQuery(".less-search").keyup(function(){
	var value = jQuery(this).val();
	if( value.length >= 2 ){
		$.ajax({
			url:"{{ url('/ajaxSearch') }}/"+value,
			data:{value:value},
			success:function(res){
					  if(res==1){
						  $(".dentel").show();
						  $(".dentel1").hide();
						  }else{
							  console.log('khdiwd');
							  	const parser = new DOMParser();
								const parseDocument = parser.parseFromString(res,"text/html");
								const doctor = parseDocument.getElementsByClassName("dentel");
								$(".dentel").hide();
								$(".dentel1").show();
								$(".dentel1").html(doctor);
							  }
								
			}		
		});	
	}else if(value.length == 0){
		$(".dentel").show();
		  $(".dentel1").hide();
		}
	console.log(value.length);
});
</script>

<script type="text/javascript">
jQuery("#clinic_name").keyup(function(){
	var value = jQuery(this).val();
	console.log(value);
	if( value.length >= 2 ){
		$.ajax({
			url:"{{ url('/ajaxSearch') }}/"+value,
			data:{value:value},
			success:function(res){
					  if(res==1){
						  $(".dentel").show();
						  $(".dentel1").hide();
						  }else{
							  console.log('khdiwd');
							  	const parser = new DOMParser();
								const parseDocument = parser.parseFromString(res,"text/html");
								const doctor = parseDocument.getElementsByClassName("dentel");
								$(".dentel").hide();
								$(".dentel1").show();
								$(".dentel1").html(doctor);
							  }
								
			}		
		});	
	}else if(value.length == 0){
		$(".dentel").show();
		  $(".dentel1").hide();
		}
	console.log(value.length);
});
</script>

<script type="text/javascript">
jQuery("#zip_code").keyup(function(){
	var zip = jQuery(this).val();
	if( zip.length >= 2 ){
		$.ajax({
			url:"{{ url('/ajaxSearch') }}/"+zip,
			data:{zip:zip},
			success:function(res){
					  if(res==1){
						  $(".dentel").show();
						  $(".dentel1").hide();
						  }else{
							  console.log('khdiwd');
							  	const parser = new DOMParser();
								const parseDocument = parser.parseFromString(res,"text/html");
								const doctor = parseDocument.getElementsByClassName("dentel");
								$(".dentel").hide();
								$(".dentel1").show();
								$(".dentel1").html(doctor);
							  }
								
			}		
		});	
	}else if(zip.length == 0){
		$(".dentel").show();
		  $(".dentel1").hide();
		}
});
</script>
@endsection