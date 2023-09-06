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
                                autocomplete="off" placeholder="Class Code" value="{{  old('class_code') }}">

                             @if ($errors->has('class_code'))
                                 <p class="text-danger">{{ $errors->first('class_code') }}</p>    
                             @endif   
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Class Name</label>
                            <input type="text" class="form-control" name="class_name" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Class Name" value="{{  old('class_name') }}">
                                @if ($errors->has('class_name'))
                                    <p class="text-danger">{{ $errors->first('class_name') }}</p>
                                    
                                @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Teacher Name</label>
                            <input type="text" class="form-control" name="teacher" id="exampleInputUsername1"
                                autocomplete="off" placeholder="Class  Teacher" value="{{  old('teacher') }}">

                                @if ($errors->has('teacher'))
                                    <p class="text-danger">{{ $errors->first('teacher') }}</p>
                                    
                                @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Start At</label>
                            <input type="time" class="form-control" name="start_at" id="start_at"
                                autocomplete="off" placeholder="Start At" value="{{  old('start_at') }}">

                                @if ($errors->has('start_at'))
                                    <p class="text-danger">{{ $errors->first('start_at') }}</p>
                                    
                                @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">End At</label>
                            <input type="time" class="form-control" name="end_at" id="end_at"
                                autocomplete="off" placeholder="End At" value="{{  old('end_at') }}">

                                @if ($errors->has('end_at'))
                                    <p class="text-danger">{{ $errors->first('end_at') }}</p>
                                    
                                @endif
                        </div>

                     
                        
                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Day</label>
                            <select class="form-select" name="day" id="ageSelect" >
                                <option selected="" disabled="">Select Day</option>

                                <option value="Monday" {{ old('day') == 'Monday' ? 'selected' : '' }}>Monday</option>
                                <option value="Tuesday" {{ old('day') == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                                <option value="Wednesday" {{ old('day') == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                                <option value="Thursday" {{ old('day') == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                                <option value="Friday" {{ old('day') == 'Friday' ? 'selected' : '' }}>Friday</option>
                                <option value="Saturday" {{ old('day') == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                                

                            </select>

                            @if ($errors->has('day'))
                                    <p class="text-danger">{{ $errors->first('day') }}</p>
                                
                            @endif
                        </div>
                        
                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Type</label>
                            <select class="form-select" name="type" id="ageSelect">
                                <option selected="" disabled="">Select Class type</option>
                                <option value="offline" {{ old('type') == 'offline' ? 'selected' : '' }}>Offline</option>
                                <option value="online" {{ old('type') == 'online' ? 'selected' : '' }}>Online</option>

                            </select>

                            @if ($errors->has('type'))
                                    <p class="text-danger">{{ $errors->first('type') }}</p>
                                
                            @endif
                        </div>


                        
                        


                        <div class="mb-3">
                            <label for="ageSelect" class="form-label">Status</label>
                            <select class="form-select" name="status" id="ageSelect">
                                <option selected="" disabled="">Select Class Status</option>
                                <option  value="Active"  {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>

                            </select>

                            @if ($errors->has('status'))
                                    <p class="text-danger">{{ $errors->first('status') }}</p>
                                
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
