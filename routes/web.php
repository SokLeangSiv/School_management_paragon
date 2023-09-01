<?php
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Role;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\Studentcontroller;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\user;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth','role:user'])->group(function(){

    Route::controller(UserController::class)->group(function(){

        Route::get('/user' , 'index')->name('get.dashboard');

        Route::get('/dashboard', 'UserProfile')->name('dashboard');

        Route::get('/dashboard/gpa', 'Gpa')->name('gpa');

        Route::get('/dashboard/schedule', 'Schedule')->name('schedule');

        Route::get('/profile/get' , 'GetProfile')->name('get.profile');

        Route::post('/profile/store' , 'StoreProfile')->name('store.user.profile');

        Route::get('/logout' , 'Logout')->name('user.logout');

        // Route::get('/logout' , 'Logout')->name('user.logout');

    });

});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard',[admincontroller::class,'admin'])->name('admin.dashboard');

    Route::get('/admin/delete',[admincontroller::class,'Userlogout'])->name('admin.logout');


    Route::controller(ClassController::class)->group(function(){

        Route::get('admin/class', 'index')->name('get.class');

        Route::get('admin/class/add', 'AddClass')->name('add.class');

        Route::post('admin/class/store', 'StoreClass')->name('store.class');

        Route::get('admin/class/edit/{id}', 'EditClass')->name('edit.class');

        Route::post('admin/class/update/{id}', 'UpdateClass')->name('update.class');

        Route::get('admin/class/delete/{id}', 'DeleteClass')->name('delete.class');
    });

    Route::controller(Studentcontroller::class)->group(function(){

        Route::get('admin/student', 'index')->name('get.student');

        Route::get('admin/student/get', 'AddStudent')->name('add.student');

        Route::post('admin/student/store', 'StoreStudent')->name('store.student');

        Route::get('admin/student/edit/{id}', 'EditStudent')->name('edit.student');

        Route::post('admin/student/update/{id}', 'UpdateStudent')->name('update.student');

        Route::get('admin/student/delete/{id}', 'DeleteStudent')->name('delete.student');
    });

    Route::controller(ExamController::class)->group(function(){

        Route::get('admin/exam','index')->name('get.exam');

        Route::get('admin/exam/add','AddExam')->name('add.exam');

        Route::post('admin/exam/store','StoreExam')->name('store.exam');

        Route::get('admin/exam/edit/{id}','EditExam')->name('edit.exam');

        Route::post('admin/exam/update/{id}','UpdateExam')->name('update.exam');

        Route::get('admin/exam/delete/{id}','DeleteExam')->name('delete.exam');
    });

    Route::controller(TeacherController::class)->group(function(){

        Route::get('admin/teacher', 'index')->name('get.teacher');

        Route::get('admin/teacher/add', 'AddTeacher')->name('add.teacher');

        Route::post('admin/teacher/store', 'StoreTeacher')->name('store.teacher');

        Route::get('admin/teacher/edit/{id}', 'EditTeacher')->name('edit.teacher');

        Route::post('admin/teacher/update/{id}', 'UpdateTeacher')->name('update.teacher');

        Route::get('admin/teacher/delete/{id}', 'DeleteTeacher')->name('delete.teacher');

    });

    Route::controller(UserController::class)->group(function(){

        Route::get('admin/user/profile', 'GetAdminProfile')->name('get.admin.profile');

        Route::post('admin/user/profile/store', 'StoreAdminProfile')->name('store.admin.profile');

       

    });

    
});



require __DIR__.'/auth.php';
