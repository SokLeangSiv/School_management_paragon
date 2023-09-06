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
                <form class="d-flex mb-2" role="search" action="{{ route('get.teacher') }}">
                    <input class="form-control me-2 border-2 border-secondary" name="search" type="search"
                        placeholder="Search" aria-label="Search" value="{{ $search }}">
                    <button class="btn btn-outline-primary" type="submit">Search</button>

                </form>
                <span class="text-light  mt-1 mb-3">Search By "Teacher Name / Phone Number"</span>  
            </div>

            
        </div>
    </div>
    
    
    <div class="card-body">
       
        <a href="{{ route('add.teacher') }}">
            <button type="button" class="btn btn-primary">Add Teacher</button>
        </a>

        <div class="table-responsive pt-3">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Teacher Name</th>
                        <th>Gender</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    
                    @foreach ($teacher as $key =>$item)
                        
                 
                        
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->teacher }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->address }}</td>
                        
                        <td>
                            <a href="{{ route('edit.teacher',$item->id) }}">
                                <button type="button" class="btn btn-warning me-2"><i class="fa-solid fa-pen-to-square"></i></button>
                            </a>
                            <a href="{{ route('delete.teacher', $item->id) }}">
                                <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash fs-5"></i></button>
                            </a>
                        </td>
                        
                    </tr>

                    @endforeach
                    
           
                </tbody>
            </table>
        </div>
    </div>

    {{ $teacher->links()  }}
              
        </div>
@endsection