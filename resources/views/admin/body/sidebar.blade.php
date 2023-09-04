<nav class="sidebar">
    <div class="sidebar-header">
      <a href="#" class="sidebar-brand">
        <div class="h1 d-inline-block text-warning-emphasis  ps-2 pb-0">Oro<div
            class="span d-inline-block text-info">gon</div>
    </div>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item nav-category">web apps</li>
       
        <li class="nav-item">
          <a href="{{ route('get.class') }}" class="nav-link">
            <i class="fa-regular fa-clipboard fs-5"></i>
            <span class="link-title">Class</span>
          </a>
        </li>

        {{-- student --}}
        <li class="nav-item">
          <a href="{{ route('get.student') }}" class="nav-link">
            <i class="fa-solid fa-user"></i>
            <span class="link-title">Student</span>
          </a>
        </li>

        {{-- student --}}
        

        {{-- Teacher --}}

        <li class="nav-item">
          <a href="{{ route('get.teacher') }}" class="nav-link">
            <i class="fa-solid fa-person-chalkboard"></i>
            <span class="link-title">Teahcer</span>
          </a>
        </li>
        {{-- Teacher --}}

        
        {{-- Exam --}}

        <li class="nav-item">
          <a href="{{ route('get.exam') }}" class="nav-link">
            <i class="fa-solid fa-calendar-days"></i>
            <span class="link-title">Exam Schedule</span>
          </a>
        </li>
        {{-- Exam --}}


        
      </ul>
    </div>
  </nav>