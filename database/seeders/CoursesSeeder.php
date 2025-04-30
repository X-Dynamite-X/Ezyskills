<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\User;

class CoursesSeeder extends Seeder
{
    public function run(): void
    {
        // Get trainers IDs
        $trainers = User::role('trainer')->pluck('id');

        if ($trainers->isEmpty()) {
            $this->command->info('No trainers found. Please seed users with trainer role first.');
            return;
        }

        $courses = [
            [
                'title' => 'Angular JS Fundamentals',
                'description' => 'Master Angular.js fundamentals and build modern web applications. Learn components, services, routing, and more.',
                'image' => 'courses/angular.png',
                'price' => 199.99,
                'status' => 'Opened',
            ],
            [
                'title' => 'AWS Cloud Computing',
                'description' => 'Comprehensive AWS cloud computing course. Learn EC2, S3, Lambda, and prepare for AWS certification.',
                'image' => 'courses/aws.png',
                'price' => 299.99,
                'status' => 'Opened',
            ],
            [
                'title' => 'Vue.js 3 Complete Guide',
                'description' => 'Build scalable front-end applications with Vue.js 3. Master Composition API, Vuex, and Vue Router.',
                'image' => 'courses/vue.png',
                'price' => 149.99,
                'status' => 'Coming Soon',
            ],
            [
                'title' => 'Power BI Data Analytics',
                'description' => 'Create powerful data visualizations and BI reports. Learn DAX, data modeling, and report design.',
                'image' => 'courses/powerbi.png',
                'price' => 179.99,
                'status' => 'Opened',
            ],
            [
                'title' => 'React.js Advanced Concepts',
                'description' => 'Deep dive into React.js advanced patterns. Learn hooks, context, Redux, and performance optimization.',
                'image' => 'courses/react.png',
                'price' => 249.99,
                'status' => 'Coming Soon',
            ],
            [
                'title' => 'Python for Data Science',
                'description' => 'Learn Python programming for data analysis. Cover NumPy, Pandas, and data visualization.',
                'image' => 'courses/python.png',
                'price' => 199.99,
                'status' => 'Opened',
            ],
            [
                'title' => 'Docker & Kubernetes',
                'description' => 'Master containerization with Docker and orchestration with Kubernetes. Deploy scalable applications.',
                'image' => 'courses/docker.png',
                'price' => 299.99,
                'status' => 'Coming Soon',
            ],
            [
                'title' => 'Laravel Full Stack',
                'description' => 'Build modern web applications with Laravel. Learn MVC, Eloquent ORM, and full-stack development.',
                'image' => 'courses/laravel.png',
                'price' => 249.99,
                'status' => 'Opened',
            ]
        ];

        foreach ($courses as $course) {
            Course::create([
                'title' => $course['title'],
                'description' => $course['description'],
                'image' => $course['image'],
                'trainer_id' => $trainers->random(), // Randomly assign a trainer
                'price' => $course['price'],
                'status' => $course['status'],
            ]);
        }

        // Create additional random courses
        foreach (range(1, 12) as $i) {
            Course::create([
                'title' => "Course Title " . $i,
                'description' => "This is a detailed description for Course " . $i . ". It covers various topics and provides hands-on experience.",
                'image' => 'courses/default.png',
                'trainer_id' => $trainers->random(),
                'price' => rand(99, 499),
                'status' => collect(['Opened', 'Coming Soon', 'Archived'])->random(),
            ]);
        }
    }
}

