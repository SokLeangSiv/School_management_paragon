<?php

namespace App\Http\Controllers;
use App\Models\Exam;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\stu_class;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class admincontroller extends Controller
{
    public function admin(){

        $class= stu_class::latest()->limit(3)->get();

        $teacher = Teacher::latest()->limit(3)->get();
        
        $student = DB::table('students')
                ->join('stu_classes', 'students.class_id', '=', 'stu_classes.id')
                ->select('students.*', 'stu_classes.*')->limit(3)->get();

        $exam = DB::table('exams')
        ->join('stu_classes', 'exams.class_id', '=', 'stu_classes.id')
        ->join('teachers', 'exams.teacher_id', '=', 'teachers.id')
        ->select('exams.*', 'stu_classes.*', 'teachers.*')->limit(3)->get();

        return view('admin.index_admin', compact('class','teacher','student','exam'));
    }

    public function Userlogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
