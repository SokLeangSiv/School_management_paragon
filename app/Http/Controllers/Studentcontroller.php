<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\stu_class;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class Studentcontroller extends Controller
{
    public function index(Request $request){

        $search = $request->search;

    $students = DB::table('students')
    ->join('stu_classes', 'students.class_id', '=', 'stu_classes.id')
    ->select('students.*', 'stu_classes.class_name')
    ->when($search, function ($query) use ($search) {
        $query->where('stu_classes.class_name', 'like', '%' . $search . '%')
            ->orWhere('students.name', 'like', '%' . $search . '%');
    })
    ->paginate(5);

        return view('admin.student.get_student',compact('students','search'));
    }

    public function AddStudent(){

        $class = stu_class::latest()->get();

        return view('admin.student.add_student',compact('class'));

    } 

    public function StoreStudent(Request $request){

        $request->validate([

            'name' => 'required',
            'class_id' => 'required',
            'gender' => 'required',
            'status' => 'required',
           
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->class_id = $request->class_id;
        $student->gender = $request->gender;
        $student->status = $request->status;
        $student->save();

        $notification = array(
            'message' => 'Student Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('get.student')->with($notification);
    }

    public function EditStudent($id){

        $student = Student::find($id);
        $class  =   stu_class::latest()->get();

        return view('admin.student.edit_student',compact('student','class'));
    }

    public function UpdateStudent(Request $request, $id){

        $student = Student::find($id);
        $student->name = $request->name;
        $student->class_id = $request->class_id;
        $student->gender= $request->gender;
        $student->status = $request->status;
        $student->updated_at = Carbon::now();
        $student->save();


        $notification = array(
            'message' => 'Student Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('get.student')->with($notification);
    }

    public function DeleteStudent($id){

        $student = Student::find($id);
        $student->delete();

        $notification = array(
            'message' => 'Student Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('get.student')->with($notification);
    }
}
