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
       
        <a href="{{ route('add.class') }}">
            <button type="button" class="btn btn-primary">Add Class</button>
        </a>

        <div class="table-responsive pt-3">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Class Name</th>
                        <th>Class Code</th>
                        <th>Teacher</th>
                        <th>Start At</th>
                        <th>End At</th>
                        <th>Day</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($class as $classes => $item)
                        
                    <tr>
                        <td>{{ $classes+1 }}</td>
                        <td>{{ $item->class_name }}</td>
                        <td>{{ $item->class_code }}</td>
                        <td>{{ $item->teacher }}</td>
                        <td>{{ $item->start_at }}</td>
                        <td>{{ $item->end_at }}</td>
                        <td>{{ $item->day }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->status }}</td>
                        
                        <td>
                            <a href="{{ route('edit.class', $item->id) }}">
                                <button type="button" class="btn btn-warning me-2"><i class="fa-solid fa-pen-to-square"></i></button>
                            </a>
                            <a href="{{ route('delete.class', $item->id) }}">
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