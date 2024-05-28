<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Roles::updateOrCreate([
            'slug' => 'admin',
            'name' => 'Admin'
        ]);

        Roles::updateOrCreate([
            'slug' => 'user',
            'name' => 'User'
        ]);
    }
}
