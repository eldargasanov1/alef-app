<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Lecture;
use App\Models\Syllabus;
use Illuminate\Database\Seeder;

class SyllabusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classrooms = Classroom::query()->get();
        $lectures = Lecture::query()->get();

        foreach ($classrooms as $classroom) {
            $syllabus = Syllabus::query()->create([
                'classroom_id' => $classroom->id,
            ]);

            $syllabus->lectures()->attach($lectures->random(rand(4, 6)));
        }
    }
}
