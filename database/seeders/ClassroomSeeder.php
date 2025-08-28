<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 11; $i++) {
            for ($j = 1; $j <= 4; $j++) {
                Classroom::factory()->state([
                    'name' => 'Classroom ' . $i . chr(64 + $j),
                ])->create();
            }
        }
    }
}
