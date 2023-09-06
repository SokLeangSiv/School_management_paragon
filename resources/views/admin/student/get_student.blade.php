@extends('admin.admin_dashboard')

@section('admin')


@if (session('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif




<div class="page-content">


    <div class="container">
        <div class="row mb-5">
            <div class="col-12 col-sm-12 col-lg-4 col-xl-4 ">
                <form class="d-flex mb-2" role="search" action="{{ route('get.student') }}">
                    <input class="form-control me-2 border-2 border-secondary" name="search" type="search"
                        placeholder="Search" aria-label="Search" value="{{ $search }}">
                    <button class="btn btn-outline-primary" type="submit">Search</button>

                </form>
                <span class="text-light ms-3 mt-1">Search By "Student Name / Class Name"</span>  
            </div>

            
        </div>
    </div>
    
    
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
                        <th>Class Name</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                     @foreach ($students as $key =>$item )
                         
                   
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->class_name }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>

                            @if ($item->status == "Active")
                            <span class="badge bg-success text-white">{{ $item->status }}</span>

                            @else

                            <span class="badge bg-danger text-white">{{ $item->status }}</span>
                            
                            @endif


                        </td>
                        
                        <td>
                           
                            @if ($item->id)
                            <a href="{{ route('edit.student', $item->id) }}">
                                <button type="button" class="btn btn-warning me-2"><i class="fa-solid fa-pen-to-square"></i></button>
                            </a>
                            <a href="{{ route('delete.student', $item->id) }}">
                                <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash fs-5"></i></button>
                            </a>
                        @endif
                        </td>
                        
                    </tr>
                    @endforeach 
                    
                 
                </tbody>
            </table>
        </div>
    </div>

    {{ $students->links()  }}   

</div>

@endsection