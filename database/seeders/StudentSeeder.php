<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classrooms = Classroom::query()->get();

        foreach ($classrooms as $classroom) {
            Student::factory(20)->for($classroom)->create();
        }
    }
}
