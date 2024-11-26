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
        Schema::table('leaves', function (Blueprint $table) {
            $table->foreign(['department_id'], 'fk_leaves_departments')->references(['id'])->on('departments')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['employee_id'], 'fk_leaves_employees')->references(['id'])->on('employees')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['leave_type_id'], 'fk_leaves_leave_types')->references(['id'])->on('leave_types')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leaves', function (Blueprint $table) {
            $table->dropForeign('fk_leaves_departments');
            $table->dropForeign('fk_leaves_employees');
            $table->dropForeign('fk_leaves_leave_types');
        });
    }
};
