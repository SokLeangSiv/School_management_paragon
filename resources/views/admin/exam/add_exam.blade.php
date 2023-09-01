@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">


        <div class="col-md-8 grid-margin stretch-card offset-2">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Add Exam</h6>

                    <form class="forms-sample" method="post" action="{{ route('store.exam')}}">
                        @csrf

                        {{-- <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Course Name</label>
                            <input type="text" class="form-control" name="exam_name" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Course Name">
                        </div> --}}

                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Course Name</label>
                            <select class="form-select" name="class_id" id="ageSelect">
                                <option selected="" disabled="">Select Course Name</option>

                               
                                @foreach ($class as $item)
                                    
                                <option value="{{ $item->id }}">{{ $item->class_name }}</option>
                                
                                @endforeach

                            </select>
                        </div>

                       

                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Teacher</label>
                            <select class="form-select" name="teacher_id" id="ageSelect">
                                <option selected="" disabled="">Select Teacher</option>

                               
                                @foreach ($teacher as $item)
                                    
                                <option value="{{ $item->id }}">{{ $item->teacher }}</option>
                                
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Day</label>
                            <select class="form-select" name="day" id="ageSelect">
                                <option selected="" disabled="">Select Day</option>

                               
                                    
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                                

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Date">
                        </div>

                        <div class="mb-3">
                            
                            <label for="exampleInputUsername1" class="form-label">Time</label>
                            <input type="time" class="form-control" name="time" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Time">
                        </div>

                        
                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Group</label>
                            <select class="form-select" name="group" id="ageSelect">
                                <option selected="" disabled="">Select Group</option>

                               
                                    
                                <option value="Freshman">Freshman</option>
                                <option value="Sophomore">Sophomore</option>
                                <option value="Junior">Junior</option>
                                <option value="Senior">Senior</option>
                                

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Exam Type</label>
                            <select class="form-select" name="exam_type" id="ageSelect">
                                <option selected="" disabled="">Select Exam Type</option>

                                <option value="midterm">Midterm</option>
                                <option value="final">Final</option>

                            </select>
                        </div>


                        <div class="mb-3">
                            
                            <label for="exampleInputUsername1" class="form-label">Room</label>
                            <input type="text" class="form-control" name="room" id="exampleInputUsername1"
                                autocomplete="off" placeholder="room">
                        </div>



                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                 
                    </form>

                </div>
            </div>
        </div>


    </div>
@endsection
