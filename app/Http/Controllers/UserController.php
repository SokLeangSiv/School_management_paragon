<?php

namespace App\Http\Controllers;
use App\Models\Exam;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\stu_class;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public  function index(){

        
        return view('user.index_dashboard');
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('user.dashboard',compact('user'));

    }

    public function Logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function Gpa(){

        return view('user.gpa_calculator');
    }

    public function Schedule(Request $request)
    {
        $search = $request->search;
    
        // $sche = stu_class::when($search, function ($query) use ($search) {
        //     $query->where('class_name', 'like', '%' . $search . '%');
        // })->paginate(2);
    
        $schedule = DB::table('exams')
            ->join('stu_classes', 'exams.class_id', '=', 'stu_classes.id')
            ->join('teachers', 'exams.teacher_id', '=', 'teachers.id')
            ->select('exams.*', 'stu_classes.*', 'teachers.*')
            ->when($search, function ($query) use ($search) {
                $query->where('stu_classes.class_name', 'like', '%' . $search . '%')
                    ->orWhere('teachers.teacher', 'like', '%' . $search . '%')
                    ->orWhere('stu_classes.class_code', 'like', '%' . $search . '%');

            })
            ->paginate(3);
    
        return view('user.schedule', compact('search'))->with('schedule', $schedule);
    }
    

    public function GetProfile(){

        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('user.profile.User_profile', compact('profileData'));
    }


    public function StoreProfile(Request $request){

        $id = Auth::user()->id;
        $user = User::find($id);

        $request->validate([
            'password' => 'nullable',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        
        if($request->file('photo')){

            $file = $request->file('photo');
            @unlink(public_path('upload/img/user/'.$user->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/img/user/'),$filename);
            $user->photo = $filename;
        }

        $user->save();


        return redirect()->back()->with('success','Profile Updated Successfully');

    }

    public function GetAdminProfile(){

        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.profile.Admin_profile', compact('profileData'));
    }

    public function StoreAdminProfile(Request $request){
        $request->validate([
            'password' => 'nullable',
        ]);

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password)

        ]);

        $id = Auth::user()->id;
        $admin = User::find($id);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        
        if($request->file('photo')){

            $file = $request->file('photo');
            @unlink(public_path('upload/img/admin/'.$admin->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/img/admin/'),$filename);
            $admin->photo = $filename;
        }

        $admin->save();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}
