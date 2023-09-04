<?php

namespace App\Http\Controllers;
use App\Models\Exam;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\stu_class;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{

    public function index (Request $request){

        //search exam
        $search = $request->search;

        $examinate = DB::table('exams')
                    ->join('stu_classes', 'exams.class_id', '=', 'stu_classes.id')
                    ->join('teachers', 'exams.teacher_id', '=', 'teachers.id')
                    ->select('exams.*', 'stu_classes.class_name','stu_classes.class_code','teachers.teacher')
                    ->when($search, function($query) use ($search){

                        $query->where('stu_classes.class_name', 'like', '%' . $search . '%')
                        ->orWhere('teachers.teacher', 'like', '%' . $search . '%');

                    })
                    ->paginate(5);


        return view('admin.exam.get_exam',compact('examinate','search'));
    }

    public function AddExam(){

            $teacher = Teacher::latest()->get();
            $class = stu_class::latest()->get();
            $exam = Exam::latest()->get();
            return view('admin.exam.add_exam',compact('exam','class','teacher'));
    
    }

    public function StoreExam(Request $request)
    {

        $request->validate([
            'class_id' => 'required',
            'teacher_id' => 'required',
            'day' => 'required',
            'date' => 'required',
            'time' => 'required',
            'group' => 'required',
            'exam_type' => 'required',
            'room' => 'required',
        ]);


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
