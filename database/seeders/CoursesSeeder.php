<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\User;
class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $trainers = User::where('role', 'trainer')->pluck('id');

        if ($trainers->isEmpty()) {
            $this->command->info('No trainers found. Please seed users with trainer role first.');
            return;
        }

        foreach (range(1, 50) as $i) {
            Course::create([
                'title' => "Course Title $i",
                'description' => "This is a description for Course $i.",
                'image' => 'courses/default.png',
                'trainer_id' => $trainers->random(),
                'price' => rand(100, 999),
                'status' => collect(['Opened', 'Coming Soon', 'Archived'])->random(),
            ]);
        }
    }
}