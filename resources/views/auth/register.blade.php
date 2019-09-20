@extends('layouts.auth')

@section('container')
<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-">
      <img class="img-fluid" src="{{ url('/public/assets/images/register-img.png') }}" alt="img">
    </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-">
          <form method="POST" action="{{ route('register') }}">
          	@csrf
    		
    		<div class="text-box">
              <a href="{{ url('/login') }}"><button type="button" class="btn btn-primary first">Login</button></a>
              <a href="{{ url('/register') }}"><button type="button" class="btn btn-primary sec">Register</button></a>
            </div>
            
    <div class="input-text">
	  <div class="row center">
      <div class="col-lg-12 register-input-hdng">
      <div class="registe-border">
          <div class="float-left"><h2 class="dctr-nm">drofdoc</h2></div>
          <div class="float-right"><h4 class="dctr-hdng float-left">Are you a doctor?</h4>
         <a href="#" class="register-here">Register Here</a>
      
          </div>
         </div>  
      </div>
       <div class="col-lg-12 register-input-fild">
           <label for="phone">Full Name</label>
                    <input id="name" placeholder="Full Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
								@error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
      </div>
      
<!-- 	  <div class="col-lg-12 register-input-fild"> -->
<!-- 	  <label for="phone">Mobile Numaber</label> -->
<!-- 	   <div class="row center"> -->
<!--         <div class="col-lg-5 col-md-12 col-sm-12"> -->
<!--            <div class="sel"> -->
<!--                 <select id="selectbox11"> -->
<!--                   <option value="vol">+91(IND)</option> -->
<!--                   <option value="saab">UK</option> -->
<!--                   <option value="opel">USA</option> -->
<!--                   <option value="audi">AUS</option> -->
<!--             	</select> -->
<!--             </div> -->
<!--         </div> -->
<!--         <div class="col-lg-7 saven">         	          -->
<!--             <input type="text" placeholder="Mobile Number" class="form-control" id="phone" name="phone" required autofocus> -->
<!--         </div> -->
<!--        </div> -->
<!-- 	  </div> -->
	  
	   <div class="col-lg-12 register-input-fild">
       	<label for="phone">Email</label>
<!--            <input type="text" placeholder="Email" class="form-control" id="phone" name="phone"> -->
				<input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
								 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
      </div>
      
        <div class="col-lg-12 register-input-fild">
           <label for="phone">Create Password</label>
<!--            <input type="password" placeholder="Password" class="form-control" id="phone" name="phone"> -->
			<input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
								@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
		
		<div class="col-lg-12 register-input-fild">
			<label for="phone">{{ __('Confirm Password') }}</label>
				<input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
		</div>
			 <div class="col-lg-12 register-input-fild"> 
			 <label for="phone">Register As</label>
			  	<div class="sel">
                    <select name="type_id" id="selectbox11">
                      <option value="2">Patient</option>
                      <option value="3">Doctor</option>
                	</select>
            	</div>
             </div>
			  
	   <div class="col-lg-12 register-input-fild">
            <div class="custom-control custom-checkbox">
      			<input type="checkbox" class="custom-control-input" id="customCheck1">
      		<label class="custom-control-label" for="customCheck1">Receive relevent offers and promotional communication from Practo</label>
    		</div>
      </div>
      
	    <!--<div class="col-lg-12 register-input-fild">
	  <input type="submit" name="" value="Register">
	  </div>-->
      <div class="col-lg-12 register-input-fild">
     		<button type="submit" class="login-btn">{{ __('Register') }}</button>
	  </div>
	  
	   <div class="col-lg-12 register-input-fild">
	   	<div class="signing">
	  		<a href="#" class="by-siging">By signing up, I agree to terms</a>
	  	</div>
	  </div>
  	</div>
  </div>
  </form>
</div>
  
</div>
</div>
@endsection