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
        Schema::create('leaves', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('employee_id')->nullable()->index('fk_leaves_employees');
            $table->integer('leave_type_id')->nullable()->index('fk_leaves_leave_types');
            $table->integer('department_id')->nullable()->index('fk_leaves_departments');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('duration')->nullable();
            $table->char('leave_status', 1)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
