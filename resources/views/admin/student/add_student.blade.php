@extends('admin.admin_dashboard')

@section('admin')
<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<!-- Start of page content -->
<div class="page-content">
    <!-- Start of size content -->
    <div class="col-md-8 grid-margin stretch-card offset-2">
        <!-- Start of card -->
        <div class="card">
            <!-- Start of body card -->
            <div class="card-body">
                <!-- card title -->
                <h6 class="card-title">Add Class</h6>

                <!-- Form for adding a new student -->
                <form id="myform" class="forms-sample" method="post" action="{{ route('store.student') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Student Name</label>
                        <input type="text" class="form-control" name="name" id="name" autocomplete="off" placeholder="Student Name" value="{{ old('name') }}">

                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="ageSelect" class="form-label">Class Name</label>
                        <select class="form-select" name="class_id" id="class_id">
                            <option selected disabled>Select Class Status</option>
                            @foreach ($class as $classes)
                            <option value="{{ $classes->id }}" {{ old('class_id') == $classes->id ? 'selected' : '' }}>
                                {{ $classes->class_name }}
                            </option>
                            @endforeach
                        </select>

                        @if ($errors->has('class_id'))
                        <span class="text-danger">{{ $errors->first('class_id') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="ageSelect" class="form-label">Gender</label>
                        <select class="form-select" name="gender" id="gender">
                            <option selected="" disabled="">Select Gender</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>

                        @if ($errors->has('gender'))
                        <span class="text-danger">{{ $errors->first('gender') }}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="ageSelect" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status">
                            <option selected="" disabled="">Select Class Status</option>
                            <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>

                        @if ($errors->has('status'))
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                </form>
                <!-- End of add student form -->
            </div>
            <!-- End of body card -->
        </div>
        <!-- End of body card -->
    </div>
    <!-- End of card -->
</div>
<!-- End of size content -->

<!-- Include jQuery Validate plugin for form validation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    // Wait for the document to be ready
    $(document).ready(function() {
        // Initialize form validation using jQuery Validate
        $("#myform").validate({
            // Define validation rules for each input field
            rules: {
                name: {
                    required: true, // Name is required
                    minlength: 4 // Name must be at least 4 characters long
                },
                class_id: {
                    required: true // Class ID is required
                },
                gender: {
                    required: true // Gender is required
                },
                status: {
                    required: true // Status is required
                }
            },
            // Define custom error messages for each input field
            messages: {
                name: {
                    required: "Please enter a student name",
                    minlength: "Student name must be at least 4 characters long"
                },
                class_id: {
                    required: "Please select a class"
                },
                gender: {
                    required: "Please select a gender"
                },
                status: {
                    required: "Please select a status"
                }
            }
        });
    });
</script>
@endsection