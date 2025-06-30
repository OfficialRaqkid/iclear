<?php

use App\Http\Controllers\Auth\SignupUserController;
use App\Http\Controllers\Auth\SigninUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.signin');
});
//define the routes for login and registration
    Route::post('/login/student', [SigninUserController::class, 'store'])->name('login.student.submit');
    Route::get('/student/dashboard', [DashboardController::class, 'index'])->name('student.dashboard');


Route::prefix('register')->group(function () {
    Route::controller(App\Http\Controllers\Auth\SignupUserController::class)->group(function () {
        Route::get('/student', 'index')->name('register.student');
        Route::post('/student',  'store')->name('register.student.submit');
    });
});


// Route::middleware(['student'])->group(function () {
//     Route::get('/student/dashboard', [DashboardController::class, 'index'])->name('student.dashboard');
// });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/student.php';
require __DIR__ . '/staff.php';
