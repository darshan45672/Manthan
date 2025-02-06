<?php

namespace Database\Seeders;

use App\Models\College;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\HoD;
use App\Models\Principal;
use App\Models\Student;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'is_admin' => true,
            'profile_completed' => false,
        ]);

        // User::factory()->create([
        //     'name' => 'darshan',
        //     'email' => 'drshnbhandary@gmail.com',
        //     'password' => Hash::make('12345678'),
        //     'is_admin' => false,
        // ]);
        
        // User::factory(2000)->create();
        College::factory(50)->create();
        Department::factory(50)->create();

        // Student::factory(500)->create();
        // Faculty::factory(500)->create();
        // HoD::factory(50)->create();
        // Principal::factory(10)->create();
    }
}
