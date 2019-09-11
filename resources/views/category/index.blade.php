@extends('layouts.admin')
@section('content')
<div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        @include('includes.admin.breadcrumbs')
        <div class="text-right">
        	<a class="btn btn-primary mb-3 text-center" href="{{ url('/admin/category/add') }}" role="button">Add</a>
        </div>
        <!-- Area Chart Example-->
<!--         <div class="card mb-3"> -->
<!--           <div class="card-header"> -->
<!--             <i class="fas fa-chart-area"></i> -->
<!--             Area Chart Example</div> -->
<!--           <div class="card-body"> -->
<!--             <canvas id="myAreaChart" width="100%" height="30"></canvas> -->
<!--           </div> -->
<!--           <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
<!--         </div> -->

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
					<th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
					<th>Action</th>
                  </tr>
                </tfoot>
                <tbody>

                 @foreach($categories as $category)
                  <tr>
                    <td>{{ $category->cat_name }}</td>
                    <td><a href="#">Delete</a> <a href="#">Update</a></td>
                   @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
@stop