<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function index(){

        $teacher = Teacher::latest()->get();

        return view('admin.teacher.get_teacher',compact('teacher'));
    }

    public function AddTeacher(){

        return view('admin.teacher.add_teacher');
    }

    public function StoreTeacher(Request $request){

        $teacher = new Teacher();
        $teacher->teacher = Str::ucfirst($request->teacher);
        $teacher->gender = $request->gender;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->address = $request->address;

        $teacher->save();

        $notification = array(
            'message' => 'Teacher Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('get.teacher')->with($notification);

    }

    public  function EditTeacher($id){
            
            $teacher = Teacher::find($id);
    
            return view('admin.teacher.edit_teacher',compact('teacher'));
    }

    public function UpdateTeacher(Request $request,$id){
        
        $teacher = Teacher::find($id);
        $teacher->teacher = Str::ucfirst($request->teacher);
        $teacher->gender = $request->gender;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->address = $request->address;

        $teacher->save();

        $notification = array(
            'message' => 'Teacher Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('get.teacher')->with($notification);

    }

    public function DeleteTeacher($id){

        $teacher = Teacher::find($id);
        $teacher->delete();

        $notification = array(
            'message' => 'Teacher Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('get.teacher')->with($notification);
    }
}
