@extends('layouts.auth')
@section('container')
@include('flash-message')
<!--profile page-->
<div class="container">
   <form action="{{ route('imageUpload') }}" method="POST" enctype="multipart/form-data" id="">
      @csrf
      @if(!empty($info))
      @foreach( $info as $resp )
      @endforeach
      @endif
      <div class="row">
         <div class="col-md-1"></div>
         <!---accounts section start--->
         <div class="col-md-10">
            <!--------main div col-10---->
            <section class="acc">
               <div class="container">
                  <div class="row center">
                     <div class="col-md-6">
                        <h1 class="act"> Accounts</h1>
                     </div>
                     <div class="col-md-6 save">
                        <button type="submit" name="submit" id="personal_info" class="btn btn-primary sec bg-dark-blue">Save Change</button>
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
                              @if(empty($resp->logo))
                              <img src="{{ url('public/assets/images/user-img.png') }}">
                              @else
                              <img src="{{ url('public/upload/logo') }}/{{$resp->logo}}" height="100px" width="100px">
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
                        <label for="name">Title</label>
                        <input type="text" placeholder="" class="form-control" id="name" name="name" value="{{ !empty($resp->name) ? $resp->name:'' }}">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
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
                              <div class="col-md-6 profile-pr mb-3">
                                 <label for="qualification">Qualification</label>
                                 <input type="text" class="form-control" name="qualification" placeholder="Qualification" id="qualification" value="{{ !empty($resp->qualification) ? $resp->qualification:'' }}">
                                 <span class="text-danger">{{ $errors->first('qualification') }}</span>
                              </div>
                              <div class="col-md-6 profile-pr">
                                 <label for="experience">Experience</label>
                                 <input type="text" class="form-control" name="experience" placeholder="Experience" id="experience" value="{{ !empty($resp->experience) ? $resp->experience:'' }}">
                                 <span class="text-danger">{{ $errors->first('experience') }}</span>
                              </div>
                              <div class="col-md-12 profile-pr">
                                 <label for="description">Description</label>
                                 <textarea class="form-control" name="description" placeholder="Describe yourself here..." rows="5" id="description">{{ !empty($resp->description) ? $resp->description:"" }}</textarea>
                                 <span class="text-danger">{{ $errors->first('description') }}</span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="profile-text">
                        <h1> Skills</h1>
                        <div class="container">
                           <div class="form-row">
                              <div class="col-md-12 profile-pr">
                                 <div class="field_wrapper">
                                    <div>
                                       <input type="text" name="field_name[]" value=""/>
                                       <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                                    </div>
                                    <span class="text-danger">{{ $errors->first('field_name') }}</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="profile-text">
                        <h1>Timing</h1>
                        <div class="container">
                           <div class="form-row">
                              <p id="basicExample">
                                 @php
                                 $val = !empty($resp)?json_decode($resp->timing):'';
                                 @endphp
                                 <input type="text" value="{{!empty($resp->timing) ? $val->start_date:''}}" name="start_date" class="date start" />
                                 <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                 <input type="text" value="{{!empty($resp->timing) ? $val->start_time:''}}" name="start_time" class="time start" /> to
                                 <span class="text-danger">{{ $errors->first('start_time') }}</span>
                                 <input type="text" value="{{!empty($resp->timing) ? $val->end_time:''}}" name="end_time" class="time end" />
                                 <span class="text-danger">{{ $errors->first('end_time') }}</span>
                                 <input type="text" value="{{!empty($resp->timing) ? $val->start_date:''}}" name="end_date" class="date end" />
                                 <span class="text-danger">{{ $errors->first('end_date') }}</span>
                              </p>
                           </div>
                           <div class="form-row">
                              <label  for="fees">Fees </label>
                              <input type="text" placeholder="Fees"  class="form-control" id="fees" name="fees" value="{{ !empty($resp->fees) ? $resp->fees:""}}">
                              <span class="text-danger">{{ $errors->first('fees') }}</span>
                           </div>
                        </div>
                     </div>
                     @if(!empty($resp->name))
                     <div class="profile-text">
                        <h1>Images</h1>
                        <div class="container">
                           <div class="form-row">
                              <div class="col-md-12 yr profile-pr">
                                 <label for="phone">Image</label>
                                 <input type="file" id="file-1" name="file[]" multiple class="file" data-overwrite-initial="false">
                              </div>
                           </div>
                        </div>
                     </div>
                     <input type="hidden" name="images" value="{{ $resp->images }}">
                         @if(!empty($resp->images))
                         @php
        	$images = json_decode($resp->images);
        	if(!empty($images)){
        		foreach($images as $img){
        	@endphp
            			<div class="file-preview-thumbnails">
                                <div class="file-preview-frame krajee-default  kv-preview-thumb" id="preview-1568119586758_66-0" data-fileindex="0" data-template="image">
                                   <div class="kv-file-content"><img src="{{ url('public/upload') }}/{{$img}}" height="150px" width="150px"></div>
                                </div>
                         </div>
        	@php	
    			}
        	}
        	@endphp
        	
                         @endif
                     @endif
                  </div>
               </div>
            </section>
            <!----------close-----thrid section----------->
            <!--------main div col-10---->
         </div>
         <!---accounts section start--->
         <div class="col-md-1"></div>
      </div>
   </form>
   <!-- <input type="file" id="file-1" name="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="2"> -->
</div>
<!--End profile-->	
<script type="text/javascript">
   $(document).ready(function(){
       var maxField = 5; //Input fields increment limitation
       var addButton = $('.add_button'); //Add button selector
       var wrapper = $('.field_wrapper'); //Input field wrapper
       var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button">remove</a></div>'; //New input field html 
       var x = 1; //Initial field counter is 1
       var checkVal = "{{ !empty($resp->skill) ? $resp->skill:"" }}";
       
       //Once add button is clicked
       if(checkVal !== ""){
    	   var strArray = checkVal.split(",");
           
           // Display array values on page
           for(var i = 0; i < strArray.length; i++){
               if(strArray[i] !==""){
            	   $(wrapper).append("<span class='skill_rmv'><div><input type='text' name='field_name[]' id="+[i]+" value="+strArray[i]+">&times<span></div>");
                }
        	   
           }
       }
       $('.skill_rmv').click(function(){
   	if($(this).remove()){
   		$("#personal_info").trigger('click'); 
   		}
           });
       $(addButton).click(function(){
           //Check maximum number of input fields
           if(x < maxField){ 
               x++; //Increment field counter
               $(wrapper).append(fieldHTML); //Add field html
           }
       });
   
       //Once remove button is clicked
       $(wrapper).on('click', '.remove_button', function(e){
           e.preventDefault();
           $(this).parent('div').remove(); //Remove field html
           x--; //Decrement field counter
       });
   });
</script>
<script>
   $("#upload_img").click(function(e){
   		e.preventDefault();
   	   $("#files_content").trigger('click');
   	});
</script>
<style>
   .kv-file-content img{
   padding: 0px 0px 0px 0px;
   }
   .skill_rmv{
   cursor: pointer;
   }
</style>
@endsection	