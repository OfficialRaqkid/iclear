<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clearance extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'home_dean',
        'library_incharge', 
        'department_dean',
        'vp_sas',
        'director_finance',
        'csit_treasurer',
        'csit_president',
        'program_head',
        'registrar',
        'dept_head',
        'vp_finance',
    ];

    // Relationship with student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}