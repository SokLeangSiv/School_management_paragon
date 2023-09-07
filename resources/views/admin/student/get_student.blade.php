@extends('admin.admin_dashboard')

@section('admin')

@if (session('success'))
<!-- Display a success alert if 'success' session data is present -->
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<!-- Start of page-content -->
<div class="page-content">
    <!-- Start container -->
    <div class="container">
        <!-- Start row -->
        <div class="row mb-5">
            <!-- Start col -->
            <div class="col-12 col-sm-12 col-lg-4 col-xl-4 ">
                <!-- Search input form for students -->
                <form class="d-flex mb-2" role="search" action="{{ route('get.student') }}">
                    <input class="form-control me-2 border-2 border-secondary" name="search" type="search"
                        placeholder="Search" aria-label="Search" value="{{ $search }}">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
                <!-- Search input form for students -->
                <span class="text-light ms-3 mt-1">Search By "Student Name / Class Name"</span>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End container -->

    <!-- Start of card body -->
    <div class="card-body">
        <a href="{{ route('add.student') }}">
            <!-- Link to add a new student -->
            <button type="button" class="btn btn-primary">Add Student</button>
        </a>
        <!-- Start table responsive -->
        <div class="table-responsive pt-3">
            <!-- Start table -->
            <table class="table table-dark">
                <!-- Start table head -->
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
                <!-- Start table body -->
                <tbody>
                    @foreach ($students as $key =>$item )
                    <!-- Loop through the students data -->
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->class_name }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>
                            @if ($item->status == "Active")
                            <!-- Display a success badge if status is 'Active' -->
                            <span class="badge bg-success text-white">{{ $item->status }}</span>
                            @else
                            <!-- Display a danger badge if status is not 'Active' -->
                            <span class="badge bg-danger text-white">{{ $item->status }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($item->id)
                            <!-- Buttons for edit and delete actions -->
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
                <!-- End table body -->
            </table>
            <!-- End table -->
        </div>
        <!-- End table responsive -->
    </div>
    <!-- End of card body -->

    {{ $students->links()  }}
    <!-- Display pagination links -->

</div>

@endsection
