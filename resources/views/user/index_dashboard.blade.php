@extends('user.dashboard')

@section('user')
    @php
        $class = App\Models\stu_class::where('status', 'Active')->get();
        
    @endphp
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 col-lg-11 col-xl-10 offset-lg-1    announment mt-5 bg-light shadow ">
                <h5 class="text-info d-block pt-2 fw-bolder">Announment</h5>

                <div class="h6 text-secondary d-flex justify-content-center align-items-center mt-4">No Announcement
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid">

        <div class="row d-flex justify-content-center mt-lg-4 mt-sm-4 gap-3">

            <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex bg-light shadow gap-sm-4 gap-lg-0 gap-4  radius flex-column mb-5">

                <h6 class="p-1 pt-3 fw-bolder">Course</h6>

                <!--  first class -->
                @foreach ($class as $classes)
                    <div class="row ms-4 ms-sm-4 ms-lg-0">

                        <div class="col-11  ms-lg-4 mt-lg-3 fw-bolder class{{ $classes->color }}  pt-lg-3 mt-md-4 mb-3">
                            {{ $classes->class_code }} Section 1 - {{ $classes->class_name }}

                            <iconify-icon icon="mdi:google-classroom"
                                class="d-flex justify-content-end fs-3 me-lg-3 icon"></iconify-icon>

                            <div class="fw-medium">{{ $classes->teacher }}</div>

                            <div class="fw-medium pt-3 pb-2">({{ $classes->day }})
                                {{ Carbon\Carbon::createFromFormat('H:i', $classes->start_at)->format('g:i A') }} -
                                {{ Carbon\Carbon::createFromFormat('H:i', $classes->end_at)->format('g:i A') }} -
                                {{ $classes->type }} <br>
                            </div>

                        </div>

                    </div>
                @endforeach

                <!-- End first class -->

                <!-- second class -->

                <div class="row">

                    <div class="mb-5">


                    </div>

                </div>

                <!-- End second class -->



            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 ms-lg-6 d-flex d-flex bg-light shadow flex-column radius  "
                style="height: 20rem;">
                <h6 class="p-1 pt-3 fw-bolder ">Today's Schedule</h6>



                <div class="row ms-4 ms-sm-4 ms-lg-0 ms-xl-0">

                    <div class="col-11  ms-lg-4 mt-lg-3 fw-bolder class2 pt-lg-3 ">
                        ENGL 102 Section 8 - Academic English II

                        <iconify-icon icon="mdi:google-classroom"
                            class="d-flex justify-content-end fs-3 me-lg-3 icon"></iconify-icon>

                        <div class="fw-medium">Marivic Cruz Gallego</div>

                        <div class="fw-medium pt-3 pb-2"><i class="fa-solid fa-clock"></i><span class="ps-2">08:00 -
                                9:50</span>
                            <span class="float-end ms-4">online <i class="fa-sharp fa-solid fa-location-dot "></i>
                            </span>
                        </div>

                    </div>

                </div>

            </div>



        </div>
    </div>

    <div class="container-fluid bottom">
        <footer>
          <hr>
          <span class="d-flex justify-content-center text-center mb-2">
            All rights reserved. Copyright © 2023 Oaragon International University Phnom Penh - Cambodia
          </span>          
        </footer>
      </div>
@endsection
