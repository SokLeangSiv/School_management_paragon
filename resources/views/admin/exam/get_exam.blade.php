@extends('admin.admin_dashboard')

@section('admin')
    <!-- Check if there is a success or error message in the session and display an alert accordingly -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Start of Page content -->
    <div class="page-content">
        <!-- Start content -->
        <div class="container">
            <!-- Start row -->
            <div class="row mb-5">
                <!-- Start col -->
                <div class="col-12 col-sm-12 col-lg-4 col-xl-4">
                    <!-- Form for searching exams by teacher name or class name -->
                    <form class="d-flex mb-2" role="search" action="{{ route('get.exam') }}">
                        <input class="form-control me-2 border-2 border-secondary" name="search" type="search"
                            placeholder="Search" aria-label="Search" value="{{ $search }}">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                    <!-- Display a hint for searching -->
                    <span class="text-light mt-5">Search By "Teacher Name / Class Name"</span>
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End content -->

        <!-- Start of Card body -->
        <div class="card-body">
            <!-- Button to add a new exam -->
            <a href="{{ route('add.exam') }}">
                <button type="button" class="btn btn-primary">Add Exam</button>
            </a>

            <!-- Start of table size-->
            <div class="table-responsive pt-3">
                <!-- Table to display the list of exams -->
                <table class="table table-dark">
                    <!-- Start of Table Head -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Course Code</th>
                            <th>Instructor</th>
                            <th>Day</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Group</th>
                            <th>Exam Type</th>
                            <th>Room</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- End of Table Head -->

                    <!-- Start of Table Body -->
                    <tbody>
                        <!-- Loop through each exam and display its details -->
                        @foreach ($examinate as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->class_name }}</td>
                                <td>{{ $item->class_code }}</td>
                                <td>{{ $item->teacher }}</td>
                                <td>{{ $item->day }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->time }}</td>
                                <td>{{ $item->group }}</td>
                                <td>{{ $item->exam_type }}</td>
                                <td>{{ $item->room }}</td>

                                <td>
                                    <!-- Buttons for editing and deleting the exam -->
                                    <a href="{{ route('edit.exam', $item->id) }}">
                                        <button type="button" class="btn btn-warning me-2"><i
                                                class="fa-solid fa-pen-to-square"></i></button>
                                    </a>
                                    <a href="{{ route('delete.exam', $item->id) }}">
                                        <button type="button" class="btn btn-danger"><i
                                                class="fa-solid fa-trash fs-5"></i></button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <!-- End of Table Body -->
                </table>
                <!-- End of table -->
            </div>
            <!-- End of table size -->
        </div>
        <!-- End of Card body -->

        <!-- Pagination links for the list of exams -->
        {{ $examinate->links() }}
    </div>
    <!-- End of Page content -->
@endsection
