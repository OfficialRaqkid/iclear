<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\YearLevel;
use App\Models\User;
use App\Models\StudentProfile;
use App\Models\EnrolledStudent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SignupUserContoroller extends Controller
{
    public function index()
    {
        $programs = Program::all();
        $yearLevels = YearLevel::all();

        return view('auth.signup', compact('programs', 'yearLevels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id'      => 'required|unique:enrolled_students,student_id',
            'first_name'      => 'required|string|max:255',
            'last_name'       => 'required|string|max:255',
            'program_id'      => 'required|exists:programs,id',
            'year_level_id'   => 'required|exists:year_levels,id',
            'contact_number'  => 'required|string|max:20',
            'address'         => 'required|string|max:255',
        ]);

        // Check if student ID is in enrolled list (optional depending on your logic)
        $isEnrolled = EnrolledStudent::where('student_id', $request->student_id)->exists();

        // Generate username like 202500001
        $yearPrefix = now()->year;
        $latestUser = User::where('username', 'like', "{$yearPrefix}%")
            ->orderBy('username', 'desc')
            ->first();

        $nextSequence = $latestUser
            ? intval(substr($latestUser->username, 4)) + 1
            : 1;

        $username = $yearPrefix . str_pad($nextSequence, 5, '0', STR_PAD_LEFT);

        // Auto-generate name and username
        $middleInitial = strtoupper(substr($request['middle_name'], 0, 1)) . '.';
        $name = trim("{$request->first_name} {$middleInitial} {$request->last_name} {$request->suffix}");

        // Create the user account
        $user = User::create([
            'name'      => $name,
            'username'  => $username,
            'password'  => Hash::make('123456'),
            'role_id'   => 1, // student role
            'is_active' => $isEnrolled ? 1 : 0,
        ]);

        // Create student profile
        StudentProfile::create([
            'user_id'        => $user->id,
            'first_name'     => $request->first_name,
            'middle_name'    => $request->middle_name,
            'last_name'      => $request->last_name,
            'suffix'         => $request->suffix,
            'contact_number' => $request->contact_number,
            'address'        => $request->address,
            'program_id'     => $request->program_id,
            'year_level_id'  => $request->year_level_id,
        ]);

        return redirect()->route('login.student')->with('success', 'Account successfully registered!');
    }
}
