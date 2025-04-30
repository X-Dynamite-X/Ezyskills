<?php

namespace Database\Seeders;

use App\Models\CourseInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 1; $i <= 20; $i++) {
            $courseInfos = [
                'course_id' => $i,
                'about' => 'This course is designed for individuals who want to learn Angular.js from scratch. It covers the fundamentals of Angular.js, including components, services, and routing. You will also learn how to build real-world applications using Angular.js.',
                'content' => [
                    'html' => [
                        'Introduction to Angular.js',
                        'Components and Templates',
                        'Services and Dependency Injection',
                        'Routing and Navigation',
                        'Forms and Validation',
                        'HTTP and Data Binding',
                        'Advanced Topics',
                    ],
                    'css' => [
                        'Introduction to Angular.js',
                        'Components and Templates',
                        'Services and Dependency Injection',
                        'Routing and Navigation',
                        'Forms and Validation',
                        'HTTP and Data Binding',
                        'Advanced Topics',
                    ],
                    'javascript' => [
                        'Introduction to Angular.js',
                        'Components and Templates',
                        'Services and Dependency Injection',
                        'Routing and Navigation',
                        'Forms and Validation',
                        'HTTP and Data Binding',
                        'Advanced Topics',
                    ],
                ],
                'objectives' => [
                    'Understand the basics of Angular.js',
                    'Build real-world applications using Angular.js',
                    'Learn advanced topics in Angular.js',
                ],
                'projects' => [
                    'Build a simple Angular.js application'=>[
                        'Create a simple Angular.js application',
                        'Build a simple Angular.js application',
                        'Create a simple Angular.js application',
                    ],
                    'Create a complex Angular.js application'=>[
                        'Create a complex Angular.js application',
                        'Create a complex Angular.js application',
                        'Create a complex Angular.js application',
                    ],
                    'Contribute to an open-source Angular.js project'=>[
                        'Contribute to an open-source Angular.js project',
                        'Contribute to an open-source Angular.js project',
                        'Contribute to an open-source Angular.js project',
                    ],
                ],
            ];

            CourseInfo::create($courseInfos);
        }
    }
}
