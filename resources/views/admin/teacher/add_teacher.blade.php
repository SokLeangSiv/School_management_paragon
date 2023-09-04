@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">


        <div class="col-md-8 grid-margin stretch-card offset-2">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Add Class</h6>

                    <form class="forms-sample" method="post" action="{{ route('store.teacher') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Teacher Name</label>
                            <input type="text" class="form-control" name="teacher" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Teacher Name" value="{{ old('teacher') }}">

                            @if ($errors->has('teacher'))
                                <span class="text-danger">{{ $errors->first('teacher') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="ageSelect">
                                <option selected="" disabled="">Select Gender</option>
                                <option value="Male"   {{ old('gender') == 'Male'  ? 'selected' : '' }}>Male</option>
                                <option value="Female"  {{ old('gender') == 'Female' ? 'selected' : ''  }}>Female</option>

                            </select>

                            @if ($errors->has('gender'))
                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                            @endif

                        </div>

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Phone number" value="{{ old('phone') }}">

                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif

                        </div>


                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Address" value="{{ old('address') }}">

                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif

                        </div>



                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </form>

                </div>
            </div>
        </div>


    </div>
@endsection
