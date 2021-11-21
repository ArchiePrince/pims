
@section('sidebar')
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('dashboard') }}">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title"> Dashboard </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-calendar menu-icon"></i>
              <span class="menu-title"> Events </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('events') }}"> View All Events </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('events/create') }}"> Add Event </a></li>
              </ul>
            </div>
          </li>

          

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-pax" aria-expanded="false" aria-controls="ui-pax">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title"> Participants </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-pax">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ url('participants') }}"> View All Participants </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('participants/create') }}"> Add Participant </a></li>
              </ul>
            </div>
          </li>



          <li class="nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
              <i class="ti-id-badge menu-icon"></i>
              <span class="menu-title"> Name Tags </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
              <i class="ti-write menu-icon"></i>
              <span class="menu-title"> Attendance </span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#usr" aria-expanded="false" aria-controls="usr">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title"> Users </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="usr">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('users') }}"> View All Users </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url('users/create') }}"> Add User </a></li>
              </ul>
            </div>
          </li>

        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/charts/chartjs.html">
            <i class="ti-write menu-icon"></i>
            <span class="menu-title"> Change Password </span>
          </a>
        </li>


        </ul>
      </nav>
      <!-- partial -->
@endsection