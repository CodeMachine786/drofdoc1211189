@extends('layouts.admin')
@section('content')
<div id="content-wrapper">
      <div class="container-fluid">
      @include('includes.admin.breadcrumbs')
      	<div class="row">
           <div class="col mx-5 my-5">
               		<form action="{{ url('admin/category/create') }}" method="POST">
               			@csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <input type="text" class="form-control" name="category_name" id="category_name" aria-describedby="categorylHelp" placeholder="Enter Category Name" required>
                        <small id="emailHelp" class="form-text text-muted"></small>
                      </div>
                       <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" name="cat_desc" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
               </div>
            </div>
      </div>
</div>

@stop