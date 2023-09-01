@extends('admin.admin_dashboard')

@section('admin')


@if (session('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@elseif(session('error'))

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session('error') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    


@endif

<div class="page-content">
    
    
    <div class="card-body">
       
        <a href="{{ route('add.exam') }}">
            <button type="button" class="btn btn-primary">Add Exam</button>
        </a>

        <div class="table-responsive pt-3">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Course Name</th>
                        <th>Course Code</th>
                        <th>Day</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Group</th>
                        <th>Exam Type</th>
                        <th>Room</th>   
                        <th>Action</th>   
                    </tr>
                </thead>
                <tbody>

                     
                         
                   
                    @foreach($exam as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->class->class_name }}</td>
                        <td>{{ $item->class->class_code }}</td>
                        <td>{{ $item->day }}</td>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->time }}</td>
                        <td>{{ $item->group }}</td>
                        <td>{{ $item->exam_type }}</td>
                        <td>{{ $item->room }}</td>
                        
                        
                        <td>
                            <a href="{{ route('edit.exam',$item->id) }}">
                                <button type="button" class="btn btn-warning me-2"><i class="fa-solid fa-pen-to-square"></i></button>
                            </a>
                            <a href="{{ route('delete.exam',$item->id) }}">
                                <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash fs-5"></i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
               
                    
                 
                </tbody>
            </table>
        </div>
    </div>

    
              
        </div>
@endsection