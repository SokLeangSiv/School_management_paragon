@extends('user.dashboard')

@section('user')

<div class="container-fluid fw-bolder">
  {{-- Heading row --}}
  <div class="row">
    <div class="col">
      <h2 class="fw-bolder text-center mt-3">GPA Calculator</h2>
    </div>
  </div>

  {{-- Instructions row --}}
  <div class="row">
    <div class="col">
      <span class="d-flex justify-content-center">By entering the expected grade for each of your courses, you may calculate your cumulative GPA after this semester.</span>    
    </div>
  </div>

  {{-- Add course button row --}}
  <div class="row">
    <div class="col">
      <button id="add-button" class="btn btn-outline-primary mt-3 fw-bolder">Add Course</button>
    </div>
  </div>

  {{-- Table row --}}
  <div class="row my-4">
    <div class="col">
      <table class="table" id="courses">
        {{-- Table header --}}
        <thead class="table">
          <tr class="table-secondary">
            <th scope="col">Course Name</th>
            <th scope="col">Grade</th>
            <th scope="col">Credit</th>
            <th></th>
          </tr>
        </thead>

        {{-- Table body --}}
        <tbody></tbody>
      </table>
    </div>

    {{-- GPA summary row --}}
    <div class="row mt-5">
      <div class="col mt-5">
        <table class="table w-50 "> 
          <tbody>
            {{-- Attempted credits row --}}
            <tr >
              <th scope="row">Attempted Credits</th>
              <td><span id="attempted-credits">0</span></td>
            </tr>

            {{-- Completed credits row --}}
            <tr class="">
              <th scope="row">Completed Credits</th>
              <td><span id="completed-credits">0</span></td>
            </tr>

            {{-- GPA row --}}
            <tr class="fw-bolder">
              <th scope="row">GPA</th>
              <td><span id="gpa">0.00</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

 {{-- footer --}}
  <div class="container-fluid bottom">
    <footer>
      <hr>
      <span class="d-flex justify-content-center text-center ">
        All rights reserved. Copyright © 2023 Oaragon International University Phnom Penh - Cambodia
      </span>          
    </footer>
  </div>

  {{-- footer --}}


@endsection