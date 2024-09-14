<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\HasRole;
//use Illuminate\Container\Attributes\Auth;
use Spatie\Permission\Models\Role;
Route::get('/', function () {
    return view('home'); // تأكد أن لديك ملف home.blade.php في مجلد views
})->name('home');

// Register routes
Route::get('/register', [RegisteredUserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/admin', function () {
    if (Auth::user()->roles->contains('user_role', 'admin')) {
        return view('admin_dashboard'); 
    }

    return redirect('/')->with('error', 'Access Denied');
})->middleware('auth');

Route::get('/employer', function () {
    // التحقق إذا كان المستخدم لديه دور "employer"
    if (Auth::user()->roles->contains('user_role', 'employer')) {
        Route::get('/employer/jobs/create', [JobController::class, 'create'])->name('jobs.create');
        Route::post('/employer/jobs', [JobController::class, 'store']);
        Route::get('/employer/jobs', [JobController::class, 'index'])->name('jobs.index');
    }

    return redirect('/')->with('error', 'Access Denied');
})->middleware('auth');

Route::get('/candidate', function () {
    // التحقق إذا كان المستخدم لديه دور "candidate"
    if (Auth::user()->roles->contains('user_role', 'candidate')) {
        Route::get('/jobs', [JobController::class, 'index'])->name('jobs.list');
        Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');
        Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
        Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    }

    return redirect('/')->with('error', 'Access Denied');
})->middleware('auth');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth']);
Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
Route::resource('jobs',JobController::class);

Route::put('/applications/{id}', [ApplicationController::class, 'update'])->name('applications.update');

Route::post('/applications/update/{id}', [ApplicationController::class, 'update'])->name('applications.update');

