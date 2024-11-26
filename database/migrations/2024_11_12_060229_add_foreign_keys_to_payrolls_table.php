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
        Schema::table('payrolls', function (Blueprint $table) {
            $table->foreign(['employee_id'], 'fk_payrolls_employees')->references(['id'])->on('employees')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['salary_id'], 'fk_payrolls_salaries')->references(['id'])->on('salaries')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payrolls', function (Blueprint $table) {
            $table->dropForeign('fk_payrolls_employees');
            $table->dropForeign('fk_payrolls_salaries');
        });
    }
};
