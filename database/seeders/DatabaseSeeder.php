<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ClassroomSeeder::class);
        $this->call(LectureSeeder::class);
        $this->call(SyllabusSeeder::class);
        $this->call(StudentSeeder::class);
    }
}
