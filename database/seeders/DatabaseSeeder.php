<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin', 'guard_name' => 'web']);
        Role::create(['name' => 'trainer', 'guard_name' => 'web']);
        Role::create(['name' => 'student', 'guard_name' => 'web']);
        $user = User::factory()->create([
            // 'name' => 'Test User',
            'email' => 'dynamite@gmail.com',
            "password" => bcrypt("231")
        ]);
        $user->assignRole(["admin", "trainer"]);
        User::factory(99)->create();
        $this->call([
            CoursesSeeder::class,
        ]);
    }
}
