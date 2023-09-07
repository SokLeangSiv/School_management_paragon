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
                <h6 class="card-title">Add Exam</h6>
                <!-- Start of the Add Exam Form -->
                <form class="forms-sample" method="post" action="{{ route('store.exam')}}">
                    @csrf

                    <!-- Course Name Selection Block -->
                    <div class="mb-3">
                        <label for="ageSelect" class="form-label">Course Name</label>
                        <select class="form-select" name="class_id" id="ageSelect">
                            <option selected="" disabled="">Select Course Name</option>
                            <!-- Loop to populate course options -->
                            @foreach ($class as $item)
                            <option value="{{ $item->id }}" {{ old('class_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->class_name }}
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('class_id'))
                        <span class="text-danger">{{ $errors->first('class_id') }}</span>
                        @endif
                    </div>
                    <!-- End of Course Name Selection Block -->

                    <!-- Teacher Selection Block -->
                    <div class="mb-3">
                        <label for="ageSelect" class="form-label">Teacher</label>
                        <select class="form-select" name="teacher_id" id="ageSelect">
                            <option selected="" disabled="">Select Teacher</option>
                            <!-- Loop to populate teacher options -->
                            @foreach ($teacher as $item)
                            <option value="{{ $item->id }}" {{ old('teacher_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->teacher }}
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('teacher_id'))
                        <span class="text-danger">{{ $errors->first('teacher_id') }}</span>
                        @endif
                    </div>
                    <!-- End of Teacher Selection Block -->

                    <!-- Day Selection Block -->
                    <div class="mb-3">
                        <label for="ageSelect" class="form-label">Day</label>
                        <select class="form-select" name="day" id="ageSelect">
                            <option selected="" disabled="">Select Day</option>
                            <option value="Monday" {{ old('day') == 'Monday' ? 'selected' : '' }}>Monday</option>
                            <option value="Tuesday" {{ old('day') == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                            <option value="Wednesday" {{ old('day') == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                            <option value="Thursday" {{ old('day') == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                            <option value="Friday" {{ old('day') == 'Friday' ? 'selected' : '' }}>Friday</option>
                            <option value="Saturday" {{ old('day') == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                            <option value="Sunday" {{ old('day') == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                        </select>
                        @if ($errors->has('day'))
                        <span class="text-danger">{{ $errors->first('day') }}</span>
                        @endif
                    </div>
                    <!-- End of Day Selection Block -->

                    <!-- Date Input Block -->
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Date</label>
                        <input type="date" class="form-control" name="date" id="exampleInputUsername1" autocomplete="off" placeholder="Date" value="{{ old('date') }}">
                        @if ($errors->has('date'))
                        <span class="text-danger">{{ $errors->first('date') }}</span>
                        @endif
                    </div>
                    <!-- End of Date Input Block -->

                    <!-- Time Input Block -->
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Time</label>
                        <input type="time" class="form-control" name="time" id="exampleInputUsername1" autocomplete="off" placeholder="Time" value="{{ old('time') }}">
                        @if ($errors->has('time'))
                        <span class="text-danger">{{ $errors->first('time') }}</span>
                        @endif
                    </div>
                    <!-- End of Time Input Block -->

                    <!-- Group Selection Block -->
                    <div class="mb-3">
                        <label for="ageSelect" class="form-label">Group</label>
                        <select class="form-select" name="group" id="ageSelect">
                            <option selected="" disabled="">Select Group</option>
                            <option value="Freshman" {{ old('group') == 'Freshman' ? 'selected' : '' }}>Freshman</option>
                            <option value="Sophomore" {{ old('group') == 'Sophomore' ? 'selected' : '' }}>Sophomore</option>
                            <option value="Junior" {{ old('group') == 'Junior' ? 'selected' : '' }}>Junior</option>
                            <option value="Senior" {{ old('group') == 'Senior' ? 'selected' : '' }}>Senior</option>
                        </select>
                        @if ($errors->has('group'))
                        <span class="text-danger">{{ $errors->first('group') }}</span>
                        @endif
                    </div>
                    <!-- End of Group Selection Block -->

                    <!-- Exam Type Selection Block -->
                    <div class="mb-3">
                        <label for="ageSelect" class="form-label">Exam Type</label>
                        <select class="form-select" name="exam_type" id="ageSelect">
                            <option selected="" disabled="">Select Exam Type</option>
                            <option value="midterm" {{ old('exam_type') == 'midterm' ? 'selected' : '' }}>Midterm</option>
                            <option value="final" {{ old('exam_type') == 'final' ? 'selected' : '' }}>Final</option>
                        </select>
                        @if ($errors->has('exam_type'))
                        <span class="text-danger">{{ $errors->first('exam_type') }}</span>
                        @endif
                    </div>
                    <!-- End of Exam Type Selection Block -->

                    <!-- Room Input Block -->
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Room</label>
                        <input type="text" class="form-control" name="room" id="exampleInputUsername1" autocomplete="off" placeholder="Room">
                        @if ($errors->has('room'))
                        <span class="text-danger">{{ $errors->first('room') }}</span>
                        @endif
                    </div>
                    <!-- End of Room Input Block -->

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                </form>
                <!-- End of the Add Exam Form -->
            </div>
            <!-- End of body card -->
        </div>
        <!-- End of card -->
    </div>
    <!-- End of the Add Exam Form Block -->
</div>
<!-- End Page Content -->
@endsection