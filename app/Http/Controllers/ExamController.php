<?php

namespace App\Http\Controllers;
use App\Models\Exam;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\stu_class;
use App\Models\Teacher;

class ExamController extends Controller
{

    public function index (){

       
        $exam = Exam::latest()->get();

        return view('admin.exam.get_exam',compact('exam'));
    }

    public function AddExam(){

            $teacher = Teacher::latest()->get();
            $class = stu_class::latest()->get();
            $exam = Exam::latest()->get();
            return view('admin.exam.add_exam',compact('exam','class','teacher'));
    
    }

    public function StoreExam(Request $request)
    {
        $class = $request->class_id;
        

        $exam = new Exam();
        $exam->class_id = $class;
        $exam->teacher_id = $request->teacher_id;
        $exam->day = $request->day;
        $exam->date = $request->date;
        $exam->time = $request->time;
        $exam->group = $request->group;
        $exam->exam_type = $request->exam_type;
        $exam->room = $request->room;

        $exam->created_at = Carbon::now();

        $exam->save();

        $notification = array(
            'message' => 'Exam Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('get.exam')->with($notification);

    }

    public function EditExam($id){

        $exam = Exam::find($id);
        $teacher = Teacher::latest()->get();
        $class = stu_class::latest()->get();

        return view('admin.exam.edit_exam',compact('exam','class','teacher'));
    }

    public function UpdateExam(Request $request, $id){

        $exam = Exam::find($id);
        $exam->class_id = $request->class_id;
        $exam->teacher_id = $request->teacher_id;
        $exam->day = $request->day;
        $exam->date = $request->date;
        $exam->time = $request->time;
        $exam->group = $request->group;
        $exam->exam_type = $request->exam_type;
        $exam->room = $request->room;

        $exam->created_at = Carbon::now();

        $exam->save();

        $notification = array(
            'message' => 'Exam Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('get.exam')->with($notification);

    }

    public function DeleteExam($id){

        $exam = Exam::find($id);
        $exam->delete();

        $notification = array(
            'message' => 'Exam Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('get.exam')->with($notification);
    }

}
