<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.dashboard');
    }

   public function logout(Request $request)
{
    Auth::guard('admin')->logout(); // Use the admin guard

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('success', 'Logged out successfully.');
}
}
