<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Classroom extends Model
{
    /** @use HasFactory<\Database\Factories\ClassroomFactory> */
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function syllabus(): HasOne
    {
        return $this->hasOne(Syllabus::class);
    }
}
