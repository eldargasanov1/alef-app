<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lecture extends Model
{
    /** @use HasFactory<\Database\Factories\LectureFactory> */
    use HasFactory;

    protected $fillable = [
        'theme',
        'description'
    ];

    public function syllabi(): BelongsToMany
    {
        return $this->belongsToMany(Syllabus::class);
    }
}
