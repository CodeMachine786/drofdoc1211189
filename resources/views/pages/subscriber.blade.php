@extends('layouts.admin')
@section('content')

<div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        @include('includes.admin.breadcrumbs')
            <div id="app">
        @include('flash-message')


        @yield('content')
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
                    <th>#</th>
					<th>email</th>
                  </tr>
                </thead>
                
                <tbody>
                @foreach($subscriber as $subs)
                  <tr>
                    <td>{{ $subs->id }}</td>
                    <td>{{ $subs->email }}</td>
                     @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

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

    
@stop
