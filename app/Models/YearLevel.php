<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class YearLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Optional: A year level may have many student profiles.
     */
    public function students()
    {
        return $this->hasMany(StudentProfile::class);
    }
}


