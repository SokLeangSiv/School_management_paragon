@extends('admin.admin_dashboard')

@section('admin')
<!-- Start content -->
<div class="page-content">
    <!-- Start size content -->
    <div class="col-md-8 grid-margin stretch-card offset-2">
        <!-- Start card -->
        <div class="card">
            <!-- Start body card-->
            <div class="card-body">

                <!-- card Title -->
                <h6 class="card-title">Edit Class</h6>

                <!-- Class Edit Form -->
                <form class="forms-sample" method="post" action="{{ route('update.class', $class->id) }}">
                    @csrf

                    <!-- Class Code Input -->
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Class Code</label>
                        <input type="text" class="form-control" name="class_code" id="exampleInputUsername1" autocomplete="off" placeholder="Class Code" value="{{ $class->class_code }}">
                    </div>

                    <!-- Class Name Input -->
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Class Name</label>
                        <input type="text" class="form-control" name="class_name" id="exampleInputUsername1" autocomplete="off" placeholder="Class Name" value="{{ $class->class_name }}">
                    </div>

                    <!-- Teacher Name Input -->
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Teacher Name</label>
                        <input type="text" class="form-control" name="teacher" id="exampleInputUsername1" autocomplete="off" placeholder="Class  Teacher" value="{{ $class->teacher }}">
                    </div>

                    <!-- Start At Input -->
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Start At</label>
                        <input type="time" class="form-control" name="start_at" id="exampleInputUsername1" autocomplete="off" placeholder="Start At" value="{{ $class->start_at }}">
                    </div>

                    <!-- End At Input -->
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">End At</label>
                        <input type="time" class="form-control" name="end_at" id="exampleInputUsername1" autocomplete="off" placeholder="End At" value="{{ $class->end_at }}">
                    </div>

                    <!-- Day Input -->
                    <div class="mb-3">
                        <label for="ageSelect" class="form-label">Day</label>
                        <select class="form-select" name="day" id="ageSelect">
                            <option selected="" disabled="">Select Day</option>
                            <option value="Monday" {{ $class->day == 'Monday' ? 'selected': '' }}>Monday</option>
                            <option value="Tuesday" {{ $class->day == 'Tuesday' ? 'selected': '' }}>Tuesday</option>
                            <option value="Wednesday" {{ $class->day == 'Wednesday' ? 'selected': '' }}>Wednesday</option>
                            <option value="Thursday" {{ $class->day == 'Thursday' ? 'selected': '' }}>Thursday</option>
                            <option value="Friday" {{ $class->day == 'Friday' ? 'selected': '' }}>Friday</option>
                            <option value="Saturday" {{ $class->day == 'Saturday' ? 'selected': '' }}>Saturday</option>
                        </select>
                    </div>

                    <!-- Type Input -->
                    <div class="mb-3">
                        <label for="ageSelect" class="form-label">Type</label>
                        <select class="form-select" name="type" id="ageSelect">
                            <option selected="" disabled="">Select Class type</option>
                            <option value="offline" {{ $class->type == 'offline' ? 'selected': '' }}>Offline</option>
                            <option value="online" {{ $class->type == 'online' ? 'selected': '' }}>Online</option>
                        </select>
                    </div>

                    <!-- Status Input -->
                    <div class="mb-3">
                        <label for="ageSelect" class="form-label">Status</label>
                        <select class="form-select" name="status" id="ageSelect">
                            <option selected="" disabled="">Select Class Status</option>
                            <option value="Active" {{ $class->status == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ $class->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-secondary">Cancel</button>
                </form>
                <!-- End of Class Edit Form -->

            </div>
            <!-- End of body card -->
        </div>
        <!-- End of card -->
    </div>
    <!-- End of size content -->
</div>
<!-- End of content -->
@endsection