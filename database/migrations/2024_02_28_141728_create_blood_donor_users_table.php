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
        Schema::create('blood_donor_users', function (Blueprint $table) {
            $table->id('donor_id');
            $table->string('username')->unique();
            $table->string('full_name');
            $table->enum('gender', ['Male', 'Female']);
            $table->enum('blood_type', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']);
            $table->string('address');
            $table->string('phone_number');
            $table->string('birthdate');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('status', ['Active', 'Inactive'])->default('Inactive');
            $table->timestamp('register_date')->useCurrent();
            
              // Index email column
              $table->index('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_donor_users');
    }
};
