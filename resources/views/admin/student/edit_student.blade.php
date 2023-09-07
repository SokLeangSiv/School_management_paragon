@extends('admin.admin_dashboard')

@section('admin')
<!-- Start page content -->
<div class="page-content">
    <!-- Start of size content -->
    <div class="col-md-8 grid-margin stretch-card offset-2">
        <!-- Start of card -->
        <div class="card">
            <!-- Start of body card -->
            <div class="card-body">
                <!-- card title -->
                <h6 class="card-title">Add Class</h6>

                <!-- Form for updating student information -->
                <form class="forms-sample" method="post" action="{{ route('update.student',$student->id) }}">
                    @csrf

                    <!-- Student Name Input -->
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Student Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputUsername1"
                            autocomplete="off" placeholder="Student Name" value="{{ $student->name }}">
                    </div>

                    <!-- Class Name Selection Dropdown -->
                    <div class="mb-3">
                        <label for="ageSelect" class="form-label">Class Name</label>
                        <select class="form-select" name="class_id" id="ageSelect">
                            <option selected="" disabled="">Select Class Status</option>

                            <!-- Loop through classes to populate options -->
                            @foreach ($class as $classes )
                                <option value="{{ $classes->id }}" {{ $classes->id == $student->class_id ? 'selected' : '' }}>
                                    {{ $classes->class_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Gender Selection Dropdown -->
                    <div class="mb-3">
                        <label for="ageSelect" class="form-label">Gender</label>
                        <select class="form-select" name="gender" id="ageSelect">
                            <option selected="" disabled="">Select Gender</option>
                            <option value="Male" {{ $student->gender == "Male" ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $student->gender == "Female" ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <!-- Status Selection Dropdown -->
                    <div class="mb-3">
                        <label for="ageSelect" class="form-label">Status</label>
                        <select class="form-select" name="status" id="ageSelect">
                            <option selected="" disabled="">Select Class Status</option>
                            <option value="Active" {{ $student->status == "Active" ? 'selected' : ''  }} >Active</option>
                            <option value="Inactive" {{ $student->status == "Inactive" ? 'selected' : ''  }}>Inactive</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                </form>
                <!-- End of Form for updating student information -->
            </div>
            <!-- End of body card -->
        </div>
        <!-- End of card -->
    </div>
    <!-- End of size content -->
</div>
<!-- End page content -->
@endsection
