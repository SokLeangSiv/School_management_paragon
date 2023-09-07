<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\stu_class;
use Carbon\Carbon;

class ClassController extends Controller
{
    // Display a paginated list of classes based on search criteria
    public function index(Request $request){
        // Get the search query from the request
        $search = $request->search;

        // Query the database to retrieve classes based on the search query
        $class = stu_class::when($search, function ($query) use ($search){
            $query->where('class_name','like','%' . $search . '%')
                  ->orWhere('class_code', 'like', '%' . $search . '%')
                  ->orWhere('teacher', 'like', '%' . $search . '%');
        })->paginate(5);

        // Return the view with the retrieved classes and search query
        return view('admin.class.GetClass',compact('class','search'));
    }

    // Display the form for adding a new class
    public function AddClass(){
        // Return the view for adding a new class
        return view('admin.class.Add_Class');
    }

    // Store a new class in the database
    public function StoreClass(Request $request){
        // Validate the incoming request data
        $request->validate([
            'class_name' => 'required',
            'class_code' => 'required|unique:stu_classes,class_code',
            'teacher' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
            'day' => 'required',
            'type' => 'required',
            'status' => 'required',
        ]);

        // Create a new class instance and populate it with the request data
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

        // Set a success notification and redirect to the class list
        $notification = array(
            'message' => 'Class Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('get.class')->with($notification);
    }

    // Display the form for editing a class
    public function EditClass($id){
        // Find and retrieve the class to be edited
        $class = stu_class::find($id);

        // Return the view for editing the class
        return view('admin.class.Edit_Class',compact('class'));
    }

    // Update an existing class in the database
    public function UpdateClass(Request $request, $id){
        // Find and retrieve the class to be updated
        $class = stu_class::find($id); 

        // Update the class properties with the incoming request data
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

        // Set a success notification and redirect to the class list
        $notification = array(
            'message' => 'Class Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('get.class')->with($notification);
    }

    // Delete a class from the database
    public function DeleteClass($id){
        // Find and delete the class by its ID
        $class = stu_class::find($id);
        $class->delete();
        // Set a success notification and redirect to the class list
        $notification = array(
            'message' => 'Class Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('get.class')->with($notification);
    }
}