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
        Schema::create('bank_details', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('employee_id')->nullable()->index('fk_bank_details_employees');
            $table->string('bank_name', 100)->nullable();
            $table->string('branch_name', 100)->nullable();
            $table->integer('account_number')->nullable();
            $table->string('account_name', 100)->nullable();
            $table->string('account_type', 100)->nullable();
            $table->string('bank_code', 100)->nullable();
            $table->char('currency', 10)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_details');
    }
};
