<?php

use App\Http\Controllers\Home;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [Home::class, 'login'])->name('login');
Route::post('/login', [Home::class, 'login_action'])->name('login_action');
Route::get('/register', [Home::class, 'register'])->name('register');
Route::post('/register', [Home::class, 'register_action'])->name('register_action');
Route::get('/logout', [Home::class, 'logout'])->name('logout');

Route::get('/book/view-book/{title}', [Home::class, 'view_book']);



//middleware group student
Route::group(['middleware' => ['student']], function () {
    Route::get('/student', [StudentController::class, 'index'])->name('student');
    Route::get('/student/book/{id}', [StudentController::class, 'view_book']);
    //route student profile
    Route::get('/student/profile', [StudentController::class, 'profile'])->name('student.profile');
    //route student save profile
    Route::post('/student/profile', [StudentController::class, 'save_profile'])->name('student.save_profile');
});
//middleware group teacher
Route::group(['middleware' => ['teacher']], function () {
    Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher');
    Route::get('/teacher/kelola-kategori', [TeacherController::class, 'kelola_kategori'])->name('teacher.kelola_kategori');
    Route::get('/teacher/kelola-buku', [TeacherController::class, 'kelola_buku'])->name('teacher.kelola_buku');
    Route::get('/teacher/kelola-siswa', [TeacherController::class, 'kelola_siswa'])->name('teacher.kelola_siswa');
    Route::get('/teacher/delete-category/{id}', [TeacherController::class, 'delete_category']);
    Route::post('/teacher/add-category', [TeacherController::class, 'add_category']);
    Route::post('/teacher/edit-category', [TeacherController::class, 'edit_category']);
    Route::get('/teacher/delete-student/{id}', [TeacherController::class, 'delete_student']);
    Route::get('/teacher/edit-student/{id}', [TeacherController::class, 'edit_student']);
    Route::post('/teacher/edit-student/', [TeacherController::class, 'save_edit_student']);

    //route view book
    Route::get('/teacher/book/{id}', [TeacherController::class, 'view_book']);
    //route delete book
    Route::get('/teacher/delete-book/{id}', [TeacherController::class, 'delete_book']);
    //route edit book
    Route::post('/teacher/edit-book', [TeacherController::class, 'save_edit_book']);
    //route add book
    Route::post('/teacher/add-book', [TeacherController::class, 'add_book']);

    //route student profile
    Route::get('/teacher/profile', [TeacherController::class, 'profile'])->name('teacher.profile');
    //route student save profile
    Route::post('/teacher/profile', [TeacherController::class, 'save_profile'])->name('teacher.save_profile');
});
