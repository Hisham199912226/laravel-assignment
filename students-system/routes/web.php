<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(['middleware' => ['auth','prevent-back-history']], function(){
    Route::group(['middleware' => 'is_admin'], function(){
        Route::get('/users', [UserController::class, 'users'])->name('users');
        Route::put('/users/promote/{user}',[UserController::class, 'promoteUser']);
    });
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/students', [StudentController::class, 'getStudents'])->name('students');
    Route::get('/student/create', [StudentController::class, 'create'])->name('create');
    Route::post('/student/create', [StudentController::class, 'createStudent'])->name('createStudent');
    Route::get('/student/update/{id}', [StudentController::class, 'update'])->name('update');
    Route::put('/student/update/{id}', [StudentController::class, 'updateStudent'])->name('updateStudent');
    Route::get('/student/delete/{id}', [StudentController::class, 'delete'])->name('delete');
    Route::delete('/student/delete/{id}', [StudentController::class, 'deleteStudent'])->name('deleteStudent');
});


Route::get('/', function() {
    return redirect(route('home'));
});

Route::group(['middleware' => ['RedirectIfAuthenticated','prevent-back-history']], function(){

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('registerPost');
    
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');