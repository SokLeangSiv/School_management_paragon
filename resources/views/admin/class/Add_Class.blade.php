@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">


        <div class="col-md-8 grid-margin stretch-card offset-2">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Add Class</h6>

                    <form class="forms-sample" method="post" action="{{ route('store.class') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Class Code</label>
                            <input type="text" class="form-control" name="class_code" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Class Code">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Class Name</label>
                            <input type="text" class="form-control" name="class_name" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Class Name">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Teacher Name</label>
                            <input type="text" class="form-control" name="teacher" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Class  Teacher">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Start At</label>
                            <input type="time" class="form-control" name="start_at" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Class  Teacher">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">End At</label>
                            <input type="time" class="form-control" name="end_at" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Class  Teacher">
                        </div>
                        
                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Day</label>
                            <select class="form-select" name="day" id="ageSelect">
                                <option selected="" disabled="">Select Day</option>

                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                

                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Type</label>
                            <select class="form-select" name="type" id="ageSelect">
                                <option selected="" disabled="">Select Class type</option>
                                <option value="offline">Offline</option>
                                <option value="online">Online</option>

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
                        <button class="btn btn-secondary">Cancel</button>
                    </form>

                </div>
            </div>
        </div>


    </div>
@endsection
