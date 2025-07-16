<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.signin');
});

Route::prefix('login')->group(function () {
    Route::controller(App\Http\Controllers\Auth\SigninUserContoroller::class)->group(function () {
        Route::get('/student', 'index')->name('login.student');
        Route::post('/student',  'store')->name('login.student.submit');
    });
});

Route::prefix('register')->group(function () {
    Route::controller(App\Http\Controllers\Auth\SignupUserContoroller::class)->group(function () {
        Route::get('/student', 'index')->name('register.student');
        Route::post('/student',  'store')->name('register.student.submit');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard.student.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/student.php';
require __DIR__ . '/staff.php';
