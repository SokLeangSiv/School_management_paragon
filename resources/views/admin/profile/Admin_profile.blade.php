@extends('admin.admin_dashboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<!-- Start Size of content -->
<div class="col-md-6 grid-margin stretch-card offset-3 mt-5">
    <!-- Start card -->
    <div class="card mt-5 mb-5">
        <!-- Start card body -->
        <div class="card-body">
            <!-- card title -->
            <h6 class="card-title">Admin Profile</h6>

            <!-- Form for updating admin profile -->
            <form class="forms-sample" method="post" action="{{ route('store.admin.profile') }}" enctype="multipart/form-data">
                @csrf

                <!-- Input field for name -->
                <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputUsername1"
                        autocomplete="off" placeholder="Name" value="{{ $profileData->name }}">
                </div>

                <!-- Input field for email -->
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        placeholder="Email" value="{{ $profileData->email }}">
                </div>

                <!-- Input field for password -->
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                        autocomplete="off" placeholder="Password">
                </div>

                <!-- Input field for phone number -->
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1"
                        placeholder="Phone Number" value="{{ $profileData->phone }}">
                </div>

                <!-- Input field for address -->
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="exampleInputEmail1"
                        placeholder="Address" value="{{ $profileData->address }}">
                </div>

                <!-- Input field for profile photo -->
                <div class="mb-3">
                    <label class="form-label" for="formFile">File upload</label>
                    <input class="form-control" name="photo" id="photo" type="file" id="formFile">
                </div>

                <!-- Display the current profile photo -->
                <div class="col-3 mt-4 mb-4">
                    <img class="rounded-circle" style="height: 130px; width:130px" id="showimage"
                        src="{{ !empty($profileData->photo) ? url('upload/img/admin/' . $profileData->photo) : url('upload/img/no_image.jpg') }}"
                        alt="profile" id="showimage">
                </div>

                <!-- Submit and cancel buttons -->
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">Cancel</a>
            </form>
            <!-- End of the form -->
        </div>
        <!-- End of card body -->
    </div>
    <!-- End of card body -->
</div>
<!-- End of card -->

<!-- JavaScript code to display the selected image -->
<script>
    $(document).ready(function(){
        $('#photo').change(function(e){
            let reader = new FileReader();
            reader.onload = function(e){
                $('#showimage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>
@endsection
