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
                <div class="col-12 col-sm-12 col-lg-4 col-xl-4">
                    <form class="d-flex mb-2" role="search" action="{{ route('get.class') }}">
                        <input class="form-control me-2 border-2 border-secondary w-100" name="search" type="search"
                            placeholder="Search" aria-label="Search" value="{{ $search }}">
                        <button class="btn btn-outline-primary" type="submit">Search</button>

                    </form>
                    <span class="text-light  mt-1 mb-3">Search By "Class_Name / Class Code / Teacher Name"</span>
                </div>


            </div>
        </div>


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
                                <td>{{ $classes + 1 }}</td>
                                <td>{{ $item->class_name }}</td>
                                <td>{{ $item->class_code }}</td>
                                <td>{{ $item->teacher }}</td>
                                <td>{{ $item->start_at }}</td>
                                <td>{{ $item->end_at }}</td>
                                <td>{{ $item->day }}</td>
                                <td>{{ $item->type }}</td>
                                <td>

                                    @if ($item->status == 'Active')
                                        <span class="badge bg-success text-white">{{ $item->status }}</span>
                                    @else
                                        <span class="badge bg-danger text-white">{{ $item->status }}</span>
                                    @endif

                                </td>

                                <td>
                                    <a href="{{ route('edit.class', $item->id) }}">
                                        <button type="button" class="btn btn-warning me-2"><i
                                                class="fa-solid fa-pen-to-square"></i></button>
                                    </a>
                                    <a href="{{ route('delete.class', $item->id) }}">
                                        <button type="button" class="btn btn-danger"><i
                                                class="fa-solid fa-trash fs-5 delete remove" ></i></button>
                                    </a>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



    </div>

    {{ $class->links() }}

   
@endsection
