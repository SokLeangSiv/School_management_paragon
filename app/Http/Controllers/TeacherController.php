<?php

namespace App\Http\Controllers;
use App\Models\Teacher;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function index(Request $request){

        $search = $request->search;

        $teacher = Teacher::when($search, function ($query) use ($search){
            $query->where('teacher','like','%' . $search . '%')
                  ->orWhere('phone', 'like', '%' . $search . '%');
        })->paginate(5);


        return view('admin.teacher.get_teacher',compact('teacher','search'));
    }

    public function AddTeacher(){

        return view('admin.teacher.add_teacher');
    }

    public function StoreTeacher(Request $request){

        $request->validate([

            'teacher' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            
        ]);

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
