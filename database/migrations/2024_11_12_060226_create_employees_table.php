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
        Schema::create('employees', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('email', 50)->nullable();
            $table->unsignedInteger('phone_number')->nullable();
            $table->string('address', 100)->nullable();
            $table->integer('department_id')->nullable()->index('fk_employees_departments');
            $table->string('position', 50)->nullable();
            $table->date('hire_date')->nullable();
            $table->char('employment_type', 40)->nullable();
            $table->integer('salary')->nullable()->comment('basic salary');
            $table->binary('disability_status')->nullable();
            $table->char('job_basis', 20)->nullable();
            $table->integer('emergency_contact')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
