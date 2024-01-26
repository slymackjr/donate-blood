<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->id('request_id');
            $table->string('staff_email')->unique();
            $table->string('donor_email')->unique();
            $table->enum('request_status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->timestamp('request_date')->default(now());

            // Foreign keys
            $table->foreign('staff_email')->references('email')->on('staff_members');
            $table->foreign('donor_email')->references('email')->on('blood_donor_users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_requests');
    }
};
