<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HospitalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hospitals')->insert([
            'hospital_name' => 'Sample Hospital',
            'hospital_address' => 'Hospital Address',
            'hospital_contact' => '1234567890',
            'hospital_email' => 'hospital@example.com',
            'hospital_registration_date' => now(),
        ]);
    }
}
