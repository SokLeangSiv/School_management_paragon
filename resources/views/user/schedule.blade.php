@extends('user.dashboard')

@section('user')


<nav class="navbar z-50 mt-5 mb-5">
  <div class="container-fluid">
    <form class="d-flex" role="search" action="{{ route('schedule') }}">
      <input class="form-control me-2 border-2 border-secondary" name="search" type="search" placeholder="Search" aria-label="Search" value="{{ $search }}">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>



<table class="table mb-5" >
    <thead>
      <tr>
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
    <tbody class="table-group-divider">
        {{-- @php
            $classes = App\Models\stu_class::where('id', $exams->class_id)->first();
        @endphp
        
        @php
            $teacher = App\Models\Teacher::where('id', $exams->teacher_id)->first();
        @endphp --}}

        @foreach ($schedule  as $item )

           
                
            
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

  {{ $schedule->links() }}

@endsection

