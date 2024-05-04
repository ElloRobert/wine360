<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Ultraware\Roles\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Admin role',
            'level' => 1
        ]);

        $legalEntity = Role::create([
            'name' => 'Legal entity',
            'slug' => 'legal',
            'description' => 'Legal entity role',
            'level' => 2
        ]);

        $employee = Role::create([
            'name' => 'Employee',
            'slug' => 'employee',
            'description' => 'Employee role',
            'level' => 3
        ]);

        $privateUser = Role::create([
            'name' => 'Private user',
            'slug' => 'private',
            'description' => 'Private user role',
            'level' => 4
        ]);
    }
}
