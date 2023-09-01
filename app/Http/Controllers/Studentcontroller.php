<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\stu_class;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Studentcontroller extends Controller
{
    public function index(){
        $student = Student::latest()->get();
        $class = stu_class::latest()->get();
        return view('admin.student.get_student',compact('student', 'class'));
    }

    public function AddStudent(){

        $class = stu_class::latest()->get();

        return view('admin.student.add_student',compact('class'));

    } 

    public function StoreStudent(Request $request){

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
