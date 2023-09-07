@extends('admin.admin_dashboard')

@section('admin')


@if (session('error'))

<!-- Start Alert Message -->
<div class="alert alert-error alert-dismissible fade show" role="alert">
  <strong>{{ session('error') }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif

<style>



</style>

<!-- Start Page content -->
<div class="page-content">
  <!-- Start of row -->
  <div class="row">
    <!-- Start of col -->
    <div class="col-lg-6 col-xl-6  stretch-card ">
      <!-- Start of card -->
      <div class="card">
        <a href="{{ route('get.class') }}">
          <!-- start of card -->
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <!-- Card tittle -->
              <h6 class="card-title mb-0">Classes</h6>
            </div>
            <!-- Start of table repsonsive -->
            <div class="table-responsive">
              <!-- Start of table -->
              <table class="table table-hover mb-0">
                <!-- Start of table head -->
                <thead>
                  <tr>
                    <th class="pt-0">#</th>
                    <th class="pt-0">Class Name</th>
                    <th class="pt-0">Class Code</th>
                    <th class="pt-0">Teacher</th>
                    <th class="pt-0">Status</th>
                  </tr>
                </thead>
                <!-- Start of table body -->
                <tbody>

                  @foreach ($class as $key => $item)

                  <tr>

                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->class_name }}</td>
                    <td>{{ $item->class_code }}</td>
                    <td>{{ $item->teacher }}</td>
                    <td>

                      @if ($item->status == 'Active')

                      <label class="badge bg-success">{{ $item->status }}</label>

                      @else

                      <label class="badge bg-danger">{{ $item->status }}</label>

                      @endif

                    </td>
                  </tr>

                  @endforeach


                </tbody>
              </table>
            </div>
          </div>
        </a>
      </div>
    </div>
    <!-- end of col -->

    <!-- start of col card -->
    <div class="col-lg-6 col-xl-6 stretch-card">
      <!-- Start of card -->
      <div class="card">
        <a href="{{ route('get.teacher') }}">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <!-- card title -->
              <h6 class="card-title mb-0">Teacher</h6>

            </div>
            <!-- start of table resposnsive -->
            <div class="table-responsive">
              <table class="table table-hover mb-0">
                <!-- Start of tablehead -->
                <thead>
                  <tr>
                    <th class="pt-0">#</th>
                    <th class="pt-0">Teacher Name</th>
                    <th class="pt-0">Gender</th>
                    <th class="pt-0">Phone Number</th>
                    <th class="pt-0">Email</th>
                  </tr>
                </thead>
                <!-- start of table body -->
                <tbody>

                  @foreach ($teacher as $key => $item)

                  <tr>

                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->teacher }}</td>
                    <td>{{ $item->gender }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->email }}</td>


                  </tr>

                  @endforeach


                </tbody>
              </table>
            </div>
          </div>

        </a>
      </div>
    </div>
    <!-- end of col card -->

    <!-- start of col card -->
    <div class="col-lg-6 col-xl-6   mt-4 stretch-card">
      <div class="card">
        <a href="{{ route('get.exam') }}">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <!-- card title -->
              <h6 class="card-title mb-0">Exam</h6>

            </div>
            <!-- start of table resposnsive -->
            <div class="table-responsive">
              <!-- Start of table -->
              <table class="table table-hover mb-0">
                <!-- start of table head -->
                <thead>
                  <tr>
                    <th class="pt-0">#</th>
                    <th class="pt-0">Class Name</th>
                    <th class="pt-0">Group</th>
                    <th class="pt-0">Exam Type</th>
                    <th class="pt-0">Room</th>

                  </tr>
                </thead>
                <!-- start of table body -->
                <tbody>

                  @foreach ($exam as $key => $item)

                  <tr>

                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->class_name }}</td>
                    <td>{{ $item->group }}</td>
                    <td>{{ $item->exam_type }}</td>
                    <td>{{ $item->room }}</td>

                  </tr>

                  @endforeach


                </tbody>
              </table>
            </div>
          </div>
        </a>
      </div>
    </div>
    <!-- end of col card -->

    <!-- start of col card -->
    <div class="col-lg-5 col-xl-5  mt-4 stretch-card">
      <!-- start of card -->
      <div class="card">
        <a href="{{ route('get.student') }}">
          <!-- start of card -->
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-2">
              <!-- card title -->
              <h6 class="card-title mb-0">Student</h6>

            </div>
            <!-- start of table resposnsive -->
            <div class="table-responsive">
              <!-- Start of table -->
              <table class="table table-hover mb-0">
                <!-- start of table head -->
                <thead>
                  <tr>
                    <th class="pt-0">#</th>
                    <th class="pt-0">Student Name</th>
                    <th class="pt-0">Class Name</th>
                    <th class="pt-0">Gender</th>
                    <th class="pt-0">Status</th>

                  </tr>
                </thead>
                <!-- start of table body -->
                <tbody>

                  @foreach ($student as $key => $item)

                  <tr>

                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->class_name }}</td>
                    <td>{{ $item->gender }}</td>
                    <td>

                      @if ($item->status == 'Active')

                      <label class="badge bg-success">{{ $item->status }}</label>

                      @else

                      <label class="badge bg-danger">{{ $item->status }}</label>

                      @endif

                    </td>

                  </tr>

                  @endforeach


                </tbody>
              </table>
            </div>
          </div>
        </a>
      </div>
    </div>
    <!-- end of col card -->

  </div>
  <!-- End of row -->
</div>
<!-- End Page content -->
@endsection