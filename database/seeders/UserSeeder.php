<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Creating Instructor and Student users
        $instructorRole = Role::where('name', 'Instructor')->first();
        $studentRole = Role::where('name', 'Student')->first();

        User::create([
            'name' => 'Instructor Name',
            'email' => 'instructor@example.com',
            'password' => Hash::make('password'),
            'role_id' => $instructorRole->id,
        ]);

        User::create([
            'name' => 'Student Name',
            'email' => 'student@example.com',
            'password' => Hash::make('password'),
            'role_id' => $studentRole->id,
        ]);
    }
}
