<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;

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
            $student = Auth::guard('student')->user();

            if ($student->user_role == 'student') {
                return redirect()->route('student.dashboard')->with('success', 'Welcome!');        
            }
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('student')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.student')->with('success', 'You have been logged out.');
    }
}


