<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class StudentProfile extends Model
{
    use Notifiable;

    protected $table = 'student_profiles'; // your student table

    protected $fillable = [
        'student_id',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'email',
        'password',
        'contact_number',
        'address',
        'program_id',
        'year_level_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
        'email_verified_at' => 'datetime',
    ];


    public function student()
{
    return $this->belongsTo(Student::class);
}
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function yearLevel()
    {
        return $this->belongsTo(YearLevel::class);
    }

    /**
     * Tell Laravel to use student_id for authentication instead of email
     */
    public function getAuthIdentifierName()
    {
        return 'student_id';
    }
}
