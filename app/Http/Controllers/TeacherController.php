<?php

namespace App\Http\Controllers;
use App\Models\Teacher;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    // Display a paginated list of teachers based on search criteria
    public function index(Request $request){

        // Get the search query from the request
        $search = $request->search;

        // Query the database to retrieve teachers based on search criteria
        $teacher = Teacher::when($search, function ($query) use ($search){
            $query->where('teacher','like','%' . $search . '%')
                  ->orWhere('phone', 'like', '%' . $search . '%');
        })->paginate(5);

        // Return the view with the retrieved teachers and search query
        return view('admin.teacher.get_teacher',compact('teacher','search'));
    }

    // Display the form for adding a new teacher
    public function AddTeacher(){

        return view('admin.teacher.add_teacher');
    }

    // Store a new teacher in the database
    public function StoreTeacher(Request $request){

        // Validate the incoming request data
        $request->validate([
            'teacher' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        // Create a new Teacher instance and populate it with the request data
        $teacher = new Teacher();
        $teacher->teacher = Str::ucfirst($request->teacher);
        $teacher->gender = $request->gender;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->address = $request->address;

        $teacher->save();

        // Set a success notification and redirect to the teacher list
        $notification = array(
            'message' => 'Teacher Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('get.teacher')->with($notification);
    }

    // Display the form for editing a teacher
    public  function EditTeacher($id){
            
        // Find and retrieve the teacher to be edited
        $teacher = Teacher::find($id);

        // Return the view for editing the teacher
        return view('admin.teacher.edit_teacher',compact('teacher'));
    }

    // Update an existing teacher in the database
    public function UpdateTeacher(Request $request,$id){

        // Validate the incoming request data
        $request->validate([
            'teacher' => 'required'
        ]);

        // Find and retrieve the teacher to be updated
        $teacher = Teacher::find($id);
        $teacher->teacher = Str::ucfirst($request->teacher);
        $teacher->gender = $request->gender;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->address = $request->address;

        $teacher->save();

        // Set a success notification and redirect to the teacher list
        $notification = array(
            'message' => 'Teacher Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('get.teacher')->with($notification);
    }

    // Delete a teacher from the database
    public function DeleteTeacher($id){

        // Find and delete the teacher by its ID
        $teacher = Teacher::find($id);
        $teacher->delete();

        // Set a success notification and redirect to the teacher list
        $notification = array(
            'message' => 'Teacher Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('get.teacher')->with($notification);
    }
}