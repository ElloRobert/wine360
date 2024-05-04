<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MonitoringTableSeeder::class);
        $this->call(VehiclesTableSeeder::class);
        $this->call(VehiclesFuelTableSeeder::class);
        $this->call(VehiclesMalfunctionTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(RemindersTableSeeder::class);
    }
}
