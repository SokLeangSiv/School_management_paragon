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


        <div class="container">
            <div class="row mb-5">
                <div class="col-12 col-sm-12 col-lg-4 col-xl-4">
                    <form class="d-flex mb-2" role="search" action="{{ route('get.exam') }}">
                        <input class="form-control me-2 border-2 border-secondary" name="search" type="search"
                            placeholder="Search" aria-label="Search" value="{{ $search }}">
                        <button class="btn btn-outline-primary" type="submit">Search</button>

                    </form>
                    <span class="text-light mt-5">Search By "Name / Class Name"</span>
                </div>

                
            </div>
        </div>



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
                            <th>Instrutor</th>
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
                </table>
            </div>
        </div>



        {{ $examinate->links() }}
    </div>

@endsection
