<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
public function store(Request $request)
{
    $request->validate([
        'username' => 'required|unique:users,username',
        'first_name' => 'required',
        'last_name' => 'required',
    ]);

    // Create user with default password
    $user = \App\Models\User::create([
        'name' => $request->first_name . ' ' . $request->last_name,
        'username' => $request->username,
        'password' => bcrypt('123456'),
        'role_id' => 1, // Default role (adjust if needed)
    ]);

    // Create user profile
    $user->profile()->create([
        'first_name' => $request->first_name,
        'middle_name' => $request->middle_name,
        'last_name' => $request->last_name,
        'suffix' => $request->suffix,
        'academic_title' => $request->academic_title,
        'profile_photo' => $request->profile_photo,
    ]);

    return redirect()->back()->with('success', 'User added with default password: 123456');
}
}
