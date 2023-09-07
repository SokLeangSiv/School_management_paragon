@extends('admin.admin_dashboard')

@section('admin')
<!-- Check if there is a success message in the session -->
@if (session('success'))
<!--  Display the success message in an alert -->
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Start of the page content -->
<div class="page-content">
    <!-- Container for the search form -->
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 col-sm-12 col-lg-4 col-xl-4">
                <!-- Search form -->
                <form class="d-flex mb-2" role="search" action="{{ route('get.class') }}">
                    <!-- Search input field -->
                    <input class="form-control me-2 border-2 border-secondary w-100" name="search" type="search" placeholder="Search" aria-label="Search" value="{{ $search }}">
                    <!-- Search submit button -->
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
                <!-- Search instructions -->
                <span class="text-light  mt-1 mb-3">Search By "Class_Name / Class Code / Teacher Name"</span>
            </div>
        </div>
    </div>
    <!-- End of the search form container -->

    <!-- Start of the card body -->
    <div class="card-body">
        <!-- Add Class button -->
        <a href="{{ route('add.class') }}">
            <button type="button" class="btn btn-primary">Add Class</button>
        </a>

        <!-- Table container -->
        <div class="table-responsive pt-3">
            <!-- Table of classes -->
            <table class="table table-dark">
                <!-- Table header row -->
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
                <!-- Table body -->
                <tbody>
                    <!-- Loop through each class and display its information in a table row -->
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
                        {{-- Display the status of the class with a badge --}}
                        <td>

                            @if ($item->status == 'Active')
                            <span class="badge bg-success text-white">{{ $item->status }}</span>
                            @else
                            <span class="badge bg-danger text-white">{{ $item->status }}</span>
                            @endif

                        </td>

                        <!-- Action buttons for editing and deleting the class -->
                        <td>
                    
                            <a href="{{ route('edit.class', $item->id) }}">
                                <button type="button" class="btn btn-warning me-2"><i class="fa-solid fa-pen-to-square"></i></button>
                            </a>

                            <!-- Delete button -->
                            <a href="{{ route('delete.class', $item->id) }}">
                                <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash fs-5 delete remove"></i></button>
                            </a>

                    </tr>
                    @endforeach
                </tbody>
                <!-- End of table body -->
            </table>
            <!-- End of the table of classes -->
        </div>
        <!-- End of the table container -->
    </div>
    <!-- End of the card body -->

</div>
<!-- End of the page content -->

<!-- Pagination links for the list of classes -->
{{ $class->links() }}
@endsection