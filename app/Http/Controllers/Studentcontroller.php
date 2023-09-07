<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\stu_class;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    // Display a paginated list of students based on search criteria
    public function index(Request $request){

        // Get the search query from the request
        $search = $request->search;

        // Query the database to retrieve students with associated class names
        $students = DB::table('students')
        ->join('stu_classes', 'students.class_id', '=', 'stu_classes.id')
        ->select('students.*', 'stu_classes.class_name')
        ->when($search, function ($query) use ($search) {
            $query->where('stu_classes.class_name', 'like', '%' . $search . '%')
                ->orWhere('students.name', 'like', '%' . $search . '%');
        })
        ->paginate(5);

        // Return the view with the retrieved students and search query
        return view('admin.student.get_student',compact('students','search'));
    }

    // Display the form for adding a new student
    public function AddStudent(){

        // Retrieve the latest classes for dropdown
        $class = stu_class::latest()->get();

        // Return the view for adding a new student with class data
        return view('admin.student.add_student',compact('class'));
    }

    // Store a new student in the database
    public function StoreStudent(Request $request){

        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
            'class_id' => 'required',
            'gender' => 'required',
            'status' => 'required',
        ]);

        // Create a new Student instance and populate it with the request data
        $student = new Student();
        $student->name = $request->name;
        $student->class_id = $request->class_id;
        $student->gender = $request->gender;
        $student->status = $request->status;
        $student->save();

        // Set a success notification and redirect to the student list
        $notification = array(
            'message' => 'Student Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('get.student')->with($notification);
    }

    // Display the form for editing a student
    public function EditStudent($id){

        // Find and retrieve the student to be edited
        $student = Student::find($id);

        // Retrieve the latest classes for dropdown
        $class  = stu_class::latest()->get();

        // Return the view for editing the student with class data
        return view('admin.student.edit_student',compact('student','class'));
    }

    // Update an existing student in the database
    public function UpdateStudent(Request $request, $id){

        // Find and retrieve the student to be updated
        $student = Student::find($id);
        $student->name = $request->name;
        $student->class_id = $request->class_id;
        $student->gender= $request->gender;
        $student->status = $request->status;
        $student->updated_at = Carbon::now();
        $student->save();

        // Set a success notification and redirect to the student list
        $notification = array(
            'message' => 'Student Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('get.student')->with($notification);
    }

    // Delete a student from the database
    public function DeleteStudent($id){

        // Find and delete the student by its ID
        $student = Student::find($id);
        $student->delete();

        // Set a success notification and redirect to the student list
        $notification = array(
            'message' => 'Student Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('get.student')->with($notification);
    }
}