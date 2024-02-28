<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BloodRequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blood_requests')->insert([
            [                
                'request_status' => 'Pending',
                'request_date' => '2023-12-03 08:14:03',
                'staff_email' => 'admin@admin.com',
                'donor_email' => 'user1@example.com',
            ],
            [                
                'request_status' => 'Pending',
                'request_date' => '2023-12-31 13:21:08',
                'staff_email' => 'admin@admin.com',
                'donor_email' => 'user19@example.com',
            ],
            [                
                'request_status' => 'Pending',
                'request_date' => '2023-12-31 13:28:48',
                'staff_email' => 'admin@admin.com',
                'donor_email' => 'user19@example.com',
            ],
            [                
                'request_status' => 'Pending',
                'request_date' => '2023-12-31 14:37:02',
                'staff_email' => 'admin@admin.com',
                'donor_email' => 'user7@example.com',
            ],
            [                
                'request_status' => 'Pending',
                'request_date' => '2023-12-31 14:44:53',
                'staff_email' => 'admin@admin.com',
                'donor_email' => 'user7@example.com',
            ],
            [
                'request_status' => 'Pending',
                'request_date' => '2023-12-31 15:08:10',
                'staff_email' => 'admin@admin.com',
                'donor_email' => 'user15@example.com',
            ],
            [                
                'request_status' => 'Pending',
                'request_date' => '2023-12-31 15:10:20',
                'staff_email' => 'admin@admin.com',
                'donor_email' => 'user13@example.com',
            ],
            [
                'request_status' => 'Pending',
                'request_date' => '2023-12-31 15:15:04',
                'staff_email' => 'admin@admin.com',
                'donor_email' => 'user13@example.com',
            ],
            [
                'request_status' => 'Pending',
                'request_date' => '2023-12-31 15:21:31',
                'staff_email' => 'admin@admin.com',
                'donor_email' => 'user14@example.com',
            ],
            [
                'request_status' => 'Pending',
                'request_date' => '2023-12-31 15:42:34',
                'staff_email' => 'admin@admin.com',
                'donor_email' => 'user17@example.com',
            ],
            [
                'request_status' => 'Pending',
                'request_date' => '2023-12-31 15:56:54',
                'staff_email' => 'admin@admin.com',
                'donor_email' => 'user16@example.com',
            ],
        ]);
    }
}
