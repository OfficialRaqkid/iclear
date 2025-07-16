<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Program;
use App\Models\YearLevel;

class SignupUserController extends Controller
{
    public function index()
    {
        $programs = Program::with('department')->get();
        $yearLevels = YearLevel::all();

        return view('auth.signup', compact('programs', 'yearLevels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id'      => 'required|unique:students,username', // ID number as username
            'first_name'      => 'required|string|max:255',
            'middle_name'     => 'nullable|string|max:255',
            'last_name'       => 'required|string|max:255',
            'suffix'          => 'nullable|string|max:10',
            'contact_number'  => 'required|string|max:20',
            'address'         => 'required|string|max:255',
            'program_id'      => 'required|exists:programs,id',
            'year_level_id'   => 'required|exists:year_levels,id',
        ]);

        DB::transaction(function () use ($request) {
            // Create Student record
            $student = Student::create([
                'name'       => $request->first_name . ' ' . $request->last_name,
                'username'   => $request->student_id,
                'password'   => Hash::make('123456'),
                'user_role'  => 'student',
                'is_active'  => true,
            ]);

            // Create StudentProfile
            $student->profile()->create([
                'first_name'     => $request->first_name,
                'middle_name'    => $request->middle_name,
                'last_name'      => $request->last_name,
                'suffix'         => $request->suffix,
                'contact_number' => $request->contact_number,
                'address'        => $request->address,
                'program_id'     => $request->program_id,
                'year_level_id'  => $request->year_level_id,
            ]);
        });

        return redirect()->route('login.student')->with('success', 'Account created! Default password is 123456.');
    }
}
