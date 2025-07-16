<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Auth\SigninUserContoroller;

Route::prefix('student')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('student.dashboard');

    Route::post('logout', [SigninUserContoroller::class, 'destroy'])->name('logout.student');
});
