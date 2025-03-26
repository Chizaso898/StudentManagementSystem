<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Creating predefined roles
        Role::create(['name' => 'Instructor']);
        Role::create(['name' => 'Student']);
    }
}
