@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">


        <div class="col-md-8 grid-margin stretch-card offset-2">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Add Class</h6>

                    <form class="forms-sample" method="post" action="{{ route('store.student') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Student Name</label>
                            <input type="text" class="form-control" name="name" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Student Name">
                        </div>

                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Class Name</label>
                            <select class="form-select" name="class_id" id="ageSelect">
                                <option selected="" disabled="">Select Class Status</option>

                                @foreach ($class as $classes )
                                    
                                <option value="{{ $classes->id }}">{{ $classes->class_name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="ageSelect">
                                <option selected="" disabled="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>

                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Status</label>
                            <select class="form-select" name="status" id="ageSelect">
                                <option selected="" disabled="">Select Class Status</option>
                                <option>Active</option>
                                <option>Inactive</option>

                            </select>
                        </div>



                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                 
                    </form>

                </div>
            </div>
        </div>


    </div>
@endsection
