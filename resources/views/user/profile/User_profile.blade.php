@extends('user.dashboard')

@section('user')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    {{-- start container --}}
    <div class="container ">
        {{-- start row --}}
        <div class="row mt-5">

            {{-- start form to get the profile data --}}

            <form method="POST" action="{{ route('store.user.profile') }}" enctype="multipart/form-data">

                @csrf

                {{-- start input name  --}}
                <div class=" offset-4 col-4">
                    <label for="" class="form-label">Name : </label>
                    <input type="text" name="name" class="form-control border-5" placeholder="Name"
                        value="{{ $profileData->name }}">
                </div>
                {{-- end input name  --}}

                {{-- start input email  --}}
                <div class=" offset-4 col-4 mt-2">
                    <label for="" class="form-label">Email : </label>
                    <input type="email" name="email" class="form-control border-5" placeholder="email"
                        value="{{ $profileData->email }}">
                </div>

                {{-- end input email  --}}

                <!-- Password field -->
                <div class=" offset-4 col-4 mt-2">
                    <label for="" class="form-label">Password : </label>
                    <input type="password" name="password" class="form-control border-5"  value="{{ $profileData->password }}" placeholder="Password">
                </div>

                <!-- Phone Number field -->
                <div class=" offset-4 col-4 mt-2">
                    <label for="" class="form-label">Phone Number : </label>
                    <input type="text" name="phone" class="form-control border-5" placeholder="Phone Number"
                        value="{{ $profileData->phone }}">
                </div>

                <!-- Address field -->
                <div class=" offset-4 col-4 mt-2">
                    <label for="" class="form-label">Address : </label>
                    <input type="text" name="address" class="form-control border-5" placeholder="Address"
                        value="{{ $profileData->address }}">
                </div>

                <!-- Photo field -->
                <div class=" offset-4 col-4 mt-2">
                    <label for="" class="form-label">Photo : </label>
                    <input type="file" name="photo" id="photo" class="form-control border-5" placeholder="Photo">
                </div>

                <!-- Show image -->
                <div class="offset-4 col-3 mt-4">
                    <img class="rounded-circle" style="height: 130px; width:130px" id="showimage"
                        src="{{ !empty($profileData->photo) ? url('upload/img/user/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                        alt="profile">
                    <span class="h4 ms-3 text-dark">{{ $profileData->username }}</span>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary offset-4 mt-4 p-3 px-5 mb-5">Submit</button>


            </form>

            {{-- end form to get the profile data --}}

        </div>

    </div>



    {{-- to show the image --}}
    <script>
        $(document).ready(function() {
            $('#photo').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#showimage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>

    {{-- to show the image --}}
@endsection
