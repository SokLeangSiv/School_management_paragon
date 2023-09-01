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
                                autocomplete="off" placeholder="Teacher Name">
                        </div>

                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="ageSelect">
                                <option selected="" disabled="">Select Gender</option>
                                <option value="Male" >Male</option>
                                <option value="Female">Female</option>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Phone number">
                        </div>


                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Email">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Address">
                        </div>



                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </form>

                </div>
            </div>
        </div>


    </div>
@endsection
