<?php

namespace App\Http\Controllers;
use App\Models\stu_class;
use Illuminate\Support\Str;
use App\Models\StuClass;
use Illuminate\Http\Request;
use Carbon\Carbon;
class ClassController extends Controller
{
    public function index(){

        $class = stu_class::latest()->get();

        return view('admin.class.GetClass',compact('class'));

    }

    public function AddClass(){
        

        return view('admin.class.Add_Class');

    }

    public function StoreClass(Request $request){

        $class = new stu_class();
        $class->class_name = Str::ucfirst($request->class_name);
        $class->class_code =  Str::upper($request->class_code);
        $class->teacher =  Str::ucfirst($request->teacher);
        $class->start_at = $request->start_at;
        $class->end_at =  $request->end_at;
        $class->day =  $request->day;
        $class->type =  $request->type;
        $class->color =  rand(1, 5);
        $class->status = $request->status;
        $class->save();

        $notification = array(
            'message' => 'Class Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('get.class')->with($notification);
        
    }


    public function EditClass($id){

        $class = stu_class::find($id);

        return view('admin.class.Edit_Class',compact('class'));

    }

    public function UpdateClass(Request $request, $id){

        $class = stu_class::find($id); 
        $class->class_name = Str::ucfirst($request->class_name);
        $class->class_code =  Str::upper($request->class_code);
        $class->teacher =  Str::ucfirst($request->teacher);
        $class->start_at = $request->start_at;
        $class->end_at =  $request->end_at;
        $class->day =  $request->day;
        $class->type =  $request->type;
        $class->status = $request->status;
        $class->updated_at =Carbon::now();
        $class->save();

        $notification = array(
            'message' => 'Class Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('get.class')->with($notification);

    }

    public function DeleteClass($id){

        $class = stu_class::find($id);
        $class->delete();

        $notification = array(
            'message' => 'Class Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('get.class')->with($notification);
    }
}
