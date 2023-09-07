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
        // Retrieve the latest 3 student classes from the database
        $class = stu_class::latest()->limit(3)->get();
    
        // Retrieve the latest 3 teachers from the database
        $teacher = Teacher::latest()->limit(3)->get();
        
        // Retrieve information about students and their associated classes (limit to 3)
        $student = DB::table('students')
            ->join('stu_classes', 'students.class_id', '=', 'stu_classes.id')
            ->select('students.*', 'stu_classes.*')->limit(3)->get();
    
        // Retrieve information about exams, associated classes, and teachers (limit to 3)
        $exam = DB::table('exams')
            ->join('stu_classes', 'exams.class_id', '=', 'stu_classes.id')
            ->join('teachers', 'exams.teacher_id', '=', 'teachers.id')
            ->select('exams.*', 'stu_classes.*', 'teachers.*')->limit(3)->get();
    
        // Pass the retrieved data to the admin view
        return view('admin.index_admin', compact('class', 'teacher', 'student', 'exam'));
    }
    
    public function Userlogout(Request $request)
    {
        // Logout the user from the 'web' guard
        Auth::guard('web')->logout();
    
        // Invalidate the user's session
        $request->session()->invalidate();
    
        // Regenerate a new CSRF token for security
        $request->session()->regenerateToken();
    
        // Redirect the user to the homepage
        return redirect('/');
    }
}
