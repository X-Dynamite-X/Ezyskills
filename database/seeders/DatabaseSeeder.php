<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleAndPermissionSeeder::class,
        ]);
        $user = User::factory()->create([

            'email' => 'dynamite@gmail.com',
            "password" => bcrypt("123")
        ]);
        $user->assignRole(["admin", "trainer"]);
        User::factory(99)->create();
        $this->call([
            PricingPlanSeeder::class,
            CoursesSeeder::class,
            CourseInfoSeeder::class,
        ]);
    }
}