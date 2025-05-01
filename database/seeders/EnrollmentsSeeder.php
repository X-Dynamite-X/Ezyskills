<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnrollmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //


        for($i=1;$i<25;$i++){
            $enrollments = [
                'user_id' => $i,
                'course_id' => 1,
                'status' => 'approved',
                'enrolled_at' => now(),
            ];
            Enrollment::create($enrollments);
        }

    }
}
