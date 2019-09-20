<ul class="sidebar navbar-nav">
      <li class="nav-item {{ Request::route()->getName() =='Dashboard'? 'active':'' }}">
        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
<!--       <li class="nav-item dropdown"> -->
<!--         <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
<!--           <i class="fas fa-fw fa-folder"></i> -->
<!--           <span>Pages</span> -->
<!--         </a> -->
<!--         <div class="dropdown-menu" aria-labelledby="pagesDropdown"> -->
<!--           <h6 class="dropdown-header">Login Screens:</h6> -->
<!--           <a class="dropdown-item" href="login.html">Login</a> -->
<!--           <a class="dropdown-item" href="register.html">Register</a> -->
<!--           <a class="dropdown-item" href="forgot-password.html">Forgot Password</a> -->
<!--           <div class="dropdown-divider"></div> -->
<!--           <h6 class="dropdown-header">Other Pages:</h6> -->
<!--           <a class="dropdown-item" href="404.html">404 Page</a> -->
<!--           <a class="dropdown-item" href="blank.html">Blank Page</a> -->
<!--         </div> -->
<!--       </li> -->
<!--       <li class="nav-item"> -->
<!--         <a class="nav-link" href="charts.html"> -->
<!--           <i class="fas fa-fw fa-chart-area"></i> -->
<!--           <span>Charts</span></a> -->
<!--       </li> -->
<!--       <li class="nav-item"> -->
<!--         <a class="nav-link" href="tables.html"> -->
<!--           <i class="fas fa-fw fa-table"></i> -->
<!--           <span>Tables</span></a> -->
<!--       </li> -->
	  
	  <li class="nav-item dropdown {{ Request::route()->getName() =='Category'? 'active':'' }}">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Categories</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <!--  <h6 class="dropdown-header">Login Screens:</h6> -->
          <a class="dropdown-item" href="{{ url('/admin/category') }}">View</a>
          <a class="dropdown-item" href="{{ url('/admin/category/add') }}">Add</a>
          <a class="dropdown-item" href="forgot-password.html">Delete</a>
          <a class="dropdown-item" href="forgot-password.html">Update</a>
        </div>
      </li>
      <li class="nav-item {{ Request::route()->getName() =='Page'? 'active':'' }}">
      	<a class="nav-link" href="{{ url('/admin/page') }}">
      		<i class="fas fa-fw fa-folder"></i> 
      		<span>Pages</span></a>
      </li>
      <li class="nav-item {{ Request::route()->getName() =='Subscriber'? 'active':'' }}">
      	<a class="nav-link" href="{{ url('/admin/subscriber') }}">
      		<i class="fas fa-fw fa-folder"></i> 
      		<span>Subscriber</span></a>
      </li>
    </ul>