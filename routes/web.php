<?php

use App\Http\Controllers\Auth\SignupUserController;
use App\Http\Controllers\Auth\SigninUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.signin');
});
//default route to login page
// Login
Route::post('/custom-login', [SigninUserController::class, 'store'])->name('login.submit');
// Dashboards
Route::get('/admin/dashboard', function () {
    return view('dashboard.admin.dashboard'); // ✅ points to correct file
Route::post('/admin/logout', [AdminDashboardController::class, 'logout'])->name('admin.logout');
})->name('admin.dashboard');
Route::get('/student/dashboard', function () {
    return view('dashboard.student.dashboard'); // ✅ matches: resources/views/dashboard/student/dashboard.blade.php
})->name('student.dashboard');




Route::prefix('register')->group(function () {
    Route::controller(App\Http\Controllers\Auth\SignupUserController::class)->group(function () {
        Route::get('/student', 'index')->name('register.student');
        Route::post('/student',  'store')->name('register.student.submit');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/student.php';
require __DIR__ . '/staff.php';
