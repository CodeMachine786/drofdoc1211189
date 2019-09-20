@extends('layouts.admin')
@section('content')
<div id="content-wrapper">
      <div class="container-fluid">
         <div id="app">
        @include('flash-message')
		@yield('content')
    </div>
        @include('includes.admin.breadcrumbs')
        <span id="alert-msg"></span>
      	<div class="row"><!--  mx-5 my-5 -->
      	<div class="col-md-3"></div>
           <div class="col-md-6">
               		<form action="{{ url('/admin/ajaxSubmit') }}" method="POST">
               			 {{ csrf_field() }}
               			  @if ($errors->any())
           				  @endif
                     <div class="form-group">
                         <label for="selectbox">Template</label>
                            <select class="form-control" name="template" id="template">
                            @foreach( $model->getPageTemplate() as $key=>$page )
                            	<option value="{{ $key }}">{{ $page }}</option>
                            @endforeach
                               
                            </select>
                      </div>
                      
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="temlate_name" id="temlate_name">
                      </div>
                      
                      <div class="form-group">
                        <label for="page_name">Page Title</label>
                        <input type="text" class="form-control" placeholder="Page Name" name="page_name" id="page_name" value="{{ !empty($model->getByTypeId(1))?$model->getByTypeId(1)->page_title:'' }}">
                        @error('page_name')
                        	<span class="text-danger">{{ $errors->first('page_name') }}</span>
                        @enderror
                      </div>
                      
                      <div class="form-group">
                        <label for="page_slug">Page Slug(URL)</label>
                        <input type="text" class="form-control" placeholder="Page Slug" name="page_slug" id="page_slug" value="{{ !empty($model->getByTypeId(1))?$model->getByTypeId(1)->page_url:'' }}">
                        @error('page_name')
                        	<span class="text-danger">{{ $errors->first('page_slug') }}</span>
                        @enderror
                      </div>
                      
                      <div class="form-group">
                      	<label for="description">Description</label>
                      	<textarea cols="80" rows="10" id="description" name="description">{{ !empty($model->getByTypeId(1))?$model->getByTypeId(1)->description:'' }}</textarea>
                      	 @error('description')
                        	<span class="text-danger">{{ $errors->first('description') }}</span>
                        @enderror
                      </div>                      
                      <button type="submit" name="submit" id="addPage" class="btn btn-primary">Submit</button>
                    </form>
               </div>
            </div>
      </div>
</div>
     <script type="text/javascript">
            CKEDITOR.replace( 'description' );
     </script>
    
     <script type="text/javascript">
     		var template = $( "#template option:selected" ).text();
     		$("#temlate_name").val(template);
     		var id = $("#template").val();
	
     		$("#template").change(function(){
     			fetchPageData();
         		
        	});
			function fetchPageData(){
         		var id = $("#template").val();
         		$.ajax({
					url:"{{ url('/admin/fetchPage')}}/"+id,
					dataType:"json",
					success:function(res){
							$("#page_name").val(res.page_title);
							$("#page_slug").val(res.page_url);
							CKEDITOR.instances.description.setData(res.description);
						}
         		});
			}
     		
     	$("#addPage").click(function(event){
     		event.preventDefault();
     		var _token = $("input[name=_token]").val();
         	var template = $( "#template option:selected" ).text();
         	var page_name = $("#page_name").val();
         	var page_slug = $("#page_slug").val();
         	var description = CKEDITOR.instances.description.getData();
         	var page_type =  $( "#template" ).val();
         	console.log(template);
             	$.ajax({
    					url:"{{ url('/admin/ajaxSubmit') }}",
    					data: {_token:_token, template:template, page_name:page_name, page_slug:page_slug,page_type:page_type, description:description,},
    					method:"POST",
    					dataType:"json",
    					success:function(res){
        					console.log(res.error);
        						if(res.error == false){
									html = "<div class='alert alert-success' role='alert'>"+res.msg+"</div>";
									$("#alert-msg").html(html).fadeOut( 2500 );
									setTimeout(function(){ location.reload(true); }, 2500);
                				}else{
									html = "<div class='alert alert-danger' role='alert'>"+res.msg+"</div>";
									$("#alert-msg").html(html).fadeOut( 2500 );
									setTimeout(function(){ location.reload(true); }, 2500);
                    			}
        					}
                 	});
         });

	 </script>
@stop