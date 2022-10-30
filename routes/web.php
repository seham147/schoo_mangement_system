<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Classroom;
use Illuminate\Support\Facades\Route;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('auth.login');
});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth'])->name('dashboard');
        Route::resource('grades',GradeController::class);
        Route::resource('Classrooms',ClassroomController::class);
        Route::resource('sections',SectionController::class);
        Route::post('deleteAll',[ClassroomController::class,'delete_all'])->name('delete_all');
        Route::get('classes/{id}',[SectionController::class,'getclasses'])->name('class1');


       Route::view('add_Parent','livewire.show_form');
       Route::resource('Teachers',TeacherController::class);
       Route::resource('Students',StudentController::class);
       Route::resource('Students',StudentController::class);
       Route::get('Get_classrooms/{id}',[StudentController::class,'Get_classrooms']);
       Route::get('Get_Sections/{id}',[StudentController::class,'Get_sections']);
       Route::post('Delete_attachment',[StudentController::class,'Delete_attachment'])->name('Delete_attachment');
       Route::get('Download_attachment/{student_name}/{file_name}',[StudentController::class,'Download_attachment']);

       Route::post('Upload_attachment',[StudentController::class,'Upload_attachment'])->name('Upload_attachment');
       Route::resource('Promotion',PromotionController::class);


    });





