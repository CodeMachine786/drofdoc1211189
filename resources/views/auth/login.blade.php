@extends('layouts.auth')

@section('container')

<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-">
      <img class="img-fluid" src="{{ url('/public/assets/images/register-img.png') }}" alt="img">
    </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-">
    <div class="text-box">
      <a href="{{ url('/login') }}"><button type="button" class="btn btn-primary {{ (\Request::route()->getName() == 'login') ? 'sec' : 'first' }}">Login</button></a>
      <a href="{{ url('register') }}"><button type="button" class="btn btn-primary {{ (\Request::route()->getName() == 'register') ? 'sec' : 'first' }}">Register</button></a>
    </div>
    
        <form method="POST" action="{{ route('login') }}">
        	@csrf
        	
        	<div class="input-text">
        	  <div class="row center">
        	   <div class="col-lg-12 register-input-fild">
                   <label for="phone">{{ __('E-Mail Address') }}</label>
                           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        <!--                     <input type="text" placeholder="Mobile Numaber/Email ID" class="form-control" id="phone" name="phone"> -->
        								@error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
              </div>
    	     
    	      <div class="col-lg-12 register-input-fild">
               <label for="phone">{{ __('Password') }}</label>
                       <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    <!--                     <input type="password" placeholder="Password" class="form-control" id="phone" name="phone"> -->
        								@error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
             </div>
                  
             <div class="col-lg-12 register-input-fild">
                  <div class="custom-control custom-checkbox">
            			<input type="checkbox" class="custom-control-input" id="customCheck1" {{ old('remember') ? 'checked' : '' }}>
            <!--         <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> -->
           				 <label class="custom-control-label" for="customCheck1">Remember me for 30 Days</label>
            							@if (Route::has('password.request'))
                                            <a class="btn btn-link" href=""><!-- {{ route('password.request') }} -->
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
            <!--   <a href="#">Forget password?</a> -->
            	</div>
            </div>
        	 
    	    <div class="col-lg-12 register-input-fild">
         		<button type="submit" class="login-btn">{{ __('Login') }}</button>
    	  	</div>
    	  	
           <div class="or-faceb">
                <span>OR</span>
           </div>
        	   
           <div class="col-lg-12 register-input-fild">
               <button type="button" class="login-btn bg-dark-blue"><i class="fa fa-facebook-f pr-1"></i> Connect With Facebook</button>
           </div>
               
          </div>
          </div>
        </form>
  </div>
  
</div>
</div>
@endsection