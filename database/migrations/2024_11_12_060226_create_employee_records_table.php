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
        Schema::create('employee_records', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('employee_id')->nullable()->index('fk_employee_records_employees');
            $table->string('record_type', 100)->nullable();
            $table->date('record_date')->nullable();
            $table->char('record_description', 200)->nullable();
            $table->string('outcome', 200)->nullable();
            $table->string('comments', 200)->nullable();
            $table->integer('handled_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_records');
    }
};
