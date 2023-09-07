@extends('admin.admin_dashboard')

@section('admin')
    <!-- Start Page Content -->
    <div class="page-content">
        <!-- Start of size content -->
        <div class="col-md-8 grid-margin stretch-card offset-2">
            <!-- Start of card -->
            <div class="card">
                <!-- Start of body card -->
                <div class="card-body">
                    <!-- card title -->
                    <h6 class="card-title">Edit Exam</h6>
                    <!-- Start of edit exam form -->
                    <form class="forms-sample" method="post" action="{{ route('update.exam',$exam->id)}}">
                        @csrf

                        <!-- Course Name Selection Block -->
                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Course Name</label>
                            <select class="form-select" name="class_id" id="ageSelect">
                                <option selected="" disabled="">Select Course Name</option>
                                <!-- Loop to populate course options -->
                                @foreach ($class as $item)
                                    <option value="{{ $item->id }}"{{ $item->id == $exam->class_id ? 'selected' : '' }}>
                                        {{ $item->class_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- End of Course Name Selection Block -->

                        <!-- Teacher Name Selection Block -->
                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Teacher Name</label>
                            <select class="form-select" name="teacher_id" id="ageSelect1">
                                <option selected="" disabled="">Select Teacher Name</option>
                                <!-- Loop to populate teacher options -->
                                @foreach ($teacher as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $exam->teacher_id ? 'selected' : '' }}>
                                        {{ $item->teacher }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('teacher'))
                                <span class="text-danger">{{ $errors->first('teacher_id') }}</span>
                            @endif
                        </div>
                        <!-- End of Teacher Name Selection Block -->

                        <!-- Day Selection Block -->
                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Day</label>
                            <select class="form-select" name="day" id="ageSelect">
                                <option selected="" disabled="">Select Day</option>
                                <!-- Options for selecting a day -->
                                <option value="Monday" {{ $exam->day == 'Monday' ? 'selected' : '' }}>Monday</option>
                                <option value="Tuesday" {{ $exam->day == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                                <option value="Wednesday" {{ $exam->day == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                                <option value="Thursday" {{ $exam->day == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                                <option value="Friday" {{ $exam->day == 'Friday' ? 'selected' : '' }}>Friday</option>
                                <option value="Saturday" {{ $exam->day == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                                <option value="Sunday" {{ $exam->day == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                            </select>
                        </div>
                        <!-- End of Day Selection Block -->

                        <!-- Date Input Block -->
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Date" value="{{ $exam->date }}">
                        </div>

                        <!-- Time Input Block -->
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Time</label>
                            <input type="time" class="form-control" name="time" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Time" value="{{ $exam->time }}">
                        </div>

                        <!-- Group Selection Block -->
                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Group</label>
                            <select class="form-select" name="group" id="ageSelect">
                                <option selected="" disabled="">Select Group</option>
                                <!-- Options for selecting a group -->
                                <option value="Freshman" {{ $exam->group  == 'Freshman' ? 'selected' : '' }}>Freshman</option>
                                <option value="Sophomore" {{ $exam->group  == 'Sophomore' ? 'selected' : '' }}>Sophomore</option>
                                <option value="Junior" {{ $exam->group  == 'Junior' ? 'selected' : '' }}>Junior</option>
                                <option value="Senior" {{ $exam->group  == 'Senior' ? 'selected' : '' }}>Senior</option>
                            </select>
                        </div>

                        <!-- Exam Type Selection Block -->
                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Exam Type</label>
                            <select class="form-select" name="exam_type" id="ageSelect">
                                <option selected="" disabled="">Select Exam Type</option>
                                <!-- Options for selecting an exam type -->
                                <option value="midterm" {{ $exam->exam_type == 'midterm' ? 'selected' : '' }}>Midterm</option>
                                <option value="final" {{ $exam->exam_type == 'final' ? 'selected' : '' }}>Final</option>
                            </select>
                        </div>

                        <!-- Room Input Block -->
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Room</label>
                            <input type="text" class="form-control" name="room" id="exampleInputUsername1"
                                autocomplete="off" placeholder="room" value="{{ $exam->room }}">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                    </form>
                    <!-- End of edit exam form -->
                </div>
                <!-- End of body card -->
            </div>
            <!-- End of card -->
        </div>
        <!-- End of size content -->
    </div>
    <!-- End Page Content -->
@endsection
