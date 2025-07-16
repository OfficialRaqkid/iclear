<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department_id',
    ];

    /**
     * A program belongs to a department.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Optional: A program may have many student profiles.
     */
    public function students()
    {
        return $this->hasMany(StudentProfile::class);
    }
}
