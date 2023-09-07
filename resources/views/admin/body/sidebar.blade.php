<!-- Start of the sidebar -->
<nav class="sidebar">
  <!-- Sidebar header -->
  <div class="sidebar-header">
    <!-- Sidebar brand link -->
    <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
      <div class="h1 d-inline-block text-warning-emphasis  ps-2 pb-0">Oro<div class="span d-inline-block text-info">gon</div>
      </div>
    </a>

    <!-- Sidebar toggle button -->
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <!-- End of sidebar header -->

  <!-- Sidebar body -->
  <div class="sidebar-body">
    <!-- Navigation list -->
    <ul class="nav">
      <!-- Main category heading -->
      <li class="nav-item nav-category">Main</li>
      <!-- Dashboard link -->
      <li class="nav-item">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>

      <!-- Web apps category heading -->
      <li class="nav-item nav-category">web apps</li>

      <!-- Class link -->
      <li class="nav-item">
        <a href="{{ route('get.class') }}" class="nav-link">
          <i class="fa-regular fa-clipboard fs-5"></i>
          <span class="link-title">Class</span>
        </a>
      </li>

      <!-- Student link -->
      <li class="nav-item">
        <a href="{{ route('get.student') }}" class="nav-link">
          <i class="fa-solid fa-user"></i>
          <span class="link-title">Student</span>
        </a>
      </li>

      <!-- Teacher link -->
      <li class="nav-item">
        <a href="{{ route('get.teacher') }}" class="nav-link">
          <i class="fa-solid fa-person-chalkboard"></i>
          <span class="link-title">Teahcer</span>
        </a>
      </li>

      <!-- Exam Schedule link -->
      <li class="nav-item">
        <a href="{{ route('get.exam') }}" class="nav-link">
          <i class="fa-solid fa-calendar-days"></i>
          <span class="link-title">Exam Schedule</span>
        </a>
      </li>

    </ul>
    <!-- End of navigation list -->
  </div>
  <!-- End of sidebar body -->
</nav>
<!-- End of the sidebar -->