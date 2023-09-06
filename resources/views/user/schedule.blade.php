@extends('user.dashboard')

@section('user')
    {{-- search --}}

    <div class="container">
        <div class="row mb-5 mt-5">
            <div class="col-12 col-sm-12 col-lg-4 col-xl-4 ">
                <form class="d-flex mb-2" role="search" action="{{ route('schedule') }}">
                    <input class="form-control me-2 border-2 border-secondary" name="search" type="search"
                        placeholder="Search" aria-label="Search" value="{{ $search }}">
                    <button class="btn btn-outline-primary" type="submit">Search</button>

                </form>
                <span class="text-light ms-3 mt-1">Search By "Class Name /Teacher Name / Class Code"</span>
            </div>


        </div>
    </div>

    {{-- search --}}


    {{-- Table header row --}}

    <table class="table mb-5">
        <thead>
            <tr>

                {{-- Column headers --}}

                <th scope="col">No.</th>
                <th scope="col">Code</th>
                <th scope="col">Course Title</th>
                <th scope="col">Instrutor</th>
                <th scope="col">Day</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Group</th>
                <th scope="col">Type</th>
                <th scope="col">Room</th>
            </tr>
          </thead>

        {{-- Table body with grouped rows --}}

        <tbody class="table-group-divider">

             {{-- Loop through each item in the schedule --}}

            @foreach ($schedule as $item)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $item->class_code }}</td>
                    <td>{{ $item->class_name }}</td>
                    <td>{{ $item->teacher }}</td>
                    <td>{{ $item->day }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->time }}</td>
                    <td>{{ $item->group }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->room }}</td>



                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- end table --}}

    {{ $schedule->links() }}
@endsection
