<ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">{{ (Request::route()->getName() == 'Admin') ? 'Dashboard':Request::route()->getName() }}
            </a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>