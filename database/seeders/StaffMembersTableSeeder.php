<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StaffMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('staff_members')->insert([
            [
                'staff_id' => 3,
                'username' => 'admin',
                'full_name' => 'admin',
                'gender' => 'Male',
                'job_title' => 'nurse',
                'department' => 'Emergency Department(ED)',
                'address' => '12 street mirambo',
                'phone_number' => '0767413968',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
                'status' => 'Active',
                'register_date' => '2023-12-06 21:00:00',
                'hospital_id' => 1,
            ],
        ]);
    }
}
