<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SigninUserController extends Controller
{
    public function index()
    {
        return view('auth.signin');
    }

    public function store(Request $request)
{
    $request->validate([
        'student_id' => 'required',
        'password' => 'required',
    ]);

    $credentials = [
        'username' => $request->student_id,
        'password' => $request->password,
    ];

    if (Auth::guard('student')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('student.dashboard')->with('success', 'Welcome!');
    }

    return back()->withErrors([
        'student_id' => 'Invalid student ID or password.',
    ])->withInput();
}
    public function logout(Request $request)
    {
        Auth::guard('student')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.student')->with('success', 'You have been logged out.');
    }
}


