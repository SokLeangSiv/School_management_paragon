@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">


        <div class="col-md-8 grid-margin stretch-card offset-2">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">edit Class</h6>

                    <form class="forms-sample" method="post" action="{{ route('update.teacher', $teacher->id) }}">
                        @csrf

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Teacher Name</label>
                            <input type="text" class="form-control" name="teacher" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Teacher Name" value="{{ $teacher->teacher }}">
                        </div>

                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="ageSelect">
                                <option selected="" disabled="">Select Gender</option>
                                <option value="Male" {{ $teacher->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female"  {{ $teacher->gender == 'Female' ? 'selected' : '' }}>Female</option>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Phone number" value="{{ $teacher->phone }}">
                        </div>


                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Email" value="{{ $teacher->email }}">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Address" value="{{ $teacher->address }}">
                        </div>



                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </form>

                </div>
            </div>
        </div>


    </div>
@endsection
