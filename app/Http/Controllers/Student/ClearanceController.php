<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clearance;
use Illuminate\Support\Facades\Auth;

class ClearanceController extends Controller
{
    public function index()
    {
        $clearance = Clearance::where('student_id', Auth::guard('student')->id())->first();
        return view('student.clearances', compact('clearance'));
    }

    public function update(Request $request, $id)
    {
        $student_id = Auth::guard('student')->id(); // Use student guard
        $office = $request->office;
        
        $clearance = Clearance::where('student_id', $student_id)->first();
        
        if (!$clearance) {
            $clearance = Clearance::create([
                'student_id' => $student_id,
            ]);
        }
        
        if ($clearance->$office !== null) {
            return response()->json([
                'success' => false,
                'message' => 'You have already submitted a request for this office.'
            ]);
        }
        
        $clearance->update([$office => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Your clearance request has been submitted.'
        ]);
    }
}