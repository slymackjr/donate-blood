<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(HospitalsTableSeeder::class);
        $this->call(StaffMembersTableSeeder::class);
        $this->call(BloodDonorUsersTableSeeder::class);
        $this->call(BloodRequestsTableSeeder::class);
    }
}
