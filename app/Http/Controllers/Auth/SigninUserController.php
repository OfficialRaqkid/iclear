<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SigninUserController extends Controller
{
public function store(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $credentials = [
        'username' => $request->username,
        'password' => $request->password,
    ];

    // Try admin login first
    if (Auth::guard('admin')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('admin.dashboard')->with('success', 'Welcome Admin!');
    }

    // Try student login
    if (Auth::guard('student')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('student.dashboard')->with('success', 'Welcome Student!');
    }

    // ❌ If both fail
    return back()->withErrors([
        'username' => 'Invalid username or password.',
    ])->withInput();
}
}


