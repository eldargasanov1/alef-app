<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Syllabus extends Model
{
    /** @use HasFactory<\Database\Factories\SyllabusFactory> */
    use HasFactory;

    protected $fillable = [
        'classroom_id',
    ];

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

    public function lectures(): BelongsToMany
    {
        return $this->belongsToMany(Lecture::class);
    }
}
