@php

$id = Auth::user()->id;

$profileData = App\Models\User::find($id);

@endphp
<!-- Start of the navigation bar -->
<nav class="navbar">
  <!-- Sidebar toggle button -->
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>

  <!--Navbar content -->
  <div class="navbar-content">
    <!-- Navbar items -->
    <ul class="navbar-nav">
      <!-- User name display -->
      <li>
        <div class="text-center mt-3 me-4 ">
          <p class="tx-16 fw-bolder fs-4">{{ auth()->user()->name }}</p>
        </div>
      </li>
      <!-- Profile dropdown menu -->
      <li class="nav-item dropdown">
        <!--Profile image and dropdown toggle button -->
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="wd-50 ht-50 rounded-circle" src="{{ !empty($profileData->photo) ? url('upload/img/admin/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="profile">
        </a>
        <!-- Dropdown menu content -->
        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
          <!-- Profile image and user information display -->
          <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
            <div class="mb-3">
              <img class="wd-80 ht-80 rounded-circle" src="{{ !empty($profileData->photo) ? url('upload/img/admin/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="">
            </div>
            <div class="text-center">
              <p class="tx-16 fw-bolder">{{ auth()->user()->name }}</p>
              <p class="tx-12 text-muted">{{ auth()->user()->email }}</p>
            </div>
          </div>
          <!--Dropdown menu items  -->
          <ul class="list-unstyled p-1">
            <!-- Edit profile link -->
            <li class="dropdown-item py-2">
              <a href="{{ route('get.admin.profile') }}" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="edit"></i>
                <span>Edit Profile</span>
              </a>
            </li>
            <!-- Logout link -->
            <a href="{{ route('admin.logout') }}" class="text-body ms-0">
              <li class="dropdown-item ">
                <i class="me-2 icon-lg" data-feather="log-out"></i>
                <span>Log Out</span>
              </li>
            </a>
            <!-- End Logout link -->
          </ul>
          <!-- End of the dropdown menu items -->
        </div>
        <!-- End of the dropdown menu content -->
      </li>
      <!-- End of the profile dropdown menu -->
    </ul>
    <!-- End of the navbar items -->
  </div>
  <!-- End Navbar items -->
</nav>
<!-- End of the navigation bar -->