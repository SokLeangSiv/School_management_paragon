<!-- This code creates a sidebar. -->
<div class="sidebar bg-black " style="z-index: 5">

    <!-- Header -->
    <a href="{{ route('get.dashboard') }}">
      <div class="h1 d-inline-block text-warning-emphasis pt-4 ps-4 pb-0">Oro<div
        class="span d-inline-block text-info">gon</div>
    </div>
    </a>
  
    <!-- Close button -->
    <div class="close_btn d-inline-block ">
      <i class="fa-solid fa-circle-xmark"></i>
    </div>
  
    <!-- Menu -->
    <div class="menu z-3">
  
      <div class="item"><a href="{{ route('get.dashboard') }}"><i class="fa-solid fa-calendar-days"></i>Dashboard</a></div>
  
      <div class="item"><a href="{{ route('schedule') }}"><span class="mdi mdi-note-text-outline aa"
                  style="font-size: 20px;"></span>Exam Schdule</a></div>
  
      <div class="item"><a href="{{ route('gpa') }}"><i class="fa-solid fa-calculator"></i>Gpa Calculator</a></div>
  
      <div class="switch ms-3 mt-4">
        <input type="checkbox" class="switch__input" id="lightSwitch">
        <label class="switch__label" for="lightSwitch">
          <span class="switch__indicator"></span>
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
            class="bi bi-brightness-high w-100 h-100 " viewBox="0 0 20 20"
            style="margin-top: -25px;">
          </svg>
          <span class="switch__decoration"></span>
        </label>
      </div>   
  
    </div>
  
  </div>
  