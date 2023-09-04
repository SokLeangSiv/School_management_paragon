@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">


        <div class="col-md-8 grid-margin stretch-card offset-2">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Edit Exam</h6>

                    <form class="forms-sample" method="post" action="{{ route('update.exam',$exam->id)}}">
                        @csrf

                        

                        {{-- <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Course Name</label>
                            <input type="text" class="form-control" name="class_id" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Course Name" value="{{ $exam->class->class_name }}">
                        </div> --}}

                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Course Name</label>
                            <select class="form-select" name="class_id" id="ageSelect">
                                <option selected="" disabled="">Select Course Name</option>

                               
                                @foreach ($class as $item)
                                    
                                <option value="{{ $item->id }}"{{ $item->id == $exam->class_id ? 'selected' : '' }}>{{ $item->class_name }}</option>
                                
                                @endforeach

                            </select>
                        </div>


                        {{-- <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Teacher</label>
                            <input type="text" class="form-control" name="teacher_id" id="exampleInputUsername3"
                                autocomplete="off" placeholder="Teacher" value="{{ $exam->teacher->teacher }}">
                        </div> --}}

                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Teacher Name</label>
                            <select class="form-select" name="teacher_id" id="ageSelect1">
                                <option selected="" disabled="">Select teacherr Name</option>

                               
                                @foreach ($teacher as $item)
                                    
                                <option value="{{ $item->id }}" {{ $item->id == $exam->class_id ? 'selected' : '' }}>{{ $item->teacher }}</option>
                                
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Day</label>
                            <select class="form-select" name="day" id="ageSelect">
                                <option selected="" disabled="">Select Day</option>

                               
                                    
                                <option value="Monday" {{ $exam->day == 'Monday' ? 'selected' : '' }}>Monday</option>
                                <option value="Tuesday" {{ $exam->day == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                                <option value="Wednesday" {{ $exam->day == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                                <option value="Thursday" {{ $exam->day == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                                <option value="Friday" {{ $exam->day == 'Friday' ? 'selected' : '' }}>Friday</option>
                                <option value="Saturday" {{ $exam->day == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                                <option value="Sunday" {{ $exam->day == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                                

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Date" value="{{ $exam->date }}">
                        </div>

                        <div class="mb-3">
                            
                            <label for="exampleInputUsername1" class="form-label">Time</label>
                            <input type="time" class="form-control" name="time" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Time" value="{{ $exam->time }}">
                        </div>

                        
                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Group</label>
                            <select class="form-select" name="group" id="ageSelect">
                                <option selected="" disabled="">Select Group</option>

                               
                                    
                                <option value="Freshman" {{ $exam->group  == 'Freshman' ? 'selected' : '' }}>Freshman</option>
                                <option value="Sophomore" {{ $exam->group  == 'Sophomore' ? 'selected' : '' }}>Sophomore</option>
                                <option value="Junior" {{ $exam->group  == 'Junior' ? 'selected' : '' }}>Junior</option>
                                <option value="Senior" {{ $exam->group  == 'Senior' ? 'selected' : '' }}>Senior</option>
                                

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Exam Type</label>
                            <select class="form-select" name="exam_type" id="ageSelect">
                                <option selected="" disabled="">Select Exam Type</option>

                                <option value="midterm" {{ $exam->exam_type == 'midterm' ? 'selected' : '' }}>Midterm</option>
                                <option value="final" {{ $exam->exam_type == 'final' ? 'selected' : '' }}>Final</option>

                            </select>
                        </div>


                        <div class="mb-3">
                            
                            <label for="exampleInputUsername1" class="form-label">Room</label>
                            <input type="text" class="form-control" name="room" id="exampleInputUsername1"
                                autocomplete="off" placeholder="room" value="{{ $exam->room }}">
                        </div>



                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                 
                    </form>

                </div>
            </div>
        </div>


    </div>
@endsection
