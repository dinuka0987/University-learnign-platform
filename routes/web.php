<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admincontroller;

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); 
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard',[UserController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware ('admin')->group(function(){
    
Route:: get ('/student_details', [AdminController:: class, 'studentDetails' ])->name('admin.student');
Route:: get('/add_course',[AdminController:: class, 'addCourse'])->name('admin.addcourse');
Route:: post('/add_course',[AdminController:: class, 'postAddCourse'])->name('admin.postaddcourse');
Route:: get('/view_course',[AdminController:: class, 'viewCourse'])->name('admin.viewcourse');
});

require __DIR__.'/auth.php';