@extends('admin.admin_dashboard')

@section('admin')


@if (session('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif

<div class="page-content">
    
    
    <div class="card-body">
       
        <a href="{{ route('add.student') }}">
            <button type="button" class="btn btn-primary">Add Student</button>
        </a>

        <div class="table-responsive pt-3">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                     @foreach ($student as $key =>$item )
                         
                   
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->status }}</td>
                        
                        <td>
                            <a href="{{ route('edit.student', $item->id) }}">
                                <button type="button" class="btn btn-warning me-2"><i class="fa-solid fa-pen-to-square"></i></button>
                            </a>
                            <a href="{{ route('delete.student', $item->id) }}">
                                <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash fs-5"></i></button>
                            </a>
                        
                    </tr>
                    @endforeach 
                    
                 
                </tbody>
            </table>
        </div>
    </div>

    
              
        </div>
@endsection