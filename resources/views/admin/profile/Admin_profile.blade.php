

@extends('admin.admin_dashboard')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>


    <div class="col-md-6 grid-margin stretch-card offset-3 mt-5">
        <div class="card mt-5 mb-5">
            <div class="card-body">

                <h6 class="card-title">Admin Profile</h6>

                <form class="forms-sample" method="post" action="{{ route('store.admin.profile') }}" enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputUsername1"
                            autocomplete="off" placeholder="Name" value="{{ $profileData->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            placeholder="Email" value="{{ $profileData->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                            autocomplete="off" placeholder="Password" value="{{$profileData->password }}">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" id="exampleInputEmail1"
                            placeholder="Phone Number" value="{{ $profileData->phone }}">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">address</label>
                        <input type="text" name="address" class="form-control" id="exampleInputEmail1"
                            placeholder="Address" value="{{ $profileData->address }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="formFile">File upload</label>
                        <input class="form-control" name="photo" id="photo" type="file" id="formFile">
                    </div>

                    <div class=" col-3 mt-4 mb-4">
                        <img class="rounded-circle" style="height: 130px; width:130px" id="showimage"
                            src="{{ !empty($profileData->photo) ? url('upload/img/admin/' . $profileData->photo) : url('upload/img/no_image.jpg') }}"
                            alt="profile" id="showimage">
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">Cancel</a>
                </form>

            </div>
        </div>
    </div>


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
