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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('employee_id')->nullable()->index('fk_payrolls_employees');
            $table->integer('salary_id')->nullable()->index('fk_payrolls_salaries');
            $table->integer('total_earnings')->nullable()->comment('Total salary including bonuses and allowances');
            $table->integer('total_deductions')->nullable()->comment('Total deductions for the period');
            $table->integer('net_pay')->nullable();
            $table->char('payroll_status', 1)->nullable()->comment('Status of the payroll (e.g., processed, pending, failed)');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
