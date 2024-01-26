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
        Schema::create('staff_members', function (Blueprint $table) {
            $table->string('username')->unique();
            $table->string('full_name');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('job_title');
            $table->string('department');
            $table->string('address');
            $table->string('phone_number');
            $table->string('email')->primary();
            $table->string('password');
            $table->enum('status', ['Active', 'Inactive'])->default('Inactive');
            $table->timestamp('register_date')->default(now());
            $table->string('hospital_id');
           
             // Foreign keys
             $table->foreign('hospital_id')->references('hospital_id')->on('hospitals');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_members');
    }
};
