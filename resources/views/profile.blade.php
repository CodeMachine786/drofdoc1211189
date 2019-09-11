@extends('layouts.auth')
@section('container')
<!--profile page-->
<div class="container">
   <div class="row">
      <div class="col-md-1"></div>
      <!---accounts section start--->
      <div class="col-md-10">
         <!--------main div col-10---->
         <form method="post" id="" action="{{ route('profileDetail') }}" enctype="multipart/form-data"	>
            @csrf
            @if ($errors->any())
            @endif
            <section class="acc">
               <div class="container">
                  <div class="row center">
                     <div class="col-md-6">
                        <h1 class="act"> Accounts</h1>
                     </div>
                     <div class="col-md-6 save">
                        <button type="submit" name="submit" class="btn btn-primary sec bg-dark-blue">Save Change</button>
                     </div>
                  </div>
               </div>
               <!---------row-------->
            </section>
            <!---------------second section----------->
            <section class="profile-user">
               <div class="container">
                  <div class="row center">
                     <div class="col-md-8">
                        <div class="row center">
                           <div class="col-md-3 profile-user-img">
                              <!--<img src="images/user-png-icon-file-user-icon-black-01-png-311.png" class="avatar img-circle img-thumbnail" alt="avatar">-->
                              @if(empty($profile->file_content))
                              <img src="{{ url('public/assets/images/user-img.png') }}">
                              @else
                              <img src="{{ url('public/assets/profile_images/') }}/{{$profile->file_content}}" height="100px" width="100px">
                              @endif
                           </div>
                           <div class="col-md-9 profile-user-cnt">
                              <p>Pick a photo from your<br/>
                                 computer
                              </p>
                              <a id="upload_img" href="JavaScript:Void(0);">Add Photo</a>
                              <input name="input_img"  type="file" id="files_content" style="display:none" />
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <label for="phone">Name</label>
                        <input type="text" placeholder="" class="form-control" id="phone" value="{{ $user->name  }}" name="user_name" disabled>
                     </div>
                  </div>
               </div>
            </section>
            <!----------close-----second section----------->
            <!----------close-----thrid section----------->
            <section class="profile-fild">
               <div class="container">
                  <div class="row center">
                     <div class="profile-text">
                        <div class="container">
                           <div class="form-row">
                              <div class="col-md-4 profile-pr">
                                 <div class="form-group {{ $errors->has('phone_no') ? 'has-error' : '' }}">
                                    <label for="phone">Phone Number</label>
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    <input type="text" placeholder="+1 777-888-8888" value="{{ $profile ==  '' ? '' : $profile->phone_no  }}" class="form-control" id="phone" name="phone_no">
                                    <span class="text-danger">{{ $errors->first('phone_no') }}</span>
                                 </div>
                              </div>
                              <div class="col-md-4 profile-pr">
                                 <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="code">Email Address</label>
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    <input type="text" class="form-control" value="{{ $profile ==  '' ? $user->email : $profile->email  }}" id="code" name="user_email">
                                    <span class="text-danger">{{ $errors->first('user_email') }}</span>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <label for="code">Gender</label>
                                 <div class="sel">
                                    <select name="user_gender" id="selectbox">
                                       <option value="Male">Male</option>
                                       <option value="Female">Female</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4 yr ptop  profile-pr">
                                 <label for="phone">Date of birth</label>
                                 <input type="text" placeholder="" class="form-control" id="datetimepicker1" name="user_dob">
                                 <span class="text-danger">{{ $errors->first('user_dob') }}</span>
                              </div>
                              <!--         <div class="col-md-4 yr pright ptop  profile-pr"> -->
                              <!--                    <label for="phone">blood Group</label> -->
                              <!--                <div class="sel"> -->
                              <!--             <select name="user_blod_grp" id="selectbox"> -->
                              <!--                 <option value="O+">O+</option> -->
                              <!--                 <option value="A+">A+</option> -->
                              <!--                 <option value="B+">B+</option> -->
                              <!--                 <option value="O-">O-</option> -->
                              <!--                 <option value="A-">A-</option> -->
                              <!--                 <option value="B-">B-</option> -->
                              <!--                 <option value="AB+">AB+</option> -->
                              <!--                 <option value="AB-">AB-</option> -->
                              <!--             </select> -->
                              <!--                     </div> -->
                              <!--       </div> -->
                              <div class="col-md-4 yr ptop">
                                 <label for="phone">Time Zone</label>
                                 <div class="sel">
                                    <select name="time_zone" id="selectbox">
                                       @php
                                       $tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
                                       @endphp
                                       @foreach( $tzlist as $tz )
                                       <option value="{{$tz}}">{{$tz}}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="profile-text">
                        <h1> Address</h1>
                        <div class="container">
                           <div class="form-row">
                              <div class="col-md-4 profile-pr">
                                 <div class="form-group {{ $errors->has('house_no') ? 'has-error' : '' }}">
                                    <label for="phone pr-3">House No/Area</label>
                                    <input type="text" placeholder="" class="form-control" id="phone" value="{{ $profile ==  '' ? '' : $profile->house_no  }}" name="user_hno">
                                    <span class="text-danger">{{ $errors->first('user_hno') }}</span>
                                 </div>
                              </div>
                              <div class="col-md-4  profile-pr">
                                 <label for="code">Colony/Street/Locality</label>
                                 <input type="text" class="form-control" id="code" name="user_street" value="{{ $profile ==  '' ? '' : $profile->street  }}">
                                 <span class="text-danger">{{ $errors->first('user_street') }}</span>
                              </div>
                              <div class="col-md-4">
                                 <label for="code">city</label>
                                 <input type="text" class="form-control" id="code" value="{{ $profile ==  '' ? '' : $profile->city  }}" name="user_city">
                                 <span class="text-danger">{{ $errors->first('user_city') }}</span>
                              </div>
                              <div class="col-md-4 yr ptop profile-pr">
                                 <label for="phone">state</label>
                                 <input type="text" placeholder="" class="form-control" id="phone" name="user_state" value="{{ $profile ==  '' ? '' : $profile->state  }}">
                                 <span class="text-danger">{{ $errors->first('user_state') }}</span>
                              </div>
                              <div class="col-md-4 yr ptop  profile-pr">
                                 <label for="phone">Country<span>*</span></label>
                                 <div class="sel">
                                    <select name="language" id="selectbox">
                                       <option value="india">india</option>
                                       <option value="England">England</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('language') }}</span>
                                 </div>
                              </div>
                              <div class="col-md-4 yr ptop">
                                 <label for="phone">Pincode</label>
                                 <input type="text" placeholder="" class="form-control" id="phone" name="user_pincode" value="{{ $profile ==  '' ? '' : $profile->pincode  }}">
                                 <span class="text-danger">{{ $errors->first('user_pincode') }}</span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="profile-text">
                        <h1>Other Information</h1>
                        <div class="container">
                           <div class="form-row">
                              <div class="col-md-4 yr profile-pr">
                                 <label for="phone">Extra phone numbers </label>
                                 <input type="text" placeholder="" class="form-control" id="phone" name="user_ext_no" value="{{ $profile ==  '' ? '' : $profile->mobile_no  }}">
                              </div>
                              @if( $user->type_id == $user::TYPE_ID_PATIENT )
                              @else
                              <div class="col-md-4 yr profile-pr">
                                 <label for="phone">Specialist</label>
                                 <div class="sel">
                                    <select name="specialist" id="selectbox">
                                       @if( !empty($profile) && !empty($categories) )
                                       <option value="{{ $profile->specialist !==  '' ? $profile->specialist : ""  }}">{{ $profile->specialist !==  '' ? $profile->specialist : ""  }}</option>
                                       @foreach( $categories as $category )
                                       <option value="{{ $category->cat_name }}">{{ $category->cat_name }}</option>
                                       @endforeach
                                       @endif
                                    </select>
                                 </div>
                              </div>
                              @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </form>
         <!----------close-----thrid section----------->
         <!--------main div col-10---->
      </div>
      <!---accounts section start--->
      <div class="col-md-1"></div>
   </div>
</div>
<script>
   $("#upload_img").click(function(e){
   		e.preventDefault();
   	   $("#files_content").trigger('click');
   	});
</script>
@endsection